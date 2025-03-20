<?php

/**
 * Hàm này dùng để cập nhật giỏ hàng
 * @param mixed $id
 * @return void
 */
function update_cart($id): void {
        $new_product = true;
        foreach ($_SESSION['cart'] as $i => $product) { 
            // Nếu ID sản phẩm đã tồn tại trong giỏ hàng
            if($_SESSION['cart'][$i]['id_product'] == $id){
                $_SESSION['cart'][$i]['quantity_product']++; // Thêm số lượng
                $new_product = false;
                break; // Kết thúc vòng lặp
            }
        }
        // Nếu không có ID product này trong giỏ hàng
        if($new_product){
            // Thêm phần tử sản phẩmm mới vào mảng Cart
            $_SESSION['cart'][] = [
                'id_product' => $id,
                'quantity_product' => 1,
            ];
        }
}

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
    // Lặp sản phẩm trong session
    foreach ($_SESSION['cart'] as $i => $product) {
        // Nếu ID sản phẩm cập nhật có trong giỏ hàng
        if($_SESSION['cart'][$i]['id_product'] == $id){
            // Nếu tăng số lượng
            if($type == 'plus') {
                // Lấy tổng số lượng của sản phẩm đó
                $max_quantity = pdo_query_value('SELECT quantity_product FROM product WHERE id_product ='.$id);
                // Kiểm tra nếu chưa đạt giới hạn
                if($_SESSION['cart'][$i]['quantity_product'] < $max_quantity ) {
                    $_SESSION['cart'][$i]['quantity_product']++; // Thêm số lượng
                    return true;
                }
            }
            // Nếu giảm số lượng
            else if($type == 'minus') {
                // Kiểm tra số lượng chưa bé hơn 1 (chưa min)
                if($_SESSION['cart'][$i]['quantity_product']>1) {
                    $_SESSION['cart'][$i]['quantity_product']--; // Giảm số lượng
                    return true;

                }
            }
        }

    }
    return false;
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
            <td>
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
        <a href="{$url}dang-nhap/gio-hang" class="w-100 btn btn-success">Đăng nhập để Thanh toán</a>
    HTML;
    // Nếu đã đăng nhập
    else :
    // format state
    get_cart('count') == 0 ? $state_button = 'disabled' : $state_button = '';
    return
    <<<HTML
        <a href="{$url}thanh-toan" class="w-100 btn btn-success {$state_button}">Thanh toán</a>
    HTML;
    endif;
}