<?php

model('user','product');

// Tìm kiếm theo từ khoá
if(isset($_GET['key']) && $_GET['key']) {
    // lấy từ khoá
    $key = $_GET['key'];

    // query
    $count_product = search_count_product($key);
    $list_result = search_product($key);

    // render
    $url_storage = URL_STORAGE;
    // head
    $render_html = 
    <<<HTML
        <div class="fs-small text-muted text-uppercase mb-1 d-flex align-items-center gap-1">
            <div>kết quả tìm kiếm</div>
            <i class="bi bi-dot"></i>
            <div>{$count_product} sản phẩm</div>
        </div>
        <div class="d-flex flex-column gap-1">
    HTML;
    // has data
    if(!empty($list_result)) {
        // list product
        foreach ($list_result as $result) :
            extract($result);
            // render price
            // null sale price
            if(!$sale_price_product) {
                $price_product = format_currency($price_product);
                $render_price = 
                <<<HTML
                    <div class="fs-small-price fw-bold text-success">
                        {$price_product}
                    </div>
                HTML;
            }
            // has sale price
            else {
                $price_product = format_currency($price_product);
                $sale_price_product = format_currency($sale_price_product);
                $render_price =
                <<<HTML
                    <div class="fs-small-price fw-bold text-success">
                        {$sale_price_product}
                    </div>
                    <div class="fs-small-price fw-semi text-muted text-decoration-line-through">
                        {$price_product}
                    </div>
                HTML;
            }
            $render_html .= 
            <<<HTML
                <a href="/chi-tiet/{$slug_product}" class="row-search-product">
                    <img width="52" class="rounded-2" src="{$url_storage}{$path_product_image}" alt="">
                    <div class="d-flex flex-column">
                        <div class="text-muted fw-semi small">
                            {$name_product}
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <img width="10" src="{$url_storage}{$logo_brand}" alt="">
                            <span class="text-muted fs-small">{$name_brand}</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            {$render_price}
                        </div>
                    </div>
                </a>
            HTML;
        endforeach;

        // link
        if($count_product > LIMIT_SEARCH_PRODUCT) {
            $render_html .=
            <<<HTML
                <div class="text-center">
                    <a href="/tim-kiem?keyword={$key}" class="text-success fw-semibold small">Xem tất cả {$count_product} sản phẩm</a>
                </div>
            HTML;
        }
    }
    // empty data
    else {
        $render_html .=
        <<<HTML
            <div class="d-flex flex-column  align-items-center gap-1">
                <img width="80" src="{$url_storage}system/empty_result.png" alt="">
                <div class="text-muted small">
                    Không sản phẩm nào trùng khớp với từ khoá
                </div>
            </div>
        HTML;
    }
    // foot
    $render_html .=
    <<<HTML
        </div>
    HTML;

    //return
    return view_json(
        200,
        [
            'data' => $render_html
        ]
    );
}
else view_error(404);