<?php

# [MODEL]
model('admin','brand');

# [VARIABLE]
$list_error = [];

# [HANDLE]

// lấy thông tin thương hiệu cần sửa
if(!get_action_uri(2)) view_error(404);
// lấy id
$id_brand = get_action_uri(2);
// query
$get_brand = pdo_query_one(
    'SELECT * FROM brand
    WHERE id_brand = ?
    AND deleted_at IS NULL',
    $id_brand
);

// validate
if(!$get_brand) view_error(404);

// gán data
$name_brand = $get_brand['name_brand'];
$_SESSION['temp_logo_brand_edit'] = $get_brand['logo_brand'];

// nếu chỉnh sửa
if(isset($_POST['edit'])) {
    // input
    $name_brand = $_POST['name_brand'];
    // validate
    if(!$name_brand) $list_error[] = 'Chưa nhập tên thương hiệu';
    else if(check_exist_one_by_name_except_id('brand',$name_brand,$id_brand)) $list_error[] = 'Tên thương hiệu này đã tồn tại';
    if(!$_SESSION['temp_logo_brand_edit']) $list_error[] = 'Chưa có ảnh logo';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute(
            'UPDATE brand 
            SET name_brand = ?, slug_brand = ?
            WHERE id_brand = ?',
            $name_brand,create_slug($name_brand),$id_brand
        );
        // xoá session tạm
        unset($_SESSION['temp_logo_brand_edit']);
        // thông báo
        toast_create('success','Cập nhật thương hiệu thành công');
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
view('admin','Sửa thương hiệu','brand-edit',$data);