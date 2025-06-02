<?php

# [MODEL]
model('admin','customer');

# [VARIABLE]

# [HANDLE]
// lấy username
$username = get_action_uri(2);
// get
$get_customer = get_one_customer($username);
// handle
if(!$get_customer) view_error(404);

# [DATA]
$data = [
    'get_customer' => $get_customer,
];

# [RENDER
view('admin','Chi tiết tài khoản','customer-detail',$data);