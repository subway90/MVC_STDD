<?php

/**
 * Lấy danh sách khách hàng
 * @param mixed $state
 * @return array
 */
function get_all_customer($state) {
    if($state) {
        $query = 'IS NULL'; 
        $order = 'u.created_at DESC';
    }
    else {
        $query = 'IS NOT NULL';
        $order = 'u.deleted_at DESC';
    }

    return pdo_query_new(
        'SELECT u.*, r.name_role
        FROM user u
        LEFT JOIN role r ON r.id_role = u.id_role
        WHERE u.deleted_at '.$query.'
        ORDER BY '.$order
    );
}

/**
 * Lấy thông tin của khách hàng theo username
 * @param mixed $username
 * @return array
 */
function get_one_customer($username) {
    return pdo_query_one_new(
        'SELECT u.*, r.name_role
        FROM user u
        LEFT JOIN role r ON r.id_role = u.id_role
        WHERE u.username = ?'
        ,$username
    );
}