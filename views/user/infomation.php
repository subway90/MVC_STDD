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
         <?= layout('user','nav-infomation',['page' => 'infomation']) ?>

        <!-- Tab Content -->
        <div class="col-12 col-lg-9 px-0 px-lg-3 pe-lg-0 mt-3 mt-lg-0">
            <div class="bg-light rounded-3 p-3 d-flex justify-content-between justify-content-lg-start gap-2 mb-3">
                <form method="post" class="row">
                    <div class="col-12">
                        <?= show_error($error_valid) ?>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="fullName" class="form-label text-success">Họ và tên</label>
                        <input name="input_update_full_name" type="text" value="<?= $input_update_full_name ? $input_update_full_name :  $_SESSION['user']['full_name'] ?>" class="form-control" id="fullName" >
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="email" class="form-label text-success">Email <span class="text-muted"><i>(không thể cập nhật)</i></span></label>
                        <input disabled type="text" value="<?= $_SESSION['user']['email'] ?>" class="form-control" id="email">
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label class="form-label text-success">Giới tính</label>
                        <select name="input_update_gender" class="form-select" id="gender">
                            <?= $id_gender = $input_update_gender ? $input_update_gender : $_SESSION['user']['gender']; ?>
                            <option <?= $id_gender ==  '1' ? 'selected' : '' ?> value="1">Nam</option>
                            <option <?= $id_gender ==  '2' ? 'selected' : '' ?> value="2">Nữ</option>
                            <option <?= $id_gender ==  '3' ? 'selected' : '' ?> value="3">Khác</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="phone" class="form-label text-success">Số điện thoại <span class="text-muted"><i>(không thể cập nhật)</i></span></label>
                        <input disabled type="text" value="<?=$_SESSION['user']['username']?>" class="form-control" id="phone">
                    </div>
                    <div class="col-12 text-lg-start text-center mt-3">
                        <button name="update_info" type="submit" class="btn btn-success shadow">Cập nhật thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>