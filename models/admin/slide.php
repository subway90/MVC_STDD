<?php

/**
 * Lấy tất cả slide banner
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_slide($state) {
    if($state) {
        $query = 'IS NULL';
    }
    else {
        $query = 'IS NOT NULL';
    }

    return pdo_query(
        'SELECT *
        FROM slide
        WHERE deleted_at '.$query.'
        ORDER BY order_slide ASC'
    );
}