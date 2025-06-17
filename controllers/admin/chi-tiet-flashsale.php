<?php

# [MODEL]
model('admin','flashsale');

# [VARIABLE]
$id_flashsale = get_action_uri(2);
if(!$id_flashsale) view_error(404);
$get_flashsale = get_detail_flashsale($id_flashsale);
if(!$get_flashsale) view_error(404);
$time_start = format_time($get_flashsale['detail']['time_start_flashsale'], 'YYYY-MM-DDThh:mm');
$time_end = format_time($get_flashsale['detail']['time_end_flashsale'], 'YYYY-MM-DDThh:mm');
$list_error = [];

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

# [DATA]
$data = [
    'list_product' => $get_flashsale['list_product'],
    'list_error' => $list_error,
    'time_start' => $time_start,
    'time_end' => $time_end,
    'name_flashsale' => $get_flashsale['detail']['name_flashsale'],
    'banner_flashsale' => $get_flashsale['detail']['banner_flashsale'],
];

# [RENDER]
view('admin','Chi tiết flashsale','flashsale-detail',$data);