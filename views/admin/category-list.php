<script src="<?= URL ?>assets/js/ajax_list_category.js"></script>

<span id="messageToast"></span>

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
            <div id="dataCategory" class="card">
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
                <div class="col-12 mb-5">
                    <label class="form-label" for="name_category_v2">Tên danh mục con</label>
                    <input name="name_category_v2" value="" type="text" class="form-control" id="name_category_v2" placeholder="Nhập tên danh mục con">
                    <input type="hidden" name="id_v1" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                <button id="addCateV2" type="submit" class="btn btn-primary disabled">Thêm</button>
            </div>
            </form>
        </div>
    </div>
</div>