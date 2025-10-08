<?php

function render_product_for_card_by_id($id_product) {
    return pdo_query_one(
        'SELECT p.*, b.name_brand, b.slug_brand, b.logo_brand, pi.*
        FROM product p
        LEFT JOIN brand b ON  p.id_brand = b.id_brand
        LEFT JOIN model md ON p.id_model = md.id_model
        LEFT JOIN color cl ON p.id_color = cl.id_color
        LEFT JOIN product_category pc ON  p.id_product = pc.id_product
        LEFT JOIN product_image pi ON p.id_product = pi.id_product
        LEFT JOIN category_v2 c2 ON pc.id_category_v2 = c2.id_category_v2
        LEFT JOIN category_v1 c1 ON c2.id_category_v1 = c1.id_category_v1
        WHERE p.id_product = ?
        GROUP BY p.id_product
        ORDER BY p.price_product ASC'
        ,$id_product
    );
}

function search_product($key) {
    $key = '%'.$key.'%';
    return pdo_query(
        'SELECT p.name_product, p.slug_product, p.price_product, p.sale_price_product, pi.path_product_image, b.name_brand, b.slug_brand, b.logo_brand
        FROM product p
        LEFT JOIN brand b ON  p.id_brand = b.id_brand
        LEFT JOIN model md ON p.id_model = md.id_model
        LEFT JOIN color cl ON p.id_color = cl.id_color
        LEFT JOIN product_category pc ON  p.id_product = pc.id_product
        LEFT JOIN product_image pi ON p.id_product = pi.id_product
        LEFT JOIN category_v2 c2 ON pc.id_category_v2 = c2.id_category_v2
        LEFT JOIN category_v1 c1 ON c2.id_category_v1 = c1.id_category_v1
        WHERE p.name_product LIKE ?
        OR b.name_brand LIKE ?
        AND p.quantity_product > 0
        GROUP BY p.id_product
        ORDER BY p.price_product ASC
        LIMIT 0,'.LIMIT_SEARCH_PRODUCT
        ,$key,$key
    );
}

function search_count_product($key) {
    $key = '%'.$key.'%';
    return pdo_query_value(
        'SELECT count(p.id_product)
        FROM product p
        LEFT JOIN brand b ON p.id_brand = b.id_brand
        WHERE p.name_product LIKE ?
        OR b.name_brand LIKE ?'
        ,$key, $key
    );
}