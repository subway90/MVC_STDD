<div class="col-12 col-lg-3 p-0">
    <div class="bg-white rounded-3 p-3">
        <div class="position-relative rounded-3 bg-green-gradient text-light d-flex flex-column justify-content-center p-3">
            <div class="position-absolute end-0 top-0 p-2">
                <img width="40" src="<?= URL_STORAGE ?>system/medal_member_ship.png" alt="medal_member_ship.png">
            </div>
            <div class="fw-bold mb-4">
                <?= auth('full_name') ?>
            </div>
            <div class="fw-semi">
                <span class="small me-1">Hạng thành viên :</span>
                <span class="fw-bold">Thường</span>
            </div>
            <div class="fw-semi">
                <span class="small me-1">Điểm thưởng tích luỹ :</span>
                <span class="fw-bold">16.500 điểm</span>
            </div>
        </div>
        <div class="mt-1 text-end small">
            <a class="nav-link text-green fw-semi" href="#">
                <i class="bi bi-patch-question small fs-6 me-1"></i> Xem thể lệ
            </a>
        </div>
        <div class="d-flex flex-column mt-3">
            <a href="/lich-su-mua-hang" class="nav-link-infomation <?= ($page !== 'invoice-history') ?: 'active' ?>">
                <i class="bi bi-receipt me-1"></i> Đơn hàng của tôi
            </a>
            <a href="/thong-tin-ca-nhan" class="nav-link-infomation <?= ($page !== 'infomation') ?: 'active' ?>">
                <i class="bi bi-person-vcard me-1"></i> Thông tin cá nhân
            </a>
            <a href="/dia-chi-giao-hang" class="nav-link-infomation <?= ($page !== 'shipping-address') ?: 'active' ?>">
                <i class="bi bi-geo-alt me-1"></i> Địa chỉ giao hàng
            </a>
            <a href="/doi-diem-thuong" class="nav-link-infomation <?= ($page !== 'change-gift') ?: 'active' ?>">
                <i class="bi bi-gift me-1"></i> Đổi điểm thưởng
            </a>
        </div>
    </div>
</div>