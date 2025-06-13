<!-- Breadcrumb -->
<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">
                <a href="index.html" class="text-decoration-none text-success">Trang chủ</a>
            </li>
            <li class="breadcrumb-item fw-bold">
                <a href="product.html" class="text-decoration-none text-success">Điện thoại</a>
            </li>
            <li class="breadcrumb-item fw-bold">
                <a href="#" class="text-decoration-none text-dark">
                    Chi tiết sản phẩm
                </a>
            </li>

        </ol>
    </nav>
</div>

<!-- Modal cho ảnh phóng to -->
<div class="modal fade bg-dark bg-opacity-50" id="fullscreenModal" tabindex="-1" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <button style="z-index:9999" type="button" class="shadow position-fixed end-0 btn btn-light rounded-circle m-3 m-lg-5" data-bs-dismiss="modal">
        <i class="bi bi-x-lg fs-4"></i>
    </button>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex flex-column align-items-center mt-5 mt-lg-0">
                <img id="fullscreenImage" src="" alt="">
                <!-- [ẢNH NHỎ] -->
                <div class="position-fixed fixed-bottom">
                    <div class="d-flex justify-content-center flex-wrap w-100 top-50 mb-2">
                        <?php foreach($detail_product['array_image'] as $image): extract($image)?>
                        <img class="sm-img-modal m-2 shadow" src="<?= URL_STORAGE.$path_product_image ?>" onclick="openFullscreen(this.src)">
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row mt-3">
        <div class="col-12 col-md-12 col-lg-4">
            <div id="galery-product" class="carousel slide">
                <!-- [ẢNH LỚN] -->
                <div class="carousel-inner position-relative">
                <?php if($detail_product['array_image']) : ?>
                    <?php foreach($detail_product['array_image'] as $i => $image): extract($image)?>
                    <div class="<?= $i == 0 ? 'active' : '' ?> carousel-item">
                        <img class="w-100" src="<?= URL_STORAGE.$path_product_image?>" alt="" onclick="openFullscreen(this.src)">
                    </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="active carousel-item">
                        <img class="w-100" src="<?= DEFAULT_IMAGE?>" alt="" onclick="openFullscreen(this.src)">
                    </div>
                <?php endif ?>
                </div>
                <span class="position-absolute top-50 w-100 d-flex justify-content-between px-2">
                    <button class="btn bg-success text-light rounded-pill" data-bs-target="#galery-product" data-bs-slide="prev">
                        <i class="fa fa-lg fa-angle-left" aria-hidden="true"></i>
                    </button>
                    <button class="btn bg-success text-light rounded-pill " data-bs-target="#galery-product" data-bs-slide="next">
                        <i class="fa fa-lg fa-angle-right" aria-hidden="true"></i>
                    </button>
                </span>
            </div>
            <div class="container mt-3 d-flex justify-content-center">
                <!-- [ẢNH NHỎ] -->
                <div class="row d-flex justify-content-center">
                <?php foreach($detail_product['array_image'] as $i => $image): extract($image)?>
                    <button class="col-2 p-0 m-1 border-0 hover-btn-galery-product" data-bs-target="#galery-product"
                    data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i+1 ?>">
                    <img class="w-100" src="<?= URL_STORAGE.$path_product_image ?>">
                    </button>
                <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-5">
            <form action="/gio-hang" method="post">
                <div class="row">
                    <div class="col-12 fw-semibold fs-4 mb-2">
                        <?= $detail_product['name_product'] ?>
                    </div>
                    <div class="col-12 d-flex mb-2">
                        <a href="#" class="bg-light border border-success text-muted fw-semibold rounded-5 small px-2 text-decoration-none d-flex align-items-center me-1 gap-1">
                            <img height="14" src="<?= URL_STORAGE . $detail_product['logo_brand'] ?>" alt="$detail_product['logo_brand']">
                            <?= $detail_product['name_brand'] ?>
                        </a>
                    </div>
                     <?php if(isset($detail_product['array_model']) && count($detail_product['array_model']) > 1) : // Render list model ?>
                    <div class="col-12">
                        <div class="text-start small mb-1 fw-semibold">Lựa chọn loại</div>
                        <div class="mb-3">
                            <?php foreach ($detail_product['array_model'] as $model) : extract($model) ?>
                            <a href="<?= URL.'chi-tiet/'.$slug_product ?>" class="<?= $detail_product['id_model'] == $id_model ? 'active' : '' ?> btn btn-sm btn-outline-success">
                                <small><?= $name_model ?></small>
                            </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if(isset($detail_product['array_color'])) : // Render list color ?>
                    <div class="col-12">
                        <div class="text-start small mb-1 fw-semibold">Lựa chọn màu</div>
                        <div class="mb-3">
                            <?php foreach ($detail_product['array_color'] as $color) : extract($color) ?>
                            <a href="<?= URL.'chi-tiet/'.$slug_product ?>" class="<?= $detail_product['id_color'] == $id_color ? 'active' : '' ?> btn btn-sm btn-outline-success mb-1">
                                <div class="d-flex align-items-center">
                                    <div style="background-color: <?= $code_color ?>" class="box-color me-2"></div>
                                    <small><?= $name_color ?></small>
                                </div>
                            </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if($detail_product['sale_price_product']) : ?>
                    <div class="col-12 d-flex align-items-center">
                        <div class="me-2 fs-6">Giá :</div>
                        <div class="fw-bold text-danger fs-5"><?=number_format($detail_product['sale_price_product'],0,',','.') ?> vnđ</div>
                    </div>
                    <div class="col-12 d-flex align-items-center">
                        <div class="text-muted text-decoration-line-through"><?=number_format($detail_product['price_product'],0,',','.') ?> vnđ</div>
                        <div class="me-2 text-danger ms-2"> Giảm <?=number_format($detail_product['price_product']-$detail_product['sale_price_product'],0,',','.') ?> vnđ</div>
                    </div>
                    <?php else : ?>
                    <div class="col-12 d-flex align-items-center">
                        <div class="me-2 fs-6">Giá :</div>
                        <div class="fw-bold text-danger fs-5"><?=number_format($detail_product['price_product'],0,',','.') ?> vnđ</div>
                    </div>
                    <?php endif ?>
                    <!-- [MUA - TRẢ GÓP - GIỎ HÀNG] -->
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-12 col-lg-10 px-1">
                                <button name="buy_now" type="submit" value="<?=$detail_product['id_product']?>" class="w-100 btn btn-success bg-gradient">
                                    MUA NGAY
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-12 col-lg-3 mt-2 mt-lg-0">
            <table class="table table-hover table-bordered small">
                <thead>
                    <th class="bg-success bg-opacity-75 text-light text-center" scope="col" colspan="2">
                    Thông số kỹ thuật
                    </th>
                </thead>
                <tbody>
                <?php if($detail_product['array_attribute']) : // nếu có attribute ?>
                    <?php (count($detail_product['array_attribute']) > 10 ? $limit_row = LIMIT_ROW_ATTRIBUTE : $limit_row = count($detail_product['array_attribute'])) // lấy limit số dòng ?>
                    <?php for ($i=0; $i < $limit_row; $i++) : extract($detail_product['array_attribute'][$i]) // vòng lặp in attribute ?>
                    <tr>
                        <th class="small"><?= $name_attribute ?></th>
                        <td class="small align-middle" colspan="1"><?= $value_attribute ?></td>
                    </tr>
                    <?php endfor ?>
                    <?php if($limit_row == LIMIT_ROW_ATTRIBUTE) : // nếu số dòng bằng limit quy định ?>
                    <tr>
                        <td class="bg-success bg-opacity-75 text-light small text-center" colspan="2"
                            data-bs-toggle="modal" data-bs-target="#detailProduct">
                            Xem tất cả thông số
                        </td>
                    </tr>
                    <?php endif ?>
                <?php else : // chưa có thông số ?>
                    <tr>
                        <td conspan="2" class="small text-center align-middle" colspan="1">Chưa có thông số</td>
                    </tr>
                <?php endif ?>
                </tbody>
            </table>
        </div>

        <?php if($limit_row = LIMIT_ROW_ATTRIBUTE ) : // nếu số dòng bằng limit quy định ?>
        <!-- [Modal] Chi tiết thông số kỹ thuật -->
        <div class="col-12">
            <div class="modal fade" id="detailProduct" tabindex="-1" aria-labelledby="labelDP" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-success" id="labelDP">Tất cả thông số kĩ thuật</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered small">
                                <tbody>
                                    <?php foreach ($detail_product['array_attribute'] as $attribute) : extract($attribute) // vòng lặp in attribute ?>
                                    <tr>
                                        <th class="small"><?= $name_attribute ?></th>
                                        <td class="small align-middle" colspan="1"><?= $value_attribute ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

       <div class="col-12 d-flex flex-column flex-lg-row py-3">
            <!-- Description -->
            <div class="col-12 col-lg-7 py-3">
                <div class="w-100 mb-4">
                <span class="text-uppercase text-success h6">
                    mô tả
                </span>
                <hr class="border border-2 border-success m-0 mt-1">
            </div>
                <?= $detail_product['description_product'] ?>
            </div>
            
            <!-- Feedback -->
            <div class="col-12 col-lg-5 py-3 ps-lg-5">
                <div class="w-100 mb-4">
                <span class="text-uppercase text-success h6">
                    đánh giá
                </span>
                <hr class="border border-2 border-success m-0 mt-1">
                <div class="d-flex flex-column gap-2     p-2">
                    
                    <div class="d-flex align-items-center">
                        <div class="text-muted small">
                            Có 2 lượt đánh giá
                        </div>
                        <i class="bi bi-dot mx-1"></i>
                        <small>
                            <span class="text-muted me-1">
                                4.5 / 5
                            </span>
                            <i class="bi bi-star-fill text-warning"></i>
                        </small>
                    </div>
                    
                    <!-- Card Feedback -->
                    <div class="bg-light border-3 p-3">
                        <!-- Info User -->
                        <div class="d-flex align-items-center gap-2 pb-3">
                            <img class="rounded-circle" width="48" src="<?= DEFAULT_AVATAR ?>" alt="avatar">
                            <div class="small">
                                <div class="fw-bold small">
                                    Nguyễn Hữu Đức
                                </div>
                                <div class="small text-muted">
                                    <i class="far fa-clock small me-1"></i>
                                    <?= date('H:i d/m/Y') ?>
                                </div>
                            </div>
                        </div>
                        <!-- Point Star -->
                        <div class="d-flex gap-1">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                        </div>
                        <!-- Content Feedback -->
                        <div class="py-1 text-muted small">
                            Mới ra mắt liền múc liền luôn, sản phẩm quá đẹp !
                        </div>
                        <!-- Image Feedback -->
                         <div class="thumbnail-container">
                            <img class="thumbnail" width="50" src="<?= DEFAULT_IMAGE ?>" alt="hình ảnh đánh giá">
                            <div class="hover-text text-light"><i class="bi bi-zoom-in"></i></div>
                        </div>
                    </div>

                    <!-- Cart Feedback -->
                    <div class="bg-light border-3 p-3">
                        <!-- Info User -->
                        <div class="d-flex align-items-center gap-2 pb-3">
                            <img class="rounded-circle" width="48" src="<?= DEFAULT_AVATAR ?>" alt="avatar">
                            <div class="small">
                                <div class="fw-bold small">
                                    Nguyễn Quốc Huy
                                </div>
                                <div class="small text-muted">
                                    <i class="far fa-clock small me-1"></i>
                                    <?= date('H:i d/m/Y') ?>
                                </div>
                            </div>
                        </div>
                        <!-- Point Star -->
                        <div class="d-flex gap-1">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <!-- Content Feedback -->
                        <div class="py-1 text-muted small">
                            Giao hàng nhanh, giá vừa, sẽ ủng hộ cho shop lần sau
                        </div>
                        <!-- Image Feedback -->
                         <div class="thumbnail-container">
                            <img class="thumbnail" width="50" src="<?= DEFAULT_IMAGE ?>" alt="hình ảnh đánh giá">
                            <div class="hover-text text-light"><i class="bi bi-zoom-in"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
            
       </div>

        <div class="w-100">
            <div class="col-12 col-md-6 col-lg-4 mt-5">
                <span class="text-uppercase text-success h6">
                    sản phẩm liên quan
                </span>
                <hr class="border border-2 border-success m-0 mt-1">
            </div>
        </div>

        <div class="col-12 mt-4">
            <!-- [SẢN PHẨM LIÊN QUAN] -->
            <div class="row">
                <?= $render_recommend_product ?>
            </div>
        </div>

        <!-- Bình luận -->
        <!-- <div class="col-12">
            <form method="post">
                <div class="mt-5 d-flex justify-content-between align-items-center">
                    <div class="me-2">
                        <img width="45px" height="45px" src="uploads/user_default.jpg" alt="you-image"
                            class="rounded-circle border-1 border-success">
                    </div>
                    <div class="w-100">
                        <textarea name="message" class="form-control" rows="1" type="text"
                            placeholder="Nhập bình luận của bạn..."></textarea>
                    </div>
                    <button name="comment" type="submit" class="ms-2 btn px-3 btn-success">gửi</button>
                </div>
            </form>
            <p class="h6 mt-5">Bình luận được tải lên</p>
            <hr class="border-2 border-success">
            <table class="table table-hover">
                <tr>
                    <td style="width: 5%">
                        <img width="45px" height="45px" src="uploads/user_default.jpg" alt=""
                            class="rounded-circle border-1 border-success">
                    </td>
                    <td>
                        <div class="w-100 d-flex justify-content-between">
                            <span class="text-start">User Default |
                                <span class="text-end"><i class="small text-secondary">20:02 | 12/04/2024 </i>
                                </span>
                            </span>
                            <span>
                                <button class="btn btn-sm btn-outline-warning p-0 px-1 fw-sm">sửa</button>
                                <button class="btn btn-sm btn-outline-danger p-0 px-1 fw-sm">xóa</button>
                                <button class="btn btn-sm btn-outline-success p-0 px-1 fw-sm">trả lời</button>
                            </span>
                        </div>
                        <p class="small"> Sản phẩm này đẹp quá ! </p>
                    </td>
                </tr>
            </table>
            <div class="col-12 text-center">
                <button class="btn btn-outline-success text-center">Tải thêm bình luận</button>
            </div>

        </div> -->
    </div>
</div>

<?= layout('user','large-image') ?>