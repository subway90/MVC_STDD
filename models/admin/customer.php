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

    return pdo_query(
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
    $result['info'] = pdo_query_one(
        'SELECT u.*, r.name_role
        FROM user u
        LEFT JOIN role r ON r.id_role = u.id_role
        WHERE u.username = ?'
        ,$username
    );

    // lấy danh sách hoá đơn
    if($result['info']) {
        $result['list_invoice'] = pdo_query(
            'SELECT *
            FROM invoice i 
            LEFT JOIN invoice_detail id ON id.id_invoice = i.id_invoice
            WHERE i.username = ?',
            $username
        );
    }

    return $result;
}