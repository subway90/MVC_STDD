<script src="<?= URL ?>assets/js/ajax_edit_brand.js"></script>

<span id="messageToast"></span>

<form action="" method="post">
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Thêm thương hiệu</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="<?= URL_ADMIN ?>danh-sach-thuong-hieu" class="btn btn-secondary me-3">Huỷ</a>
                            <button name="edit" type="submit" class="btn btn-primary">Cập nhật</button>
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
                                        <label for="name_brand" class="form-label">Tên thương hiệu <span class="text-danger">(✱)</span></label>
                                        <input type="text" class="form-control" name="name_brand" id="name_brand" value="<?= $name_brand ?>" placeholder="Tên sản phẩm" />
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="my-3">
                                        <div class="form-label">Ảnh thương hiệu <span class="text-danger">(✱)</span></div>
                                        <div class="sa-divider"></div>
                                        <div id="dataImage" class="text-muted text-center small mt-3">
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