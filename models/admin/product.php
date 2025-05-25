<?php 

function get_all_product($state_product) {
    if($state_product) $query_state = 'IS NULL';
    else $query_state = 'IS NOT NULL';

    return pdo_query(
        'SELECT p.*, b.name_brand, b.slug_brand, b.logo_brand, pi.*, c1.name_category_v1
        FROM product p
        LEFT JOIN brand b ON  p.id_brand = b.id_brand
        LEFT JOIN model md ON p.id_model = md.id_model
        LEFT JOIN color cl ON p.id_color = cl.id_color
        LEFT JOIN product_category pc ON  p.id_product = pc.id_product
        LEFT JOIN product_image pi ON p.id_product = pi.id_product
        LEFT JOIN category_v2 c2 ON pc.id_category_v2 = c2.id_category_v2
        LEFT JOIN category_v1 c1 ON c2.id_category_v1 = c1.id_category_v1
        WHERE p.deleted_at '.$query_state.'
        GROUP BY p.id_product
        ORDER BY p.created_at DESC'
    );
}