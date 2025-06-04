<?php

# [MODEL]
model('admin','slide');

# [HANDLE]



# [DATA]
$data = [
    'list_slide' => get_all_slide(true),
];

// test_array($data);

# [RENDER]
view('user','Trang chủ','home',$data);