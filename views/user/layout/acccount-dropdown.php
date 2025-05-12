<?php if(is_login()) : // Nếu đã đăng nhập?>
<div class="dropdown border rounded-5 px-3 py-2">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-bs-toggle="dropdown">
        <span class="text-light">xin chào <span class="fw-bold"><?= auth('full_name') ?></span> </span>
    </a>
    <ul class="dropdown-menu w-100" aria-labelledby="userDropdown">
        <!-- <li><a class="dropdown-item" href="<?= URL ?>cap-nhat-thong-tin"><i class="bi bi-person-circle me-2"></i> Cập nhật thông tin</a></li> -->
        <li><a class="dropdown-item" href="<?= URL ?>lich-su-mua-hang"><i class="bi bi-clock-history me-2"></i> Lịch sử mua hàng</a></li>
        <!-- <li><a class="dropdown-item" href="<?= URL ?>dia-chi-giao-hang"><i class="bi bi-geo-alt me-2"></i> Địa chỉ giao hàng</a></li> -->
        <!-- <li><a class="dropdown-item" href="<?= URL ?>doi-diem-thuong"><i class="bi bi-gift me-2"></i> Điểm đổi thưởng</a></li> -->
        <!-- <li><a class="dropdown-item" href="<?= URL ?>yeu-thich"><i class="bi bi-heart me-2"></i> Sản phẩm yêu thích</a></li> -->
        <hr class="border-2 btn-dark my-2">
        <li>
            <form action="/dang-xuat" method="post">
                <button type="submit" name="logout" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</button>
            </form>
        </li>
    </ul>
</div>
<?php else : // Nếu chưa đăng nhập?>
    <a href="<?= URL ?>dang-nhap" class="btn btn-sm btn-outline-light border rounded-5 d-flex align-items-center px-3">
        <i class="bi bi-person-fill fs-4 me-2"></i>
        <span class="fw-semibold">Đăng nhập</span>
    </a>
<?php endif ?>