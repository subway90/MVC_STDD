<!-- Breadcrumb -->
<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">
                <a href="/" class="text-decoration-none text-success">Trang chủ</a>
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
            <div class="bg-light p-4 rounded-3">
                <!-- <div class="my-4">
                    <form action="#" method="get">
                        <label class="small" for="voucher">Mã giảm giá</label>
                        <div class="input-group mt-1">
                            <input type="text" name="voucher" id="voucher" class="form-control text-success"
                                placeholder="Nhập mã giảm giá tại đây...">
                            <button type="submit" class="btn btn-success">Áp dụng</button>
                        </div>
                    </form>
                </div> -->
                <!-- Show List Voucher -->
                <div id="listVoucher"></div>
                <hr class="w-100 border border-success border-1 my-1">
                
                <!-- Show Price -->
                <div class="w-100 d-flex justify-content-between py-1 fw-bold">
                    <div class="small">Tổng tiền sản phẩm</div>
                    <div id="totalCart" class="text-success"></div>
                </div>

                <!-- Show Apply Voucher (if use)-->
                <div id="applyVoucher"></div>

                <hr class="w-100 border border-success border-1 my-1">

                <!-- Show Delivery -->
                <!-- <div class="w-100 d-flex justify-content-between py-1 fw-bold">
                    <div class="small">Phí giao hàng</div>
                    <div class="text-success">50.000 vnđ</div>
                </div>

                <div class="w-100 d-flex justify-content-between fw-bold">
                    <div class="small">Khuyến mãi</div>
                    <div class="text-success"> - 50.000 vnđ</div>
                </div>
                <div class="w-100">
                    <div class="small fst-italic fw-semi">
                        Sử dụng mã <span class="fw-bold text-success">FREESHIP</span> 
                        - Miễn phí giao hàng cho lần đầu tiên mua hàng</div>
                </div>
                <hr class="w-100 border border-success border-1 my-1"> -->

                <!-- Show Total Checkout -->
                <div class="w-100 d-flex justify-content-between py-2 fw-bold">
                    <div class="">TỔNG THANH TOÁN</div>
                    <div id="totalCheckout" class="text-success"></div>
                </div>
            </div>
            <div id="btnCheckout" class="py-3">
            </div>
        </div>
    </div>
</div>
