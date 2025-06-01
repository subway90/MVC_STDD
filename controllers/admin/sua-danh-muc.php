<?php

# [MODEL]
model('admin','category');

# [VARIABLE]
$list_error = [];

# [HANDLE]

// lấy thông tin thương hiệu cần sửa
if(!get_action_uri(2)) view_error(404);
// lấy id
$id_category = get_action_uri(2);
// query
$get_category = pdo_query_one_new(
    'SELECT * FROM category_v1
    WHERE id_category_v1 = ?
    AND deleted_at IS NULL',
    $id_category
);

// validate
if(!$get_category) view_error(404);

// gán data
$name_category = $get_category['name_category_v1'];
$_SESSION['temp_logo_category_edit'] = $get_category['logo_category_v1'];

// nếu chỉnh sửa
if(isset($_POST['edit'])) {
    // input
    $name_category = $_POST['name_category'];
    // validate
    if(!$name_category) $list_error[] = 'Chưa nhập tên thương hiệu';
    else if(check_exist_one_by_name_except_id('category_v1',$name_category,$id_category)) $list_error[] = 'Tên thương hiệu này đã tồn tại';
    if(!$_SESSION['temp_logo_category_edit']) $list_error[] = 'Chưa có ảnh logo';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute_new(
            'UPDATE category_v1
            SET name_category_v1 = ?, slug_category_v1 = ?
            WHERE id_category_v1 = ?',
            $name_category,create_slug($name_category),$id_category
        );
        // xoá session tạm
        unset($_SESSION['temp_logo_category_edit']);
        // thông báo
        toast_create('success','Cập nhật thương hiệu thành công');
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
view('admin','Sửa danh mục','category-edit',$data);