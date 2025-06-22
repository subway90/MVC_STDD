<?php

/**
 * Lấy danh sách hoá đơn của user theo từng trạng thái
 * @param mixed $state
 * @return array
 */
function get_list_invoice($state) {

    // validate status_invoice
    if($state === 'tat-ca') $query = '';
    else $query = ' = "'.str_replace('-',' ',$state).'"';

    // Lấy danh sách hoá đơn
    $list_invoice =  pdo_query_new(
        'SELECT *
        FROM invoice
        WHERE username = ?
        AND status_invoice '.$query,
        auth('username')
    );

    //Nếu có hoá đơn -> lấy thông tin chi tiết của hoá đơn đó
    if(!empty($list_invoice)) {
        foreach ($list_invoice as $i => $invoice) {
            $list_invoice[$i]['detail'] = pdo_query_new(
                'SELECT id.*, p.name_product, p.slug_product, pi.path_product_image
                FROM invoice_detail id
                LEFT JOIN product p
                ON id.id_product = p.id_product
                LEFT JOIN product_image pi
                ON p.id_product = pi.id_product
                WHERE id.id_invoice = ?
                GROUP BY p.id_product',
                $invoice['id_invoice']
            );

            // Tính tổng
            $list_invoice[$i]['total'] = 0;
            foreach ($list_invoice[$i]['detail'] as $detail) $list_invoice[$i]['total'] += $detail['quantity_invoice'] * $detail['price_invoice'];
        }

        
        return $list_invoice;
    }

    return [];
}

function get_one_invoice($id_invoice) {

    // Lấy danh sách hoá đơn
    $result =  pdo_query_one_new(
        'SELECT *
        FROM invoice
        WHERE id_invoice = ?
        AND username = ?',
            $id_invoice,auth('username')
        );

    // Nếu có hoá đơn -> lấy thông tin chi tiết của hoá đơn đó
    if(!empty($result)) {

        // Địa chỉ giao hàng
        $result['shipping_address'] = pdo_query_value_new(
            'SELECT name_shipping_address
            FROM shipping_address
            WHERE id_shipping_address = ?',
            $result['id_shipping_address']
        );

        // Truy vấn
        $result['detail'] = pdo_query_new(
            'SELECT id.*, p.name_product, p.slug_product, pi.path_product_image
            FROM invoice_detail id
            LEFT JOIN product p
            ON id.id_product = p.id_product
            LEFT JOIN product_image pi
            ON p.id_product = pi.id_product
            WHERE id.id_invoice = ?
            GROUP BY p.id_product',
            $result['id_invoice']
        );

        // Tính tổng
        $result['total'] = 0;
        foreach ($result['detail'] as $detail) $result['total'] += $detail['quantity_invoice'] * $detail['price_invoice'];

        // Lấy voucher nếu có
        $result['voucher'] = pdo_query_new(
            'SELECT * 
            FROM voucher_invoice vi
            LEFT JOIN voucher v
            ON vi.code_voucher = v.code_voucher
            WHERE id_invoice = ?',
            $result['id_invoice']
        );

        // Return
        return $result;
    }

    return 0;
}


/**
 * Trả về class màu background theo trạng thái đơn hàng
 * @param mixed $status_invoice
 * @return string
 */
function bg_state_invoice($status_invoice) {
    switch($status_invoice) {
        case 'chưa xác nhận' : return 'bg-secondary';
        case 'đã xác nhận' : return 'bg-secondary';
        case 'đang giao hàng' : return 'bg-warning';
        case 'hoàn thành' : return 'bg-success';
        case 'hoàn trả' : return 'bg-info';
        case 'đã huỷ' : return 'bg-danger';
        default: return 'text-dark';
    }
}


/**
 * Render dữ liệu danh sách hoá đơn của user
 * @param mixed $data
 * @return string
 */
function render_list_invoice_history($data) {    

    // trống data
    $path_image_empty = URL_STORAGE . 'system/empty_result.png';
    if(empty($data)) return 
    <<<HTML
        <div class="row d-flex flex-column align-items-center bg-light rounded-3 py-3">
            <img class="col-6 col-md-4 col-lg-2" src="{$path_image_empty}" alt="">
            <h6 class="col-12 text-center opacity-75 text-muted small">Hiện tại chưa có hoá đơn nào</h6>
        </div>
    HTML;

    // có data
    $render = '';
    foreach ($data as $i => $row) {
        // format
        $time = format_time($row['created_at'],'hh giờ mm phút - DD/MM/YYYY');
        $bg_state = bg_state_invoice($row['status_invoice']);
        $total_invoice = number_format($row['total'],0,0,'.');

        // row detail
        $render_row_detail = '';
        foreach ($row['detail'] as $product) {
            // format
            $path_product_image = URL_STORAGE . $product['path_product_image'];
            $url_product = URL . 'chi-tiet/' . $product['slug_product'];
            $price = number_format($product['price_invoice'],0,0,'.');
            $total = number_format($product['price_invoice']*$product['quantity_invoice'],0,0,'.');
            $render_row_detail .= <<<HTML
                <tr class="align-middle">
                    <td class="fw-light d-flex align-items-center small">
                        <img class="me-2" width="45" src="{$path_product_image}" alt="">
                        <a href="{$url_product}" class="nav-link text-green small text-decoration-underline">
                            {$product['name_product']}
                        </a>
                    </td>
                    <td class="fw-light small text-end">{$price} vnđ</td>
                    <td class="fw-light small text-end">{$product['quantity_invoice']}</td>
                    <td class="fw-light small text-end">{$total} vnđ</td>
                </tr>
            HTML;
        }
        $render .= 
        <<<HTML
            <div class="row py-3 mb-3 bg-light p-3 rounded-3">
                <div class="col-12 p-0 d-flex justify-content-between">
                    <span class="fw-semi small">
                        <i class="bi bi-clock text-success me-2"></i><small>{$time}</small>
                    </span>
                    <div class="px-3 small rounded-3 text-light {$bg_state} bg-opacity-50">
                        <span class="small fw-semi">
                            {$row['status_invoice']}
                        </span>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <table class="table table-hover mt-2">
                        <thead>
                            <th class="fw-normal small">Tên sản phẩm</th>
                            <th class="fw-normal small text-end">Giá</th>
                            <th class="fw-normal small text-end">Số lượng</th>
                            <th class="fw-normal small text-end">Thành tiền</th>
                        </thead>
                        <tbody>
                            {$render_row_detail}
                        </tbody>
                        <tfoot>
                            <td colspan="4" class="fw-bold small text-end">{$total_invoice} vnđ</td>
                        </tfoot>
                    </table>
                    <div class="d-flex justify-content-lg-end gap-1">
                        <!-- <a href="gio-hang/{$row['id_invoice']}" class="col-6 col-lg-2 btn btn-sm rounded-pill btn-outline-success px-3">
                            <i class="bi bi-bag-check-fill me-1"></i> Mua lại
                        </a> -->
                        <a href="lich-su-mua-hang/{$row['id_invoice']}" class="col-6 col-lg-2 btn btn-sm rounded-pill btn-success px-3">
                            <i class="bi bi-eye me-1"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        HTML;
    }

    return $render;
}