<?php

# [MODEL]

/**
 * Hàm này dùng để render giao diện thuộc tính khi gọi AJAX
 * @return string
 */
function render_temp_attribute_product() {
    $data_render = '';
    // Nếu có data trong session
    if(!empty($_SESSION['temp_attribute_product'])) {
        foreach($_SESSION['temp_attribute_product'] as $i => $row) {
            $i++;
            $data_render .= <<<HTML
                <tr>
                    <td class="fw-bold small">
                        {$row['name']}
                    </td>
                    <td class="small">
                        {$row['value']}
                    </td>
                    <td class="text-end">
                        <form class="formDeleteAttribute">
                            <input type="hidden" name="orderAttribute" value="{$i}">
                            <button class="deleteAttribute btn btn-sa-muted text-danger btn-sm mx-n3"
                                type="button" aria-label="Delete Attribute"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Xoá thông số">
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
                Chưa có thông số nào
            </td>
        </tr>
        HTML;
    return $data_render;
}

# [VARIABLE]
if(!isset($_SESSION['temp_attribute_product'])) $_SESSION['temp_attribute_product'] = [];

# [HANDLE]

// thêm ảnh
if(isset($_POST['add']) && isset($_POST['name_attribute']) && isset($_POST['value_attribute'])) {

    $_SESSION['temp_attribute_product'][] = [
        'name' => $_POST['name_attribute'],
        'value' => $_POST['value_attribute'],
    ];

    // thông báo
    view_json(200,[
        'message' => toast('success','Thêm thuộc tính mới thành công'),
        'data' => render_temp_attribute_product(),
    ]);
}

// load ảnh
if(isset($_POST['load'])) {
    view_json(200,[
        'data' => render_temp_attribute_product(),
    ]);
}

// xoá ảnh
if(isset($_POST['delete']) && isset($_POST['order'])) {

    if(!empty($_SESSION['temp_attribute_product'])) {
        // xoá
        unset($_SESSION['temp_attribute_product'][$_POST['order']-1]);
        
        // Thông báo xoá thành công
        view_json(200,[
            'message' => toast('success','Xoá thành công'),
            'data' => render_temp_attribute_product(),
        ]);
    }

    // Thông báo lỗi
    view_json(200,[
        'message' => toast('danger','Không có dữ liệu'),
        'data' => render_temp_attribute_product(),
    ]);
}