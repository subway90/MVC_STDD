<?php

# [MODEL]
model('user','invoice');

# [HANDLE]

// Xem danh sách đơn theo trạng thái

if(isset($_POST['get-list-invoice']) && $_POST['state']) {
    $state = clear_input($_POST['state']);
    
    view_json(200,[
        'list_invoice_history' => render_list_invoice_history(get_list_invoice($state)),
    ]);
}

// Xem chi tiết
if(get_action_uri(1)) {
    // input
    $id_invoice = get_action_uri(1);

    // check
    $detail_invoice = get_one_invoice($id_invoice);

    // error
    if(!$detail_invoice) view_error(404);

    // render
    view('user','Chi tiết đơn hàng','invoice-detail',$detail_invoice);


}

# [DATA]
$data = [

];

// test_array(get_all_invoice());

# [RENDER]
view('user','Lịch sử mua hàng','invoice-history', $data);