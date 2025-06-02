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
                            <a href="<?=URL_ADMIN?>danh-sach-tai-khoan" class="btn btn-outline-success">Quay về Danh sách hoạt động</a>
                        <?php } else {?>
                            <a href="<?=URL_ADMIN?>danh-sach-tai-khoan/danh-sach-xoa" class="btn btn-outline-danger"><i class="fa fas fa-trash me-3"></i>Danh sách xoá</a>
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
                            <th class="min-w-10x">Thông tin khách hàng</th>
                            <th class="min-w-3x">Phân quyền</th>
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
                    foreach ($list_customer as $customer) {
                        extract($customer);
                    ?>  
                        <tr>
                            <td class="d-flex align-items-center gap-5">
                                <img width="40" src="<?= DEFAULT_AVATAR ?>" alt="">
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex mb-3">
                                        <span class="text-primary"><i class="bi bi-person-circle"></i></span>
                                        <div class="ms-4 small">
                                            <a class="text-muted text-decoration-underline" href="<?=URL_ADMIN?>chi-tiet-tai-khoan/<?=$username?>"><strong><?= $full_name ?></strong></a>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <span class="text-primary"><i class="bi bi-telephone"></i></span>
                                        <div class="ms-4 small">
                                            <?= $username ?>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <span class="text-primary"><i class="bi bi-envelope"></i></span>
                                        <div class="ms-4 small">
                                            <?= $email ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="badge badge-sa-<?= ($name_role === 'admin') ? 'danger' : 'primary' ?>">
                                    <?= $name_role ?>
                                </div>
                            </td>
                            <td class="small">
                                <?= format_time($created_at,'DD/MM/YYYY lúc hh:mm:ss') ?>
                            </td>
                            <td class="small">
                            <?php if($status_page) {?>
                                <?= $updated_at ? format_time($updated_at,'DD/MM/YYYY lúc hh:mm:ss') : '<span class="text-muted small">Chưa cập nhật</span>'?>
                            <?php }else{ ?>
                                <?= format_time($deleted_at,'DD/MM/YYYY lúc hh:mm:ss') ?>
                            <?php }?>
                            </td>
                            <td class="text-end">
                                <a href="<?= URL_ADMIN.'chi-tiet-tai-khoan/'.$username ?>" class="mt-3 btn btn-sm btn-secondary">
                                    <i class="fa fas fa-eye me-2"></i> Xem
                                </a>
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
