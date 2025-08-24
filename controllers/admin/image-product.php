<?php

# [MODEL]

/**
 * Hàm này dùng để render giao diện ảnh khi gọi AJAX
 * @return string
 */
function render_temp_image_product($data_path) {
    $data_render = '';
    // Nếu có ảnh tạm
    if(!empty($data_path)) {
        foreach($data_path as $path) {
            $url_path = URL_STORAGE . $path;
            $data_render .= <<<HTML
                <tr>
                    <td>
                        <div
                            class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                            <img src="{$url_path}" width="40" height="40" alt="" />
                        </div>
                    </td>
                    <td>
                        {$path}
                    </td>
                    <td class="text-end">
                        <form class="formDeleteImage">
                            <input type="hidden" name="pathImage" value="{$path}">
                            <button class="deleteImage btn btn-sa-muted text-danger btn-sm mx-n3"
                                type="button" aria-label="Delete image"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Xoá ảnh tạm">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            HTML;
        }
    }else $data_render = <<<HTML
        <tr class="align middle">
            <td colspan="3" class="text-muted text-center small fst-italic">
                Chưa có ảnh nào
            </td>
        </tr>
        HTML;
    return $data_render;
}

# [VARIABLE]
if(!isset($_SESSION['temp_image_product'])) $_SESSION['temp_image_product'] = [];

# [HANDLE]

// thêm ảnh
if(isset($_POST['add']) && isset($_FILES['file'])) {

    // test_array($_FILES['file']);
    
    $check = save_file(false,'product',$_FILES['file'],1024*1024*2,'all');

    if($check['code']) {
        // lưu path vào session
        $_SESSION['temp_image_product'][] = $check['message'];
        // thông báo
        view_json(200,[
            'message' => toast('success','Thêm ảnh thành công'),
            'data' => render_temp_image_product($_SESSION['temp_image_product']),
        ]);
    }

    view_json(200,[
        'message' => toast('danger',$check['message']),
        'data' => render_temp_image_product($_SESSION['temp_image_product']),
    ]);
}

// load ảnh
if(isset($_POST['load'])) {

    if(isset($_POST['edit'])) {
        $query = pdo_query(
            'SELECT path_product_image
            FROM product_image
            WHERE id_product = ?',
            $_POST['id_product']
        );
        // custom lại data từ sql
        if(!empty($query)) foreach ($query as $row) $data_path[] = $row['path_product_image'];
    }else $data_path = $_SESSION['temp_image_product'];

    view_json(200,[
        'data' => render_temp_image_product($data_path),
    ]);
}

// xoá ảnh
if(isset($_POST['delete']) && isset( $_POST['path'])) {
    // xoá ảnh
    $check = delete_file($_POST['path']);
    // validate
    if($check['code']) {

        // Xoá path trong session
        foreach ($_SESSION['temp_image_product'] as $i => $path) {
            if($path === $_POST['path']) {
                unset($_SESSION['temp_image_product'][$i]);
                break;
            }
        }

        // Thông báo xoá thành công
        view_json(200,[
            'message' => toast('success',$check['message']),
            'data' => render_temp_image_product($_SESSION['temp_image_product']),
        ]);
    }

    // Thông báo lỗi
    view_json(200,[
        'message' => toast('danger',$check['message']),
        'data' => render_temp_image_product($_SESSION['temp_image_product']),
    ]);
}