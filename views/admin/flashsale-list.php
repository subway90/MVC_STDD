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
                            <a href="<?=URL_ADMIN?>danh-sach-flashsale" class="btn btn-outline-success">Quay về Danh sách hoạt động</a>
                        <?php } else {?>
                            <a href="<?=URL_ADMIN?>them-flashsale" class="btn btn-primary shadow me-3"><i class="fa fas fa-plus me-2"></i>Thêm</a>
                            <a href="<?=URL_ADMIN?>danh-sach-flashsale/danh-sach-xoa" class="btn btn-danger shadow"><i class="fa fas fa-trash me-2"></i>Danh sách xoá</a>
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
                            <th class="min-w-10x">Banner</th>
                            <th class="min-w-5x">Số lượng sản phẩm</th>
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
                    foreach ($list_flashsale as $flashsale) {
                        extract($flashsale);
                    ?>  
                        <tr class="align-middle">
                            <td>
                                <div class="">
                                    <?= $id_flashsale ?>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="thumbnail-container d-flex align-items-center">
                                        <img class="thumbnail me-3" height="32" src="<?= URL_STORAGE . $banner_flashsale ?>" alt="<?= $banner_flashsale ?>">
                                    </div>  
                                </div>
                                
                                <div class="mt-3 small">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="text-muted w-25">
                                            Tên sự kiện :
                                        </div>
                                        <div class="fw-bold">
                                            <?= $name_flashsale ?>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="text-muted w-25">
                                            Bắt đầu :
                                        </div>
                                        <div class="fw-bold">
                                            <?= format_time($time_start_flashsale,'hh:mm DD/MM/YYYY') ?>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="text-muted w-25">
                                            Kết thúc :
                                        </div>
                                        <div class="fw-bold">
                                            <?= format_time($time_end_flashsale,'hh:mm DD/MM/YYYY') ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td> 
                               <div class="badge badge-sa-<?= (!$count_product) ? 'warning' : 'primary' ?>"><?= $count_product ?> sản phẩm</div>
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
                            <form action="" method="post">
                                <div class="d-flex justify-content-end gap-3">
                                    <?php if($status_page): ?>
                                    <a href="<?=URL_ADMIN?>chi-tiet-flashsale/<?=$id_flashsale?>" class="btn btn-sm btn-warning shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-edit"></i>
                                    </a>
                                    <button name="delete" value="<?=$id_flashsale?>" type="submit" class="btn btn-sm btn-danger shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-trash"></i>
                                    </button>
                                    <?php else: ?>
                                    <button name="restore" value="<?=$id_flashsale?>" type="submit" class="btn btn-sm btn-outline-dark shadow small d-flex align-items-center gap-3">
                                        <i class="fa fas fa-trash-restore"></i>
                                    </button>
                                    <?php endif ?>
                                </div>
                            </form>
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

<?= layout('user','large-image') ?>