<?php

const DOMAIN = 'subway90.vn';

const URL = 'https://' . DOMAIN . '/';
const URL_ADMIN = URL . 'admin/';
const URL_STORAGE = URL . "assets/file/";

const DEFAULT_ADMIN_CASE = 'thong-ke';
const DEFAULT_USER_CASE = 'trang-chu';
const DEFAULT_IMAGE = URL_STORAGE . 'system/logo_stdd_disabled.png';
const DEFAULT_AVATAR = URL_STORAGE . 'system/default-avatar.png';

const WEB_NAME = 'sieuthididong.vn';
const WEB_LOGO = URL_STORAGE . 'system/logo_stdd_disabled.png';
const WEB_FAVICON = URL_STORAGE.'system/logo_stdd_small.png';
const WEB_ADDRESS = '01 Trần Hưng Đạo, Phường 5, Quận 1, Hồ Chí Minh';
const WEB_HOTLINE = '0979 68 68 68';
const WEB_EMAIL = 'contact@sieuthididong.vn';
const WEB_DESCRIPTION = 'Website thương mại điện tử bán hàng online';

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = '';

const BOOL_SPINNER = false;
const BOOL_UPGRADE = false;

const VNPAY_TMNCODE = '';
const VNPAY_HASHKEY = '';
const VNPAY_URL_RETURN = URL . 'dat-hang?callback-vnpay';
const VNPAY_URL_SANDBOX = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';

const MOMO_ACCESS_KEY = '';
const MOMO_SECRET_KEY = '';
const MOMO_PARTNER_CODE = '';
const MOMO_GATEWAY_URL = 'https://test-payment.momo.vn/v2/gateway/api/create';
const MOMO_REDIRECT_URL = URL . 'dat-hang?callback-momo';
const MOMO_IPN_URL = 'https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b';

const TOAST_TIME = 1500;

const TIME_LOAD_SLIDE = 2500;

const LIMIT_SIZE_FILE = 4; // đơn vị MB (megabyte)

const LIMIT_ROW_ATTRIBUTE = 10; // giới hạn số dòng attribute của chi tiết sản phẩm

const TIME_RELOAD_VOICE_PHONE = 45; // đơn vị giây (second)

const MAILER_USERNAME = '';
const MAILER_PASSWORD = '';
const MAILER_YOURNAME = 'Siêu Thị Di Động';
const MAILER_SMTP = 'tls';
const MAILER_PORT = '587';
const MAILER_HOST = 'smtp.gmail.com';

const STRINGEE_SID_KEY = '';
const STRINGEE_SECRET_KEY = '';
const STRINGEE_PHONE = '';
const STRINGEE_LOOP_VOICE = '1';
const STRINGEE_SPEED_VOICE = '-2';

const LIST_FILTER_PRICE = [
    [
        'name' => 'Dưới 500K',
        'query' => 'BETWEEN 0 AND 300000',
        'value' => 'less500',
    ],
    [
        'name' => 'Từ 500K &rarr; 2 Triệu',
        'query' => 'BETWEEN 500000 AND 2000000',
        'value' => '500to2000',
    ],
    [
        'name' => 'Từ 2 Triệu &rarr; 5 Triệu',
        'query' => 'BETWEEN 2000000 AND 5000000',
        'value' => '2000to5000',
    ],
    [
        'name' => 'Từ 5 Triệu &rarr; 10 Triệu',
        'query' => 'BETWEEN 5000000 AND 10000000',
        'value' => '5000to10000',
    ],
    [
        'name' => 'Từ 10 Triệu &rarr; 20 Triệu',
        'query' => 'BETWEEN 10000000 AND 20000000',
        'value' => '10000to20000',
    ],
    [
        'name' => 'Trên 20 Triệu',
        'query' => '>= 20000000',
        'value' => 'more20000',
    ],
];