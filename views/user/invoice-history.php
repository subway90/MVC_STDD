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
                    <button id="tat_ca" class="btn-status-invoice active">
                        Tất cả
                    </button>
                    <button id="chua_xac_nhan" class="btn-status-invoice">
                        Chưa xác nhận
                    </button>
                    <button id="da" class="btn-status-invoice">
                        Đã xác nhận
                    </button>
                    <button id="dang_giao_hang" class="btn-status-invoice">
                        Đang giao hàng
                    </button>
                    <button id="da" class="btn-status-invoice">
                        Đã giao hàng
                    </button>
                    <button id="hoan_tra" class="btn-status-invoice">
                        Hoàn trả
                    </button>
                    <button id="da_huy" class="btn-status-invoice">
                        Đã huỷ
                    </button>
                </div>
                <div class="d-flex flex-column px-3">
                    <?php if(empty($list_invoice_history)) : ?>
                            <div class="text-center py-3">Bạn chưa có hóa đơn nào.</div>
                    <?php else :
                        foreach ($list_invoice_history as $i => $row) :
                    ?>
                    <div class="row py-3 mb-3 bg-light p-3 rounded-3">
                        <div class="col-12 p-0 d-flex justify-content-between">
                            <span class="fw-semi small">
                                <i class="bi bi-clock text-success me-2"></i><small><?= format_time($row['created_at'],'hh giờ mm phút - DD/MM/YYYY') ?></small>
                            </span>
                            <div class="px-3 small fw-normal rounded-3 text-light <?= bg_state_invoice($row['status_order']) ?> bg-opacity-75">
                                <span class="small">
                                    <?= $row['status_order'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <table class="table table-hover mt-2">
                                <thead>
                                    <th class="fw-normal small">Tên sản phẩm</th>
                                    <th class="fw-normal small text-end">Giá</th>
                                    <th class="fw-normal small text-end">Số lượng</th>
                                    <th class="fw-normal small text-end">Thành tiền</th>
                                </thead>
                                <tbody>
                                <?php foreach ($row['detail'] as $product) : ?>
                                    <tr class="align-middle">
                                        <td class="fw-light d-flex align-items-center small">
                                            <img class="me-2" width="45" src="<?= URL_STORAGE . $product['path_product_image'] ?>" alt="">
                                            <a href="<?= URL . 'chi-tiet/' . $product['slug_product'] ?>" class="nav-link text-green small text-decoration-underline">
                                                <?= $product['name_product'] ?>
                                            </a>
                                        </td>
                                        <td class="fw-light small text-end"><?= number_format($product['price_invoice'],0,0,'.') ?> vnđ</td>
                                        <td class="fw-light small text-end"><?= $product['quantity_invoice'] ?></td>
                                        <td class="fw-light small text-end"><?= number_format($product['price_invoice']*$product['quantity_invoice'],0,0,'.') ?> vnđ</td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <td colspan="4" class="fw-bold small text-end"><?= number_format($row['total'],0,0,'.') ?> vnđ</td>
                                </tfoot>
                            </table>
                            <div class="d-flex justify-content-lg-end gap-1">
                                <a href="gio-hang/<?= $row['id_invoice'] ?>" class="col-6 col-lg-2 btn btn-sm rounded-pill btn-outline-success px-3">
                                    <i class="bi bi-bag-check-fill me-1"></i> Mua lại
                                </a>
                                <a href="lich-su-mua-hang/<?= $row['id_invoice'] ?>" class="col-6 col-lg-2 btn btn-sm rounded-pill btn-success px-3">
                                    <i class="bi bi-eye me-1"></i> Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif ?>
                </div>
            </div>
        </div>
    </div>
</div>