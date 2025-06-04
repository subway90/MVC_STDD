<?php

# [MODEL]
model('admin','slide');

# [VARIABLE]
$list_error = [];

# [HANDLE]

// lấy thông tin thương hiệu cần sửa
if(!get_action_uri(2)) view_error(404);
// lấy id
$id_slide = get_action_uri(2);
// query
$get_slide = pdo_query_one_new(
    'SELECT * FROM slide
    WHERE id_slide = ?
    AND deleted_at IS NULL',
    $id_slide
);

// validate
if(!$get_slide) view_error(404);

// gán data
$link_slide = $get_slide['link_slide'];
$_SESSION['temp_path_slide_edit'] = $get_slide['path_slide'];

// nếu chỉnh sửa
if(isset($_POST['edit'])) {
    // input
    $link_slide = $_POST['link_slide'];
    // validate
    if(!$_SESSION['temp_path_slide_edit']) $list_error[] = 'Chưa có ảnh slide';
    // lưu
    if(empty($list_error)) {
        // query sql
        pdo_execute_new(
            'UPDATE slide
            SET link_slide = ?
            WHERE id_slide = ?',
            $link_slide,$id_slide
        );
        // xoá session tạm
        unset($_SESSION['temp_path_slide_edit']);
        // thông báo
        toast_create('success','Cập nhật slide thành công');
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
view('admin','Sửa slide','slide-edit',$data);