<?php

# [AUTHOR
if(!is_login()) view_error(404);

# [MODEL]
model('user','infomation');

# [VARIABLE]
$error_valid = []; // mảng lỗi validate
$input_current_password = $input_new_password = $input_verify_password = '';

# [HANDLE]

// Đổi mật khẩu
if(isset($_POST['change_password'])) {
    // lấy input
    $input_current_password = clear_input($_POST['input_current_password']);
    $input_new_password = clear_input($_POST['input_new_password']);
    $input_verify_password = clear_input($_POST['input_verify_password']);
    // xử lí validate
    if(!$input_current_password) toast_create('danger','Vui lòng nhập mật khẩu hiện tại');
    else if(md5($input_current_password) != $_SESSION['user']['password']) toast_create('danger','Mật khẩu hiện tại không chính xác');
    else if(!$input_new_password) toast_create('danger','Vui lòng nhập mật khẩu mới');
    else if(strlen($input_new_password) < 8) toast_create('danger','Độ dài mật khẩu phải lớn từ 8 kí tự trở lên');
    else if(!$input_verify_password) toast_create('danger','Vui lòng nhập xác nhận mật khẩu mới');
    else if($input_new_password != $input_verify_password) toast_create('danger','Mật khẩu xác nhận không trùng khớp mật khẩu mới');
    // cập nhật
    else {
        // lưu database
        pdo_execute(
            'UPDATE user SET password = ? WHERE username = ?'
            ,md5($input_new_password),auth('username')
        );
        // cập nhật session
        $_SESSION['user']['password'] = md5($input_new_password);
        // thông báo
        toast_create('success','Thay đổi mật khẩu mới thành công');
        // chuyển route
        route('/doi-mat-khau');
    }
}

# [DATA]
$data = [
    'error_valid' => $error_valid,
    'input_current_password' => $input_current_password,
    'input_new_password' => $input_new_password,
    'input_verify_password' => $input_verify_password,
];
// test_array($data);
# [RENDER]
view('user','Đổi mật khẩu','change-password',$data);