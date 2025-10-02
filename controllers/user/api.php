<?php

# api về sản phẩm
if(get_action_uri(1) === 'product') {
    if(get_action_uri(2) === 'getall') {
        return view_json(
            200,
            [
                'message' => 'success',
                'data' => pdo_query('SELECT id_product, name_product, price_product FROM product LIMIT 0,20'),
            ]
        );
    }
}

# api về icon
if(get_action_uri(1) === 'icon') {
    if(get_action_uri(2) === 'add') {
        return view_json(
            201,
            [
                'param' => $_POST
            ]
        );
    }
}