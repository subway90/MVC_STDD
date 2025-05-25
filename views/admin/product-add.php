<!-- Use Editor Summernote -->
<script>
    $(document).ready(function() {
        $('#description_product').summernote({
            placeholder: 'Nhập nội dung mô tả',
            tabsize: 2,
            height: 180,
        });
        // $('.dropdown-toggle').dropdown();
    });
</script>

<!-- AJAX Render List V2 -->
<script>
    $(document).ready(function() {
        // Hàm gửi yêu cầu AJAX
        function fetchData(name_v1) {
            $.ajax({
                url: '/admin/choose-v1',
                type: 'POST',
                data: {
                    name_v1: name_v1
                },
                success: function(response) {
                    // Gán dữ liệu trả về vào #render_option_v2
                    $('#v2').html(response.data);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        }

        // Gửi yêu cầu với name_v1 mặc định là 0 khi trang được tải
        fetchData('none');

        // Lắng nghe sự kiện thay đổi trên dropdown
        $('#v1').change(function() {
            var name_v1 = $(this).val(); // Lấy value của option đã chọn
            fetchData(name_v1); // Gửi yêu cầu với name_v1 mới
        });
    });
</script>

<!-- AJAX Render List Model -->
<script>
    $(document).ready(function() {
        // Hàm gửi yêu cầu AJAX
        function chooseSeries(name_series) {
            $.ajax({
                url: '/admin/choose-series',
                type: 'POST',
                data: {
                    name_series: name_series
                },
                success: function(response) {
                    $('#model').html(response.data);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi:', error);
                }
            });
        }

        // Gửi yêu cầu với name_series mặc định là 0 khi trang được tải
        chooseSeries('none');

        // Lắng nghe sự kiện thay đổi trên dropdown
        $('#series').change(function() {
            var name_series = $(this).val(); // Lấy value của option đã chọn
            chooseSeries(name_series); // Gửi yêu cầu với name_series mới
        });
    });
</script>

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
                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5 row">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Thông tin</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name_product" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name_product" id="name_product" value="" placeholder="Tên sản phẩm" />
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="brand" class="form-label">Thương hiệu</label>
                                        <select id="brand" name="id_brand" class="sa-select2 form-select">
                                            <?php foreach ($list_brand as $brand) : ?>
                                                <option value="<?= $brand['id_brand'] ?>" ><?= $brand['name_brand'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-6 mb-4">
                                        <label for="color" class="form-label">Màu sắc</label>
                                        <select id="color" name="id_color" class="sa-select2 form-select">
                                            <?php foreach ($list_color as $color) : ?>
                                                <option value="<?= $color['id_color'] ?> "><?= $color['name_color'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="v1" class="form-label">Danh mục chính</label>
                                        <select id="v1" class="form-select">
                                            <option disabled selected>--- Nhấn vào để chọn danh mục ---</option>
                                            <?php foreach ($list_v1 as $v1) : ?>
                                                <option><?= $v1['name_category_v1'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="v2" class="form-label">Danh mục phụ</label>
                                        <select id="v2" name="product_category[]" multiple="" class="sa-select2 form-select">
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description_product"
                                            class="form-label">Mô tả</label>
                                        <textarea name="description_product" id="description_product" class="form-control" rows="8"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Giá & số lượng</h2>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col">
                                            <label for="price_product" class="form-label">Giá gốc</label>
                                            <input id="price_product" name="price_product" value="1000" type="number" class="form-control"/>
                                        </div>
                                        <div class="col">
                                            <label for="sale_price_product" class="form-label">Giá giảm</label>
                                            <input id="sale_price_product" name="sale_price_product" value="1000" type="number" class="form-control"/>
                                        </div>
                                        
                                        <div class="col">
                                            <label for="quantity_product" class="form-label">Số lượng kho</label>
                                            <input id="quantity_product" name="quantity_product" value="0" type="number" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Series & Phiên bản<h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="series" class="form-label">Series</label>
                                        <select id="series" name="series" class="form-select">
                                            <option disabled selected>--- Nhấn vào để chọn series ---</option>
                                            <?php foreach ($list_series as $series) : ?>
                                                <option><?= $series['name_series'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="model" class="form-label">Phiên bản</label>
                                        <select id="model" name="model" class="form-select">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-5">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Bộ sưu tập</h2>
                                    </div>
                                </div>
                                <div class="mt-n5">
                                    <div class="sa-divider"></div>
                                    <div class="table-responsive">
                                        <table class="sa-table">
                                            <thead>
                                                <tr>
                                                    <th class="w-min">Hỉnh ảnh</th>
                                                    <th class="w-min"></th>
                                                    <th class="w-min text-end">Xoá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div
                                                            class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                            <img src="<?= DEFAULT_IMAGE ?>" width="40" height="40" alt="" />
                                                            <!-- <input type="hidden" name="product_image[]" value="img01.png"> -->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        name_image.jpg
                                                    </td>
                                                    <td class="text-end">
                                                        <button class="btn btn-sa-muted btn-sm mx-n3"
                                                            type="button" aria-label="Delete image"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Xoá ảnh tạm">
                                                            <i class="bi bi-x-circle"></i>
                                                        </button>
                                                    </td>
                                                </tr>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>