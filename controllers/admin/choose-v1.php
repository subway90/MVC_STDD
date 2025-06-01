<?php

# [MODEL]

# [HANDLE]
if(isset($_POST['id_category_v1'])) {
    $id_category_v1 = $_POST['id_category_v1'];
    $data_return = '';

    // nếu đang edit
    if(isset($_POST['edit'])) $value_temp = $_SESSION['selected_product_category_edit'];
    // nếu đang add
    else $value_temp = $_SESSION['selected_product_category'];

    if($id_category_v1 !== 'none'){
        $data = pdo_query(
        'SELECT v2.*
            FROM category_v2 v2
            LEFT JOIN category_v1 v1
            ON v2.id_category_v1 = v1.id_category_v1
            WHERE v1.id_category_v1 = '.$id_category_v1
        );

        if(!empty($data)) {
            foreach ($data as $row) {
                $data_return .= '<option value="'. $row['id_category_v2'] .'">'. $row['name_category_v2'] .'</option>';
            }
        }
    }else {
        if(!empty($value_temp['v1'])) {
            $data = pdo_query(
            'SELECT v2.*
                FROM category_v2 v2
                LEFT JOIN category_v1 v1
                ON v2.id_category_v1 = v1.id_category_v1
                WHERE v1.id_category_v1 = '. $value_temp['v1']
            );

            if(!empty($data)) {
                foreach ($data as $row) {
                    $selected = false;
                    foreach($value_temp['v2'] as $id_v2) {
                        if($id_v2 == $row['id_category_v2']) $selected = 'selected';
                    }
                    $data_return .= '<option '.$selected.' value="'. $row['id_category_v2'] .'">'. $row['name_category_v2'] .'</option>';
                }
            }
        }
    }

    view_json(200,['data' => $data_return]);

}