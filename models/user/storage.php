<?php


function resizeImage($filePath, $newWidth, $newHeight) {
    list($width, $height, $type) = getimagesize($filePath);
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    
    switch ($type) {
        case IMAGETYPE_JPEG:
            $source = imagecreatefromjpeg($filePath);
            break;
        case IMAGETYPE_PNG:
            $source = imagecreatefrompng($filePath);
            break;
        case IMAGETYPE_GIF:
            $source = imagecreatefromgif($filePath);
            break;
        default:
            throw new Exception("Unsupported image type.");
    }

    imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
    // Lưu ảnh đã resize
    header("Content-Type: image/jpeg");
    imagejpeg($newImage);
    
    imagedestroy($source);
    imagedestroy($newImage);
}

function original_image($path_file) {
    // Kiểm tra xem file có tồn tại không
    if (!file_exists($path_file)) {
        die("File không tồn tại.");
    }

    // Lấy thông tin về ảnh
    list($width, $height, $type) = getimagesize($path_file);
    
    // Thiết lập header cho trình duyệt
    header("Content-Type: image/jpeg");

    // Hiển thị ảnh
    switch ($type) {
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($path_file);
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($path_file);
            break;
        case IMAGETYPE_GIF:
            $image = imagecreatefromgif($path_file);
            break;
        default:
            die("Unsupported image type.");
    }

    // Xuất ảnh
    imagejpeg($image);

    // Giải phóng bộ nhớ
    imagedestroy($image);

    // Trả về thông tin kích thước
    return array('width' => $width, 'height' => $height);
}