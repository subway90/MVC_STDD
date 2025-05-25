<?php 

# [MODEL]
model('admin','product');

# [VARIABLE]
$status_page = true;

# [HANDLE]


// test_array(get_all_product($status_page));

# [DATA]
$data = [
    'status_page' => $status_page,
    'list_product' => get_all_product($status_page),
];

# [RENDER]
view('admin','Danh sách sản phẩm','product-list',$data);