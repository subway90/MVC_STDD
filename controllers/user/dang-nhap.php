<?php

# [AUTHOR]
// Kiểm tra đã đăng nhập chưa
if(is_login()) route('trang-chu');

# [MODEL]
model('user','user');

# [VARIABLE]
    $username = '';
    $return_checkout_page = false; // trạng thái quay lại trang thanh toán

# [HANDLE]
// Kiểm tra xem có quay lại trang thanh toán không
if(isset($_arrayURL[1]) && $_arrayURL[1] && $_arrayURL[1] == 'thanh-toan') $return_checkout_page = true;

// Nhấn submit đăng nhập
if(isset($_POST['login'])) {
    // lấy thông tin từ form
    $username = clear_input($_POST['username']);
    $password = clear_input($_POST['password']);

    // Bắt validate
    if(!$username) toast_create('danger','Vui lòng nhập username');
    elseif(!$password) toast_create('danger','Vui lòng nhập mật khẩu');

    // Tiến hành đăng nhập
    else if(login($username,$password)) {
        // Chuyển hướng trang thanh toán (nếu có)
        if($return_checkout_page) route('thanh-toan');
        // Chuyển hướng theo role
        if(auth('name_role') == 'admin') route('admin');
        route('trang-chu');
    }
            
}

# [DATA]
$data = [
    'username' => $username,
    'return_checkout_page' => $return_checkout_page
];

# [RENDER VIEW]
view('user','Đăng nhập','login',$data);