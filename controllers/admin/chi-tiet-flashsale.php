<?php

# [MODEL]
model('admin','flashsale');
model('admin','product');

# [VARIABLE]
$id_flashsale = get_action_uri(2);
if(!$id_flashsale) view_error(404);
$get_flashsale = get_detail_flashsale($id_flashsale);
if(!$get_flashsale) view_error(404);
$time_start = format_time($get_flashsale['detail']['time_start_flashsale'], 'YYYY-MM-DDThh:mm');
$time_end = format_time($get_flashsale['detail']['time_end_flashsale'], 'YYYY-MM-DDThh:mm');
$list_error = [];
$list_error_modal = [];
$show_modal = '';
$id_product_add = $quantity_flashsale_add = $price_flashsale_add = 0;
$detail_product_add = '';
# [HANDLE]
// update
if(isset($_POST['update'])) {
    // input
    $name_flashsale = $_POST['name_flashsale'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];

    // validate
    if(!$name_flashsale) $list_error[] = 'Vui lòng nhập tên chương trình';
    if(!$time_start) $list_error[] = 'Vui lòng nhập thời gian bắt đầu chương trình';
    if(!$time_end) $list_error[] = 'Vui lòng nhập thời gian kết thúc chương trình';
    if($time_start && $time_end) {
        if(strtotime($time_start) < strtotime(date('Y-m-d H:i:s'))) $list_error[] = 'Thời gian bắt đầu không được nhỏ hơn thời điểm hiện tại';
        elseif(strtotime($time_end) < strtotime(date('Y-m-d H:i:s'))) $list_error[] = 'Thời gian kết thúc không được nhỏ hơn thời điểm hiện tại';
        elseif(strtotime($time_end) < strtotime($time_start)) $list_error[] = 'Thời gian kết thúc không được nhỏ hơn thời điểm hiện tại';
    }

    // save
    if(empty($list_error)) {
        // format time
        pdo_execute_new(
            'UPDATE flashsale SET name_flashsale = ?, time_start_flashsale = ?, time_end_flashsale = ? WHERE id_flashsale = ?'
            ,$name_flashsale,$time_start,$time_end,$id_flashsale
        );
        // toast
        toast_create('success','Cập nhật thành công');
        // route
        route('admin/chi-tiet-flashsale/'.$id_flashsale);
    }

}

// add product
if(isset($_POST['add_product'])) {
    // input
    $id_product_add = $_POST['id_product'];
    $quantity_flashsale_add = $_POST['quantity_flashsale'];
    $price_flashsale_add = $_POST['price_flashsale'];

    // validate
    if(!$id_product_add) $list_error_modal[] = 'Chưa nhập sản phẩm cần thêm';
    if(!$quantity_flashsale_add) $list_error_modal[] = 'Chưa nhập số lượng bán';
    if(!$price_flashsale_add) $list_error_modal[] = 'Chưa nhập giá giảm';
    $get_product = get_one_product_for_add_flashsale($id_product_add);
    if(empty($get_product)) $list_error_modal[] = 'Sản phẩm ID = '.$id_product_add.' không tồn tại ';
    elseif($get_product['quantity_product'] < $quantity_flashsale_add) $list_error_modal[] = 'Số lượng kho của sản phẩm này không đủ cho số lượng bán ('.$get_product['quantity_product'].'/'.$quantity_flashsale_add.')';
    // handle
    if(empty($list_error_modal)) {
        // save db
        pdo_execute_new(
            'INSERT INTO flashsale_product (id_flashsale, id_product,quantity_flashsale, price_flashsale) VALUES (?,?,?,?)',
            $id_flashsale,$id_product_add,$quantity_flashsale_add,$price_flashsale_add
        );
        // toast
        toast_create('success','Thêm sản phẩm vào thành công');
        // route
        route('/admin/chi-tiet-flashsale/'.$id_flashsale);
    }else {
        $show_modal = 'modalAddProduct';
        $detail_product_add = $get_product;
    }

    
        $show_modal = 'modalAddProduct';
        $detail_product_add = $get_product;
}

// deleted product
if(isset($_POST['delete_product']) && $_POST['delete_product']) {
    // input
    $id_product_deleted = $_POST['delete_product'];
    // save db
    pdo_execute_new(
        'UPDATE flashsale_product SET deleted_at = current_timestamp() WHERE id_flashsale = ? AND id_product = ?',
        $id_flashsale,$id_product_deleted
    );
    // toast
    toast_create('success','Xoá sản phẩm vào thành công');
    // route
    route('/admin/chi-tiet-flashsale/'.$id_flashsale);
}

# [DATA]
$data = [
    'detail_product_add' => $detail_product_add,
    'id_product_add' => $id_product_add,
    'quantity_flashsale_add' => $quantity_flashsale_add,
    'price_flashsale_add' => $price_flashsale_add,
    'list_product' => $get_flashsale['list_product'],
    'list_error' => $list_error,
    'list_error_modal' => $list_error_modal,
    'show_modal' => $show_modal,
    'time_start' => $time_start,
    'time_end' => $time_end,
    'name_flashsale' => $get_flashsale['detail']['name_flashsale'],
    'banner_flashsale' => $get_flashsale['detail']['banner_flashsale'],
];

# [RENDER]
view('admin','Chi tiết flashsale','flashsale-detail',$data);