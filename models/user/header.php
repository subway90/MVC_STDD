<?php

model('user','voucher');
$keyword = '';

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
 * Lấy dữ liệu  sản phẩm trong session giỏ hàng
 * @param $get_type Loại cần lấy :
 * 
 * - total_cart : Tổng tiền trong giỏ hàng (không áp dụng voucher)
 * 
 * - total_checkout : Tổng tiền trong giỏ hàng (đã áp dụng voucher)
 * 
 * - count : Số lượng
 * 
 * - list : Danh sách sản phẩm
 * 
 * - all : Tất cả, bao gồm tổng tiền, số lượng, danh sách sản phẩm
 * 
 * - array_id : Lấy chuỗi id sản phẩm (dùng cho query voucher)
 * 
 * Trả về null Nếu $get_type không hợp lệ
 * 
 */
function get_cart($get_type) {
    // Khai báo
    $type = ['total_cart','total_checkout','list','count','array_id','all']; // Loại cần lấy
    $list = [];
    $total_cart = 0;
    $total_checkout = 0;
    $count = 0;
    $array_id = [];

    // Kiểm tra type
    if(!in_array($get_type,$type)) die(_s_me_error."$get_type không hợp lệ <br> Mảng $get_type = ['total_cart','list','count','all']"._e_me_error);

    // Truy vấn từ data ở session cart
    if(!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart) {
            $product = pdo_query_one(
                'SELECT p.*, m.*, c.name_color, c.code_color, pc.id_category_v2, b.*, pi.path_product_image
                FROM product p
                LEFT JOIN brand b ON p.id_brand = b.id_brand
                LEFT JOIN model m ON p.id_model = m.id_model
                LEFT JOIN color c ON p.id_color = c.id_color
                LEFT JOIN product_category pc ON pc.id_product = p.id_product
                LEFT JOIN product_image pi ON pi.id_product = p.id_product
                WHERE p.deleted_at IS NULL
                AND p.id_product = '.$cart['id_product']
            );
            
            // Nếu sản phẩm tồn tại
            if(!empty($product)) {
                // Giải nén row
                extract($product);
                // lấy data
                $list[] = [
                    'name_brand' => $name_brand,
                    'logo_brand' => $logo_brand,
                    'name_model' => $name_model,
                    'hide_model' => $hide_model,
                    'name_product' => $name_product,
                    'slug_product' => $slug_product,
                    'price_product' => $price_product,
                    'sale_price_product' => $sale_price_product,
                    'quantity_product_in_cart' => $cart['quantity_product'],
                    'quantity_product' => $quantity_product,
                    'path_product_image' => $path_product_image,
                    'name_color' => $name_color,
                    'code_color' => $code_color,
                    'id_product' => $id_product,
                ];

                // lấy tổng tiền
                if($sale_price_product) $price_product = $sale_price_product;
                $total_cart += $cart['quantity_product']*$price_product;

                // đếm số lượng
                $count++;

                // lấy chuỗi id sản phẩm
                $array_id[] = $id_product;
            }
        }
    }

    // Trả về theo yêu cầu
    if($get_type == 'list') return $list;
    elseif($get_type == 'count') return $count;
    elseif($get_type == 'total_cart') return $total_cart;
    elseif($get_type == 'all') return ['count' => $count,'total' => $total,'list' => $list];
    elseif($get_type == 'array_id') return $array_id;
    elseif($get_type == 'total_checkout') {
        
        if(!empty($_SESSION['voucher'])) {
            foreach ($_SESSION['voucher'] as $code) {
                $get_voucher = get_one_voucher($code);
                if(!empty($get_voucher) && $get_voucher['type_voucher'] === 'giảm tiền hoá đơn') break;
            }
        }else return $total_cart;

        if($get_voucher) {
            if($get_voucher['unit_voucher'] === '%') {
                $value_discount = get_cart('total_cart')/100 * $get_voucher['value_voucher'];
                // nếu có max value voucher và giá trị discount lớn hơn giá trị max -> so sánh và lấy giá max nếu vượt
                if($get_voucher['max_value_voucher'] && $get_voucher['max_value_voucher'] < $value_discount) $value_discount = $get_voucher['max_value_voucher'];
            }
            else $value_discount = $get_voucher['value_voucher'];
        }

        return $total_cart - $value_discount;

    }

    else return null;
    
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