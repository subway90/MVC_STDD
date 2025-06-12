<?php

/**
 * Hàm này dùng để xoá giỏ hàng
 * @param mixed $id
 * @return void
 */
function delete_cart($id) {
    if(!empty($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $i => $product) { 
            if($_SESSION['cart'][$i]['id_product'] == $id){
                // Xoá phần tử có ID đó
                unset($_SESSION['cart'][$i]);
            }
        }
    }
}
/**
 * Hàm này dùng để cập nhật số lượng
 * @param mixed $id
 * @param string $type
 * @return bool trả về TRUE nếu cập nhật số lượng thành công, ngược lại trả về FALSE nếu đã đạt giới hạn
 */
function update_quantity($type,$id) {
    // check product
    if(!check_exist_one('product',$id)) return false;
    // Lặp sản phẩm trong session
    if(!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $i => $product) {
            // Nếu ID sản phẩm cập nhật có trong giỏ hàng
            if($_SESSION['cart'][$i]['id_product'] == $id){
                // Nếu tăng số lượng
                if($type === 'plus') {
                    // Lấy tổng số lượng của sản phẩm đó
                    $max_quantity = pdo_query_value_new('SELECT quantity_product FROM product WHERE id_product ='.$id);
                    // Kiểm tra nếu chưa đạt giới hạn
                    if($_SESSION['cart'][$i]['quantity_product'] < $max_quantity ) {
                        $_SESSION['cart'][$i]['quantity_product']++; // Thêm số lượng
                        return true;
                    }else return false;
                }
                // Nếu giảm số lượng
                else if($type === 'minus') {
                    // Kiểm tra số lượng chưa bé hơn 1 (chưa min)
                    if($_SESSION['cart'][$i]['quantity_product']>1) {
                        $_SESSION['cart'][$i]['quantity_product']--; // Giảm số lượng
                        return true;
                    }else return false;
                }
            }
        }
    }
    // Nếu chưa có sản phẩm
    // Thêm phần tử sản phẩmm mới vào mảng Cart
    $_SESSION['cart'][] = [
        'id_product' => $id,
        'quantity_product' => 1,
    ];
    return true;
}

/**
 * Trả về số lượng của sản phẩm đó
 * @param mixed $id_product
 * @return int
 */
function get_quantity_product($id_product) {
    return pdo_query_value(
        'SELECT quantity_product FROM product WHERE id_product ='.$id_product
    );
}

/**
 * Render dữ liệu HTML row sản phẩm ở table cart
 * @param mixed $data Dữ liệu sản phẩm
 * @return string
 */
function render_product_in_cart($data) {
    // giải nén
    extract($data);
    // lấy ảnh
    if($path_product_image) $path_product_image = URL_STORAGE.$path_product_image;
    // nếu không có ảnh -> lấy ảnh mặt định
    else $path_product_image = DEFAULT_IMAGE;
    // format giá
    if($sale_price_product) $format_price = '
        <div class="text-decoration-line-through small text-muted">'.number_format($price_product,0,',','.').' vnđ</div>
        <div>'.number_format($sale_price_product,0,',','.').' vnđ</div>';
    else $format_price = '<div>'.number_format($price_product,0,',','.').' vnđ</div>';
    // Nếu có giá giảm -> gán cho giá
    if($sale_price_product) $price_product = $sale_price_product;
    // format tổng tiền
    $total_product = number_format($price_product*$quantity_product_in_cart,0,',','.');
    
    $price_product = number_format($price_product,0,',','.');
    // format tên model nếu có tên model và ẩn = false
    if($name_model && !$hide_model) $name_model = "- ".$name_model;
    else $name_model = ''; // trống tên model
    // format logo thương hiệu
    if($logo_brand) $logo_brand = URL_STORAGE.$logo_brand;
    // format nút tăng, giảm số lượng
    ($quantity_product_in_cart == $quantity_product) ? $state_button_plus = 'disabled' : $state_button_plus = '';
    ($quantity_product_in_cart == 1) ? $state_button_minus = 'disabled' : $state_button_minus = '';

    return 
    <<<HTML
        <tr class="align-middle">
            <td class="text-start d-flex align-items-center">
                <div>
                    <img width="50" src="{$path_product_image}" alt="{$path_product_image}">
                </div>
                <div class="ms-2">
                    <a href="/chi-tiet/{$slug_product}" class="text-success fw-bold">{$name_product}</a>
                    <div class="small text-muted d-flex align-items-center">
                        <img class="me-1" height="12" src="{$logo_brand}" alt="">{$name_brand} {$name_model} - {$name_color}
                    </div>
                </div>
            </td>
            <td class="lh-1">
                {$format_price}
            </td>
            <td>
                <form method="post">
                    <input type="hidden" class="idProduct" value="{$id_product}">
                    <div
                        class="btn-group d-flex align-items-center mx-auto w-25 justify-content-center">
                        <button {$state_button_minus} type="button" id="minusCartBtn" class="btn btn-outline-success btn-sm">
                            <i class="small fas fa-minus"></i>
                        </button>
                        <span class="mx-2"> {$quantity_product_in_cart} </span>
                        <button {$state_button_plus} type="button" id="plusCartBtn" class="btn btn-outline-success btn-sm">
                            <i class="small fas fa-plus"></i>
                        </button>
                    </div>
                </form>
            </td>
            <td class="text-end">{$total_product} vnđ</td>
            <td class="text-center">
                <form method="post">
                    <input type="hidden" class="idProduct" value="{$id_product}">
                    <button type="button" id="deleteCartBtn" class="btn btn-sm btn-outline-danger border-0 bg-transparent p-0">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </form>
            </td>
        </tr>
    HTML;
}

