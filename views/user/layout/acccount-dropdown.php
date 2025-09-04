<?php if(is_login()) : // Nếu đã đăng nhập?>
    <a href="<?= URL ?>lich-su-mua-hang" class="nav-link text-light">
        <div class="btn btn-outline-light rounded-circle me-2" title="Nhấn vào để chuyển hướng">
            <i class="bi bi-person-check fs-5"></i>
        </div>
        <span class="d-lg-none small">
            Xem lịch sử mua hàng
        </span>
    </a>
<?php else : // Nếu chưa?>
    <a href="<?= URL ?>dang-nhap" class="btn btn-outline-light rounded-circle me-2" title="Nhấn vào để chuyểnh hướng đăng nhập">
        <i class="bi bi-person-fill fs-5"></i>
    </a>
<?php endif ?>
