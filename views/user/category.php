<!-- JS Ajax -->
<script src="<?= URL ?>assets/js/ajax_product.js"></script>

<!-- Breadcrumb -->
<div class="container my-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">
                <a href="/" class="text-decoration-none text-success">Trang chủ</a>
            </li>
            <li class="breadcrumb-item fw-bold">
                <a href="#" class="text-decoration-none text-dark">Sản phẩm</a>
            </li>

        </ol>
    </nav>
</div>

<div class="container mt-5 row mx-auto p-0 justify-content-between">
    <div class="col-12 col-lg-2 bg-light p-2 px-4">

        <div class="mb-4">
            <div class="text-success h6">Chọn mức giá</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filterPrice" id="filterPriceAll" value="0" checked>
                <label class="form-check-label small" for="filterPriceAll">Tất cả mức giá</label>
            </div>
        <?php foreach (LIST_FILTER_PRICE as $i => $item): extract($item); ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filterPrice" id="filterPrice<?= $i ?>" value="<?= $value ?>">
                <label class="form-check-label small" for="filterPrice<?= $i ?>">
                    <?= $name ?> 
                </label>
            </div>
        <?php endforeach ?>
        </div>

        <div class="mb-4">
            <div class="text-success h6">Thương hiệu</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filterBrand" id="filterBrandAll" value="0" checked>
                <label class="form-check-label small" for="filterBrandAll">Tất cả thương hiệu</label>
            </div>
        <?php foreach ($list_brand as $i => $item): extract($item); ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filterBrand" id="filterBrand<?= $i ?>" value="<?= $id_brand ?>">
                <label class="form-check-label small" for="filterBrand<?= $i ?>">
                    <?= $name_brand ?> 
                </label>
            </div>
        <?php endforeach ?>
        </div>

        <div class="mb-4">
            <div class="text-success h6">Chọn màu</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filterColor" id="filterColorAll" value="0" checked>
                <label class="form-check-label small" for="filterColorAll">Tất cả màu</label>
            </div>
        <?php foreach ($list_color as $i => $item): extract($item); ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="filterColor" id="filterColor<?= $i ?>" value="<?= $id_color ?>">
                <label class="form-check-label d-flex align-items-center small" for="filterColor<?= $i ?>">
                    <?= $name_color ?> 
                    <div style="background-color: <?= $code_color ?>" class="box-color ms-2"></div>
                </label>
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <div class="col-12 col-lg-10 p-0 ps-lg-2">
        <!-- Result Product -->
        <div class="box-result row mx-auto"></div>
    </div>
</div>