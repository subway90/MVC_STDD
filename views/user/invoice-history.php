<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Lịch sử mua hàng</li>
        </ol>
    </nav>
</div>
<div class="container my-5 wow fadeIn">
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th class="text-start">STT</th>
                    <th class="text-start">Số lượng | Tổng</th>
                    <th class="text-center">Loại thanh toán</th>
                    <th class="text-center">Trạng thái hoá đơn</th>
                    <th class="text-center">Ngày tạo</th>
                    <th class="text-end">Hành động</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php if(empty($list_invoice_history)) : ?>
                    <tr>
                        <td colspan="7" class="text-center py-3">Bạn chưa có hóa đơn nào.</td>
                    </tr>
                <?php else :
                    foreach ($list_invoice_history as $i => $row) :
                ?>
                <tr>
                    <th class="text-start"><?=$i+1?></th>
                    <td class="text-start"><?= count($row['detail']) ?> | <?=number_format($row['total'])?> đ</td>
                    <td class="d-flex justify-content-center align-items-center text-uppercase small fw-semibold gap-2">
                        <img width="32" src="<?= URL_STORAGE ?>payment-method/<?= $row['method_payment'] ?>.png" alt="<?= $row['method_payment'] ?>">
                        <?= $row['method_payment'] ?>
                    </td>
                    <td class="text-center">
                        <span class="badge border border-1 text-secondary border-secondary"><?= $row['status_order'] ?></span>
                    </td>
                    <td class="text-center"><?=format_time($row['created_at'],'DD/MM lúc hh:mm')?></td>
                    <td class="text-end">
                        <a href="<?=URL?>lich-su-mua-hang/<?=$row['id_invoice']?>" class="btn btn-sm border-1 btn-outline-success mt-2 mt-lg-0"><i class="fas fa-eye me-1"></i> Xem chi tiết</a>
                    </td>
                </tr>
                <?php endforeach; endif ?>
            </tbody>
        </table>
    </div>
</div>