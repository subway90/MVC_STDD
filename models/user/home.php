<?php

/**
 * Hàm này lấy thông tin data của section ở trang chủ
 */
function get_all_section() {

    // variable
    $result = [];

    // get section
    $get_all_info_section = pdo_query(
        'SELECT * 
        FROM section
        WHERE deleted_at IS NULL'
    );

    // data
    if(!empty($get_all_info_section)) {
        foreach ($get_all_info_section as $i => $section) {
            // format
            $result[$i]['info'] = $section;
            $result[$i]['list_product'] = pdo_query(
                'SELECT sp.id_product
                FROM section_product sp
                LEFT JOIN product p ON p.id_product = sp.id_product
                WHERE sp.id_section = ?
                AND p.deleted_at IS NULL'
                ,$section['id_section']
            );
        }
    }

    return $result;
}