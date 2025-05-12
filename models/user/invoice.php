<?php

function get_all_invoice() {

    // Lấy danh sách hoá đơn
    $list_invoice =  pdo_query(
        'SELECT *
        FROM invoice
        WHERE username = "'.auth('username').'"'
    );

    //Nếu có hoá đơn -> lấy thông tin chi tiết của hoá đơn đó
    if(!empty($list_invoice)) {
        foreach ($list_invoice as $i => $invoice) {
            $list_invoice[$i]['detail'] = pdo_query(
                'SELECT id.*, p.name_product, p.slug_product, pi.path_product_image
                FROM invoice_detail id
                LEFT JOIN product p
                ON id.id_product = p.id_product
                LEFT JOIN product_image pi
                ON p.id_product = pi.id_product
                WHERE id.id_invoice = "'.$invoice['id_invoice'].'"
                GROUP BY p.id_product
                '
            );

            // Tính tổng
            $list_invoice[$i]['total'] = 0;
            foreach ($list_invoice[$i]['detail'] as $detail) $list_invoice[$i]['total'] += $detail['quantity_invoice'] * $detail['price_invoice'];
        }

        
        return $list_invoice;
    }

    return 0;
}

function get_one_invoice($id_invoice) {

    // Lấy danh sách hoá đơn
    $result =  pdo_query_one(
        'SELECT *
        FROM invoice
        WHERE id_invoice = "'.$id_invoice.'"
        AND username = "'.auth('username').'"'
    );

    // Nếu có hoá đơn -> lấy thông tin chi tiết của hoá đơn đó
    if(!empty($result)) {

        // Địa chỉ giao hàng
        $result['shipping_address'] = pdo_query_value(
            'SELECT name_shipping_address
            FROM shipping_address
            WHERE id_shipping_address = '.$result['id_shipping_address']
        );

        // Truy vấn
        $result['detail'] = pdo_query(
            'SELECT id.*, p.name_product, p.slug_product, pi.path_product_image
            FROM invoice_detail id
            LEFT JOIN product p
            ON id.id_product = p.id_product
            LEFT JOIN product_image pi
            ON p.id_product = pi.id_product
            WHERE id.id_invoice = "'.$result['id_invoice'].'"
            GROUP BY p.id_product
            '
        );

        // Tính tổng
        $result['total'] = 0;
        foreach ($result['detail'] as $detail) $result['total'] += $detail['quantity_invoice'] * $detail['price_invoice'];

        // Lấy voucher nếu có
        $result['voucher'] = pdo_query(
            'SELECT * 
            FROM voucher_invoice vi
            LEFT JOIN voucher v
            ON vi.code_voucher = v.code_voucher
            WHERE id_invoice = "'.$result['id_invoice'].'"'
        );

        // Return
        return $result;
    }

    return 0;
}