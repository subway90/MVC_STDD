<?php

# [MODEL]
model('admin','category');

# [VARIABLE]
$list_error = [];
$name_category = '';
if(!isset($_SESSION['temp_logo_category'])) $_SESSION['temp_logo_category'] = ''; // session lưu tạm path ảnh logo

# [HANDLE]
if(isset($_POST['add'])) {
    // input
    $name_category = $_POST['name_category'];
    // validate
    if(!$name_category) $list_error[] = 'Chưa nhập tên thương hiệu';
    else if(check_exist_one_by_name('category_v1',$name_category)) $list_error[] = 'Tên thương hiệu này đã tồn tại';
    if(!$_SESSION['temp_logo_category']) $list_error[] = 'Chưa có ảnh logo';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute(
            'INSERT INTO category_v1 (name_category_v1,slug_category_v1,logo_category_v1) VALUES (?,?,?)',
            $name_category,create_slug($name_category),$_SESSION['temp_logo_category']
        );
        // xoá session tạm
        unset($_SESSION['temp_logo_category']);
        // thông báo
        toast_create('success','Thêm thương hiệu mới thành công');
        // chuyển hướng
        route('admin/danh-sach-danh-muc');
    }
}

# [DATA
$data = [
    'list_error' => $list_error,
    'name_category' => $name_category,
];

# [RENDER]
view('admin','Thêm danh mục','category-add',$data);