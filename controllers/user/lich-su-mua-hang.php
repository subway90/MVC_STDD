<?php

# [MODEL]
model('user','invoice');

# [HANDLE]

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
 'list_invoice_history' => get_all_invoice(),
];

// test_array(get_all_invoice());

# [RENDER]
view('user','Lịch sử mua hàng','invoice-history', $data);