<style>
    .note-editor {
        background-color: white; /* Đặt nền màu trắng cho editor */
    }
</style>

<script src="<?= URL ?>assets/js/ajax_add_product.js"></script>

<!-- Use Editor Summernote -->
<script>
    $(document).ready(function() {
        $('#description_product').summernote({
            placeholder: 'Nhập nội dung mô tả',
            height: 400,
        });
    });
</script>

<span id="messageToast"></span>

<form action="" method="post">
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Thêm sản phẩm</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="#" class="btn btn-secondary me-3">Huỷ</a>
                            <button name="btn_add_product" type="submit" class="btn btn-primary">Lưu</button>
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
                                    <div class="mb-5">
                                        <div class="small">
                                            <span class="text-danger">
                                                (✱)
                                            </span>
                                            <span> - Thông tin bắt buộc điền</span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name_product" class="form-label">Tên sản phẩm <span class="text-danger">(✱)</span></label>
                                        <input type="text" class="form-control" name="name_product" id="name_product" value="<?= $name_product ?>" placeholder="Tên sản phẩm" />
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="brand" class="form-label">Thương hiệu <span class="text-danger">(✱)</span></label>
                                        <select id="brand" name="id_brand" class="sa-select2 form-select">
                                            <?php foreach ($list_brand as $brand) : ?>
                                                <option <?= ($id_brand == $brand['id_brand']) ? 'selected' : '' ?> value="<?= $brand['id_brand'] ?>" ><?= $brand['name_brand'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-6 mb-4">
                                        <label for="color" class="form-label">Màu sắc <span class="text-danger">(✱)</span></label>
                                        <select id="color" name="id_color" class="sa-select2 form-select">
                                            <?php foreach ($list_color as $color) : ?>
                                                <option <?= ($id_color == $color['id_color']) ? 'selected' : '' ?> value="<?= $color['id_color'] ?> "><?= $color['name_color'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="v1" class="form-label">Danh mục chính <span class="text-danger">(✱)</span></label>
                                        <select id="v1" name="id_category_v1" class="form-select">
                                            <option disabled selected>--- Nhấn vào để chọn danh mục ---</option>
                                            <?php foreach ($list_v1 as $v1) : ?>
                                                <option <?= ($id_category_v1 == $v1['id_category_v1']) ? 'selected' : '' ?> value="<?= $v1['id_category_v1'] ?>" ><?= $v1['name_category_v1'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="v2" class="form-label">Danh mục phụ <span class="text-danger">(✱)</span></label>
                                        <select id="v2" name="product_category[]" multiple="" class="sa-select2 form-select">
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-body p-5">
                                    <div class="row g-4">
                                        <div class="col">
                                            <label for="price_product" class="form-label">Giá gốc <span class="text-danger">(✱)</span></label>
                                            <input id="price_product" name="price_product" value="<?= $price_product ?>" type="number" class="form-control"/>
                                        </div>
                                        <div class="col">
                                            <label for="sale_price_product" class="form-label">Giá giảm</label>
                                            <input id="sale_price_product" name="sale_price_product" value="<?= $sale_price_product ?>" type="number" class="form-control"/>
                                        </div>
                                        
                                        <div class="col">
                                            <label for="quantity_product" class="form-label">Số lượng kho <span class="text-danger">(✱)</span></label>
                                            <input id="quantity_product" name="quantity_product" value="<?= $quantity_product ?>" type="number" class="form-control"/>
                                        </div>

                                        <div class="col-12 small text-muted">
                                            <span class="text-danger">Lưu ý : </span>
                                            Nếu sản phẩm không có chương trình giảm giá, thì ô nhập giá giảm có thể để trống
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-body p-5 row">
                                    <div class="mb-4">
                                        <label for="description_product" class="form-label">Mô tả <span class="text-danger">(✱)</span></label>
                                        <textarea class="form-control" name="description_product" id="description_product" rows="8"><?= $description_product ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-4">
                                        <label for="series" class="form-label">Series</label>
                                        <select id="series" name="name_series" class="form-select">
                                            <option disabled selected>--- Nhấn vào để chọn series ---</option>
                                            <?php foreach ($list_series as $series) : ?>
                                                <option <?= ($name_series == $series['name_series']) ? 'selected' : '' ?> ><?= $series['name_series'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="model" class="form-label">Phiên bản</label>
                                        <select id="model" name="id_model" class="form-select">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="mt-n5">
                                    <div class="sa-divider"></div>
                                    <div class="table-responsive">
                                        <table class="sa-table mt-5">
                                            <thead>
                                                <tr>
                                                    <th class="w-min">Ảnh</th>
                                                    <th class="w-min"></th>
                                                    <th class="w-min text-end">Xoá</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataImage">
                                                <?php if(!empty($_SESSION['temp_image_product'])) : ?>
                                                    <tr class="align middle">
                                                        <td colspan="3" class="text-muted text-center small fst-italic">
                                                            Chưa có ảnh nào
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="sa-divider"></div>
                                    <div class="px-5 py-4 my-auto">
                                        <button id="addImage" class="btn btn-sa-muted btn-sm mx-n3"
                                            type="button" aria-label="Delete image"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Thêm ảnh mới">
                                            <i class="bi bi-plus-square-dotted me-2"></i>
                                            Thêm ảnh mới
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="mt-n5">
                                    <div class="sa-divider"></div>
                                    <div class="table-responsive">
                                        <table class="sa-table mt-5">
                                            <thead>
                                                <tr>
                                                    <th class="w-min-5x">Thông số</th>
                                                    <th class="w-min-5x">Giá trị</th>
                                                    <th class="w-min text-end">Xoá</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataAttribute">
                                                <?php if(!empty($_SESSION['temp_attribute_product'])) : ?>
                                                    <tr class="align middle">
                                                        <td colspan="3" class="text-muted text-center small fst-italic">
                                                            Chưa có thông số nào
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="sa-divider"></div>
                                    <div class="px-5 py-4 my-auto">
                                        <button class="btn btn-sa-muted btn-sm mx-n3"
                                            type="button"
                                            data-bs-target="#modalAddAttribute"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-plus-square-dotted me-2"></i>
                                            Thêm thông số mới
                                        </button>
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


<div class="modal fade" id="modalAddAttribute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm thông số</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="attributeForm">
            <div class="modal-body row px-5">
                <div class="col-6 mb-5">
                    <label class="form-label" for="name_attribute">Tên thông số</label>
                    <input oninput="checkInputs()" name="name_attribute" value="" type="text" class="form-control" id="name_attribute" placeholder="Nhập tên thông số">
                </div>
                <div class="col-6 mb-5">
                    <label class="form-label" for="value_attribute">Giá trị thông số</label>
                    <input oninput="checkInputs()" name="value_attribute" value="" type="text" class="form-control" id="value_attribute" placeholder="Nhập giá trị thông số">
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