<!-- JS Custom -->
<script src="<?= URL ?>assets/js/invoice.js"></script>

<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Địa chỉ giao hàng</li>
        </ol>
    </nav>
</div>
<div class="container my-5">
    <div class="row">
        <!-- Nav infomation layout -->
         <?= layout('user','nav-infomation',['page' => 'shipping-address']) ?>

        <!-- Tab Content -->
        <div class="col-12 col-lg-9 px-0 px-lg-3 pe-lg-0 mt-3 mt-lg-0">
            <div class="bg-light rounded-3 p-3 d-flex justify-content-between justify-content-lg-start gap-2 mb-3">
                <table class="table rounded rounded-5">
                    <?php 
                    if(empty($list_shipping_address)) {
                    ?>
                    <tr class="align-middle">
                        <td>
                            <div class="text-muted text-center">Danh sách trống</div>
                        </td>
                    </tr>
                    <?php }else{ foreach ($list_shipping_address as $item) { extract($item); ?>
                    <tr class="align-middle">
                        <td>
                            <i class="bi bi-geo-alt me-2"></i><?= $name_shipping_address?>
                        </td>
                        <td class="text-end">
                            <button type="button" onclick="delete_shipping(<?=$id_shipping_address ?>)" class="btn btn-small shadow small btn-danger p-1 px-2">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php }}?>
                    <tr>
                        <td colspan="2">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalAddShippingAddress" class="btn btn-sm btn-success shadow"><i class="bi bi-plus-circle me-2"></i> Thêm địa chỉ khác</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Thêm Mới -->
<div class="modal fade" id="modalAddShippingAddress" tabindex="-1" aria-labelledby="modalAddShippingAddress" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success" id="modalAddShippingAddress">Thêm địa chỉ mới</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="id_force" value="">
            <div class="modal-body text-center px-lg-4">
                <div class="my-2 text-start">
                    <?= show_error($error_valid) ?>
                </div>
                <div class="mb-3 text-start">
                    <div class="form-floating">
                        <textarea name="input_shipping_address" class="form-control" placeholder="Leave a comment here" id="name_ship"><?= $input_shipping_address ?></textarea>
                        <label for="name_ship">Nhập địa chỉ mới</label>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary me-2" data-bs-dismiss="modal">Huỷ</button>
                <button name="add_shipping_address" type="submit" class="btn btn-sm btn-success">Thêm</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Xoá -->
<div class="modal fade" id="modalDeleteShippingAddress" tabindex="-1" aria-labelledby="modalDeleteShippingAddress" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger" id="modalDeleteShippingAddress">Xoá địa chỉ giao hàng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="id_delete" value="">
            <div class="modal-body text-center px-lg-5">
                <div class="mb-4 text-center text-muted">
                    Việc xoá sẽ không thể khôi phục lại ! Bạn có chắc chắn xoá địa chỉ giao hàng này ?
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary me-2" data-bs-dismiss="modal">Huỷ</button>
                <button name="delete_shipping_address" type="submit" class="btn btn-sm btn-danger">Xoá</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
function delete_shipping(id) {
    document.querySelector('input[name="id_delete"]').value = id;
    var myModal = new bootstrap.Modal(document.getElementById('modalDeleteShippingAddress'));
    myModal.show();
}
</script>