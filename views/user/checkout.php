<!-- Breadcrumb -->
<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">
                <a href="/" class="text-decoration-none text-success">Trang chủ</a>
            </li>
            <li class="breadcrumb-item fw-bold">
                <a href="/gio-hang" class="text-decoration-none text-success">Giỏ hàng</a>
            </li>
            <li class="breadcrumb-item fw-bold">
                <a href="#" class="text-decoration-none text-dark">Đặt hàng</a>
            </li>

        </ol>
    </nav>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-7 p-0">
            <div class="table-responsive-sm">
                <table class="table table-hover rounded-3 small">
                    <thead class="align-middle text-end">
                        <th class="text-start">Sản phẩm</th>
                        <th>Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th>Thành tiền</th>
                    </thead>
                    <tbody class="align-middle text-end">   
                        <?php foreach (get_cart('list') as $row) : extract($row) ?>
                        <tr class="align-middle">
                            <td class="text-start d-flex align-items-center">
                                <div>
                                    <img width="50" src="<?= URL_STORAGE . $path_product_image ?>" alt="<?= $path_product_image ?>">
                                </div>
                                <div class="ms-2">
                                    <a href="/chi-tiet/<?= $slug_product ?>" class="text-success fw-bold"><?= $name_product ?></a>
                                    <div class="small text-muted d-flex align-items-center">
                                        <img class="me-1" height="12" src="<?= URL_STORAGE . $logo_brand ?>" alt="<?= $logo_brand ?>">
                                        <?= $name_brand . $name_model . $name_color ?>
                                    </div>
                                </div>
                            </td>
                            <td class="lh-1">
                                <div class="text-decoration-line-through small text-muted"><?= format_currency($price_product) ?></div>
                                <div><?= format_currency($sale_price_product) ?></div>
                            </td>
                            <td class="text-center">
                                <span class="mx-2"><?= $quantity_product_in_cart ?></span>
                            </td>
                            <td class="text-end"><?= number_format($quantity_product_in_cart * $sale_price_product,'0',',','.') ?> vnđ</td>
                        </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="3" class="text-start text-lg-end pe-lg-4 fw-semibold">
                                Tiền sản phẩm
                            </td>
                            <td>
                                <?= format_currency(get_cart('total_cart')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-start text-lg-end pe-lg-4 fw-semibold">
                                Giảm khuyến mãi
                            </td>
                            <td>
                                <?= format_currency(get_cart('value_discount')) ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-start text-lg-end pe-lg-4 fw-semibold text-danger">
                                Tổng thanh toán
                            </td>
                            <td class="text-danger">
                                <?= format_currency(get_cart('total_checkout')) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-5 p-0 ps-lg-3">
            <form method="post">
            <!-- Form Info -->
            <div class="bg-light p-4 rounded-3">
                 <h5 class="text-success mb-3">
                    Thông tin người nhận hàng
                 </h5>
                 <div class="input-group input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-person"></i>
                    </span>
                    <input readonly type="text" class="form-control" value="<?= auth('full_name') ?>" placeholder="Họ và tên người nhận">
                </div>
                <div class="input-group input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-telephone"></i>
                    </span>
                    <input readonly type="text" class="form-control" value="<?= auth('username') ?>" placeholder="Số điện thoại người nhận">
                </div>
                <div class="input-group input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input readonly type="text" class="form-control" value="<?= auth('email') ?>" placeholder="Họ và tên người nhận">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="chooseShippingAddress">
                        <i class="bi bi-geo-alt"></i>
                    </label>
                    <select name="input_id_shipping_address" class="form-select" id="chooseShippingAddress">
                        <?php foreach ($list_shipping_address as $row) : ?>
                        <option <?= ($input_id_shipping_address == $row['id_shipping_address']) ? 'selected' : '' ?> value="<?= $row['id_shipping_address'] ?>"><?= $row['name_shipping_address'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-chat"></i>
                    </span>
                    <textarea name="input_note_invoice" class="form-control" placeholder="Nội dung ghi chú (nếu cần)"><?= $input_note_invoice ?></textarea>
                </div>
            </div>
            
            <!-- Form Payment -->
            <div class="bg-light p-4 rounded-3 mt-3">
                <!-- Form Info -->
                 <h5 class="text-success mb-3">
                    Chọn hình thức thanh toán
                 </h5>
                 <div class="form-check p-0 mb-2">
                    <input class="form-check-input" type="radio" name="input_method_payment" value="cod"
                        id="input_method_payment1" <?= $input_method_payment == 'cod' ? 'checked' : '' ?>>
                    <label class="form-check-label w-100 d-flex align-items-center" for="input_method_payment1"><img
                            class="me-3" height="36"
                            src="https://cdn-icons-png.flaticon.com/512/5163/5163783.png" alt="logo cod">Tiền
                        mặt (Thanh toán khi giao hàng)</label>
                </div>
                <div class="form-check p-0 mb-2">
                    <input class="form-check-input" type="radio" name="input_method_payment" value="vnpay"
                        id="input_method_payment2" <?= $input_method_payment == 'vnpay' ? 'checked' : '' ?>>
                    <label class="form-check-label w-100 d-flex align-items-center" for="input_method_payment2"><img
                            class="me-3" height="36"
                            src="https://cdn-new.topcv.vn/unsafe/https://static.topcv.vn/company_logos/cong-ty-cp-giai-phap-thanh-toan-viet-nam-vnpay-6194ba1fa3d66.jpg"
                            alt="logo vnpay">Ví điện tử VNPAY</label>
                </div>
                <div class="form-check p-0 mb-2">
                    <input class="form-check-input" type="radio" name="input_method_payment" value="momo"
                        id="input_method_payment3" <?= $input_method_payment == 'momo' ? 'checked' : '' ?>>
                    <label class="form-check-label w-100 d-flex align-items-center" for="input_method_payment3"><img
                            class="me-3" height="36"
                            src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
                            alt="logo momo">Ví điện tử MOMO</label>
                </div>
            </div>

            <div class="mb-2">
                <?= show_error($error_valid) ?>
            </div>

            <button type="submit" name="create_invoice" class="btn btn-lg btn-success mt-3 fs-6 fw-semibold">
                Xác nhận đặt hàng
            </button>

            </form>
        </div>
    </div>
</div>
