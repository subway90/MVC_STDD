<?php if(is_login()) : // Nếu đã đăng nhập?>
<div class="dropdown border rounded-5 px-3 py-2">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-bs-toggle="dropdown">
        <span class="text-light">xin chào <span class="fw-bold"><?= auth('full_name') ?></span> </span>
    </a>
    <ul style="width: 190px !important" class="dropdown-menu w-100" aria-labelledby="userDropdown">
        <?php if(auth('name_role') === 'admin') : ?>
        <li><a class="dropdown-item text-danger fw-bold" href="<?= URL_ADMIN ?>"><i class="bi bi-gear me-2"></i> Quản lý hệ thống</a></li>
        <hr class="border-2 btn-dark my-2">
        <?php endif ?>
        <li><a class="dropdown-item" href="<?= URL ?>thong-tin-ca-nhan"><i class="bi bi-person-vcard me-2"></i>Thông tin cá nhân</a></li>
        <li><a class="dropdown-item" href="<?= URL ?>lich-su-mua-hang"><i class="bi bi-receipt me-2"></i>Đơn hàng của tôi</a></li>
        <hr class="border-2 btn-dark my-2">
        <li>
            <form action="/dang-xuat" method="post">
                <button type="submit" name="logout" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</button>
            </form>
        </li>
    </ul>
</div>
<?php else : // Nếu chưa đăng nhập?>
    <a href="<?= URL ?>dang-nhap" class="btn btn-outline-light position-relative rounded-circle me-2" title="Nhấn vào để chuyểnh hướng đăng nhập">
        <i class="bi bi-person-fill fs-5"></i>
    </a>
<?php endif ?>