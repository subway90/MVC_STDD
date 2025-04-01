<?php

// Khi bấm submit đăng xuất
if(isset($_POST['logout'])) {
    if(is_login()) {
        // huỷ session USER
        unset($_SESSION['user']);
        // huỷ cookie nếu có
        setcookie('token_remember',$token_remember, [
            'expires' => time() - 1,
            'path' => '/',
            'domain' => DOMAIN,
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
        // thông báo
        toast_create('success','<i class="bi bi-check-circle me-2"></i> Đăng xuất thành công');
        // quay đến trang đăng nhập
        route('dang-nhap');
    }else route('dang-nhap');
}

// Báo lỗi khi GET trang này
view_error(404);