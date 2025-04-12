<?php

# [MODEL]
model('user','header');
model('user','cart');

# [VARIABLE]
$render_product_in_cart = '';

# [HANDLE]
// lấy số lượng sản phẩm ở giỏ hàng
if(get_action_uri(1) == 'get_count') {

    // trả json
    view_json(200,[
        'count' => get_cart('count'),
    ]);
}

// lấy tất cả thông tin giỏ hàng
if(get_action_uri(1) == 'get_list') {
    // Lấy danh sách sản phẩm
    $list_product_in_cart = get_cart('list');
    // Kiểm tra
    if(!empty($list_product_in_cart)) {
        // Lặp để render
        foreach ($list_product_in_cart as $row) {
            $render_product_in_cart .= render_product_in_cart($row);
        }
        $render_product_in_cart .= render_product_in_cart_end(); // Render table row cuối bảng
    }else $render_product_in_cart .= render_product_in_cart_empty(); // Render dữ liệu trống
    
    // trả json
    view_json(200,[
        'total' => number_format(get_cart('total'),0,',','.').' vnđ',
        'data' => $render_product_in_cart,
        'btnCheckout' => render_button_checkout(),
        'listVoucher' => render_list_voucher() // Lấy voucher,
    ]);
}

// thêm sản phẩm vào giỏ hàng
if(get_action_uri(1) == 'add' && isset($_POST['id_product'])) {
    // lấy ID sản phẩm
    $id_product = clear_input($_POST['id_product']);
    // cập nhật vào session cart
    update_cart($id_product);
    // thông báo toast
    view_json(200,[
        'message' => toast('success','Thêm sản phẩm vào giỏ hàng thành công !')
    ]);    
}

// tăng số lượng
if(get_action_uri(1) == 'plus' && isset($_POST['id_product'])) {
    // lấy ID sản phẩm
    $id_product = clear_input($_POST['id_product']);
    // cập nhật số lượng
    $check = update_quantity('plus',$id_product);
    // trả về json
    if($check) view_json(200,[
        'message'=> toast('success','Tăng số lượng thành công'),
    ]);
    else view_json(403,[
        'message'=> toast('danger','Đã đạt giới hạn'),
    ]);
}

// giảm số lượng
if(get_action_uri(1) == 'minus' && isset($_POST['id_product'])) {
    // lấy ID sản phẩm
    $id_product = clear_input($_POST['id_product']);
    // cập nhật số lượng
    $check = update_quantity('minus',$id_product);
    // trả về json
    if($check) view_json(200,[
        'message'=> toast('success','Giảm số lượng thành công'),
    ]);
    else view_json(403,[
        'message'=> toast('danger','Đã đạt giới hạn'),
    ]);
}

// Xoá sản phẩm khỏi giỏ hàng
if(get_action_uri(1) == 'delete' && isset($_POST['id_product'])) {
    // Lấy ID sản phẩm
    $id_product = clear_input($_POST['id_product']);
    // thực hiện xoá
    delete_cart($id_product);
    // trả về json
    view_json(200,[
        'message'=> toast('success','Xoá sản phẩm khỏi giỏ hàng thành công'),
    ]);
}

// Xoá tất cả sản phẩm khỏi giỏ hàng
if(get_action_uri(1) == 'delete' && isset($_POST['deleteAll'])) {
    // Xoá session giỏ hàng
    unset($_SESSION['cart']);
    // trả về json
    view_json(200,[
        'message'=> toast('success','Xoá tất cả sản phẩm khỏi giỏ hàng thành công'),
    ]);
}

# [DATA]
$data = [

];

# [RENDER]

view('user','Giỏ hàng','cart',$data);