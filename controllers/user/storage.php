<?php

# [MODEL]
model('user','storage');

# [HANDLE]
// input
$width = get_action_uri(1);
$height = get_action_uri(2);
$folder = get_action_uri(3);
$path = get_action_uri(4);

// validate
if(!$width) $error_valid[] = 'Chưa nhập width';
elseif($width !== 'o'){
    if(!is_numeric($width)) $error_valid[] = 'Width phải là chữ số';
    elseif($width < 40 || $width > 1920) $error_valid[] = 'Giá trị Width không hợp lệ [40-1920]';
}
if(!$height) $error_valid[] = 'Chưa nhập height';
elseif($height !== 'o') {
    if(!is_numeric($height)) $error_valid[] = 'Height phải là chữ số';
    elseif($height < 40 || $height > 1920) $error_valid[] = 'Giá trị Height không hợp lệ [40-1920]';
}
if(!$folder) $error_valid[] = 'Chưa nhập folder';
if(!$path) $error_valid[] = 'Chưa nhập path';
elseif(!file_exists('assets/file/'.$folder.'/'.$path)) $error_valid[] = 'Path không tồn tại';

// format
$full_path = 'assets/file/'.$folder.'/'.$path;

# [DATA]

# [RENDER]

if(!empty($error_valid)) view_json(403,[
    'message' => $error_valid[0],
    'param' => 'storage/{width:int}/{height:int}/{folder:str}/{path:str}'
]);

if($width === 'o' && $height === 'o') original_image($full_path);

resizeImage($full_path, $width, $height);

