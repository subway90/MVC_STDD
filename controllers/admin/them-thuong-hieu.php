<?php

# [MODEL]
model('admin','brand');

# [VARIABLE]
$list_error = [];
$name_brand = '';
if(!isset($_SESSION['temp_logo_brand'])) $_SESSION['temp_logo_brand'] = ''; // session lưu tạm path ảnh logo

# [HANDLE]
if(isset($_POST['add'])) {
    // input
    $name_brand = $_POST['name_brand'];
    // validate
    if(!$name_brand) $list_error[] = 'Chưa nhập tên thương hiệu';
    else if(check_exist_one_by_name('brand',$name_brand)) $list_error[] = 'Tên thương hiệu này đã tồn tại';
    if(!$_SESSION['temp_logo_brand']) $list_error[] = 'Chưa có ảnh logo';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute_new(
            'INSERT INTO brand (name_brand,slug_brand,logo_brand) VALUES (?,?,?)',
            $name_brand,create_slug($name_brand),$_SESSION['temp_logo_brand']
        );
        // xoá session tạm
        unset($_SESSION['temp_logo_brand']);
        // thông báo
        toast_create('success','Thêm thương hiệu mới thành công');
        // chuyển hướng
        route('admin/danh-sach-thuong-hieu');
    }
}

# [DATA
$data = [
    'list_error' => $list_error,
    'name_brand' => $name_brand,
];

# [RENDER]
view('admin','Thêm thương hiệu','brand-add',$data);