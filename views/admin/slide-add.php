<script src="<?= URL ?>assets/js/ajax_add_slide.js"></script>

<span id="messageToast"></span>

<form action="" method="post">
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Thêm slide</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="<?= URL_ADMIN?>danh-sach-slide" class="btn btn-secondary me-3">Huỷ</a>
                            <button name="add" type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                        
                        <div class="col-12">
                            <?= show_error($list_error) ?>
                        </div>

                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5 row">

                                    <div class="mb-4">
                                        <div class="form-label">Ảnh slide <span class="text-danger">(✱)</span> | <span class="text-muted">Kích thước khuyên dùng (1200 x 375px)</span></div>
                                        <div class="sa-divider"></div>
                                        <div id="dataImage" class="text-muted text-center small mt-3">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="link_slide" class="form-label">Đường dẫn slide</label>
                                        <input type="text" class="form-control" name="link_slide" id="link_slide" value="<?= $link_slide ?>" placeholder="ví dụ : /danh-muc/dien-thoai/iphone" />
                                        <div class="small text-muted mt-3">
                                            <span class="fw-bold text-danger">
                                                Lưu ý :
                                            </span>
                                            Đường dẫn không bao gồm domain (ví dụ https://domain.com), chỉ cần hậu tố phía sau domain.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>