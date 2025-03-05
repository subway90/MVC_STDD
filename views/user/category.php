
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
                <?php endforeach; ?>
            </div>

            <div class="mb-4">
                <div class="text-success h6">Thương hiệu</div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="filterBrand" id="filterBrandAll" value="0" checked>
                    <label class="form-check-label small" for="filterBrandAll">Tất cả mức giá</label>
                </div>
                <?php foreach ($list_brand as $i => $item): extract($item); ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="filterBrand" id="filterBrand<?= $i ?>" value="<?= $id_brand ?>">
                    <label class="form-check-label small" for="filterBrand<?= $i ?>">
                        <?= $name_brand ?> 
                    </label>
                </div>
                <?php endforeach; ?>
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
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-12 col-lg-10 row mx-auto p-0 ps-lg-2">
            <!-- Result Product -->
            <?php for ($i=0; $i < 20; $i++) { ?>
                <div class="card-product p-1 pt-lg-0 pb-lg-2">
                <div style="min-height: 100%;" class="card rounded-0">
                    <div class="position-relative hover-trigger">
                        <img src="<?= DEFAULT_IMAGE ?>" class="card-img img-product" alt="<?= DEFAULT_IMAGE ?>">
                        <span class="show-hover position-absolute end-0 bottom-0 w-100">
                            <div class="d-flex justify-content-evenly">
                                <button class="btn btn-success">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="btn btn-success">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-success">
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                </button>
                            </div>
                        </span>
                    </div>
                    <div class="ms-2">
                        <a href="<?= URL ?>" class="badge bg-success rounded-5 text-decoration-none">
                            <span class="">Apple</span>
                        </a>
                        <a href="<?= URL ?>" class="badge bg-orange rounded-5 text-decoration-none">
                            <span class="">Flash sale</span>
                        </a>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body p-2">
                            <h6 class="card-title fw-bold text-dark p-0">iPhone 15 Plus 128GB</h6>
                            <div class="text-danger fw-bold me-1">22,890,000 đ</div>
                            <div class="text-secondary small">
                                <del><small>44,990,000</small></del>
                                <small class="text-danger ms-1">
                                    -50%
                                </small>
                            </div>
                            <div class="d-flex justify-content-between justify-content-md-start mt-2">
                                <button type="button" class="btn btn-sm btn-success rounded-0"><i class="bi bi-cart-check me-2"></i><small>Mua ngay</small></button>
                                <button type="button" class="btn btn-sm btn-outline-success rounded-0 ms-md-1"><i class="bi bi-heart"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-success rounded-0 ms-md-1"><i class="bi bi-cart-plus"></i></button>
                            </div>
                        </div>
                    </a>
                </div>
                </div>
            <?php } ?>
            <!-- Pagination -->
            <div class="col-12">
                <div class="d-flex justify-content-center mt-3">
                    <a href="product.html" class="disabled btn btn-small btn-outline-success mx-1">Trước</a>
                    <a href="product.html" class="active btn btn-small btn-outline-success mx-1">1</a>
                    <a href="product.html" class="btn btn-small btn-outline-success mx-1">2</a>
                    <a href="product.html" class="btn btn-small btn-outline-success mx-1">3</a>
                    <a href="product.html" class="btn btn-small btn-outline-success mx-1">4</a>
                    <a href="product.html" class="btn btn-small btn-outline-success mx-1">5</a>
                    <a href="product.html" class="btn btn-small btn-outline-success mx-1">Sau</a>
                </div>
            </div>

        </div>
    </div>
