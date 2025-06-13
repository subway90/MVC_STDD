<?php

# [MODEL]
model('user','detail');
model('user','category');
model('user','search');

# [VARIABLE]
$render_recommend_product = ''; // Nội dung sản phẩm gợi ý

# [HANDLE]
// lấy slug request
$slug_product = get_action_uri(1);
// kiểm tra sản phẩm tồn tại
if(!check_exist_one_by_slug('product',$slug_product)) view_error(404);
else $get_product = get_product_detail($slug_product);


// sản phẩm liên quan
if($get_product['list_recommend']) foreach ($get_product['list_recommend'] as $item) $render_recommend_product .= render_card_product_search($item);
else $render_recommend_product = '<span class="text-muted fst-italic">(Chưa có sản phẩm nào mới)</span>';
# [DATA]
$data = [
    'detail_product' => $get_product,
    'render_recommend_product' => $render_recommend_product,
];

# [RENDER]
view('user',$get_product['name_product'],'detail',$data);