<?php

/**
 * Dùng để hiển thị Canvas giỏ hàng nếu $_SESSION['showCanvasCart'] TRUE
 */
function boolCanvas() {
    if($_SESSION['canvas']) {
        unset($_SESSION['canvas']);
        return 'show';
    }
}

/**
 * Dùng để bật canvas Cart
 * @return void
 */
function showCanvas() {
    $_SESSION['canvas'] = 'true';
}

/**
 * Lấy dữ liệu danh sách sản phẩm trong session giỏ hàng
 */
function list_product_in_cart() {
    $list_product = [];
    if(!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart) {
            $product = pdo_query_one(
                'SELECT * FROM product
                WHERE id_product ='.$cart['id_product']
                .' AND deleted_at IS NULL'
            );
            if(!empty($product)) {
                extract($product);
                $list_product[] = [
                    'quantity_product_in_cart' => $cart['quantity_product'],
                    'name_product' => $name_product,
                    'description_product' => $description_product,
                    'quantity_product' => $quantity_product,
                    'price_product' => $price_product,
                    'image_product' => $image_product,
                    'id_product' => $id_product,
                ];
            }
        }
    }
    return $list_product;
}

/**
 * Hàm này dùng để trả về tổng tiền trong giỏ hàng
 * @return int
 */
function total_cart() {

    $total = 0;

    if(!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart) {
            $get_price_product = pdo_query_value(
                'SELECT price_product 
                FROM product
                WHERE id_product ='.$cart['id_product'].'
                AND status_product = 1'
            );

            $total += $cart['quantity_product']*$get_price_product;
        }
    }

    return $total;
}

/**
 * Lấy danh sách danh mục cho menu
 * 
 * @return array{category_v1: array, category_v2: array[]} Mảng gồm 2 phần tử category_v1[name,slug] và category_v2[name,slug]
 */
function list_category_for_menu() {
    // mảng return
    $result = [];
    // lấy danh sách v1
    $list_v1 = pdo_query(
        'SELECT id_category_v1,name_category_v1, slug_category_v1, logo_category_v1 FROM category_v1 WHERE deleted_at IS NULL'
    );
    // nếu danh sách v1 rỗng
    if(!$list_v1) return $result;
    foreach ($list_v1 as $item => $v1) {
        // lấy danh sáhch v2
        $list_v2 = pdo_query(
            'SELECT name_category_v2 name, slug_category_v2 slug, logo_category_v2 logo, description_category_v2 description FROM category_v2 WHERE deleted_at IS NULL AND id_category_v1 ='.$v1['id_category_v1']
        );
        $result[$item] = [
            'category_v1' => [
                'name' => $v1['name_category_v1'],
                'slug' => $v1['slug_category_v1'],
                'logo' => $v1['logo_category_v1'],
            ],
            'category_v2' => $list_v2
        ];
    }
    return $result;
}