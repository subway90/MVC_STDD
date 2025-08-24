<?php

/**
 * Lấy tất cả danh sách có thể sử dụng được của người dùng đang đăng nhập
 * @param $type Bao gồm :
 * - all : Lấy tất cả field
 * - code : chỉ lấy duy nhất mã voucher
 * @return string | array
 */
function get_list_voucher($type) {
    // query
    $result = pdo_query(
        'SELECT *
        FROM voucher
        WHERE (username = ? OR username IS NULL)
        AND expire_voucher > NOW()
        AND deleted_at IS NULL
        ORDER BY expire_voucher ASC',
        auth('username')
    );
    // filter
    if($type === 'all') return $result;
    elseif($type === 'code') {
        $array_code = [];
        foreach ($result as $voucher) {
            $array_code[] = $voucher['code_voucher'];
        }
        return $array_code;
    }
    // validate type
    else return '$type nhập vào không hợp lệ khi dùng hàm get_list_voucher';
}

/**
 * Dùng để lấy thông tin của 1 voucher theo code
 * @param mixed $code_voucher Mã code voucher cần get
 * @return array
 */
function get_one_voucher($code_voucher) {
    return pdo_query_one(
        'SELECT * FROM voucher WHERE code_voucher = ?',
        $code_voucher
    );
}

/**
 * Kiểm tra voucher khi sử dụng (bao gồm kiểm tra tồn tại và kiểm tra đã có trong session hay chưa)
 * @param mixed $code_voucher_need_check Mã cần kiểm tra
 * 
 * @return array code (int) | message (string) :
 * 
 * Nếu code = 0 => Thất bại 
 * 
 * code = 1 => Thành công
 */
function check_voucher($code_voucher_need_check) {
    $order_voucher = 0;
    $error = null;
    // Lấy danh sách voucher
    $list = get_list_voucher('all');
    // Nếu danh sách voucher có
    if(!empty($list)) {
        foreach ($list as $voucher_check) {
            if($code_voucher_need_check === $voucher_check['code_voucher']) {

                # Kiểm tra đã tồn tại trong session chưa, nếu có thì trả về vị trí + 1 (tránh value = null)
                if(!empty($_SESSION['voucher'])) {
                    foreach ($_SESSION['voucher'] as $i => $voucher) {
                        if($code_voucher_need_check === $voucher) {
                            $order_voucher = $i + 1;
                            break;
                        }
                    }
                }
                
                # kiểm tra điều kiện
                // kiểm tra số lượng
                if(!$voucher_check['quantity_voucher']) $error = 'Mã giảm giá đã được dùng hết';
                // kiểm tra voucher cho người dùng nếu có
                if($voucher_check['username']) if($voucher_check['username'] !== auth('username')) $error = 'Mã giảm giá này không phải của bạn';
                // kiểm tra ngày hết hạn
                if(strtotime($voucher_check['expire_voucher']) < time()) $error = 'Mã giảm giá đã hết hạn';
                // kiểm tra điều kiện áp dụng nếu có
                if($voucher_check['condition_voucher']) if($voucher_check['condition_voucher'] > get_cart('total_cart')) $error = 'Chưa đủ điều kiện để dùng mã giảm giá';
                
                # error
                if($error) {
                    // Xoá voucher nếu có tồn tại trong session
                    if($order_voucher) unset($_SESSION['voucher'][$order_voucher - 1]);
                    // return
                    return [
                        'code' => 0,
                        'message' => $error
                    ];
                }

                # success

                // Nếu session đã có code voucher
                if($order_voucher) return [
                    'code' => 1,
                    'message' => 'Voucher đã được thêm rồi'
                ];
                
                // kiểm tra đã tồn tại voucher cùng loại như thế chưa, nếu có -> thay thế
                if(!empty($_SESSION['voucher'])) {
                    foreach ($_SESSION['voucher'] as $i => $voucher) {
                        if($voucher_check['type_voucher'] === get_one_voucher($_SESSION['voucher'][$i])['type_voucher']) {
                            unset($_SESSION['voucher'][$i]);
                            break;
                        }
                    }
                }
    
                // Nếu chưa có -> thêm vào session
                $_SESSION['voucher'][] = $voucher_check['code_voucher'];

                return [
                    'code' => 1,
                    'message' => 'Thêm mã giảm giá thành công'
                ];
            }
        }
    }

    return [
        'code' => 0,
        'message' => 'Mã giảm giá không tồn tại'
    ];
}
