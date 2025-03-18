<!-- Breadcrumb -->
<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">
                <a href="" class="text-decoration-none text-success">Trang chủ</a>
            </li>
            <li class="breadcrumb-item fw-bold">
                <a href="#" class="text-decoration-none text-dark">Giỏ hàng</a>
            </li>

        </ol>
    </nav>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-8 p-0">
            <div class="table-responsive-sm">
                <table class="table table-hover rounded-3 small">
                    <thead class="align-middle text-end">
                        <th class="text-start">Sản phẩm</th>
                        <th>Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th>Thành tiền</th>
                        <th class="text-center">Xóa</th>
                    </thead>
                    <tbody id="listCart" class="align-middle text-end">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 p-0 ps-lg-3">
            <div class="bg-light px-4 py-2 rounded-3">
                <div class="my-4    ">
                    <form action="#" method="get">
                        <label class="small" for="voucher">Mã giảm giá</label>
                        <div class="input-group mt-1">
                            <input type="text" name="voucher" id="voucher" class="form-control text-success"
                                placeholder="Nhập mã giảm giá tại đây...">
                            <button type="submit" class="btn btn-success">Áp dụng</button>
                        </div>
                    </form>
                </div>
                <hr class="w-100 border border-success border-1 my-1">
                <div class="w-100 d-flex justify-content-between py-2 fw-bold">
                    <div class="">TỔNG THANH TOÁN</div>
                    <div id="totalCart" class="text-success"></div>
                </div>
            </div>
            <div class="py-3">
                <button type="submit" class="w-100 btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#ModalPay">Thanh toán</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thanh Toán -->
<div class="modal modal-lg fade" id="ModalPay" tabindex="-1" aria-labelledby="ModalPay" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalPay">Thanh toán hóa đơn</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Bạn chưa đăng nhập ! Hãy đăng nhập để <strong>lưu lịch sử mua hàng</strong> và <strong>tích
                                điểm</strong>
                            <a class="text-decoration-none text-success fw-bold" href="#">&rarr; Đăng nhập</a> hoặc
                            <a class="text-decoration-none text-success fw-bold" href="">&rarr; Đăng ký</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="fs-6 fw-bold mb-2 text-center text-lg-start">Hóa đơn</div>
                        <table class="table table table-success responsive table-hover align-middle text-end">
                            <thead class="fw-bold">
                                <tr>
                                    <td class="text-start">Tên sản phẩm</td>
                                    <td>Giá</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody class="small">
                                <tr>
                                    <td class="text-start">
                                        <img width="50" src="publics/img/phone/iphone/iphone-12/origin/12-green.jpg"
                                            alt="img product">
                                        iPhone 12 chính hãng VNA
                                    </td>
                                    <td>12,999,000 vnđ</td>
                                    <td>01</td>
                                    <td>12,999,000 đ</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>TỔNG </strong>12,699,000 vnđ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="fs-6 mb-2 text-center text-lg-start"><span class="fw-bold">Thông tin giao
                                hàng</span> <span>(<span class="text-danger">&#10033;</span> : thông tin bắt buộc
                                điền)</span></div>
                        <form method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="fullName" class="form-control bg-success-subtle"
                                            id="fullName" placeholder="none">
                                        <label for="fullName">Họ và tên <span
                                                class="text-danger">&#10033;</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone" class="form-control bg-success-subtle"
                                            id="phone" placeholder="none">
                                        <label for="phone">Số điện thoại <span
                                                class="text-danger">&#10033;</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="address" class="form-control bg-success-subtle"
                                            id="address" placeholder="none">
                                        <label for="address">Địa chỉ giao hàng <span
                                                class="text-danger">&#10033;</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <select name="pay" type="text" class="form-control bg-success-subtle" id="pay"
                                            placeholder="none">
                                            <option selected value="1">Tiền mặt (Cash On Delivery - Trả tiền lúc nhận
                                                hàng)</option>
                                            <option value="2">Thanh toán điện tử ( Ebanking - quét mã QR )</option>
                                            <option value="3">Thanh toán thẻ ngân hàng ( VNPAY )</option>
                                        </select>
                                        <label for="pay">Phương thức thanh toán <span
                                                class="text-danger">&#10033;</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="email" value="" class="form-control bg-success-subtle"
                                            id="email" placeholder="none">
                                        <label for="email">E-mail (nhận thông báo)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="mess" value="" class="form-control bg-success-subtle"
                                            id="scription" placeholder="none">
                                        <label for="scription">Mô tả (link FB, SĐT khác, ghi chú)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center text-lg-start">
                                <button name="thanhtoan" type="submit" class="btn btn-success">Tiếp tục</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>