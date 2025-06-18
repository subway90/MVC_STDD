<form action="" method="post">
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Chi tiết chương trình</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="<?= URL_ADMIN ?>danh-sach-flashsale" class="btn btn-secondary me-3">Huỷ</a>
                            <button name="update" type="submit" class="btn btn-primary">Cập nhật</button>
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
                                        <div class="form-label">Ảnh chương trình <span class="text-danger">(✱)</span> |
                                            <span class="text-muted">Kích thước khuyên dùng (1200 x 120px)</span></div>
                                        <div class="sa-divider"></div>
                                        <div id="dataImage" class="text-muted text-center small mt-3">
                                            <img class="w-100"
                                                src="<?= URL_STORAGE . $banner_flashsale ?>">
                                            <div class="text-muted mt-3">
                                                <?= $banner_flashsale ?>
                                            </div>
                                            <div class="text-muted text-center small mt-3">
                                                <button id="changeImageBanner" class="btn btn-sa-muted btn-sm mx-n3"
                                                    type="button"
                                                    aria-label="Delete image"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom"
                                                    title="Nhấn vào để chọn ảnh">
                                                    <i class="bi bi-arrow-repeat me-2"></i>
                                                    Thay đổi ảnh banner khác
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 col-12 col-lg-6">
                                        <label for="name_flashsale" class="form-label">Tên chương trình</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="name_flashsale" id="name_flashsale"
                                            value="<?= $name_flashsale ?>"
                                            placeholder="ví dụ : /danh-muc/dien-thoai/iphone" 
                                        />
                                    </div>

                                    <div class="mb-4 col-12 col-lg-3">
                                        <label for="time_start" class="form-label">Thời gian bắt đầu</label>
                                        <input id="time_start" name="time_start"
                                            value="<?= $time_start ?>"
                                            type="datetime-local" 
                                            class="form-control"
                                            placeholder="Nhấn vào để chọn" 
                                        />
                                    </div>
                                    
                                    <div class="mb-4 col-12 col-lg-3">
                                        <label for="time_end" class="form-label">Thời gian kết thúc</label>
                                        <input id="time_end" name="time_end"
                                            value="<?= $time_end ?>"
                                            type="datetime-local" 
                                            class="form-control"
                                            placeholder="Nhấn vào để chọn" 
                                        />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card mt-5">
                                <div class="table-responsive">
                                    <table class="sa-table mt-5">
                                        <thead>
                                            <tr>
                                                <th class="w-min">Sản phẩm</th>
                                                <th class="w-min text-center">Giá gốc</th>
                                                <th class="w-min text-center">Giá giảm</th>
                                                <th class="w-min text-center">Số lượng bán</th>
                                                <th class="w-min text-end">Xoá</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small">
                                            <?php if (empty($list_product)) : ?>
                                                <tr class="align middle">
                                                    <td colspan="4" class="text-muted text-center small fst-italic">
                                                        Chưa có sản phẩm nào
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($list_product as $product) : extract($product) ?>
                                                <tr class="align middle">
                                                    <td class="d-flex align-items-center gap-3">
                                                        ID <?= $id_product ?>
                                                        <span>-</span>
                                                        <img width="40" src="<?= URL_STORAGE.$path_product_image ?>" alt="Ảnh sản phẩm">
                                                        <a target="_blank" href="<?= URL_ADMIN ?>sua-san-pham/<?= $id_product ?>" class=" link-dark" title="Xem chi tiết sản phẩm <?= $name_product ?>">
                                                            <?= $name_product ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center small">
                                                        <?= format_currency($price_product) ?>
                                                    </td>
                                                    <td class="text-center small">
                                                        <?= format_currency($price_flashsale) ?>
                                                    </td>
                                                    <td class="text-center small">
                                                        <?= $quantity_flashsale ?> / đã bán <?= $quantity_selled_flashsale ?>
                                                    </td>
                                                    <td class="text-end small">
                                                        <button type="submit" value="<?= $id_product ?>" name="delete_product" class="btn btn-sm btn-outline-danger border-0 p-0" title="Xoá sản phẩm khỏi section">
                                                            <i class="bi bi-x fs-5"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="sa-divider"></div>
                                <div class="px-5 py-4 my-auto">
                                    <button class="btn btn-sa-muted btn-sm mx-n3" type="button"
                                        data-bs-target="#modalAddProduct" data-bs-toggle="modal">
                                        <i class="bi bi-plus-square-dotted me-2"></i>
                                        Thêm sản phẩm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Product -->
    <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thểm sản phẩm mới vào sự kiện</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-12 mb-2">
                        <?= show_error($list_error_modal) ?>
                    </div>
                    <?php if($detail_product_add) : ?>
                    <div class="col-8 my-4 bg-dark bg-opacity-10 p-5 rounded rounded-4">
                        <div class="d-flex flex-column gap-3">
                            <div class="small d-flex gap-5">
                                <div class="fw-bold w-25">ID Sản phẩm</div>
                                <div class="fw-light w-75">
                                    : <?= $detail_product_add['id_product'] ?>
                                </div>
                            </div>
                            <div class="small d-flex gap-5">
                                <div class="fw-bold w-25">Tên sản phẩm</div>
                                <div class="fw-light w-75">
                                    : <?= $detail_product_add['name_product'] ?>
                                </div>
                            </div>
                            <div class="small d-flex gap-5">
                                <div class="fw-bold w-25">Số lượng kho</div>
                                <div class="fw-light w-75">
                                    : <?= $detail_product_add['quantity_product'] ?>
                                </div>
                            </div>
                            <div class="small d-flex gap-5">
                                <div class="fw-bold w-25">Giá gốc</div>
                                <div class="fw-light w-75">
                                    : <?= format_currency($detail_product_add['price_product']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 my-4  d-flex align-items-center justify-content-center">
                        <img class="w-75" src="<?= URL_STORAGE.$detail_product_add['path_product_image'] ?>" alt="Ảnh sản phẩm">
                    </div>
                    <?php endif ?>
                    <div class="col-12 col-lg-4 mb-2">
                        <label for="id_product" class="form-label">ID Sản phẩm</label>
                        <input type="text" name="id_product" value="<?= $id_product_add ?>" id="id_product" class="form-control">
                    </div>
                    <div class="col-12 col-lg-4 mb-2">
                        <label for="id_product" class="form-label">Giá cần bán</label>
                        <input type="text" name="price_flashsale" value="<?= $price_flashsale_add ?>" id="id_product" class="form-control">
                    </div>
                    <div class="col-12 col-lg-4 mb-2">
                        <label for="id_product" class="form-label">Số lượng cần bán</label>
                        <input type="text" name="quantity_flashsale" value="<?= $quantity_flashsale_add ?>" id="id_product" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" name="add_product" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>

</form>

