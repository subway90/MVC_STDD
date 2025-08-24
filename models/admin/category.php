<?php

/**
 * Lấy tất cả danh mục v1
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_category_v1($state) {
    if($state) {
        $query = 'IS NULL';
        $order = 'created_at DESC';
    }
    else{
        $query = 'IS NOT NULL';
        $order = 'deleted_at DESC';
    }

    return pdo_query(
        'SELECT *
        FROM category_v1
        WHERE deleted_at '.$query.'
        ORDER BY '.$order
    );
}

/**
 * Lấy tất cả danh mục của ADMIN
 * @param $state Trạng thái cần lấy, TRUE : lấy danh sách hoạt động, FALSE : lấy danh sách xoá
 * @return array
 */
function get_all_category($state) {
        if($state) {
        $query = 'IS NULL';
        $order = 'created_at DESC';
    }
    else{
        $query = 'IS NOT NULL';
        $order = 'deleted_at DESC';
    }

    $data = pdo_query(
        'SELECT *
        FROM category_v1
        WHERE deleted_at '.$query.'
        ORDER BY '.$order
    );

    // lấy danh sách v2
    if(!empty($data)) {
        foreach ($data as $i => $v1) {
            $data[$i]['list_v2'] = pdo_query(
                'SELECT v2.*, COUNT(pc.id_category_v2) count_product
                FROM category_v2 v2
                LEFT JOIN product_category pc ON v2.id_category_v2 = pc.id_category_v2
                WHERE v2.id_category_v1 = ?
                GROUP BY v2.id_category_v2',
                $v1['id_category_v1']
            );
        }
    }

    return $data;
}

/**
 * Kiểm tra xem danh mục v2 đã tồn tại hay chưa
 * @param mixed $name_category_v2
 * @param mixed $id_category_v1
 * @return int|string
 */
function check_name_category_v2_exist($name_category_v2,$id_category_v1) {
    return pdo_query_value(
        'SELECT id_category_v2
        FROM category_v2
        WHERE name_category_v2 = ?
        AND id_category_v1 = ?',
        $name_category_v2,$id_category_v1
    );
}


/**
 * Render danh sách danh mục
 * @param string return
 */
