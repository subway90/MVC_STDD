<?php


/**
 * Lấy tất cả thông báo của người dùng
 * @return array
 */
function get_all_notify() {
    return pdo_query_new(
        'SELECT * 
        FROM notify
        WHERE username = '.auth('username')
    );
}