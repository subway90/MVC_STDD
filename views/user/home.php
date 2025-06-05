<!-- JS Custom -->
<script src="<?= URL ?>assets/js/countdown-time.js"></script>

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
    <!-- Box Small Start -->
    <div class="row mt-2">
        <div class="col-6 col-md-3 col-lg-3 py-2">
            <div class="card border-0">
                <img src="<?= URL_STORAGE ?>box-index/8c5m4pa.png" alt="">
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3 py-2">
            <div class="card border-0">
                <img src="<?= URL_STORAGE ?>box-index/s23-ultra-63.png" alt="">
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3 py-2">
            <div class="card border-0">
                <img src="<?= URL_STORAGE ?>box-index/thu-cu_638466130644683857.png" alt="">
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3 py-2">
            <div class="card border-0">
                <img src="<?= URL_STORAGE ?>box-index/xiaomi-watch-2.png" alt="">
            </div>
        </div>
    </div>
    <!-- Flash Sale Start -->
    <div class="mt-4">
        <ul class="nav nav-tabs flex-column flex-lg-row align-items-center justify-content-lg-between bg-light pt-3 pb-2 mb-4 px-lg-3"
            id="myTab" role="tablist">
            <li class="">
                <p class="h3 text-flashsale"><strong>FLASH SALE ONLINE</strong></p>
            </li>

            <div class="d-flex mb-3 mb-lg-0">
                <li class="nav-item" role="presentation">
                    <button class="active btn btn-sm fw-bold btn-outline-success me-lg-4 me-1 px-lg-5 px-3" id="tabOne"
                        data-bs-toggle="tab" data-bs-target="#tabOnePane" type="button" role="tab">
                        Điện thoại
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="btn btn-sm fw-bold btn-outline-success me-lg-4 me-1 px-lg-5 px-3" id="tabTwo"
                        data-bs-toggle="tab" data-bs-target="#tabTwoPane" type="button" role="tab">
                        Laptop
                    </button>
                </li>
            </div>

            <!-- Time Countdown Start -->
            <li class="text-lg-start text-center">
                <div class="mb-1 text-flashsale fw-semibold">
                    Kết thúc sau
                </div>
                <div><span class="btn btn-sm btn-dark px-xl-2 px-5 fs-6 fw-bold mb-2" id="time"></div>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Tab pane flashsale first -->
            <div class="tab-pane fade show active" id="tabOnePane">
                <div id="carouselOne" class="carousel slide position-relative">
                    <span class="z-1 top-50 w-100 position-absolute d-flex justify-content-between">
                        <button style="width: 50px; height: 50px;" class="btn btn-success rounded-circle opacity-75"
                            data-bs-target="#carouselOne" data-bs-slide="prev">
                            <i class="fa fa-lg fa-angle-left" aria-hidden="true"></i>
                        </button>
                        <button style="width: 50px; height: 50px;" class="btn btn-success rounded-circle opacity-75"
                            data-bs-target="#carouselOne" data-bs-slide="next">
                            <i class="fa fa-lg fa-angle-right" aria-hidden="true"></i>
                        </button>
                    </span>
                    <div class="carousel-indicators">
                        <button class="active" type="button" data-bs-target="#carouselOne" data-bs-slide-to="0"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button class="" type="button" data-bs-target="#carouselOne" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner pt-3 px-3 px-md-4 px-lg-4">
                        <div class="carousel-item active" data-bs-interval="4000">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-11/origin/iphone-11.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 11 64GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">9,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>18,900,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-12/origin/12-green.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 12 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">13,490,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>26,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-13/mini/13-mini-blue-pure.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">47%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 13 Mini 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">13,890,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>26,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-14/origin/14-blue-pure.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">47%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 14 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">16,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>32,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-14/plus/14plus-purple.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">48%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 14 Plus 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">19,690,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>38,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-15/plus/iphone-15-plus-blue-pure.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">50%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 15 Plus 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">22,890,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>44,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-11/origin/iphone-11.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 11 64GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">9,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>18,900,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-12/origin/12-green.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 12 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">13,490,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>26,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-13/mini/13-mini-blue-pure.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">47%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 13 Mini 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">13,890,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>26,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-14/origin/14-blue-pure.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">47%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 14 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">16,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>32,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-14/plus/14plus-purple.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">48%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 14 Plus 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">19,690,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>38,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                                    <div style="min-height: 100%;" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>phone/iphone/iphone-15/plus/iphone-15-plus-blue-pure.jpg"
                                                class="card-img img-product" alt="...">
                                            <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                                                class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">50%</span>
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 15 Plus 128GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">22,890,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>44,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tab pane flashsale second -->
            <div class="tab-pane fade" id="tabTwoPane">
                <div id="carouselTwo" class="carousel slide position-relative">
                    <span class="z-1 top-50 w-100 position-absolute d-flex justify-content-between">
                        <button style="width: 50px; height: 50px;" class="btn btn-success rounded-circle opacity-75"
                            data-bs-target="#carouselTwo" data-bs-slide="prev">
                            <i class="fa fa-lg fa-angle-left" aria-hidden="true"></i>
                        </button>
                        <button style="width: 50px; height: 50px;" class="btn btn-success rounded-circle opacity-75"
                            data-bs-target="#carouselTwo" data-bs-slide="next">
                            <i class="fa fa-lg fa-angle-right" aria-hidden="true"></i>
                        </button>
                    </span>
                    <div class="carousel-indicators">
                        <button class="active" type="button" data-bs-target="#carouselTwo" data-bs-slide-to="0"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button class="" type="button" data-bs-target="#carouselTwo" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner pt-3 px-3 px-md-4 px-lg-4">
                        <div class="carousel-item active" data-bs-interval="4000">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/acer/nitro-5-an515.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-danger">Limited</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Gaming Acer Nitro 5 AN515
                                                    8GB /512GB 144Hz
                                                    GTX 1650 i5 11440H</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">15,990,000 đ</span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/asus/expert-book-k1at5f.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Asus Expertbook K1AT5F
                                                    4GB/ 256GB i3
                                                    10110U 60Hz 14" Full HD</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">13,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>16,790,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/asus/tuf-gaming-f15.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Tuf Gaming F15 i5-11400H
                                                    RT X2050 8GB
                                                    /512GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">24,490,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>27,490,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/dell/inspiron-15-3520.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Dell Inspiron 15 3520 8GB
                                                    /512GB i5 12350U
                                                    15.6" 120Hz</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">14,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>17,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/hp/gaming-vitus-15.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">HP Gaming Vitus 15
                                                    RTX-3050 16GB /512GB
                                                    15.6"</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">19,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>22,790,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/lenovo/ideapad-1-a5tf7.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Lenovo Ideapad 1 A5TF7 8GB
                                                    /512GB 15.6"
                                                    R5-7250U</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">16,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>18,390,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="4000">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/acer/nitro-5-an515.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-danger">Limited</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Gaming Acer Nitro 5 AN515
                                                    8GB /512GB 144Hz
                                                    GTX 1650 i5 11440H</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">15,990,000 đ</span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/asus/expert-book-k1at5f.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Asus Expertbook K1AT5F
                                                    4GB/ 256GB i3
                                                    10110U 60Hz 14" Full HD</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">13,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>16,790,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/asus/tuf-gaming-f15.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Tuf Gaming F15 i5-11400H
                                                    RT X2050 8GB
                                                    /512GB</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">24,490,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>27,490,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/dell/inspiron-15-3520.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Dell Inspiron 15 3520 8GB
                                                    /512GB i5 12350U
                                                    15.6" 120Hz</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">14,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>17,990,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/hp/gaming-vitus-15.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">HP Gaming Vitus 15
                                                    RTX-3050 16GB /512GB
                                                    15.6"</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">19,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>22,790,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                                    <div style="min-height:100%" class="card shadow">
                                        <div class="position-relative hover-trigger">
                                            <img src="<?= URL_STORAGE ?>laptop/lenovo/ideapad-1-a5tf7.jpg" class="card-img"
                                                alt="...">
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
                                            <span class="badge bg-warning">KM</span>
                                            <span class="badge bg-success">Trả góp 0%</span>
                                            <span class="badge bg-info">Quà tặng</span>
                                        </div>
                                        <a class="text-decoration-none" href="detail.html">
                                            <div class="card-body">
                                                <h5 class="card-title fs-6 fw-bold text-dark">Lenovo Ideapad 1 A5TF7 8GB
                                                    /512GB 15.6"
                                                    R5-7250U</h5>
                                                <p class="card-text">
                                                    <span class="text-danger fw-bold me-1">16,990,000 đ</span>
                                                    <span
                                                        class="text-secondary small"><del><small>18,390,000</small></del></span>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--[PHONE] Ads Box Image -->
    <div class="container-fluid p-0">
        <a href="detail.html">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/ads-zflip-1.png" alt="">
                </div>
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 pe-lg-3 p-md-0 pe-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/ads-zflip-2.png" alt="">
                </div>
            </div>
        </a>
    </div>
    <!--[PHONE] Hot Area (HA) Start -->
    <div class="container mt-5">
        <div class="row">
            <div class="title col-12 col-md-6 col-lg-3 bg-success text-light text-uppercase py-2 my-3 fw-bold">
                điện thoại nổi bật
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>phone/iphone/iphone-11/origin/iphone-11.jpg" class="card-img img-product"
                            alt="...">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                            class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">iPhone 11 64GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">9,990,000 đ</span>
                                <span class="text-secondary small"><del><small>18,900,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>phone/iphone/iphone-12/origin/12-green.jpg" class="card-img img-product"
                            alt="...">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                            class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">iPhone 12 128GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">13,490,000 đ</span>
                                <span class="text-secondary small"><del><small>26,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>phone/iphone/iphone-13/mini/13-mini-blue-pure.jpg"
                            class="card-img img-product" alt="...">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                            class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">47%</span>
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">iPhone 13 Mini 128GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">13,890,000 đ</span>
                                <span class="text-secondary small"><del><small>26,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>phone/iphone/iphone-14/origin/14-blue-pure.jpg"
                            class="card-img img-product" alt="...">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                            class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">47%</span>
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">iPhone 14 128GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">16,990,000 đ</span>
                                <span class="text-secondary small"><del><small>32,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>phone/iphone/iphone-14/plus/14plus-purple.jpg"
                            class="card-img img-product" alt="...">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                            class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">48%</span>
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">iPhone 14 Plus 128GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">19,690,000 đ</span>
                                <span class="text-secondary small"><del><small>38,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>phone/iphone/iphone-15/plus/iphone-15-plus-blue-pure.jpg"
                            class="card-img img-product" alt="...">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px"
                            class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">50%</span>
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">iPhone 15 Plus 128GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">22,890,000 đ</span>
                                <span class="text-secondary small"><del><small>44,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center mt-3">
            <a href="product.html" class="btn btn-success rounded-pill px-5 px-md-4 px-lg-3">Xem thêm</a>
        </div>
    </div>

    <!--[LAPTOP] Ads Box Image -->
    <div class="container-fluid p-0 mt-5">
        <a href="detail.html">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/ads-pc2-1.png" alt="">
                </div>
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 pe-lg-3 p-md-0 pe-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/ads-pc2-2.png" alt="">
                </div>
            </div>
        </a>
    </div>
    <!--[LAPTOP] Hot Area (HA) Start -->
    <div class="container mt-5">
        <div class="row">
            <div class="title col-12 col-md-6 col-lg-3 bg-success text-light text-uppercase py-2 my-3 fw-bold">
                laptop nổi bật
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>laptop/acer/nitro-5-an515.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-danger">Limited</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                        <span class="badge bg-info">Quà tặng</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">Gaming Acer Nitro 5 AN515 8GB /512GB 144Hz
                                GTX 1650 i5 11440H</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">15,990,000 đ</span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>laptop/asus/expert-book-k1at5f.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">Asus Expertbook K1AT5F 4GB/ 256GB i3
                                10110U 60Hz 14" Full HD</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">13,990,000 đ</span>
                                <span class="text-secondary small"><del><small>16,790,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>laptop/asus/tuf-gaming-f15.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                        <span class="badge bg-info">Quà tặng</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">Tuf Gaming F15 i5-11400H RT X2050 8GB
                                /512GB</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">24,490,000 đ</span>
                                <span class="text-secondary small"><del><small>27,490,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>laptop/dell/inspiron-15-3520.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                        <span class="badge bg-info">Quà tặng</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">Dell Inspiron 15 3520 8GB /512GB i5 12350U
                                15.6" 120Hz</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">14,990,000 đ</span>
                                <span class="text-secondary small"><del><small>17,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>laptop/hp/gaming-vitus-15.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                        <span class="badge bg-info">Quà tặng</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">HP Gaming Vitus 15 RTX-3050 16GB /512GB
                                15.6"</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">19,990,000 đ</span>
                                <span class="text-secondary small"><del><small>22,790,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>laptop/lenovo/ideapad-1-a5tf7.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-success">Trả góp 0%</span>
                        <span class="badge bg-info">Quà tặng</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">Lenovo Ideapad 1 A5TF7 8GB /512GB 15.6"
                                R5-7250U</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">16,990,000 đ</span>
                                <span class="text-secondary small"><del><small>18,390,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a href="product.html" class="btn btn-success rounded-pill px-5 px-md-4 px-lg-3">Xem thêm</a>
        </div>
    </div>

    <!--[PHỤ KIỆN] Ads Box Image -->
    <div class="container-fluid p-0  mt-5">
        <a href="detail.html">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/free-clip-1.jpg" alt="">
                </div>
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 pe-lg-3 p-md-0 pe-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/free-clip-2.jpg" alt="">
                </div>
            </div>
        </a>
    </div>
    <!--[PHỤ KIỆN] Hot Area (HA) Start -->
    <div class="container mt-5">
        <div class="row">
            <div class="title col-12 col-md-6 col-lg-3 bg-success text-light text-uppercase py-2 my-3 fw-bold">
                Phụ kiện nổi bật
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-2 pb-1 pb-md-2 pb-lg-2">
                <div style="min-height:100%" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?= URL_STORAGE ?>accesories/huawei/freeclip-huawei.jpg" class="card-img" alt="...">
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
                        <span class="badge bg-warning">KM</span>
                        <span class="badge bg-danger">Limited</span>
                    </div>
                    <a class="text-decoration-none" href="detail.html">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark">Tai nghe Bluetooth HUAWEI FreeClip</h5>
                            <p class="card-text">
                                <span class="text-danger fw-bold me-1">4,290,000 đ</span>
                                <span class="text-secondary small"><del><small>4,990,000</small></del></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-success rounded-pill px-5 px-md-4 px-lg-3 disabled">Xem thêm</button>
        </div>
    </div>

    <!--[THE LAST] Ads Box Image -->
    <div class="container-fluid p-0 mt-5">
        <a href="detail.html">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/ads-pc-1-1.png" alt="">
                </div>
                <div class="col-12 col-md-6 col-lg-6 p-lg-0 pe-lg-3 p-md-0 pe-md-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>ads/ads-pc-1-2.png" alt="">
                </div>
            </div>
        </a>
    </div>
    <!-- [NEWS] Box News Start -->
    <div class="container mt-5">
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
    </div>
</div>