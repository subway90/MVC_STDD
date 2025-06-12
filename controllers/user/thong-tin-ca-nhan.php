<?php

# [AUTHOR]
author(['admin','user']);

# [MODEL]
model('user','infomation');

# [VARIABLE]
$input_shipping_address = $name_modal_show = '';
$error_valid = []; // mảng lỗi validate
$input_update_full_name = $input_update_gender = $input_current_password = $input_new_password = $input_verify_password = ''; // biến update hồ sơ cá nhân
$list_tab = ['ho-so-cua-toi','dia-chi-giao-hang','doi-mat-khau'];

# [HANDLE]

// Cập nhật thông tin cá nhân
if(isset($_POST['update_info'])) {
    // lấy input
    $input_update_full_name = clear_input($_POST['input_update_full_name']);
    $input_update_gender = clear_input($_POST['input_update_gender']);
    // xử lí validate
    // họ tên
    if(!$input_update_full_name) $error_valid[] = 'Họ và tên không được để trống';
    else if(!preg_match('/^[\p{L}\s]+$/u', $input_update_full_name)) $error_valid[] = 'Họ và tên không chứa các kí tự đặc biệt';
    // giới tính
    if(!$input_update_gender) $error_valid[] = 'Chưa chọn giới tính';
    // nếu input hợp lệ
    if(empty($error_valid)) {
        // cập nhật database
        update_infomation($input_update_full_name,$input_update_gender);
        // thông báo
        toast_create('success','Cập nhật hồ sơ cá nhân thành công');
        // cập nhật session
        $_SESSION['user']['full_name'] = $input_update_full_name;
        $_SESSION['user']['gender'] = $input_update_gender;
        // chuyển route
        route('thong-tin-ca-nhan');
    }
}

# [DATA]
$data = [
    'error_valid' => $error_valid,
    'input_update_full_name' => $input_update_full_name,
    'input_update_gender' => $input_update_gender,
];
// test_array($data);
# [RENDER]
view('user','Thông tin cá nhân','infomation',$data);