<?php

# [MODEL]
model('admin','product');
model('admin','category');
model('admin','brand');
model('admin','color');
model('admin','series');

# [VARIABLE]
if(isset($_POST['btn_add_product'])) {
	test_array($_POST);
}

# [HANDLE]


# [DATA]
$data = [
	'list_brand' => get_all_brand(true),
	'list_color' => get_all_color(true),
	'list_v1' => get_all_category_v1(true),
	'list_series' => get_all_series_for_choose(),
];

# [RENDER]
view('admin','Thêm sản phẩm','product-add',$data);