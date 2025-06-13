<?php 

# [MODEL]
model('admin','feedback');

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

    // validate
    if($get_feedback) {
        // data
        $data = [
            'get_feedback' => $get_feedback
        ];

        // render
        view('user','Đánh giá','feedback',$data);
    }
}

view_error(404);
