<?php

# [MODEL]
model('admin','category');

# [VARIABLE]
$list_error = [];

# [HANDLE]

// Nếu thêm danh mục con mới
if(isset($_POST['add']) && isset($_POST['id_category_v1']) && isset($_POST['name_category_v2'])) {
    // input
    $id_category_v1 = $_POST['id_category_v1'];
    $name_category_v2 = $_POST['name_category_v2'];

    // validate
    if(!$id_category_v1) $list_error[] = 'Chưa nhập id danh mục v1';
    elseif(!check_exist_one('category_v1',$id_category_v1)) $list_error[] = 'Danh mục v1 này không tồn tại';
    if(!$name_category_v2) $list_error[] = 'Chưa nhập tên danh mục con';
    elseif(check_name_category_v2_exist($name_category_v2,$id_category_v1)) $list_error[] = 'Tên danh mục này đã tồn tại';

    // save
    if(empty($list_error)) {
        // query save
        pdo_execute_new(
            'INSERT INTO category_v2 (id_category_v1,name_category_v2,slug_category_v2) VALUES (?,?,?)'
            ,$id_category_v1,$name_category_v2,create_slug($name_category_v2)
        );
        // reponse
        view_json(200,[
            'message' => toast('success','Thêm danh mục con thành công'),
            'data' => 'process...',
        ]);
    }

    
    // reponse error
    view_json(200,[
        'message' => toast('danger',$list_error[0]),
        'data' => 'process...',
    ]);
}