<?php

function render_card_product($data) {
    $url_storage = URL_STORAGE;
    // giải nén
    extract($data);
    // lấy ảnh
    if($path_product_image) $path_product_image = URL_STORAGE.$path_product_image;
    // nếu không có ảnh -> lấy ảnh mặt định
    else $path_product_image = DEFAULT_IMAGE;
    // nếu có giá giảm
    if($sale_price_product) {
        // format phần trăm giá giảm
        $value_sale = number_format(($price_product - $sale_price_product)/1000,0,',','.');
        // format giá giảm
        $sale_price_product = number_format($sale_price_product,0,',','.');
        // format giá
        $price_product = number_format($price_product,0,',','.');
        // nội dung HTML giá giảm
        $content_sale =
        <<<HTML
        <div class="text-secondary small">
            <del><small>{$price_product}vnđ</small></del>
            <small class="text-danger ms-1 fst-semibold">
                giảm {$value_sale}K
            </small>
        </div>
        <div class="text-danger fw-bold me-1">{$sale_price_product} vnđ</div>
        HTML;
    }else {
        // format giá
        $price_product = number_format($price_product,0,',','.');
        $content_sale = 
        <<<HTML
        <div class="text-danger fw-bold me-1">{$price_product} vnđ</div>
        HTML;
    }
    

    return
    <<<HTML
        <div class="card-product p-1 pt-lg-0 pb-lg-2">
            <div style="min-height: 100%;" class="card rounded-0">
                <img src="{$path_product_image}" alt="{$path_product_image}">
                <div class="m-2 d-flex">
                    <a href="#" class="border border-success text-muted fw-semibold rounded-5 small px-2 text-decoration-none d-flex align-items-center me-1 gap-1">
                        <img height="14" src="{$url_storage}{$logo_brand}" alt="{$logo_brand}">
                        {$name_brand}
                    </a>
                </div>
                <div class="text-decoration-none flex-grow-1 d-flex">
                    <div class="card-body p-2 flex-grow-1 d-flex flex-column justify-content-between">
                        <a href="/chi-tiet/{$slug_product}" class="text-decoration-none flex-grow-1 d-flex flex-column justify-content-between">
                            <h6 class="card-title fw-bold text-dark p-0">{$name_product}</h6>
                            <div class="">
                                {$content_sale}
                            </div>
                        </a>
                        <form method="post" action="/gio-hang">
                            <div class="d-flex justify-content-between mt-2">
                                <input type="hidden" class="idProduct" value="{$id_product}">
                                <button type="submit" name="buy_now" value="{$id_product}" class="btn btn-sm btn-success rounded-0 flex-grow-1"><i class="bi bi-cart-check me-2"></i><small>Mua ngay</small></button>
                                <button type="button" id="addCartBtn" class="btn btn-sm btn-outline-success rounded-0 ms-1"><i class="bi bi-cart-plus me-2"></i><small>Thêm</small></button>
                            </div>
                        </form>
                    </div>
                </div>
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

function render_row_card_empty() {
    $url_storage = URL_STORAGE;
    return
    <<<HTML
        <div class="col-12">
            <div class="d-flex flex-column align-items-center mt-3">
                <h6 class="text-uppercase text-muted">Kết quả tìm kiếm không tồn tại</h6>
                <img width="240" src="{$url_storage}system/empty_result.png" alt="">
            </div>
        </div>
    HTML;
}
