<?php

# [MODEL]
model('admin','color');

# [VARIABLE]
$list_error = [];

# [HANDLE]

// lấy thông tin màu cần sửa
if(!get_action_uri(2)) view_error(404);
// lấy id
$id_color = get_action_uri(2);
// query
$get_color = pdo_query_one(
    'SELECT * FROM color
    WHERE id_color = ?
    AND deleted_at IS NULL',
    $id_color
);
// validate
if(!$get_color) view_error(404);

// Gán data
$name_color = $get_color['name_color'];
$code_color = $get_color['code_color'];

// Nếu sửa
if(isset($_POST['edit'])) {
    // input
    $name_color = $_POST['name_color'];
    $code_color = $_POST['code_color'];
    // validate
    if(!$name_color) $list_error[] = 'Chưa nhập tên màu';
    if(!$code_color) $list_error[] = 'Chưa nhập mã màu';
    else if(check_exist_one_by_name_except_id('color',$name_color,$id_color)) $list_error[] = 'Tên màu này đã tồn tại';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute(
            'UPDATE color SET name_color = ?, slug_color = ?, code_color = ?, updated_at = current_timestamp() WHERE id_color = ?',
            $name_color,create_slug($name_color),$code_color,$id_color
        );
        // thông báo
        toast_create('success','Sửa màu thành công');
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
view('admin','Sửa màu','color-edit',$data);