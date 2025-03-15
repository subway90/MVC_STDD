<?php


/**
 * Lấy thông tin sản phẩm chi tiết theo slug
 * @param mixed $slug Đường dẫn
 * @return array
 */
function get_product_detail($slug) {
    
    // lấy thông tin chung
    $result = pdo_query_one(
        'SELECT p.*, m.id_series, m.id_model
        FROM product p
        LEFT JOIN model m ON p.id_model = m.id_model
        WHERE p.deleted_at IS NULL
        AND p.slug_product = "'.$slug.'"
        '
    );


    // lấy mảng ảnh
    $result['array_image'] = pdo_query(
        "SELECT pi.path_product_image
        FROM product_image pi
        WHERE id_product = ".$result['id_product']
    );

    // lấy mảng thuộc tính
    $result['array_attribute'] = pdo_query(
        "SELECT pa.icon_attribute, pa.name_attribute, pa.value_attribute
        FROM product_attribute pa
        WHERE id_product = ".$result['id_product']
    );

    // lấy danh sách model nếu có series
    if($result['id_series']) {
        $result['array_model'] = pdo_query(
            'SELECT m.id_model, m.name_model, p.slug_product
            FROM model m
            LEFT JOIN product p ON m.id_model = p.id_model
            WHERE m.id_series ='.$result['id_series'].'
            AND m.deleted_at IS NULL
            GROUP BY m.id_model
            ORDER BY m.created_at ASC'
        );
    }

    // lấy danh sách màu theo model hiện tại
    if($result['id_model']) {
        $result['array_color'] = pdo_query(
            'SELECT c.id_color, c.name_color, c.code_color, p.slug_product
            FROM product p
            LEFT JOIN color c ON p.id_color = c.id_color
            WHERE p.id_model = '.$result['id_model'].'
            AND c.deleted_at IS NULL
            ORDER BY p.created_at ASC'
        );
    }
    
    //trả kết quả
    return $result;

}