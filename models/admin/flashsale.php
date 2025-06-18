<?php

function render_show_flashsale($type) {

    // validate type
    if($type === 'today') $time_section_start = date('Y-m-d');
    else {

    }

    // variable
    $render = '';

    // get section flashsale
    $get_flashsale = pdo_query_one_new(
        'SELECT * FROM flashsale WHERE time_start_flashsale >= ? ORDER BY time_start_flashsale ASC'
        ,$time_section_start
    );

    $get_product_flashsale = pdo_query_new(
        'SELECT fp.*, p.name_product, p.slug_product, p.price_product, pi.path_product_image, b.name_brand, b.logo_brand
        FROM flashsale_product fp
        LEFT JOIN product p ON p.id_product = fp.id_product
        LEFT JOIN brand b ON b.id_brand = p.id_brand
        LEFT JOIN product_image pi ON pi.id_product = p.id_product
        WHERE fp.id_flashsale = ?
        GROUP BY fp.id_product'
        ,$get_flashsale['id_flashsale']
    );

    // render banner
    $path_banner = URL_STORAGE . $get_flashsale['banner_flashsale'];
    $render .= <<<HTML
        <img class="w-100" src="{$path_banner}" alt="Banner chương trình flashsale">
    HTML;

    // render button change event
    $render .= <<<HTML
    <div class="d-flex gap-2 py-2">
        <button type="submit" class="btn-flashsale p-2 p-lg-3 d-flex flex-column align-items-center gap-lg-2 active">
            <h6 class="text-flashsale fw-bold">
                {$get_flashsale['name_flashsale']}
            </h6>
            <!-- <div class="d-flex flex-column flex-lg-row align-items-center">
                <div class="text-flashsale small fw-bold mb-2 mb-lg-0 me-lg-2">
                    Bắt đầu sau
                </div>
                <div class="d-flex align-items-center gap-1">
                    <span id="hours" class="box-time-flashsale">
                        05
                    </span>
                    <span class="text-flashsale small">:</span>
                    <span id="minute" class="box-time-flashsale">
                        12
                    </span>
                    <span class="text-flashsale small">:</span>
                    <span id="second" class="box-time-flashsale">
                        59
                    </span>
                </div>
            </div> -->
        </button>
        <button type="submit" class="btn-flashsale p-2 p-lg-3 d-flex flex-column align-items-center gap-lg-2">
            <h6 class="text-flashsale">
                Sale đặc biệt cuối tuần
            </h6>
            <!-- <div class="d-flex align-items-center flex-column flex-lg-row">
                <div class="text-flashsale small mb-2 mb-lg-0 me-lg-2">
                    Diễn ra ngày
                </div>
                <div class="d-flex align-items-center gap-1">
                    <span class="box-time-flashsale">
                        15/06
                    </span>
                    <span class="text-flashsale small mx-1">
                        lúc
                    </span>
                    <span class="box-time-flashsale">
                        12 giờ 00 phút
                    </span>
                </div>
            </div> -->
        </button>
    </div>
    HTML;
    
    // render carousel
    $render .= <<<HTML
    <div id="carousel_flashsale" class="container-fluid px-0 carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
    HTML;

    // render carousel tab
    $total_tab_carousel = ceil(count($get_product_flashsale)/6);
    for ($i=0; $i < $total_tab_carousel; $i++) { 
        $test[] = ['total_tab_carousel' => $total_tab_carousel];
    
    // format 
    if($i == 0) $active_carousel = 'active';
    else $active_carousel = '';

    // test_array([$total_tab_carousel,count($get_product_flashsale)]);
    
    $render .= <<<HTML
            <div class="carousel-item {$active_carousel}" data-bs-interval="4000">
                <div class="d-flex">
    HTML;
    
    // đếm số lượng sp còn lại chưa được render

    $current_count_slot = count($get_product_flashsale) - 6 * $i;
    // nếu lớn hơn 6 slot, cho tối đa mỗi lần render được 6
    if($current_count_slot > 6) $current_count_slot = 6; 
    
    // render product card in tab
    for ($j=0; $j < $current_count_slot; $j++) { 
        extract($get_product_flashsale[$i*6+$j]);
        $url_storage = URL_STORAGE;
        $value_sale = number_format($price_product-$price_flashsale,0,'.','.');
        $price_product =  number_format($price_product,0,'.','.');
        $price_flashsale = number_format($price_flashsale,0,'.','.');
        $render .= <<<HTML
                <div class="col-6 col-lg-2 p-1 pt-lg-0 pb-lg-2">
                    <div style="min-height: 100%;" class="card rounded-0">
                        <img src="{$url_storage}{$path_product_image}" class="card-img img-product" alt="{$path_product_image}">
                        <div class="mx-2 d-flex">
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
                                        <div class="text-secondary small">
                                            <del><small>{$price_product}vnđ</small></del>
                                        </div>
                                        <div class="text-flashsale fw-bold me-1">{$price_flashsale} vnđ</div>
                                    </div>
                                </a>
                                <form method="post" action="/gio-hang">
                                    <div class="d-flex justify-content-between mt-2">
                                        <input type="hidden" class="idProduct" value="{$id_product}">
                                        <button type="submit" name=buy_now value="{$id_product}" class="btn btn-sm btn-buy-flashsale rounded-0 flex-grow-1"><i class="bi bi-cart-check me-2"></i><small>Mua ngay</small></button>
                                        <button type="button" id="addCartBtn" class="btn btn-sm btn-outline-buy-flashsale rounded-0 ms-1"><i class="bi bi-cart-plus"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        HTML;
    }
    
    // render end tab
    $render .= <<<HTML
                </div>
            </div>
    HTML;

    }

    // render button slide
    $render_button = ''; 
    for ($i=0; $i < $total_tab_carousel; $i++) { 
        ($i == 0) ? $active_button_carousel = 'active' : $active_button_carousel = '';
        $value_slide = $i+1;
        $render_button .= <<<HTML
            <button type="button" data-bs-target="#carousel_flashsale" data-bs-slide-to="{$i}" class="{$active_button_carousel}" aria-current="true" aria-label="Slide {$value_slide}"></button>
        HTML;
    }

    // render other
    $render .= <<<HTML
        </div>
        <div class="carousel-indicators position-relative mt-3">
            {$render_button}
        </div>
    </div>
    HTML;
    return $render;
}

