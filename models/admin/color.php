<?php


/**
 * Lấy tất cả màu
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_color($state) {
    if($state) {
        $query = 'IS NULL'; 
        $order = 'c.created_at DESC';
    }
    else {
        $query = 'IS NOT NULL';
        $order = 'c.deleted_at DESC';
    }

    return pdo_query(
        'SELECT c.*, COUNT(p.id_product) count_product
        FROM color c
        LEFT JOIN product p ON p.id_color = c.id_color
        WHERE c.deleted_at '.$query.'
        GROUP BY c.id_color
        ORDER BY '.$order
    );
}