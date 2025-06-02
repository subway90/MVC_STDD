<?php

# [MODEL]
model('admin','customer');

# [VARIABLE]
$status_page = true;
$error_valid = [];

# [HANDLE]
// Xem danh sách xoá
if(get_action_uri(2) === 'danh-sach-xoa') $status_page = false;

# [DATA]
$data = [
    'list_customer' => get_all_customer($status_page),
    'status_page' => $status_page,
];

# [RENDER]
view('admin','Danh sách tài khoản','customer-list',$data);