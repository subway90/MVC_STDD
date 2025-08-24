<?php


/**
 * Lấy tất cả thông báo của người dùng
 * @return array
 */
function get_all_notify() {
    return pdo_query(
        'SELECT * 
        FROM notify
        WHERE username = '.auth('username')
    );
}