<?php


/**
 * Lấy tất cả màu
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_color($state) {
    if($state) $query = 'IS NULL ORDER BY created_at DESC';
    else $query = 'IS NOT NULL ORDER BY deleted_at DESC';

    return pdo_query(
        'SELECT *
        FROM color
        WHERE deleted_at '.$query
    );
}