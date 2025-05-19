<!-- JS Custom -->
<script src="<?= URL ?>assets/js/invoice.js"></script>

<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Lịch sử mua hàng</li>
        </ol>
    </nav>
</div>
<div class="container my-5">
    <div class="row">
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
                    <a href="#" class="nav-link-infomation active">
                        <i class="bi bi-receipt me-1"></i> Đơn hàng
                    </a>
                    <a href="#" class="nav-link-infomation">
                        <i class="bi bi-person-vcard me-1"></i> Thông tin cá nhân
                    </a>
                    <a href="#" class="nav-link-infomation">
                        <i class="bi bi-geo-alt me-1"></i> Địa chỉ giao hàng
                    </a>
                    <a href="#" class="nav-link-infomation">
                        <i class="bi bi-gift me-1"></i> Đổi điểm thưởng
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-9 px-0 px-lg-3 pe-lg-0 mt-3 mt-lg-0">
            <div class="">
                <div class="bg-light rounded-3 p-3 d-flex justify-content-between justify-content-lg-start gap-2 mb-3">
                    <button id="tat-ca" class="btn-status-invoice active">
                        Tất cả
                    </button>
                    <button id="chưa xác nhận" class="btn-status-invoice">
                        Chưa xác nhận
                    </button>
                    <button id="đã xác nhận" class="btn-status-invoice">
                        Đã xác nhận
                    </button>
                    <button id="đang giao hàng" class="btn-status-invoice">
                        Đang giao hàng
                    </button>
                    <button id="đã giao hàng" class="btn-status-invoice">
                        Đã giao hàng
                    </button>
                    <button id="hoàn trả" class="btn-status-invoice">
                        Hoàn trả
                    </button>
                    <button id="đã huỷ" class="btn-status-invoice">
                        Đã huỷ
                    </button>
                </div>
                <div id="result-list-invoice" class="d-flex flex-column px-3">
                </div>
            </div>
        </div>
    </div>
</div>