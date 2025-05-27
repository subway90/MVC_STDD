<?php

# [MODEL]

# [HANDLE]
if(isset($_POST['name_series'])) {
    $name_series = $_POST['name_series'];
    $data_return = '';

    if($name_series !== 'none'){
        $data = pdo_query(
        'SELECT *
            FROM model m
            LEFT JOIN series s
            ON s.id_series = m.id_series
            WHERE s.name_series = "'.$name_series.'"'
        );

        if(!empty($data)) {
            foreach ($data as $row) {
                $data_return .= '<option value="'. $row['id_model'] .'">'. $row['name_model'] .'</option>';
            }
        }else $data_return = '<option disabled selected>--- Danh sách trống ---</option>';
    }else {
        if($_SESSION['name_series']) {
            $data = pdo_query(
        'SELECT *
                FROM model m
                LEFT JOIN series s
                ON s.id_series = m.id_series
                WHERE s.name_series = "'.$_SESSION['name_series'].'"'
            );

            if(!empty($data)) {
                foreach ($data as $row) {
                    $selected = '';
                    if($_SESSION['id_model'] == $row['id_model']) $selected = 'selected';
                    $data_return .= '<option '.$selected.' value="'. $row['id_model'] .'">'. $row['name_model'] .'</option>';
                }
            }else $data_return = '<option disabled selected>--- Danh sách trống ---</option>';

        }else $data_return = '<option disabled selected>--- Vui lòng chọn Series ---</option>';
    }

    view_json(200,['data' => $data_return]);

}