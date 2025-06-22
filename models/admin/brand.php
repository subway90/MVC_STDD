<?php

/**
 * Lấy tất cả thương hiệu
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_brand($state) {
    if($state) {
        $query = 'IS NULL';
        $order = 'created_at';
    }
    else {
        $query = 'IS NOT NULL';
        $order = 'deleted_at';
    }

    return pdo_query_new(
        'SELECT b.*, COUNT(p.id_product) count_product
        FROM brand b
        LEFT JOIN product p ON p.id_brand = b.id_brand
        WHERE b.deleted_at '.$query.'
        GROUP BY b.id_brand
        ORDER BY '.$order.' DESC'
    );
}