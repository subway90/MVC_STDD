<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>" class="text-decoration-none text-dark">Trang chủ</a>
            </li>
            <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>lich-su-mua-hang"
                    class="text-decoration-none text-dark">Lịch sử mua hàng</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Mã đơn <?= $id_invoice ?></li>
        </ol>
    </nav>
</div>
<div class="container my-5 wow fadeIn">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="">
                 <h5 class="text-success">
                    Thông tin đơn hàng
                </h5>
                <table class="table table-hover table-light table-bordered text-end small">
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Mã đơn </td>
                        <td> <?= $id_invoice ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Trạng thái đơn </td>
                        <td> <?= $status_invoice ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Số sản phẩm </td>
                        <td> <?= count($detail) ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Tổng tiền </td>
                        <td> <?= number_format($total,'0',',','.') ?> vnđ </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Ngày tạo </td>
                        <td> <?= format_time($created_at, 'hh giờ mm phút - ngày DD/MM/YYYY') ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Phương thức thanh toán </td>
                        <td>
                            <?= $method_payment === 'cod' ? '<div class="badge bg-dark">Tiền mặt (COD)</div>' : 
                            ($method_payment === 'vnpay' ? '<div class="badge bg-info">Ví điện tử VNPAY</div>' :
                            '<div class="badge bg-danger">Ví điện tử MOMO</div>'
                            )
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="">
                 <h5 class="text-success">
                    Thông tin nhận hàng
                </h5>
                <table class="table table-hover table-light table-bordered text-end small">
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Tên người nhận </td>
                        <td> <?= auth('full_name') ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Số điện thoại </td>
                        <td> <?= auth('username') ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Địa chỉ nhận hàng </td>
                        <td> <?= $shipping_address ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Email </td>
                        <td> <?= auth('email') ?> </td>
                    </tr>
                    <tr class="align-middle">
                        <td class="text-start fw-bold"> Lời nhắn </td>
                        <td> <?= $note_invoice ?: '<span class="text-muted fst-italic">trống</span>' ?> </td>
                    </tr>
                </table>
            </div>
            
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <h5 class="text-success">
                Chi tiết đơn hàng
            </h5>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-start">STT</th>
                        <th class="text-start">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-end">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($detail as $i => $row) : extract($row) ?>
                        <tr>
                            <th class="text-start"><?= $i + 1 ?></th>
                            <td class="text-start">
                                <img width="40px" src="<?= URL_STORAGE . $path_product_image ?>" alt="<?= $path_product_image ?>">
                                <span><a class="text-decoration-none text-success fw-semi"
                                        href="<?= URL ?>chi-tiet/<?= $slug_product ?>"><?= $name_product ?></a></span>
                            </td>
                            <td class="text-center"><?= number_format($price_invoice) ?> đ</td>
                            <td class="text-center"><?= $quantity_invoice ?></td>
                            <td class="text-end"><?= number_format($price_invoice * $quantity_invoice) ?> đ</td>
                        </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr class="text-end">
                        <td class="py-2 h6" colspan="5">Tổng : <?= number_format($total) ?> đ</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>