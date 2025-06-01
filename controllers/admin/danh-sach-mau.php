<?php 

# [MODEL]
model('admin','color');

# [VARIABLE]
$status_page = true;

# [HANDLE]
// Nếu xem danh sách xoá
if(get_action_uri(2) === 'danh-sach-xoa') $status_page = false;

// Nếu xoá
if(isset($_POST['delete']) && $_POST['delete']) {
    // input
    $id_color = $_POST['delete'];
    // validate
    if(check_exist_one('color',$id_color)) {
        // delete
        delete_one('color',$id_color);
        // thông báo
        toast_create('success','Xoá thành công màu');
    }else toast_create('danger','Không tồn tại màu này');
}

// Nếu khôi phục
if(isset($_POST['restore']) && $_POST['restore']) {
    // input
    $id_color = $_POST['restore'];
    // validate
    if(check_exist_one_in_trash('color',$id_color)){
        // delete
        restore_one('color',$id_color);
        // thông báo
        toast_create('success','Khôi phục thành công màu');
    } else toast_create('danger','Không tồn tại màu này ở danh sách xoá');
    
}

# [DATA]
$data = [
    'status_page' => $status_page,
    'list_color' => get_all_color($status_page),
];

# [RENDER]
view('admin','Danh sách màu','color-list',$data);