<?php

# [MODEL]
model('user','home');
model('user','search');
model('admin','slide');
model('user','product');
model('admin','flashsale');

# [HANDLE]
// load sự kiện flashsale
if(isset($_POST['flashsale'])) {
    // reponse
    view_json(200,[
        'data' => render_show_flashsale('today'),
    ]);
}


# [DATA]
$data = [
    'list_slide' => get_all_slide(true),
    'section_product' => get_all_section(),
];

// test_array($data);

# [RENDER]
view('user','Trang chủ','home',$data);