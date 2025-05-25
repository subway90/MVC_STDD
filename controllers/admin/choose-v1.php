<?php

# [MODEL]

# [HANDLE]
if(isset($_POST['name_v1'])) {
    $name_v1 = $_POST['name_v1'];
    $data_return = '';

    if($name_v1 !== 'none'){
        $data = pdo_query(
        'SELECT *
            FROM category_v2 v2
            LEFT JOIN category_v1 v1
            ON v2.id_category_v1 = v1.id_category_v1
            WHERE v1.name_category_v1 = "'.$name_v1.'"'
        );

        if(!empty($data)) {
            foreach ($data as $row) {
                $data_return .= '<option value="'. $row['id_category_v2'] .'">'. $row['name_category_v2'] .'</option>';
            }
        }
    }

    view_json(200,['data' => $data_return]);

}