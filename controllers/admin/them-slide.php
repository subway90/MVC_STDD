<?php

# [MODEL]
model('admin','slide');

# [VARIABLE]
$list_error = [];
$link_slide = '';
if(!isset($_SESSION['temp_path_slide'])) $_SESSION['temp_path_slide'] = ''; // session lưu tạm path ảnh logo

# [HANDLE]
if(isset($_POST['add'])) {
    // input
    $link_slide = $_POST['link_slide'];
    // validate
    if(!$_SESSION['temp_path_slide']) $list_error[] = 'Chưa có ảnh slide';
    // lưu
    if(empty($list_error)) {
        //get max order slide
        $value_max_order = pdo_query_value(
            'SELECT MAX(order_slide) FROM slide'
        );
        // query sql
        pdo_execute(
            'INSERT INTO slide (path_slide,link_slide,order_slide) VALUES (?,?,?)',
            $_SESSION['temp_path_slide'],$link_slide,$value_max_order+1
        );
        // xoá session tạm
        unset($_SESSION['temp_path_slide']);
        // thông báo
        toast_create('success','Thêm slide mới thành công');
        // chuyển hướng
        route('admin/danh-sach-slide');
    }
}

# [DATA
$data = [
    'list_error' => $list_error,
    'link_slide' => $link_slide,
];

# [RENDER]
view('admin','Thêm slide','slide-add',$data);