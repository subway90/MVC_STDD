<?php

# [MODEL]
model('user','storage');

# [HANDLE]

// input
$width = get_action_uri(1);
$folder = get_action_uri(2);
$path = get_action_uri(3);

// validate
if(!$width) $error_valid[] = 'Chưa nhập {width}';
elseif($width !== 'o'){
    if(!is_numeric($width)) $error_valid[] = 'Giá trị {width} phải là chữ số';
    elseif($width < 40 || $width > 1920) $error_valid[] = 'Giá trị {width} không hợp lệ [40-1920]';
}
if(!$folder) $error_valid[] = 'Chưa nhập giá trị {folder}';
if(!$path) $error_valid[] = 'Chưa nhập giá trị {path}';
elseif(!file_exists('assets/file/'.$folder.'/'.$path)) $error_valid[] = 'giá trị {path} không tồn tại';

// format
$full_path = 'assets/file/'.$folder.'/'.$path;

# [DATA]

# [RENDER]

if(!empty($error_valid)) view_json(403,[
    'message' => $error_valid[0],
    'param' => 'storage/{width:int[40-1920]}/{folder:str}/{path:str}'
]);

if($width === 'o') original_image($full_path);

resizeImage($full_path, $width);