/**
 * Lấy danh sách chương trình flashsale
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_flashsale($state) {
    if($state) {
        $query = 'IS NULL';
        $order = 'f.created_at';
    }
    else {
        $query = 'IS NOT NULL';
        $order = 'f.deleted_at';
    }

    return pdo_query(
        'SELECT f.*, COUNT(p.id_product) count_product
        FROM flashsale f
        LEFT JOIN flashsale_product fp ON f.id_flashsale = fp.id_flashsale
        LEFT JOIN product p ON p.id_product = fp.id_product
        WHERE f.deleted_at '.$query.'
        GROUP BY f.id_flashsale
        ORDER BY '.$order.' DESC'
    );
}


/**
 * Lấy chi tiết flashsale
 * @param $id ID Flashsale
 * @return array
 */
function get_detail_flashsale($id) {
    $result['detail'] = pdo_query_one_new(
        'SELECT *
        FROM flashsale
        WHERE id_flashsale = ?
        AND deleted_at IS NULL'
        ,$id
    );

    $result['list_product'] = pdo_query_new(
        'SELECT fp.*,p.name_product, p.slug_product, p.price_product, pi.path_product_image
        FROM flashsale_product fp
        LEFT JOIN product p ON p.id_product = fp.id_product
        LEFT JOIN product_image pi ON pi.id_product = p.id_product
        WHERE id_flashsale = ?
        AND fp.deleted_at IS NULL
        GROUP BY p.id_product'
        ,$id
    );

    return $result;
}

function get_one_product_for_add_flashsale($id) {
    // lấy thông tin sản phẩm
    return pdo_query_one_new(
        'SELECT p.id_product, p.name_product, p.quantity_product, p.price_product, pi.path_product_image
        FROM product p
        LEFT JOIN product_image pi ON pi.id_product = p.id_product
        WHERE p.id_product = ?
        AND p.deleted_at IS NULL
        GROUP BY p.id_product',
        $id
    );
}