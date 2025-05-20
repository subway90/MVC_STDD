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
        <!-- Nav infomation layout -->
         <?= layout('user','nav-infomation',['page' => 'invoice-history']) ?>

        <!-- Tab Content -->
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