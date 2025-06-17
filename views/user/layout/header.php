<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- CDN bootstrap icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN JS Bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <!-- CDN CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- CDN JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php if(auth('username') !== 'admin') :?>
    <!-- Chative -->
    <script src="https://messenger.svc.chative.io/static/v1.0/channels/sdf134656-9da4-4ef5-8497-bcc949bda598/messenger.js?mode=livechat" defer="defer"></script>
    <?php endif ?>
    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= URL ?>assets/css/custom.css">
    <!-- JS Custom -->
    <script src="<?= URL ?>assets/js/custom.js"></script>
    <!-- JS Ajax Product -->
    <script src="<?= URL ?>assets/js/ajax_product.js"></script>
    <!-- JS Ajax Cart -->
    <script src="<?= URL ?>assets/js/ajax_cart.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= WEB_FAVICON ?>" type="image/x-icon">
    <!-- Title -->
    <title><?= isset($title) ? $title : WEB_NAME ?></title>
</head>

<?= toast_show() ?>

<body class="bg-secondary bg-opacity-10">

    <?php if(BOOL_SPINNER) : ?>
    <div id="spinner">
        <div  style="width: 8px; height: 8px;" class="spinner-grow text-danger" role="status">
        </div>
        <div  style="width: 12px; height: 12px;" class="spinner-grow text-warning mx-2" role="status">
        </div>
        <div  style="width: 16px; height: 16px;" class="spinner-grow text-success" role="status">
        </div>
        <div  style="width: 20px; height: 20px;" class="spinner-grow text-danger mx-2" role="status">
        </div>
        <div  style="width: 24px; height: 24px;" class="spinner-grow text-warning" role="status">
        </div>
    </div>
    <?php endif ?>

    <div id="messageCart"></div>

    <nav class="sticky-top navbar navbar-expand-lg navbar-light bg-success py-3">
        <div class="container p-lg-0">
            <button class="d-lg-none btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasMenu" aria-controls="offCanvasMenu"><i class="bi bi-list fs-5"></i></button>
            <a class="navbar-brand text-light fw-bold fst-italic text-decoration-underline" href="<?= URL ?>">
                <?= WEB_NAME ?>
            </a>
            <button class="d-lg-none btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasSearch" aria-controls="offCanvasSearch"><i class="bi bi-search fs-5"></i></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item mx-lg-3">
                        <button type="button" class="btn btn-outline-light py-1 rounded-5 d-none d-lg-flex align-items-center text-nowrap ">
                            <i class="bi bi-list fs-4 me-2"></i>
                            <span class="fw-semibold">Danh mục</span>
                        </button>
                        <div class="dropdown-menu py-3">
                        <?php foreach (list_category_for_menu() as $item) : extract($item) ?>
                            <div class="dropdown-item position-relative">
                                <a class="link-dropdown" href="<?= URL.'danh-muc/'.$category_v1['slug'] ?>">
                                    <div class="my-1 py-1 d-flex align-items-center gap-2">
                                        <img width="24" src="<?= URL_STORAGE . $category_v1['logo'] ?>" alt="<?= $category_v1['logo'] ?>">
                                        <?= $category_v1['name'] ?>
                                    </div>
                                </a>
                                <div class="submenu p-1">
                                    <?php if(empty($category_v2)) : ?>
                                    <a class="me-5 dropdown-item d-flex align-items-center disabled fst-italic" href="#">
                                        (Chưa có danh mục)
                                    </a>
                                    <?php else : ?>
                                        <?php  foreach ($category_v2 as $item) : extract($item) ?>
                                        <a class="me-5 py-2 dropdown-item d-flex align-items-center" href="<?= URL.'danh-muc/'.$category_v1['slug'].'/'.$slug ?>">
                                            <?= $name ?>
                                        </a>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </li>
                    <form action="/tim-kiem" method="get">
                    <li class="nav-item input-group">
                        <input type="text" name="keyword" value="<?= isset($keyword_old) ? $keyword_old : '' ?>" class="form-control rounded-end-0 rounded-5 search-input ps-3" placeholder="Bạn muốn tìm gì ?">
                        <button type="submit" class="btn btn-small btn-light rounded-start-0 rounded-5 pe-3 text-success search-btn">
                            <i class="bi fs-5 bi-search"></i>
                        </button>
                    </li>
                    </form>
                    <form action="/thong-bao" method="post">
                    <li class="nav-item mx-lg-1">
                        <button type="button" class="btn btn-outline-light rounded-5 d-none d-lg-flex align-items-center text-nowrap position-relative">
                            <i class="bi bi-bell fs-5"></i>
                            <?php $count_notify = count(get_all_notify()) ?>
                            <?php if($count_notify > 0) : ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $count_notify ?>
                            </span>
                            <?php endif ?>
                        </button>
                        <div class="dropdown-menu p-2">
                        <?php if($count_notify > 0) : ?>
                            <div class="p-1 small">
                                <span class="text-muted small">Có <span class="text-danger fw-semibold"><?= $count_notify ?></span> thông báo chưa đọc </strong></span>
                            </div>
                        <?php foreach (get_all_notify() as $notify) : extract($notify) ?>
                            <div class="dropdown-item notify bg-opacity-25 position-relative p-0 px-1 rounded-2">
                                <button type="submit" name="get_notify" value="<?= $id_notify ?>" class="nav-link small text-start" href="<?= $link_action_notify ?>">
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold small">
                                            <?= $title_notify ?>
                                        </div>
                                        <div class="small text-wrap">
                                            <?= $content_notify ?>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        <?php endforeach ?>
                        <?php else : ?>
                            <div class="dropdown-item notify bg-opacity-25 position-relative p-0 px-1 rounded-2">
                                <button type="submit" name="get_notify" value="<?= $id_notify ?>" class="nav-link small text-start" href="<?= $link_action_notify ?>">
                                    <div class="d-flex flex-column">
                                        <small>Chưa có thông báo nào</small>
                                    </div>
                                </button>
                            </div>
                        <?php endif ?>
                        </div>
                    </li>
                    </form>
                </ul>
                <a href="<?= URL ?>gio-hang" class="btn btn-outline-light position-relative rounded-circle me-2">
                    <i class="bi bi-cart fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <span id="countCart"></span>
                    </span>
                </a>
                <?= layout('user','acccount-dropdown') ?>
            </div>
        </div>
    </nav>

