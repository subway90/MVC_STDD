<script src="<?= URL ?>assets/js/ajax_add_category.js"></script>
<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <?php if ($status_page) { ?>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách hoạt động</li>
                                <?php } else { ?>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách xoá</li>
                                <?php } ?>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <?php if (!$status_page) { ?>
                            <a href="<?= URL_ADMIN ?>danh-sach-danh-muc" class="btn btn-outline-success">Quay về Danh sách
                                hoạt động</a>
                        <?php } else { ?>
                            <a href="<?= URL_ADMIN ?>them-danh-muc" class="btn btn-primary shadow me-3"><i
                                    class="fa fas fa-plus me-2"></i>Thêm</a>
                            <a href="<?= URL_ADMIN ?>danh-sach-danh-muc/danh-sach-xoa" class="btn btn-danger shadow"><i
                                    class="fa fas fa-trash me-2"></i>Danh sách xoá</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accordion card" id="accordion-1">
                    <?php foreach ($list_category as $i => $row) : extract($row) ?>
                    <div class="sa-divider"></div>
                    <form action="" method="post" id="formActionV2">
                    <input type="hidden" name="id_category_v1" value="<?= $id_category_v1 ?>">
                    <div class="accordion-item">
                        <h2 class="accordion-header d-flex">
                            <button class="accordion-button sa-hover-area <?= ($id_v1_open == $i) ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse"
                                data-bs-target="#tab<?=$i?>" aria-expanded="true">
                                <span class="accordion-sa-icon"></span>
                                <img height="30" class="me-3" src="<?= URL_STORAGE.$logo_category_v1 ?>" alt="<?= $logo_category_v1 ?>">
                                <?= $name_category_v1 ?>
                            </button>
                        </h2>
                        <div id="tab<?=$i?>" class="accordion-collapse collapse <?= ($id_v1_open == $i) ? 'show' : '' ?>"
                            data-bs-parent="#accordion-1">
                            <div class="accordion-body mb-5">
                                <div class="sa-divider"></div>
                                <div class="table-responsive">
                                    <table class="sa-table mt-5">
                                        <thead>
                                            <tr>
                                                <th class="w-min-5x">Danh mục con</th>
                                                <th class="w-min-5x text-center">Số lượng sản phẩm</th>
                                                <th class="w-min text-end">Xoá</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataCategoryV2">
                                            <?php if(empty($list_v2)) : ?>
                                                <tr class="align middle">
                                                    <td colspan="3" class="text-muted text-center small fst-italic">
                                                        Chưa có danh mục con nào
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                            <?php foreach ($list_v2 as $v2) : extract($v2) ?>
                                                <tr>
                                                    <td class="small">
                                                        <?= $name_category_v2 ?>
                                                    </td>
                                                    <td class="small text-center">
                                                        <?= $count_product ?>
                                                    </td>
                                                    <td class="text-end">
                                                        <form class="formDeleteAttribute">
                                                            <button class="deleteV2 btn btn-sa-muted text-danger btn-sm mx-n3"
                                                                type="button" aria-label="Delete Attribute"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom"
                                                                data-vallue-id="<?= $id_category_v2 ?>"
                                                                title="Xoá danh mục con này">
                                                                <i class="bi bi-x-circle"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="sa-divider"></div>
                                <div class="d-flex align-items-center justify-content-between gap-5 py-3">
                                    <div class="d-flex align-items-center gap-5">
                                        <button class="btn btn-sa-muted btn-sm mx-n3"
                                            type="button"
                                            data-bs-target="#modalAddV2"
                                            data-value-id="<?= $id_category_v1 ?>"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-plus-square-dotted me-2"></i>
                                            Thêm danh mục con mới
                                        </button>
                                        <label class="form-check form-switch" >
                                            <input type="checkbox" class="form-check-input" />
                                            <span class="form-check-label small">Hiển thị danh mục nổi bật</span >
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <button name="delete" type="button" class="btn btn-sm btn-danger shadow d-flex align-items-center gap-3" data-value-id="<?= $id_category_v1 ?>">
                                            <i class="bi bi-trash bi fs-6"></i> Xoá danh mục
                                        </button>
                                        <a href="<?= URL_ADMIN ?>sua-danh-muc/<?= $id_category_v1 ?>" type="button" class="btn btn-sm btn-warning shadow d-flex align-items-center gap-3" data-value-id="<?= $id_category_v1 ?>">
                                            <i class="bi bi-pencil-square bi fs-6"></i> Sửa danh mục
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddV2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục con</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="categoryV2Form">
            <div class="modal-body row px-5">
                <div class="col-6 mb-5">
                    <label class="form-label" for="name_category_v2">Tên danh mục con</label>
                    <input oninput="checkInputs()" name="name_category_v2" value="" type="text" class="form-control" id="name_category_v2" placeholder="Nhập tên thông số">
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="logo_category_v2">Ảnh danh mục con</label>
                    <input oninput="checkInputs()" name="logo_category_v2" value="" type="file" accept=".jpg,.jpeg,.png,.webp" class="form-control" id="logo_category_v2" placeholder="Nhập giá trị thông số">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button id="addAttribute" value="<?=$id?>" type="submit" class="btn btn-primary disabled">Thêm</button>
            </div>
            </form>
        </div>
    </div>
</div>