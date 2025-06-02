<?php

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