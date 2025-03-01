<?php
    require_once '../config.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= WEB_FAVICON ?>" type="image/x-icon">
    <title><?= WEB_NAME ?> | 403 Forbidden</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: color #f9f9f9;
        }
        .box{
            font-family : monospace;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }
        .error {
            font-size: 20px;
            font-weight: bold;
            color : #f37986;
            border-right: solid 2px;
            padding : 0 12px 0 0;
            margin: 12px;
        }
        p {
            color: gray;
            font-size: 14px;
        }
        a {
            color: gray;
        }
        a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="error">403 Forbidden</div>
        <div class="">
            <p>Bạn không có quyền truy cập vào đường dẫn này.</p>
        </div>
    </div>
</body>
</html>