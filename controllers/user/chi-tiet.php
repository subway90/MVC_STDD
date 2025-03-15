<?php

# [MODEL]
model('user','detail');

# [VARIABLE]


# [HANDLE]
// lấy slug request
$slug_product = get_action_uri(1);
// kiểm tra sản phẩm tồn tại
if(!check_exist_one_by_slug('product',$slug_product)) view_error(404);
else $get_product = get_product_detail($slug_product);

# [DATA]
$data = [
    'detail_product' => $get_product,
];

# [RENDER]
view('user',$get_product['name_product'],'detail',$data);