 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <?php if($status_page) { ?>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách hoạt động</li>
                                <?php }else{?>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách xoá</li>
                                <?php }?>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <?php if(!$status_page) {?>
                            <a href="<?=URL_ADMIN?>quan-li-san-pham" class="btn btn-outline-success">Quay về Danh sách hoạt động</a>
                        <?php } else {?>
                            <a href="<?=URL_ADMIN?>them-san-pham" class="btn btn-primary shadow me-3"><i class="fa fas fa-plus me-2"></i>Thêm</a>
                            <a href="<?=URL_ADMIN?>quan-li-san-pham/danh-sach-xoa" class="btn btn-danger shadow"><i class="fa fas fa-trash me-2"></i>Danh sách xoá</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Nhập thông tin tìm kiếm"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <table class="sa-datatables-init" data-order="[]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="w-min">ID</th>
                            <th class="min-w-5x">Thông tin sản phẩm</th>
                            <th class="min-w-5x">Danh mục</th>
                            <th class="min-w-5x">Số lượng</th>
                            <th class="min-w-5x">Ngày tạo</th>
                            <?php if($status_page) {?>
                                <th class="min-w-5x">Ngày cập nhật</th>
                            <?php }else{ ?>
                                <th class="min-w-5x">Ngày xoá</th>
                            <?php }?>
                            <th class="min-w-5x text-end" data-orderable="false">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list_product as $product) {
                        extract($product);
                    ?>  
                        <tr class="align-middle">
                            <td>
                                <div class="">
                                    <?= $id_product ?>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="thumbnail-container">
                                        <img class="thumbnail" width="50" src="<?= URL_STORAGE . $path_product_image ?>" alt="<?= $path_product_image ?>">
                                        <div class="hover-text text-light"><i class="bi bi-zoom-in"></i></div>
                                    </div>
                                    <div class="ms-3">
                                        <a class="text-dark" href="<?=URL_ADMIN?>sua-san-pham/<?=$id_product?>"><strong><?= $name_product ?></strong></a>
                                    </div>
                                </div>
                            </td>
                            <td> 
                               <div class="badge badge-sa-primary"><a href="<?=URL_ADMIN?>quan-li-danh-muc"><?= $name_category_v1 ?></a></div>
                            </td>
                            <td> 
                                <?= ($quantity_product) ? '<div class="badge badge-sa-success">'.$quantity_product.' cái</div>' : '<div class="badge badge-sa-warning">0 cái</div>' ?> 
                            </td>
                            <td class="small">
                                <?= format_time($created_at,'DD/MM/YYYY lúc hh:mm:ss') ?>
                            </td>
                            <td class="small">
                            <?php if($status_page) {?>
                                <?= $updated_at ? format_time($updated_at,'DD/MM/YYYY lúc hh:mm:ss') : '<span class="text-muted">Chưa cập nhật</span>'?>
                            <?php }else{ ?>
                                <?= format_time($deleted_at,'DD/MM/YYYY lúc hh:mm:ss') ?>
                            <?php }?>
                            </td>
                            <td class="small">
                                <div class="d-flex justify-content-end gap-3">
                                    <?php if($status_page): ?>
                                    <a href="<?=URL_ADMIN?>sua-san-pham/<?=$id_product?>" class="btn btn-sm btn-warning shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-edit"></i>
                                    </a>
                                    <button name="delete" value="<?=$id_product?>" type="submit" class="btn btn-sm btn-danger shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-trash"></i>
                                    </button>
                                    <?php else: ?>
                                    <button name="restore" value="<?=$id_product?>" type="submit" class="btn btn-sm btn-outline-dark shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-trash-restore"></i>
                                    </button>
                                    <?php endif ?>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_SESSION['edit_category'])) {
    extract($_SESSION['edit_category'])
?>
<div class="modal fade" id="modalEditCategoryProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục ID = <?=$id?></h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
            <div class="modal-body px-5">
                <?=show_error($error_valid)?>
                <div class="form-floating mb-3">
                    <input name="name" value="<?=$name?>" type="text" class="form-control" id="name" placeholder="input">
                    <label for="name">Tên danh mục</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button name="edit_category" value="<?=$id?>" type="submit" class="btn btn-primary">Lưu</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<?= layout('user','large-image') ?>