<div class="offcanvas offcanvas-top" tabindex="-1" id="offCanvasSearch" aria-labelledby="offCanvasSearchLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offCanvasSearchLabel">Tìm kiếm sản phẩm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="input-group border border-success">
            <input type="text" name="search_product" id="" class="form-control search-input ps-3" placeholder="Bạn muốn tìm gì ?">
            <button class="btn btn-small btn-light pe-3 text-success search-btn">
                <i class="bi fs-5 bi-search"></i>
            </button>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offCanvasMenu" aria-labelledby="offCanvasMenuLabel">
    <div class="offcanvas-header bg-success">
        <?= layout('user','acccount-dropdown') ?>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h5 class="offcanvas-title mb-3" id="offCanvasSearchLabel">Danh mục sản phẩm</h5>
        <div class="row p-0">
            <?php foreach (list_category_for_menu() as $item) : extract($item);?>
            <div class="col-6 my-3">
                <a class="nav-link link-success fw-bold" href="<?= URL.'danh-muc/'.$category_v1['slug'] ?>">
                    <?= $category_v1['name'] ?>
                </a>
                <div class="mt-2">
                    <?php if(empty($category_v2)) { ?>
                    <a class="dropdown-item d-flex align-items-center disabled fst-italic" href="#">
                        (Chưa có danh mục)
                    </a>
                    <?php }else{
                        foreach ($category_v2 as $item) { extract($item);
                    ?>
                    <a class="dropdown-item d-flex align-items-center" href="<?= URL.'danh-muc/'.$category_v1['slug'].'/'.$slug ?>">
                        <img width="32" class="me-2" src="<?= DEFAULT_IMAGE ?>" alt="<?= $logo ?>">
                        <?= $name ?>
                    </a>
                    <?php }} ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>