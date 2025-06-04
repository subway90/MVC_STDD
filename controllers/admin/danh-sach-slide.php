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

// Nếu đổi vị trí (up) 
if(isset($_POST['order_up']) && ($_POST['order_up'])) {
    // thực hiện
    $check = swap_order('up',$_POST['order_up']);
    if($check['code']) {
        toast_create('success','Thay đổi vị trí thành công');
    }else {
        toast_create('danger',$check['message']);
    }
}

// Nếu đổi vị trí (down) 
if(isset($_POST['order_down']) && ($_POST['order_down'])) {
    // thực hiện
    $check = swap_order('down',$_POST['order_down']);
    if($check['code']) {
        toast_create('success','Thay đổi vị trí thành công');
    }else {
        toast_create('danger',$check['message']);
    }
}


# [DATA]
$data = [
    'list_slide' => get_all_slide($status_page),
    'status_page' => $status_page,
    'error_valid' => $error_valid,
];

# [RENDER]
view('admin','Danh sách slide','slide-list',$data);