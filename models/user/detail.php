<?php


/**
 * Lấy thông tin sản phẩm chi tiết theo slug
 * @param mixed $slug Đường dẫn
 * @return array
 */
function get_product_detail($slug) {
    
    // lấy thông tin chung
    $result = pdo_query_one_new(
        'SELECT p.*, m.id_series, m.id_model, pc.id_category_v2, b.*
        FROM product p
        LEFT JOIN brand b ON p.id_brand = b.id_brand
        LEFT JOIN model m ON p.id_model = m.id_model
        LEFT JOIN product_category pc ON pc.id_product = p.id_product
        WHERE p.deleted_at IS NULL
        AND p.slug_product = ?',
        $slug
    );

    // lấy thông tin sản phẩm liên quan
    $result['list_recommend'] = pdo_query_new(
        'SELECT p.id_product, p.name_product, p.price_product, p.sale_price_product, p.slug_product, b.logo_brand, b.name_brand, pi.path_product_image
        FROM product p
        LEFT JOIN product_image pi ON pi.id_product = p.id_product
        LEFT JOIN brand b ON p.id_brand = b.id_brand
        LEFT JOIN product_category pc ON pc.id_product = p.id_product
        WHERE pc.id_category_v2 = ?
        AND p.id_product != ?
        AND p.deleted_at IS NULL
        GROUP BY p.id_product
        ORDER BY p.price_product ASC
        LIMIT 6',
        $result['id_category_v2'],$result['id_product']
    );

    // lấy mảng ảnh
    $result['array_image'] = pdo_query_new(
        'SELECT pi.path_product_image
        FROM product_image pi
        WHERE id_product = ?',
        $result['id_product']
    );

    // lấy mảng thuộc tính
    $result['array_attribute'] = pdo_query_new(
        'SELECT pa.icon_attribute, pa.name_attribute, pa.value_attribute
        FROM product_attribute pa
        WHERE id_product = ?',
        $result['id_product']
    );

    // lấy danh sách model nếu có series
    if($result['id_series']) {
        $result['array_model'] = pdo_query_new(
            'SELECT m.id_model, m.name_model, p.slug_product
            FROM model m
            LEFT JOIN product p ON m.id_model = p.id_model
            WHERE m.id_series = ?
            AND m.deleted_at IS NULL
            GROUP BY m.id_model
            ORDER BY m.created_at ASC',
            $result['id_series']
        );
    }

    // lấy danh sách màu theo model hiện tại
    if($result['id_model']) {
        $result['array_color'] = pdo_query_new(
            'SELECT c.id_color, c.name_color, c.code_color, p.slug_product
            FROM product p
            LEFT JOIN color c ON p.id_color = c.id_color
            WHERE p.id_model = ?
            AND c.deleted_at IS NULL
            ORDER BY p.created_at ASC',
            $result['id_model']
        );
    }

    //trả kết quả
    return $result;

}