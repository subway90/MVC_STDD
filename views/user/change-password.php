<!-- JS Custom -->
<script src="<?= URL ?>assets/js/invoice.js"></script>

<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Thông tin cá nhân</li>
        </ol>
    </nav>
</div>
<div class="container my-5">
    <div class="row">
        <!-- Nav infomation layout -->
         <?= layout('user','nav-infomation',['page' => 'change-password']) ?>

        <!-- Tab Content -->
        <div class="col-12 col-lg-9 px-0 px-lg-3 pe-lg-0 mt-3 mt-lg-0">
            <form method="post" action="/doi-mat-khau">
                <div class="bg-light rounded-3 p-3 d-flex flex-column gap-2 mb-2">
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="currentPassword" class="form-label text-success">Mật khẩu hiện tại</label>
                        <input name="input_current_password" value="<?= $input_current_password ?>" type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="newPassword" class="form-label text-success">Mật khẩu mới</label>
                        <input name="input_new_password" value="<?= $input_new_password ?>" type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="confirmPassword" class="form-label text-success">Xác nhận mật khẩu mới</label>
                        <input name="input_verify_password" value="<?= $input_verify_password ?>" type="password" class="form-control" id="confirmPassword">
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <button name="change_password" type="submit" class="btn btn-success shadow">Đổi mật khẩu</button>
                    </div>
                </>
            </form>
        </div>
    </div>
</div>