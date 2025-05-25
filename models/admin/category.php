<?php

/**
 * Lấy tất cả danh mục v1
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_category_v1($state) {
    if($state) $query = 'IS NULL ORDER BY created_at DESC';
    else $query = 'IS NOT NULL ORDER BY deleted_at DESC';

    return pdo_query(
        'SELECT *
        FROM category_v1
        WHERE deleted_at '.$query
    );
}