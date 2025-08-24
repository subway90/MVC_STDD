<?php

# [MODEL]
model('admin','color');

# [VARIABLE]
$list_error = [];
$name_color = $code_color = '';

# [HANDLE]
if(isset($_POST['add'])) {
    // input
    $name_color = $_POST['name_color'];
    $code_color = $_POST['code_color'];
    // validate
    if(!$name_color) $list_error[] = 'Chưa nhập tên màu';
    if(!$code_color) $list_error[] = 'Chưa nhập mã màu';
    else if(check_exist_one_by_name('color',$name_color)) $list_error[] = 'Tên màu này đã tồn tại';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute(
            'INSERT INTO color (name_color,slug_color,code_color) VALUES (?,?,?)',
            $name_color,create_slug($name_color),$code_color
        );
        // thông báo
        toast_create('success','Thêm màu mới thành công');
        // chuyển hướng
        route('admin/danh-sach-mau');
    }
}

# [DATA
$data = [
    'list_error' => $list_error,
    'name_color' => $name_color,
    'code_color' => $code_color,
];

# [RENDER]
view('admin','Thêm màu','color-add',$data);