<?php

# [MODEL]
model('admin','product');
model('admin','category');
model('admin','brand');
model('admin','color');
model('admin','series');

# [VARIABLE]
$name_product = $name_series = $id_brand = $id_color = $description_product = $price_product = $sale_price_product = $quantity_product = $id_model = null;

$_SESSION['selected_product_category'] = [
	'v1' => null,
	'v2' => [],
];

$_SESSION['id_model'] = null;
$_SESSION['name_series'] = '';

$list_error = [];

// nhấn button thêm sản phẩm
if(isset($_POST['btn_add_product'])) {

	// input
	$name_product = $_POST['name_product'];
	$id_brand = $_POST['id_brand'];
	$id_color = $_POST['id_color'];
	$description_product = $_POST['description_product'];
	$price_product = $_POST['price_product'];
	$sale_price_product = $_POST['sale_price_product'];
	$quantity_product = $_POST['quantity_product'];

	if(isset($_POST['product_category'])) $_SESSION['selected_product_category']['v2'] = $_POST['product_category'];

	if(isset($_POST['id_category_v1'])) $_SESSION['selected_product_category']['v1'] = $_POST['id_category_v1'];

	if(isset($_POST['name_series'])) {
		$_SESSION['name_series'] = $_POST['name_series'];
	}

	if(isset($_POST['id_model'])) {
		$_SESSION['id_model'] = $_POST['id_model'];
	} 

	// validate
	if(!$name_product) $list_error[] = 'Vui lòng nhập tên sản phẩm';
	elseif(check_exist_one_by_name('product',$name_product)) $list_error[] = 'Tên sản phẩm này đã tồn tại';
	if(!$id_brand) $list_error[] = 'Vui lòng chọn thương hiệu';
	if(!$id_color) $list_error[] = 'Vui lòng chọn màu sắc';
	if(!$_SESSION['selected_product_category']['v1']) $list_error[] = 'Vui lòng chọn danh mục chính';
	elseif(!$_SESSION['selected_product_category']['v2']) $list_error[] = 'Vui lòng chọn danh mục phụ';
	if(!$description_product) $list_error[] = 'Vui lòng nhập mô tả';
	if(!$price_product) $list_error[] = 'Vui lòng nhập giá sản phẩm';
	elseif($price_product < 0) $list_error[] = 'Giá sản phẩm phải từ 0 trở lên';
	if(!$quantity_product) $list_error[] = 'Vui lòng nhập số lượng';
	if($sale_price_product) {
		if($sale_price_product < 0) $list_error[] = 'Giá giảm của sản phẩm phải từ 0 trở lên';
		elseif($sale_price_product > $price_product) $list_error[] = 'Giá giảm của sản phẩm phải có giá trị nhỏ hơn giá gốc';
	}
	elseif($quantity_product < 1) $list_error[] = 'Số lượng phẩm phải từ 1 trở lên';

	// save
	if(empty($list_error)) {
		// format value
		if(!$sale_price_product) $sale_price_product = null;
		if(!$_SESSION['id_model']) $_SESSION['id_model'] = null;

		// lưu product
		pdo_execute_new(
		'INSERT INTO product (id_brand, id_color, id_model, name_product, slug_product, description_product, price_product, sale_price_product, quantity_product)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)',
			$id_brand, $id_color, $_SESSION['id_model'], $name_product, create_slug($name_product), $description_product, $price_product, $sale_price_product, $quantity_product
		);

		// lấy id
		$id_product = pdo_query_value_new(
			'SELECT id_product FROM product WHERE name_product = ?'
			,$name_product
		);

		// lưu category_product
		foreach($_SESSION['selected_product_category']['v2'] as $id_product_v2) {
			pdo_execute_new(
				'INSERT INTO product_category (id_product, id_category_v2)
					VALUES (?, ?)',
					$id_product,$id_product_v2
			);
		}

		// lưu ảnh
		foreach ($_SESSION['temp_image_product'] as $path) {
			pdo_execute_new(
				'INSERT INTO product_image (id_product, path_product_image)
					VALUES (?, ?)',
					$id_product,$path
			);	
		}

		// // huỷ session
		unset($_SESSION['selected_product_category']);
		unset($_SESSION['name_series']);
		unset($_SESSION['id_model']);
		unset($_SESSION['temp_image_product']);

		// thông báo và chuyển route
		toast_create('success','Thêm sản phẩm thành công');
		route('/admin/danh-sach-san-pham');
	}
}

# [HANDLE]



# [DATA]
$data = [
	'list_brand' => get_all_brand(true),
	'list_color' => get_all_color(true),
	'list_v1' => get_all_category_v1(true),
	'list_series' => get_all_series_for_choose(),
	'name_product' => $name_product,
	'id_brand' => $id_brand,
	'id_color' => $id_color,
	'description_product' => $description_product,
	'price_product' => $price_product,
	'sale_price_product' => $sale_price_product,
	'quantity_product' => $quantity_product,
	'id_category_v1' => $_SESSION['selected_product_category']['v1'],
	'name_series' => $_SESSION['name_series'],
	'list_error' => $list_error,
];

# [RENDER]
view('admin','Thêm sản phẩm','product-add',$data);