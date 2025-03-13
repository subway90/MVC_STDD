<?php

# [MODEL]
model('user','category');

# [VARIABLE]
$result = '';
$slug_request_category_v1 = $slug_request_category_v2 = '';
$request_brand = $request_color = $request_price = '';
$query_brand = $query_color = $query_price = '';

# [HANDLE]

// lấy slug danh mục v1
if(isset($_arrayURL[1])) {
    // lấy slug
    $slug_request_category_v1 = clear_input($_arrayURL[1]);
    // kiểm tra tồn tại
    if(!check_exist_one_by_slug('category_v1',$slug_request_category_v1)) view_error(404);
}else view_error(404);

// lấy slug danh mục v2
if(isset($_arrayURL[2])) {
    // lấy slug
    $slug_request_category_v2 = clear_input($_arrayURL[2]);
    // kiểm tra tồn tại
    if(!check_exist_one_by_slug('category_v2',$slug_request_category_v2)) view_error(404);
}

// lấy danh sách sản phẩm
if(isset($_GET['filter'])) {
    // lấy điều kiện lọc
    if(isset($_GET['price']) && $_GET['price']) $request_price = clear_input($_GET['price']);
    if(isset($_GET['brand']) && $_GET['brand']) $request_brand = clear_input($_GET['brand']);
    if(isset($_GET['color']) && $_GET['color']) $request_color = clear_input($_GET['color']);
    // lấy câu truy vấn lọc theo giá
    if($request_price) {
        foreach (LIST_FILTER_PRICE as $item) {
            if($item['value'] == $request_price) $query_price = $item['query'];
        }
    }
    // lấy câu truy vấn lọc theo thương hiệu
    if($request_brand) $query_brand = ' = '.$request_brand;
    // lấy câu truy vấn lọc theo màu
    if($request_color) $query_color = ' = '.$request_color;

    // truy vấn
    $query = pdo_query(
        'SELECT p.*, b.name_brand, b.slug_brand, b.logo_brand, pi.*
        FROM product p
        LEFT JOIN brand b ON  p.id_brand = b.id_brand
        LEFT JOIN model md ON p.id_model = md.id_model
        LEFT JOIN color cl ON p.id_color = cl.id_color
        LEFT JOIN product_category pc ON  p.id_product = pc.id_product
        LEFT JOIN product_image pi ON p.id_product = pi.id_product
        WHERE p.price_product '.$query_price.'
        AND p.id_brand '.$query_brand.'
        AND p.id_color '.$query_color.'
        GROUP BY p.id_product
        ORDER BY p.price_product ASC'
    );

    if(empty($query)) $result .= render_row_card_empty();
    else {
        // trả về data
        foreach ($query as $item) {
            $result .= render_card_product($item);
        }
        // phần trang
        $result .= render_paginate_product();
    }
    
    
    // trả về json
    return view_json(200,['data' => $result]);
}

# [DATA]

$data = [
    'list_brand' => get_all_brand(), // danh sách thương hiệu
    'list_color' => get_all_color(), // danh sách thương hiệu
];

# [RENDER]
view('user','Danh mục','category',$data);