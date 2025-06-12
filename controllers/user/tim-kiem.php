<?php

# [MODEL]
model('user','category');
model('user','search');

# [VARIABLE]
$keyword = '';
$result = '';

# [HANDLE]
if(isset($_GET['keyword']) && $_GET['keyword']) {
    // lấy input
    $keyword = $_GET['keyword'];

    // format keyword | hàm trim : xoá kí tự space ( ) khoảng cách ở 2 đầu của chuỗi
    $keyword_query = '%'.trim($keyword).'%';

    // truy vấn
    $query = pdo_query_new(
        'SELECT p.*, b.name_brand, b.slug_brand, b.logo_brand, pi.*
        FROM product p
        LEFT JOIN brand b ON  p.id_brand = b.id_brand
        LEFT JOIN model md ON p.id_model = md.id_model
        LEFT JOIN color cl ON p.id_color = cl.id_color
        LEFT JOIN product_category pc ON  p.id_product = pc.id_product
        LEFT JOIN product_image pi ON p.id_product = pi.id_product
        LEFT JOIN category_v2 c2 ON pc.id_category_v2 = c2.id_category_v2
        LEFT JOIN category_v1 c1 ON c2.id_category_v1 = c1.id_category_v1
        WHERE p.name_product LIKE ?
        OR p.slug_product LIKE ?
        OR b.name_brand LIKE ?
        OR c1.name_category_v1 LIKE ?
        OR c2.name_category_v2 LIKE ?
        GROUP BY p.id_product
        ORDER BY p.price_product ASC'
        ,$keyword_query,$keyword_query,$keyword_query,$keyword_query,$keyword_query
    );

    //render data
    if(empty($query)) $result .= render_row_card_empty();
        else {
            // trả về data
            foreach ($query as $item) {
                $result .= render_card_product_search($item);
            }
    }
}else route();

# [DATA]
$data = [
    'count' => count($query),
    'result' => $result,
    'keyword_old' => $keyword,
];

# [RENDER]
view('user','Tìm kiếm','search',$data);