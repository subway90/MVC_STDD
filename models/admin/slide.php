<?php

/**
 * Lấy tất cả slide banner
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_slide($state) {
    if($state) {
        $query = 'IS NULL';
    }
    else {
        $query = 'IS NOT NULL';
    }

    return pdo_query(
        'SELECT *
        FROM slide
        WHERE deleted_at '.$query.'
        ORDER BY order_slide ASC'
    );
}


/**
 * Lấy vị trí hiện tại của slide
 * @param mixed $id_slide
 * @return int
 */
function get_order_by_id($id_slide) {
    return pdo_query_value(
            'SELECT order_slide
            FROM slide
            WHERE id_slide = ?',
            $id_slide
        );
}

/**
 * Thay đổi vị trí của slide
 * @param string $type Loại cần thay đổi up : thay đổi lên | down : thay đổi xuống
 */
function swap_order($type,$id_slide) {
    // check type
    if(!in_array($type,['up','down'])) return [
        'code' => 0,
        'message' => '$type không thuộc mảng [up,down]'
    ];

    // get order now
    $order_now = get_order_by_id($id_slide);
    // validate
    if(!$order_now) return [
        'code' => 0,
        'message' => 'Không tồn tại slide này'
    ];

    # validate
    // validate
    if($type === 'up') {
        // validate order
        if($order_now === 1) return [
            'code' => 0,
            'message' => 'Hiện tại là vị trí đầu tiên, không thể thay đổi nữa'
        ];

        // value order swap
        $order_swap = $order_now - 1;
    }
    // down
    elseif($type === 'down') {
        // validate order
        if($order_now === pdo_query_value('SELECT MAX(order_slide) FROM slide')) return [
            'code' => 0,
            'message' => 'Hiện tại là vị trí cuối cùng, không thể thay đổi nữa'
        ];

        // value order swap
        $order_swap = $order_now + 1;
    }
    
    // thay đổi trước sang hiện tại
    pdo_execute(
        'UPDATE slide SET
        order_slide = ?
        WHERE order_slide = ?'
        ,$order_now,$order_swap
    );
    // thay đổi hiện tại sang trước
    pdo_execute(
        'UPDATE slide SET
        order_slide = ?
        WHERE id_slide = ?'
        ,$order_swap,$id_slide
    );

    return [
        'code' => 1,
        'message' => 'Thay đổi vị trí thành công',
    ];
}