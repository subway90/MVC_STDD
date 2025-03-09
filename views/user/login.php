<div class="container mt-lg-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-7 p-0 bg-success-subtle text-center pt-4">
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
                            <input type="text" name="username" value="<?=$username?>" class="form-control bg-success-subtle" id="floatingInput" placeholder="Nhập TK">
                            <label for="floatingInput">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input type="password" name="password" class="form-control bg-success-subtle" id="floatingInput" placeholder="MK">
                            <label for="floatingInput">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <a class="nav-link text-success" href="#"><i class="fas fa-user-plus"></i> Đăng ký tài khoản</a>
                        <a class="nav-link text-danger" href="#"><i class="fas fa-question-circle"></i> Quên mật khẩu</a>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center mt-4">
                        <button name="login" type="submit" class="btn btn-outline-success">
                            Đăng nhập
                        </button>
                    </div>
                </form>
        </div>
        </div>

    </div>
</div>