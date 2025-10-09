<!-- JS Custom -->
<script src="<?= URL ?>assets/js/countdown-time.js"></script>
<script src="<?= URL ?>assets/js/ajax_home.js"></script>

 <!-- Courasel Start -->
<div id="carousel_slide" class="container-fluid px-0 carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($list_slide as $i => $slide) : ?>
        <div class="carousel-item <?= ($i == 0) ? 'active' : '' ?>" data-bs-interval="<?= ($i==0) ? TIME_LOAD_SLIDE + 1500 : TIME_LOAD_SLIDE ?>">
            <a href="<?= ($slide['link_slide']) ? $slide['link_slide'] : '#' ?>" title="Nhấn để chuyển trang đến chương trình">
                <img src="<?= URL_STORAGE . $slide['path_slide'] ?>" class="d-block w-100" alt="<?= $slide['path_slide'] ?>">
            </a>
        </div>
        <?php endforeach ?>
    </div>
    <div class="carousel-indicators position-relative mt-3">
        <?php for ($i=0;$i<count($list_slide);$i++) : ?>
        <button type="button" data-bs-target="#carousel_slide" data-bs-slide-to="<?= $i ?>" class="<?= ($i == 0) ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $i+1 ?>"></button>
        <?php endfor ?>
    </div>
</div>

<div class="container p-0">
    
    <!-- Flash Sale Start -->
    <div class="container bg-light rounded-4 p-2 mb-5">
        <div id="dataFlashSale"></div>
    </div>

    <!-- Section Product Start -->
    <?php foreach($section_product as $section) : ?>
    
    <!-- Banner Section -->
    <div class="container-fluid p-0">
        <a href="<?= $section['info']['link_banner_section'] ?>">
            <div class="row">
                <div class="col-12 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                    <img class="w-100" src="<?= URL_STORAGE.$section['info']['banner_section'] ?>" alt="">
                </div>
            </div>
        </a>
    </div>

    <!-- Product Section -->
    <div class="container my-5">
        <div class="row">
            <div class="title col-12 col-md-6 col-lg-3 bg-success text-light text-uppercase py-2 my-3 fw-bold">
                <?= $section['info']['name_section'] ?>
            </div>
        </div>
        <div class="row">
            <!-- List Product -->
            <?php foreach ($section['list_product'] as $row) : 
                $get_product = render_product_for_card_by_id($row['id_product']);
            ?>
            <?= render_card_product_search($get_product) ?>
            <?php endforeach ?>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a href="<?= $section['info']['link_section'] ?>" class="btn btn-success rounded-pill px-5 px-md-4 px-lg-3">Xem thêm</a>
        </div>
    </div>
    <?php endforeach ?>


    <!-- [NEWS] Box News Start -->
    <!-- <div class="container mt-5">
        <div class="row">
            <div class="title col-12 col-md-6 col-lg-3 bg-success text-light text-uppercase py-2 my-3 fw-bold">
                tin tức mới nhất
            </div>
        </div>
        <div id="newsMH" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/samsung-galaxy-s23-ultra-camera-bump.jpg" class="card-img"
                                    height="200px;" alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Camera Samsung Galaxy 24 Ultra sẽ nhận được bản cập nhật lớn vào tháng tới
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/a55-thumb.jpg" class="card-img" height="200px;" alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Samsung A55 vừa ra mắt, hàng chục tính năng mới với hiệu năng cao của chip 687A
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/ASUS-2-2048x1538.jpg" class="card-img" height="200px;"
                                    alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    ASUS Tuf Gaming có những tiện ích gì trong sự lựa chọn dành cho sinh viên.
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/dung-ipad-hoc-tap.jpg" class="card-img" height="200px;"
                                    alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Cách dùng iPad trong mục đích học tập và giải trí hợp lí, tối ưu hiệu năng
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/oscal-brand-logo-news.jpg" class="card-img" height="200px;"
                                    alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Thương hiệu mới: OSCAL - Mang công nghệ hiện đại đến tầm tay bạn
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/kv-new-1.jpeg" class="card-img" height="200px;" alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Kỷ niệm 1 năm khởi tạo dòng Vivo Extra 5G Lite, Vivo tung ra sản phẩm mới
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/vi-xu-ly-galaxy-s25-1.jpg" class="card-img" height="200px;"
                                    alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Đánh giá Galaxy S25 Ultra - camrera được ví như 'Mắt thần'
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/vivo-x-book-3.jpg" class="card-img" height="200px;"
                                    alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Sở hữu ngay Vivobook-3 vì những tiện ích ngon này dành cho bạn.
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-2 pb-lg-0">
                            <div class="card hover-trigger position-relative">
                                <img src="<?= URL_STORAGE ?>blog/samsung-galaxy-s23-ultra-camera-bump.jpg" class="card-img"
                                    height="200px;" alt="...">
                                <span
                                    class="position-absolute bottom-0 text-light fw-bold fs-6 px-2 pb-2 bg-success bg-opacity-50 text-start w-100">
                                    Camera Samsung Galaxy 24 Ultra sẽ nhận được bản cập nhật lớn vào tháng tới
                                </span>
                                <span class="show-hover position-absolute w-100 text-center"><a
                                        class="btn btn-outline-success fw-bold" href="blog-detail.html">Nhấn xem tất
                                        cả</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="blog.html"><button class="btn btn-small btn-outline-success mx-1">Xem tất
                        cả</button></a>
            </div>
        </div>
    </div> -->
</div>