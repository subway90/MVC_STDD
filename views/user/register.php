<div class="container mt-lg-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-7 p-0 bg-success-subtle text-center d-flex align-items-center justify-content-center">
            <img class="w-75" src="<?= URL_STORAGE ?>system/hello.gif" alt="<?= URL_STORAGE ?>system/hello.gif">
        </div>

        <div class="col-12 col-md-12 col-lg-5 bg-light p-0 py-3">
            <div class="row px-lg-5 mx-2 py-5">
                <div class="col-12">
                    <div class="text-success h4 text-center mb-3">Đăng ký tài khoản</div>
                </div>
                <form action="<?= URL ?>dang-ky<?=($return_checkout_page) ? '/thanh-toan' : ''?>" method="post" role="form" class="">
                    <div class="row justify-content-center">
                        <div class="p-0 mb-3">
                            <?= show_error($error) ?>
                        </div>
                        <div class="form-floating p-0 mb-3">
                            <input name="full_name" value="<?=$full_name?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Họ và tên</label>
                        </div>
                        <div class="form-floating p-0 mb-3">
                            <select name="gender" class="form-select" id="gender" aria-label="Floating label select example">
                                <option value="0" selected>Chọn giới tính của bạn</option>
                                <option <?=$gender == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                <option <?=$gender == 2 ? 'selected' : '' ?> value="2">Nữ</option>
                                <option <?=$gender == 3 ? 'selected' : '' ?> value="3">Khác</option>
                            </select>
                            <label for="gender">Giới tính</label>
                        </div>
                        <div class="form-floating p-0 mb-3">
                            <input name="email" value="<?=$email?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating p-0 mb-3">
                            <input name="username" value="<?=$username?>" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Số điện thoại</label>
                        </div>
                        <div class="form-floating p-0 mb-3">
                            <input name="password" value="<?=$password?>" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>
                        <div class="form-floating p-0 mb-3">
                            <input name="password_confirm" value="<?=$password_confirm?>" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Xác nhận mật khẩu</label>
                        </div>
                        <div class="text-center p-0">
                            <button class="btn btn-outline-success w-100" name="register" type="submit">Tiếp tục</button>
                        </div>
                </form>
                <a class="text-center mt-5 nav-link link-success small text-decoration-underline" href="<?=URL?>dang-nhap">Quay lại trang Đăng nhập</a>
        </div>
        </div>

    </div>
</div>