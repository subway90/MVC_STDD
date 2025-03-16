
</body>

<!-- Footer Start -->
<footer class="container bg-success border-none pt-5 px-3 rounded-top mt-5">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-3">
            <p class="h5 text-light mb-3 text-center text-lg-start">
                <span><img class="w-25 me-3" src="<?= WEB_LOGO ?>" alt=""></span>
                <span>
                    <?= WEB_NAME ?>
                </span>
            </p>
            <div class="text-center text-lg-start">
                <p class="text-light"><span class="h6">Địa chỉ: </span><span class="small">
                        <?= WEB_ADDRESS ?>
                    </span></p>
                <p class="text-light"><span class="h6">Hotline: </span><span class="small">
                        <?= WEB_HOTLINE ?>
                    </span></p>
                <p class="text-light"><span class="h6">Email: </span><span class="small">
                        <?= WEB_EMAIL ?>
                    </span></p>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6 row">
            <div class="col-12 col-md-12 col-lg-12 mb-4 ps-4 ps-lg-0">
                <label for="emailGuest" class="label text-light">Email đăng kí nhận tin nhắn KM:</label>
                <div class="input-group">
                    <input id="emailGuest" type="email" class="form-control" placeholder="ví dụ: nguyenvana@gmail.com">
                    <button type="submit" class="btn btn-outline-light">Đăng kí</button>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-6">
                <p class="h5 text-light">Chính sách</p>
                <ul class="pt-2">
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Chính sách bảo mật</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Chính sách bảo hành</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Chính sách vận chuyển</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Chính sách trả góp</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Chính sách thanh toán</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md-6 col-lg-6">
                <p class="h5 text-light">Truyền thông</p>
                <ul class="pt-2">
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Fanpage</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Youtube</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Tiktok</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Instagram</a>
                    </li>
                    <li class="text-light">
                        <a class="text-light text-decoration-none small" href="#">Zalo</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-3 col-lg-3">
            <p class="h5 text-light">Thanh toán Online</p>
            <div class="row">
                <div class="col-3 col-md-3 col-lg-3 text-center py-2">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-tranfer-online/logo-atm.png" alt="">
                </div>
                <div class="col-3 col-md-3 col-lg-3 text-center py-2">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-tranfer-online/logo-jcb.png" alt="">
                </div>
                <div class="col-3 col-md-3 col-lg-3 text-center py-2">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-tranfer-online/logo-master.png" alt="">
                </div>
                <div class="col-3 col-md-3 col-lg-3 text-center py-2">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-tranfer-online/logo-samsungpay.png" alt="">
                </div>
                <div class="col-3 col-md-3 col-lg-3 text-center py-2">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-tranfer-online/logo-visa.png" alt="">
                </div>
                <div class="col-3 col-md-3 col-lg-3 text-center py-2">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-tranfer-online/logo-vnpay.png" alt="">
                </div>
            </div>
            <p class="h5 text-light mt-3">Nhà vận chuyển</p>
            <div class="row">
                <div class="col-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-transport/nhattin.jpg" alt="">
                </div>
                <div class="col-3">
                    <img class="w-100" src="<?= URL_STORAGE ?>icon-transport/vnpost.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="col-12 text-center text-light mt-4 py-2">
            <p class="">
                &copy; Copyright by ABC - 2025
            </p>
        </div>
    </div>
</footer>

</html>