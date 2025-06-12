<div class="container">
    <div class="d-flex flex-wrap py-2 py-lg-5">
        <div class="col-12 h5">
            <span class="fw-bold text-succes">
                Từ khoá tìm kiếm :
            </span>
            <span class="text-green">
                <?= $keyword_old ?>
            </span>
        </div>
        <div class="col-12 text-muted mb-3">
            Có <?= $count ?> kết quả được tìm thấy
        </div>

        <?= $result ?>
    </div>
</div>