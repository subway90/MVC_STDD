<?php

# [MODEL]
model('admin','slide');

# [VARIABLE]
$status_page = true;
$input_name = $input_description = $show_modal = '';
$error_valid = [];

# [HANDLE]
// Xem danh sách xoá
if(isset($_arrayURL[1]) && $_arrayURL[1] == 'danh-sach-xoa') $status_page = false;


# [DATA]
$data = [
    'list_slide' => get_all_slide($status_page),
    'status_page' => $status_page,
    'error_valid' => $error_valid,
];

# [RENDER]
view('admin','Danh sách slide','slide-list',$data);