<?php

# [MODEL]
model('user','voucher');
model('user','header');

# [VARIABLE]    
$voucher_use = []; // value của voucher trên DB

# [HANDLE]

# Nếu có sử dụng voucher từ list
if(isset($_POST['use_in_list']) && isset($_POST['code_voucher'])) {
    // input
    $code_voucher = $_POST['code_voucher'];

    // check exist
    $check = check_voucher($code_voucher);
    // return -> code valid
    if($check['code'] === 0) return view_json(200,[
        'message' => toast('danger',$check['message']),
    ]);
    if($check['code'] === 1) return view_json(200,[
        'message' => toast('success',$check['message']),
    ]);
}

# [DATA]

# [RENDER]
test_array($_SESSION['voucher']);