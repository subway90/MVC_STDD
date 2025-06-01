<?php

function render_data_image_brand($session) {
    // nếu session có path
    if($session) {
        $path = URL_STORAGE.$session;
        $data =  <<<HTML
            <img class="w-100" src="{$path}">
            <div class="text-muted mt-3">
                {$session}
            </div>
            <div class="text-muted text-center small mt-3">
                <button id="addImageBrand" class="btn btn-sa-muted btn-sm mx-n3"
                    type="button" aria-label="Delete image"
                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Nhấn vào để chọn ảnh">
                    <i class="bi bi-arrow-repeat me-2"></i>
                    Thay đổi ảnh khác
                </button>
            </div>
        HTML;
    }
    // nếu session rỗng
    else $data = <<<HTML
        <div class="text-muted text-center small mt-3">
            <button id="addImageBrand" class="btn btn-sa-muted btn-sm mx-n3"
                type="button" aria-label="Delete image"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Nhấn vào để chọn ảnh">
                <i class="bi bi-plus-square-dotted me-2"></i>
                Thêm ảnh của thương hiệu
            </button>
        </div>
    HTML;

    return $data;
}


// load data ảnh
if(isset($_POST['load'])) {
    // nếu đang là edit
    if(isset($_POST['edit'])) {
        view_json(200,[
            'data' => render_data_image_brand($_SESSION['temp_logo_brand_edit'])
        ]);
    }
    // nếu đang là add
    view_json(200,[
        'data' => render_data_image_brand($_SESSION['temp_logo_brand'])
    ]);
}

// thêm ảnh
if(isset($_POST['add']) && isset($_FILES['file'])) {
    // tiến hành lưu file
    $check = save_file(false,'brand',$_FILES['file'],2*1024*1024,'all');
    // nếu lưu thành công
    if($check['code']) {
        // nếu đang là edit
        if(isset($_POST['edit']) && isset($_POST['id_brand'])) {
            // xoá ảnh cũ (vì edit thì mặc định luôn có ảnh cũ nên phải xoá ảnh cũ đi)
            delete_file($_SESSION['temp_logo_brand_edit']);
            // lưu path tạm mới
            $_SESSION['temp_logo_brand_edit'] = $check['message'];
            // lưu lại ở db
            pdo_execute_new(
                'UPDATE brand SET logo_brand = ? WHERE id_brand = ?',
                $_SESSION['temp_logo_brand_edit'], $_POST['id_brand']
            );
            // reponse
            view_json(200,[
                'message' => toast('success','Thay đổi ảnh mới thành công'),
                'data' => render_data_image_brand($_SESSION['temp_logo_brand_edit']),
            ]);

        }
        // nếu đang là add
        else{
            // nếu có ảnh cũ
            if($_SESSION['temp_logo_brand']) {
                // thực hiện xoá
                delete_file($_SESSION['temp_logo_brand']);
                // message
                $message = 'Thay đổi ảnh mới thành công';
            }else $message = 'Thêm ảnh thành công';
            // lưu path tạm
            $_SESSION['temp_logo_brand'] = $check['message'];            
            // reponse
            view_json(200,[
                'message' => toast('success',$message),
                'data' => render_data_image_brand($_SESSION['temp_logo_brand']),
            ]);
        }
    }else {
        view_json(200,[
            'message' => toast('success',$check['message']),
            'data' => render_data_image_brand($_SESSION['temp_logo_brand']),
        ]);
    }
}