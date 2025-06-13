<form action="" method="post">
    <div class="container py-3">
    <div class="d-flex align-items-center flex-column gap-3 bg-light rounded-3 py-5">
        <div class="col-12 col-lg-6">
            <div class="d-flex align-items-center justify-content-center gap-2">
                <img width="40" src="<?= URL_STORAGE.$get_feedback['path_product_image'] ?>" alt="">
                <span>
                    <?= $get_feedback['name_product'] ?>
                </span>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <label for="point" class="form-label text-success">Số điểm sao</label>
            <select rows="5" class="form-control" id="point">
                <option value="1">1 sao</option>
                <option value="2">2 sao</option>
                <option value="3">3 sao</option>
                <option value="4">4 sao</option>
                <option value="5">5 sao</option>
            </select>
        </div>
        <div class="col-12 col-lg-6">
            <label for="content" class="form-label text-success">Nội dung đánh giá</label>
            <textarea rows="5" class="form-control" id="content" placeholder="Nội dung đánh giá"></textarea>
        </div>
        <div class="col-12 col-lg-6 text-center">
            <button name="up_feedback" type="submit" class="btn btn-success">
                Gửi đánh giá
            </button>
        </div>
    </div>
</div>
</form>