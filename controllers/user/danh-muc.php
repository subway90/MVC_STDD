<?php

# [MODEL]
model('user','category');

# [VARIABLE]
$data = '';

# [HANDLE]

// lấy danh sách sản phẩm
if(isset($_GET['filter'])) {
    // lấy điều kiện lọc

    // query
    for ($i=0; $i < 10; $i++) $data .= render_card_product();

    // pagination
    $data .= render_paginate_product();
    
    // trả về json
    return view_json(200,['data' => $data]);
}

# [DATA]

$data = [
    'list_brand' => get_all_brand(), // danh sách thương hiệu
    'list_color' => get_all_color(), // danh sách thương hiệu
];

# [RENDER]
view('user','Danh mục','category',$data);