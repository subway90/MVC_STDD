<?php

# [MODEL]
model('user','header');
model('user','cart');

# [VARIABLE]


# [HANDLE]
// lấy số lượng sản phẩm ở giỏ hàng
if(get_action_uri(1) == 'get_count') {

    // trả json
    view_json(200,[
        'count' => get_cart('count'),
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

# [DATA]
$data = [

];

# [RENDER]

view('user','Giỏ hàng','cart',$data);