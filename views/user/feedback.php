<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>lich-su-mua-hang" class="text-decoration-none text-dark">Danh sách đơn hàng</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Đánh giá đơn hàng</li>
        </ol>
    </nav>
</div>
<form action="" method="post">
    <div class="container px-0 py-3">
    <div class="d-flex align-items-center flex-column gap-3 bg-light rounded-3 py-5">
        <div class="col-12 col-lg-6">
            <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="fw-bold">
                        Mã đơn hàng
                    </div>
                    <div class="">
                        <?= $get_feedback['id_invoice'] ?>
                    </div>
                </div>
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="fw-bold">
                        Sản phẩm
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <img width="40" src="<?= URL_STORAGE.$get_feedback['path_product_image'] ?>" alt="">
                        <span>
                            <?= $get_feedback['name_product'] ?>
                        </span>
                    </div>
                </div>
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div class="fw-bold">
                        Thời gian mua
                    </div>
                    <div class="">
                        <?= format_time($get_feedback['created_at'],'ngày DD/MM/YYYY lúc hh:mm') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <label for="point" class="form-label text-success">Số điểm sao</label>
            <?php if($get_feedback['point_feedback']) : ?>
            <select disabled class="form-control" id="point">
                <?php for ($i=1; $i <= 5; $i++): ?>
                <option <?= ($get_feedback['point_feedback'] == $i) ? 'selected' : '' ?> ><?= $i ?> sao</option>
                <?php endfor ?>
            </select>
            <?php else : ?>
                <select name="point" class="form-control" id="point">
                    <?php for ($i=1; $i <= 5; $i++): ?>
                    <option <?= ($point == $i) ? 'selected' : '' ?> value="<?= $i ?>" ><?= $i ?> sao</option>
                    <?php endfor ?>
                </select>
            <?php endif ?>
        </div>
        <div class="col-12 col-lg-6">
            <label for="content" class="form-label text-success">Nội dung đánh giá</label>
            <?php if($get_feedback['content_feedback']) : ?>
            <textarea disabled rows="5" class="form-control" id="content" placeholder="Nội dung đánh giá"><?= $get_feedback['content_feedback'] ?></textarea>
            <?php else : ?>
            <textarea name="content" rows="5" class="form-control" id="content" placeholder="Nội dung đánh giá"></textarea>
            <?php endif ?>
        </div>
        <div class="col-12 col-lg-6 text-center">
            <?php if($get_feedback['content_feedback']) : ?>
                <button disabled type="button" class="btn btn-success">
                    Đã được đánh giá
                </button>
            <?php else : ?>
                <button name="create" type="submit" class="btn btn-success">
                    Gửi đánh giá
                </button>
            <?php endif ?>
        </div>
    </div>
</div>
</form>