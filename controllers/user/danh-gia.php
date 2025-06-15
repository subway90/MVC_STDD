<?php 

# [MODEL]
model('admin','feedback');

# [VARIABLE]
$point = $content = '';
$error_valid = [];

# [HANDER]
if(get_action_uri(1)) {
    $id_feedback = get_action_uri(1);
    // get
    $get_feedback = pdo_query_one_new(
        'SELECT f.*, p.name_product, pi.path_product_image
        FROM feedback f
        LEFT JOIN invoice i ON i.id_invoice = f.id_invoice
        LEFT JOIN user u ON u.username = i.username
        LEFT JOIN product p ON p.id_product = f.id_product
        LEFT JOIN product_image pi ON pi.id_product = p.id_product
        WHERE u.username = ?
        AND f.id_feedback = ?
        GROUP BY f.id_feedback'
        ,auth('username'),$id_feedback
    );
    

    // Tạo đánh giá mới
    if(isset($_POST['create']) && isset($_POST['point']) && isset($_POST['content'])) {
        // input
        $point = $_POST['point'];
        $content = $_POST['content'];

        // validate
        if(!$point) $error_valid[] = 'Vui lòng chọn điểm sao';
        if(!$content) $error_valid[] = 'Vui lòng nhập nội dung đánh giá';

        // save db
        if(empty($error_valid)) {
            pdo_execute_new(
                'UPDATE feedback SET point_feedback = ?, content_feedback = ?, updated_at = current_timestamp() WHERE id_feedback = ?'
                ,$point,$content,$id_feedback
            );

            // toast
            toast_create('success','Đánh giá hoá đơn thành công');

            // route
            route('danh-gia/'.$id_feedback);


        }else toast_create('danger',$error_valid[0]);

    }

    

    // validate
    if($get_feedback) {
        // data
        $data = [
            'get_feedback' => $get_feedback,
            'content' => $content,
            'point' => $point,
        ];

        // render
        view('user','Đánh giá','feedback',$data);
    }
}

view_error(404);
