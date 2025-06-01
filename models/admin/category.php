<?php

/**
 * Lấy tất cả danh mục v1
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_category_v1($state) {
    if($state) {
        $query = 'IS NULL';
        $order = 'created_at DESC';
    }
    else{
        $query = 'IS NOT NULL';
        $order = 'deleted_at DESC';
    }

    return pdo_query_new(
        'SELECT *
        FROM category_v1
        WHERE deleted_at '.$query.'
        ORDER BY '.$order
    );
}

/**
 * Lấy tất cả danh mục của ADMIN
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_category($state) {
        if($state) {
        $query = 'IS NULL';
        $order = 'created_at DESC';
    }
    else{
        $query = 'IS NOT NULL';
        $order = 'deleted_at DESC';
    }

    $data = pdo_query_new(
        'SELECT *
        FROM category_v1
        WHERE deleted_at '.$query.'
        ORDER BY '.$order
    );

    // lấy danh sách v2
    if(!empty($data)) {
        foreach ($data as $i => $v1) {
            $data[$i]['list_v2'] = pdo_query_new(
                'SELECT v2.*, COUNT(pc.id_category_v2) count_product
                FROM category_v2 v2
                LEFT JOIN product_category pc ON v2.id_category_v2 = pc.id_category_v2
                WHERE v2.id_category_v1 = ?
                GROUP BY v2.id_category_v2',
                $v1['id_category_v1']
            );
        }
    }

    return $data;
}