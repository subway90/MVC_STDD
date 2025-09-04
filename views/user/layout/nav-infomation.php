<div class="col-12 col-lg-3 p-0">
    <div class="bg-white rounded-3 p-3">
        <div class="position-relative rounded-3 bg-green-gradient text-light d-flex flex-column justify-content-center p-3">
            <div class="position-absolute end-0 top-0 p-2">
                <img width="40" src="<?= URL_STORAGE ?>system/medal_member_ship.png" alt="medal_member_ship.png">
            </div>
            <div class="fw-bold mb-4">
                <?= auth('full_name') ?>
            </div>
            <div class="fw-semi small">
                <?= auth('username') ?>
            </div>
            <div class="fw-semi small">
                <?= auth('email') ?>
            </div>
        </div>
        <div class="d-flex flex-column mt-3">
            <?php if(auth('name_role') === 'admin') : ?>
            <a href="/admin" class="nav-link-infomation text-danger">
                <i class="bi bi-house-gear me-1"></i> Trang quản trị
            </a>
            <?php endif ?>
            <a href="/lich-su-mua-hang" class="nav-link-infomation <?= ($page !== 'invoice-history') ?: 'active' ?>">
                <i class="bi bi-receipt me-1"></i> Lịch sử mua hàng
            </a>
            <a href="/thong-tin-ca-nhan" class="nav-link-infomation <?= ($page !== 'infomation') ?: 'active' ?>">
                <i class="bi bi-person-vcard me-1"></i> Thông tin cá nhân
            </a>
            <a href="/dia-chi-giao-hang" class="nav-link-infomation <?= ($page !== 'shipping-address') ?: 'active' ?>">
                <i class="bi bi-geo-alt me-1"></i> Địa chỉ giao hàng
            </a>
            <a href="/doi-mat-khau" class="nav-link-infomation <?= ($page !== 'change-password') ?: 'active' ?>">
                <i class="bi bi-key me-1"></i> Đổi mật khẩu
            </a>
            <form action="/dang-xuat" method="post">
            <button name="logout" type="submit" class="nav-link-infomation text-danger">
                <i class="bi bi-box-arrow-right me-1"></i> Đăng xuất
            </button>
            </form>
        </div>
    </div>
</div>