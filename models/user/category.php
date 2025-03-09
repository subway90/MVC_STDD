<?php

/**
 * Lấy tất cả thương hiệu
 * @return array
 */
function get_all_brand() {
    return pdo_query(
        'SELECT * FROM brand WHERE deleted_at IS NULL'
    );
}

/**
 * Lấy tất cả màu
 * @return array
 */
function get_all_color() {
    return pdo_query(
        'SELECT * FROM color WHERE deleted_at IS NULL'
    );
}

function render_card_product() {
    $defautl_image = DEFAULT_IMAGE;
    return
    <<<HTML
        <div class="card-product p-1 pt-lg-0 pb-lg-2">
            <div style="min-height: 100%;" class="card rounded-0">
                <div class="position-relative hover-trigger">
                    <img src="{$defautl_image}" class="card-img img-product" alt="{$defautl_image}">
                    <span class="show-hover position-absolute end-0 bottom-0 w-100">
                        <div class="d-flex justify-content-center align-items-center text-success">
                            Nhấn để phóng to <i class="bi bi-zoom-in ms-2"></i>
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
                        <div class="text-danger fw-bold me-1">22,890,000 vnđ</div>
                        <div class="text-secondary small">
                            <del><small>44,990,000 vnđ</small></del>
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
HTML;
}

function render_paginate_product() {
    return
    <<<HTML
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
    HTML;
}