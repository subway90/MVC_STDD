<?php
# [MODEL]
model('admin','invoice');
model('admin','feedback');

# [VARIABLE]
$status_page = true;
$input_name = $input_description = $show_modal = '';
$error_valid = [];

# [HANDLE]
// lấy chi tiết hoá đơn
if(get_action_uri(2)) {
    // lấy id
    $id = get_action_uri(2);
    // kiểm tra tồn tại
    if(!check_exist_one_with_trash('invoice',$id)) view_error(404);
    else $array_invoice = get_one_invoice($id);
}else view_error(404);

// xoá hoá đơn
if(isset($_POST['close_invoice'])) {
    // xoá mềm
    delete_one('invoice',$id);
    // cập nhật lí do hoá đơn bị xoá
    add_reason_close_invoice($id,$_POST['reason_close_invoice']);
    // gửi thông báo đến user
    create_notify_with_update_state(
        $id,
        'Cập nhật trạng thái đơn hàng '.$id,
        'Đơn hàng của bạn đã bị huỷ ! Lí do : '.$_POST['reason_close_invoice']
    );
    // thông báo
    toast_create('success','Xoá hoá đơn thành công');
    // cập nhật lại route
    route('admin/danh-sach-hoa-don');
}

// thay đổi trạng thái đơn hàng đã xác nhận
if(isset($_POST['check_invoice'])) {
    // cập nhật trạng thái
    update_state_invoice($id,'đã xác nhận');
    // thông báo
    toast_create('success','Thay đổi trạng thái thành công');
    // gửi thông báo đến user
    create_notify_with_update_state(
        $id,
        'Cập nhật trạng thái đơn hàng '.$id,
        'Đơn hàng của bạn đã được xác nhận ! Vui lòng đợi chúng tôi sẽ sắp xếp giao hàng !'
    );
    // cập nhật lại route
    route('admin/chi-tiet-hoa-don/'.$id);
}

// thay đổi trạng thái đơn hàng đang giao
if(isset($_POST['delivery_invoice'])) {
    // cập nhật trạng thái
    update_state_invoice($id,'đang giao');
    // cập nhật số lượng sản phẩm
    $list_product = pdo_query_new(
        'SELECT id_product, quantity_invoice FROM invoice_detail WHERE id_invoice = ?',
        $id
    );
    foreach ($list_product as $product) {
        pdo_execute_new(
            'UPDATE product SET
            quantity_product = quantity_product - '.$product['quantity_invoice'].' WHERE id_product = ?',
            $product['id_product']
        );
    }
    // thông báo
    toast_create('success','Thay đổi trạng thái thành công');
    // gửi thông báo đến user
    create_notify_with_update_state(
        $id,
        'Cập nhật trạng thái đơn hàng '.$id,
        'Đơn hàng của bạn đang được vận chuyển. Shipper sẽ liên lạc cho bạn khi được giao tới nhé !'
    );
    // cập nhật lại route
    route('admin/chi-tiet-hoa-don/'.$id);
}

// thay đổi trạng thái đơn đã hoàn thành
if(isset($_POST['done_invoice'])) {
    // cập nhật trạng thái
    update_state_invoice($id,'hoàn thành');
    // tạo đánh giá
    create_feedback($id);
    // thông báo
    toast_create('success','Thay đổi trạng thái thành công');    
    // cập nhật lại route
    route('admin/chi-tiet-hoa-don/'.$id);
}

// thay đổi trạng thái đơn hàng bị hoàn trả
if(isset($_POST['refund_invoice'])) {
    // lấy input
    $reason_close_invoice = clear_input($_POST['reason_close_invoice']);
    // cập nhật trạng thái
    update_state_invoice($id,'hoàn trả');
    // cập nhật lí do hoá đơn bị hoàn trả
    add_reason_close_invoice($id,$reason_close_invoice);
    // gửi thông báo đến user
    create_notify_with_update_state(
        $id,
        'Cập nhật trạng thái đơn hàng '.$id,
        'Đơn hàng của bạn đã được hoàn trả. Lí do :'.$reason_close_invoice
    );
    // cập nhật lại route
    route('admin/chi-tiet-hoa-don/'.$id);
}

// thay đổi trạng thái đơn hàng khôi phục bị hoàn trả
if(isset($_POST['restore_refund_invoice'])) {
    // cập nhật trạng thái
    update_state_invoice($id,'chưa xác nhận');
    // gửi thông báo đến user
    create_notify_with_update_state(
        $id,
        'Cập nhật trạng thái đơn hàng '.$id,
        'Đơn hàng của bạn đã được khôi phục về trạng thái chưa xác nhận.:'
    );
    // xoá lí do hoá đơn bị hoàn trả
    delete_reason_close_invoice($id);
    // cập nhật lại route
    route('admin/chi-tiet-hoa-don/'.$id);
}

# [DATA]
// thông tin hoá đơn
$data = $array_invoice['invoice'];
// thông tin mản hoá đơn chi tiết
$data['list_invoice_detail'] = $array_invoice['invoice_detail'];

# [RENDER]
view('admin','Chi tiết hoá đơn','invoice-detail',$data);