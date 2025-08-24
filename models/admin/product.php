<?php 

function get_all_product($state_product) {
    if($state_product) $query_state = 'IS NULL';
    else $query_state = 'IS NOT NULL';

    return pdo_query(
        'SELECT p.*, b.name_brand, b.slug_brand, b.logo_brand, pi.*, c1.name_category_v1
        FROM product p
        LEFT JOIN brand b ON  p.id_brand = b.id_brand
        LEFT JOIN model md ON p.id_model = md.id_model
        LEFT JOIN color cl ON p.id_color = cl.id_color
        LEFT JOIN product_category pc ON  p.id_product = pc.id_product
        LEFT JOIN product_image pi ON p.id_product = pi.id_product
        LEFT JOIN category_v2 c2 ON pc.id_category_v2 = c2.id_category_v2
        LEFT JOIN category_v1 c1 ON c2.id_category_v1 = c1.id_category_v1
        WHERE p.deleted_at '.$query_state.'
        GROUP BY p.id_product
        ORDER BY p.created_at DESC'
    );
}

/**
 * Lấy chi tiết một sản phẩm cho chỉnh sửa
 * @param mixed $id ID Sản phẩm
 * @return array | bool Trả về mảng nếu có data, trả về FALSE nếu không có data
 */
function get_one_product_by_id($id) {
    // lấy thông tin sản phẩm
    $get_product = pdo_query_one(
        'SELECT p.*, s.name_series
        FROM product p
        LEFT JOIN model m ON m.id_model = p.id_model
        LEFT JOIN series s ON s.id_series = m.id_series
        WHERE p.id_product = ?',
        $id
    );

    if(!$get_product) return 0;

    // lấy danh sách ảnh
    $get_product['image'] = pdo_query(
        'SELECT pi.* 
        FROM product_image pi
        LEFT JOIN product p ON p.id_product = pi.id_product
        WHERE pi.id_product = ?',
        $get_product['id_product']
    );

    // lấy danh sách danh mục v2 & v1
    $get_product['category'] = pdo_query(
        'SELECT v2.id_category_v2, v1.id_category_v1
        FROM product_category pc
        LEFT JOIN product p ON p.id_product = pc.id_product
        LEFT JOIN category_v2 v2 ON v2.id_category_v2 = pc.id_category_v2
        LEFT JOIN category_v1 v1 ON v1.id_category_v1 = v2.id_category_v1
        WHERE pc.id_product = ?',
        $get_product['id_product']
    );

    return $get_product;
}