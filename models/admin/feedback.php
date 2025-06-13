<?php 

function create_feedback($id_invoice) {
    $list_invoice_detail = pdo_query_new(
        'SELECT *
        FROM invoice_detail
        WHERE id_invoice = ?'
        ,$id_invoice
    );

    foreach ($list_invoice_detail as $invoice_detail) {
        pdo_execute_new(
            'INSERT INTO feedback (id_invoice,id_product)
            VALUES(?,?)'
            ,$id_invoice,$invoice_detail['id_product']
        );
    }

}