function render_category($status_page,$id_v1_open) {
    // lấy data
    $data_query = get_all_category($status_page);

    // variable
    $data_render = '';
    
    // nếu data rỗng
    if(empty($data_query)) {
        $data_render .= <<<HTML
            <div class="text-muted text-center small fst-italic py-4">
                Danh sách trống
            </div>
            HTML;
    }
    // nếu có data
    else {
        // render head tag accordion
        $data_render .= <<<HTML
            <div class="accordion card" id="accordion-1">
        HTML;

        // render data category v1 (body accordion)
        foreach ($data_query as $i => $row) {
            # variable
            extract($row);
            $data_category_v2 = '';

            # format 
            ($id_v1_open == $id_category_v1) ? $collapsed = '' : $collapsed = 'collapsed';
            ($id_v1_open == $id_category_v1) ? $show = 'show' : $show = '';
            $path_logo = URL_STORAGE.$logo_category_v1;
            $url_admin = URL_ADMIN;

            # render data category v2
            // nếu trống danh sách v2
            if(empty($list_v2)) {
                $data_category_v2  .= 
                <<<HTML
                    <tr class="align middle">
                        <td colspan="3" class="text-muted text-center small fst-italic">
                            Chưa có danh mục con nào
                        </td>
                    </tr>
                HTML;
            }
            // nếu có danh sách v2
            else{
                foreach ($list_v2 as $v2) {
                    extract($v2);
                    $data_category_v2 .= 
                    <<<HTML
                        <tr>
                            <td class="small">
                                {$name_category_v2}
                            </td>
                            <td class="small text-center">
                                {$count_product}
                            </td>
                            <td class="text-end">
                                <button class="deleteV2 btn btn-sa-muted text-danger btn-sm mx-n3"
                                    type="button" aria-label="Delete Attribute"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="bottom"
                                    data-value-id-v1="{$id_category_v1}"
                                    data-value-id-v2="{$id_category_v2}"
                                    title="Xoá danh mục con này">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                    HTML;
                }
            }


            $data_render .=
            <<<HTML
                <div class="sa-divider"></div>
                <form action="" method="post" id="formActionV2">
                <input type="hidden" name="id_category_v1" value="{$id_category_v1}">
                <div class="accordion-item">
                    <h2 class="accordion-header d-flex">
                        <button class="accordion-button sa-hover-area {$collapsed}" type="button" data-bs-toggle="collapse"
                            data-bs-target="#tab{$i}" aria-expanded="true">
                            <span class="accordion-sa-icon"></span>
                            <img height="30" class="me-3" src="{$path_logo}" alt="{$logo_category_v1}">
                            {$name_category_v1}
                        </button>
                    </h2>
                    <div id="tab{$i}" class="accordion-collapse collapse {$show}"
                        data-bs-parent="#accordion-1">
                        <div class="accordion-body mb-5">
                            <div class="sa-divider"></div>
                            <div class="table-responsive">
                                <table class="sa-table mt-5">
                                    <thead>
                                        <tr>
                                            <th class="w-min-5x">Danh mục con</th>
                                            <th class="w-min-5x text-center">Số lượng sản phẩm</th>
                                            <th class="w-min text-end">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {$data_category_v2}
                                    </tbody>
                                </table>
                            </div>
                            <div class="sa-divider"></div>                                
            HTML;
            // format button with state
            if(!$deleted_at) $data_render .= 
            <<<HTML
                            <div class="d-flex align-items-center justify-content-between gap-5 py-3">
                                <button class="btn btn-sa-muted btn-sm mx-n3"
                                    type="button"
                                    data-bs-target="#modalAddV2"
                                    data-value-id="{$id_category_v1}"
                                    data-bs-toggle="modal">
                                    <i class="bi bi-plus-square-dotted me-2"></i>
                                    Thêm danh mục con mới
                                </button>
                                <div class="d-flex align-items-center gap-3">
                                    <button name="delete" type="submit" value="{$id_category_v1}" class="btn btn-sm btn-danger shadow d-flex align-items-center gap-3" data-value-id="{$id_category_v1}">
                                        <i class="bi bi-trash bi fs-6"></i> Xoá danh mục
                                    </button>
                                    <a href="{$url_admin}sua-danh-muc/{$id_category_v1}" type="button" class="btn btn-sm btn-warning shadow d-flex align-items-center gap-3" data-value-id="{$id_category_v1}">
                                        <i class="bi bi-pencil-square bi fs-6"></i> Sửa danh mục
                                    </a>
                                </div>
                            </div>
            HTML;
            else $data_render .= 
            <<<HTML
                            <div class="d-flex align-items-center justify-content-end gap-5 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <button name="restore" type="submit" value="{$id_category_v1}" class="btn btn-sm btn-outline-dark shadow d-flex align-items-center gap-3" data-value-id="{$id_category_v1}">
                                        <i class="bi bi-trash-restore bi fs-6"></i> Khôi phục danh mục
                                    </button>
                                </div>
                            </div>
            HTML;
                                            
            $data_render .= 
        <<<HTML
                </div>
            </div>
        </div>
        </form>
        HTML;
        }

        // render foot tag accordion
        $data_render .= 
        <<<HTML
            </div>
        HTML;
    }
        

    // return
    return $data_render;
}


/**
 * Trả về số lượng sản phẩm đã được sử dụng id cate_v2
 * @param mixed $id_v2
 * @return int|string
 */
function check_cate_v2_for_delete($id_v2) {
    return pdo_query_value(
        'SELECT COUNT(id_category_v2) count
        FROM product_category
        WHERE id_category_v2 = ?'
        ,$id_v2
    );
}