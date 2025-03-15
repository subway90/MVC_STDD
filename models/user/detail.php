<?php


/**
 * Lấy thông tin sản phẩm chi tiết theo slug
 * @param mixed $slug Đường dẫn
 * @return array
 */
function get_product_detail($slug) {
    // lấy thông tin chung
    $result = pdo_query_one(
        'SELECT *
        FROM product p
        WHERE p.deleted_at IS NULL
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
    
    //trả kết quả
    return $result;

}