/**
 * Render dữ liệu HTML khi sản phẩm trống ở giỏ hàng
 * @return string
 */
function render_product_in_cart_empty() {
    return 
    <<<HTML
        <tr class="align-middle">
            <td colspan="5" class="text-center">Danh sách trống</td>
        </tr>
    HTML;
}

/**
 * Render dữ liệu HTML ở cuối row của table sản phẩm ở giỏ hàng
 * @return string
 */
function render_product_in_cart_end() {
    return 
    <<<HTML
        <tr>
            <td colspan="5" class="text-end">
                <form method="post">
                    <button id="deleteAllCartBtn" type="button" class="btn btn-sm px-2 py-0 btn-outline-danger"><small><i class="fa-solid fa-trash me-2"></i>Xoá tất cả</small></button>
                </form>
            </td>
        </tr>
    HTML;
}

function render_button_checkout() {
    // Lấy URL
    $url = URL;
    // Nếu chưa đăng nhập
    if(!is_login()) :
    return
    <<<HTML
        <a href="{$url}dang-nhap/gio-hang" class="w-100 btn btn-success">Đăng nhập để Đặt hàng</a>
    HTML;
    // Nếu đã đăng nhập
    else :
    // format state
    get_cart('count') == 0 ? $state_button = 'disabled' : $state_button = '';
    return
    <<<HTML
        <a href="{$url}dat-hang" class="w-100 btn btn-success {$state_button}">Đặt hàng</a>
    HTML;
    endif;
}

function render_list_voucher($data) {
    
    $result = 
    <<<HTML
        <div class="text-success h6">Danh sách mã giảm giá</div>
    HTML;

    // nếu có danh sách mã giảm giá
    if(!empty($data)) {
        foreach ($data as $item) { extract($item);
            // Nếu là voucher public -> Hiện ra
            if($public_voucher && !in_array($code_voucher,$_SESSION['voucher'])) {

                // render
                $result .= 
                <<<HTML
                    <form>
                        <div class="row p-1">
                            <div class="w-75 border-1 border-end-0 rounded-2 voucher btn border-success small text-start">
                                <small class="small">
                                    <span class="small text-success fw-bold">{$code_voucher}</span>
                                    <div class="small text-dark"> 
                                        {$description_voucher}
                                    </div>
                                </small>
                            </div>
                            <input type="hidden" class="codeVoucher" value="{$code_voucher}">
                            <button type="button" id="useVoucher" class="w-25 btn btn-sm voucher btn-outline-success small rounded-2">
                                <small class="fw-semibold">
                                    Sử dụng ngay
                                </small>
                            </button>
                        </div>
                    </form>
                HTML;
            }
        }
    }

    return $result;
}

function render_apply_voucher() {
    $get_one = null;
    
    // Lấy thông tin voucher đang sử dụng
    if(!empty($_SESSION['voucher'])) {
        foreach ($_SESSION['voucher'] as $i => $row) {
            $get_one = get_one_voucher($_SESSION['voucher'][$i]);
            if(!empty($get_one) && $get_one['type_voucher'] === 'giảm tiền hoá đơn') break;
        }
    }

    if($get_one) {
        if($get_one['unit_voucher'] === '%') {
            $value_discount = get_cart('total_cart')/100 * $get_one['value_voucher'];
            // nếu có max value voucher và giá trị discount lớn hơn giá trị max -> so sánh và lấy giá max nếu vượt
            if($get_one['max_value_voucher'] && $get_one['max_value_voucher'] < $value_discount) $value_discount = $get_one['max_value_voucher'];
        }
        else $value_discount = $get_one['value_voucher'];
        // format
        $value_discount = number_format($value_discount,0,',','.');
        return <<<HTML
        <div class="w-100 d-flex justify-content-between fw-bold">
            <div class="small">Khuyến mãi</div>
            <div class="text-success"> - {$value_discount} vnđ</div>
        </div>
        <div class="w-100">
            <div class="small fst-italic fw-semi">
                Sử dụng mã <span class="fw-bold text-success"> {$get_one['code_voucher']} </span> 
                - {$get_one['description_voucher']}
            </div>
        </div>
        HTML;
    }else {
        return null;
    }
}