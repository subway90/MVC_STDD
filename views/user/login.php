<div class="container mt-lg-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-7 p-0 bg-success-subtle text-center d-flex align-items-center justify-content-center">
            <img class="w-75" src="<?= URL_STORAGE ?>system/hello.gif" alt="<?= URL_STORAGE ?>system/hello.gif">
        </div>

        <div class="col-12 col-md-12 col-lg-5 bg-light p-0 py-3">
            <div class="row px-lg-5 mx-2 py-5">
                <div class="col-12">
                    <div class="text-success h4 text-center mb-5">Đăng nhập</div>
                </div>
                <form action="/dang-nhap<?= $return_checkout_page ? '/thanh-toan' : '' ?>" method="post">
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input type="text" name="username" value="<?=$username?>" class="form-control bg-success-subtle" id="floatingInput" placeholder="Nhập TK" autocomplete="new-password">
                            <label for="floatingInput">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input type="password" name="password" class="form-control bg-success-subtle" id="floatingInput" placeholder="MK">
                            <label for="floatingInput">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center mt-2 mb-4">
                        <button name="login" type="submit" class="btn btn-outline-success w-100">
                            Đăng nhập
                        </button>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        Bạn chưa có tài khoản ? <a class="nav-link text-success ms-1" href="<?= URL ?>dang-ky">Đăng ký tài khoản</a>
                        <!-- <a class="nav-link text-danger" href="<?= URL ?>quen-mat-khau"><i class="fas fa-question-circle"></i> Quên mật khẩu</a> -->
                    </div>
                </form>
        </div>
        </div>

    </div>
</div>