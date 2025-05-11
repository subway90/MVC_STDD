<?php


# [MODEL]
model('user','checkout');
model('user','header');
model('user','momo');
model('user','vnpay');

# [VARIABLE]
$input_method_payment = 'cod';
$input_note_invoice = '';
$input_id_shipping_address = 0;
$error_valid = [];
$bool_checkout = false;

# [HANDLE]
if(isset($_POST['create_invoice'])) {
    // lấy dữ liệu
    $input_method_payment = clear_input($_POST['input_method_payment']);
    $input_id_shipping_address = clear_input($_POST['input_id_shipping_address']);
    $input_note_invoice = clear_input($_POST['input_note_invoice']);

    // xử lí validate
    if(!$input_id_shipping_address) $error_valid[] = 'Vui lòng chọn địa chỉ giao hàng';
    if(empty($_SESSION['cart'])) $error_valid[] = 'Giỏ hàng trống !';

    // thông báo lỗi validate
    if(empty($error_valid)) {
        $_SESSION['checkout'] = [
            'id_invoice' => create_uuid(), // tạo mã hoá đơn
            'id_shipping_address' => $input_id_shipping_address,
            'note_invoice' => $input_note_invoice,
            'method_payment' => $input_method_payment,
        ];
    }

    // phân loại phương thức thanh toán
    if($_SESSION['checkout']) {
        // lấy mã hoá đơn
        $id_invoice = $_SESSION['checkout']['id_invoice'];

        // TH thanh toán khi giao hàng COD
        if($input_method_payment == 'cod') {
            $bool_checkout = true;
        }
        // TH thanh toán VNPAY
        elseif($input_method_payment == 'vnpay') {
            // Tạo url thanh toán
            $url_vnpay = create_vnpay_url($id_invoice,get_cart('total_checkout'),'Thanh toán hoá đơn '.$id_invoice);
            // Đi đến trang thanh toán
            header('Location: ' . $url_vnpay);
            die();
        }
        // TH thanh toán MOMO
        elseif($input_method_payment == 'momo') {
            // Tạo url thanh toán
            $url_momo = create_momo_url($id_invoice,get_cart('total_checkout'),'thanh toán hoá đơn '.$id_invoice);
            // Đi đến trang thanh toán
            header('Location: ' . $url_momo);
            die();
        }
        else toast_create('danger','Phương thức thanh toán không hợp lệ');
    }
}



// xử lí callback thanh toán vnpay (nếu có)
if (isset($_GET['callback-vnpay'])) {
    $check_vnpay = check_callback_vnpay($_GET);
    // Nếu callback có trạng thái
    if($check_vnpay) {
        if($check_vnpay == 1) {
            $bool_checkout = true; // lưu database
        }else toast_create('danger','Thanh toán VNPAY thất bại !');
    }
    //Request callback trả về không hợp lệ
    else return view_error(404);
}

// xử lí callback thanh toán momo (nếu có)
if (isset($_GET['callback-momo'])) {
    $check_momo = check_callback_momo();
    // Nếu callback có trạng thái
    if($check_momo) {
        if($check_momo == 1) $bool_checkout = true; // lưu database
        else toast_create('danger','Thanh toán MOMO thất bại !');
    }
    //Request callback trả về không hợp lệ
    else return view_error(404);
}

// lưu database
if($bool_checkout) {
    extract($_SESSION['checkout']);

    pdo_execute('INSERT INTO invoice (id_invoice,username,id_shipping_address,note_invoice,method_payment)
    VALUES ("'.$id_invoice.'","'.$_SESSION['user']['username'].'",'.$id_shipping_address.',"'.$note_invoice.'","'.$method_payment.'")'
    ); // hoá đơn

    foreach (get_cart('list') as $cart) {
        // lưu giá giảm (nếu có)
        if($cart['sale_price_product']) $price_product = $cart['sale_price_product'];
        else $price_product = $cart['price_product'];
        
        pdo_execute(
            'INSERT INTO invoice_detail (id_invoice,id_product,quantity_invoice,price_invoice)
            VALUES ("'.$id_invoice.'",'.$cart['id_product'].','.$cart['quantity_product'].','.$price_product.')'
        );
    } // hoá đơn chi tiết

    // thông báo thành công và chuyển trang
    toast_create('success','Đơn hàng đã được tạo thành công !');
    unset($_SESSION['cart']); // xoá session giỏ hàng
    unset($_SESSION['checkout']); // xoá session thanh toán
    route('don-hang/'.$id_invoice); // chuyển đến trang đơn hàng
}


# [DATA]
$data = [
    'list_shipping_address' => get_all_shipping_address(),
    'input_method_payment' => $input_method_payment,
    'input_id_shipping_address' => $input_id_shipping_address,
    'input_note_invoice' => $input_note_invoice,
    'error_valid' => $error_valid,
];


# [RENDER]
view('user','Thanh toán','checkout',$data);