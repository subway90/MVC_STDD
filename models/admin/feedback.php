<?php 

function create_feedback($id_invoice) {
    $list_invoice_detail = pdo_query(
        'SELECT *
        FROM invoice_detail id
        LEFT JOIN invoice i ON i.id_invoice = id.id_invoice
        WHERE i.id_invoice = ?'
        ,$id_invoice
    );

    // tạo id feedback
    $id_feedback = create_uuid();


    foreach ($list_invoice_detail as $invoice_detail) {
        // tạo feedback
        pdo_execute(
            'INSERT INTO feedback (id_feedback,id_invoice,id_product)
            VALUES(?,?,?)'
            ,$id_feedback,$id_invoice,$invoice_detail['id_product']
        );
        // tạo thông báo
        create_notify(
                $invoice_detail['username'],
                'Đánh giá sản phẩm sau khi mua hàng',
                'Đơn hàng của bạn đã hoàn thành, vui lòng đánh giá chất lượng sản phẩm !',
                'danh-gia/'.$id_feedback
        );
    }

}

function create_notify_with_update_state($id_invoice,$title,$content) {
    $get_username = pdo_query_value(
        'SELECT username FROM invoice
        WHERE id_invoice = ?'
        ,$id_invoice
    );

    // tạo thông báo
    create_notify(
            $get_username,
            $title,
            $content,
            'lich-su-mua-hang/'.$id_invoice
    );
}

function create_notify($username,$title,$content,$link_action) {
     pdo_execute(
        'INSERT INTO notify (username,title_notify,content_notify,link_action_notify)
        VALUES (?,?,?,?)'
        ,$username
        ,$title
        ,$content
        ,$link_action
    );
}