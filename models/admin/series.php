<?php


/**
 * Lấy tất cả series
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_series($state) {
    if($state) $query = 'IS NULL ORDER BY created_at DESC';
    else $query = 'IS NOT NULL ORDER BY deleted_at DESC';

    return pdo_query_new(
        'SELECT *
        FROM series
        WHERE deleted_at '.$query
    );
}

/**
 * Lấy tất cả series cho case thêm sản phẩm với số lượng model > 1
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_series_for_choose() {
    return pdo_query_new(
        'SELECT *
        FROM series s
        LEFT JOIN model m
        ON m.id_series = s.id_series
        WHERE s.deleted_at IS NULL
        GROUP BY s.id_series
        HAVING COUNT(m.id_model)'
    );
}