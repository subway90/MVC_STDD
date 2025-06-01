<?php 

# [MODEL]
model('admin','brand');

# [VARIABLE]
$status_page = true;

# [HANDLE]
// Nếu xem danh sách xoá
if(get_action_uri(2) === 'danh-sach-xoa') $status_page = false;

// Nếu xoá
if(isset($_POST['delete']) && $_POST['delete']) {
    // input
    $id_brand = $_POST['delete'];
    // validate
    if(check_exist_one('brand',$id_brand)) {
        // delete
        delete_one('brand',$id_brand);
        // thông báo
        toast_create('success','Xoá thành công thương hiệu');
    }else toast_create('danger','Không tồn tại thương hiệu này');
}

// Nếu khôi phục
if(isset($_POST['restore']) && $_POST['restore']) {
    // input
    $id_brand = $_POST['restore'];
    // validate
    if(check_exist_one_in_trash('brand',$id_brand)){
        // delete
        restore_one('brand',$id_brand);
        // thông báo
        toast_create('success','Xoá thành công thương hiệu');
    } else toast_create('danger','Không tồn tại thương hiệu này ở danh sách xoá');
    
}

# [DATA]
$data = [
    'status_page' => $status_page,
    'list_brand' => get_all_brand($status_page),
];

# [RENDER]
view('admin','Danh sách thương hiệu','brand-list',$data);