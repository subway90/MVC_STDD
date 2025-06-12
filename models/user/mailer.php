<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($to,$subject,$content) {
    // Gửi mail
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPSecure = MAILER_SMTP;
        $mail->Host = MAILER_HOST;
        $mail->Port = MAILER_PORT;
        $mail->Username = MAILER_USERNAME;
        $mail->Password = MAILER_PASSWORD;
        $mail->SMTPKeepAlive = true;
        $mail->Mailer = "smtp";
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->CharSet = 'utf-8';
        $mail->SMTPDebug = 0;

        //Recipients
        $mail->setFrom(MAILER_USERNAME, MAILER_YOURNAME);
        $mail->addAddress($to, 'John Doe');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
    } catch (Exception $e) {
        die("Lỗi gửi mail : {$mail->ErrorInfo}");
    }
}

/**
 * Hàm này trả về giao diện thanh toán
 * @param array $data_checkout mảng dữ liệu hoá đơn
 * @return string
 */
function render_mail_checkout($data_checkout)
{
    // giải nén mảng 
    extract($data_checkout);
    // tạo row giỏ hàng
    $row_cart = "";
    $total_cart = format_currency($total_cart);
    foreach ($list_cart as $i => $row) {
        extract($row);
        $index = $i + 1;
        $total_product = $price_product * $quantity_product_in_cart;
        $price_product = format_currency($price_product);
        $total_product = format_currency($total_product);
        if($method_payment === 'cod') $method_payment = 'Thanh toán tiền mặt';
        $row_cart .= 
        <<<HTML
            <tr>
                <td>{$index}</td>
                <td>{$name_product}</td>
                <td>{$quantity_product_in_cart}</td>
                <td>{$price_product}</td>
                <td>{$total_product}</td>
            </tr>
        HTML;
    }

    return 
    <<<HTML
        <!DOCTYPE html>
        <html lang='vi'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0 20%;
                    background-color: #f4f4f4;
                }
                .invoice-container {
                    background-color: #ffffff;
                    border-radius: 5px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                }
                .header {
                    border: 1px solid #cccccc;
                    background-color: #ffffff;
                    padding: 20px 20%;
                    border-radius: 5px;
                    text-align: center;
                    margin-bottom: 20px;
                }
                .header h2 {
                    margin: 12px 0;
                    font-size: 24px;
                }
                .header p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                tr:hover {
                    background-color: #f1f1f1;
                }
                .info {
                    text-align: center;
                    margin: 4px 0;
                }
                .info .head-info {
                    font-weight: bold;
                    margin-right: 5px;
                }
            </style>
        </head>
        <body>
            <div class='invoice-container'>
                <div class='header'>
                    <h2>Thông Tin Hoá Đơn</h2>
                    <div class='info'>
                        <div class='head-info'>Mã đơn hàng:</div>
                        <div class='body-info'>{$id_invoice}</div>
                    </div>
                    <div class='info'>
                        <div class='head-info'>Địa chỉ giao hàng:</div>
                        <div class='body-info'>{$address_invoice}</div>
                    </div>
                    <div class='info'>
                        <div class='head-info'>Ghi chú đơn hàng:</div>
                        <div class='body-info'>{$note_invoice}</div>
                    </div>
                    <div class='info'>
                        <div class='head-info'>Tổng tiền:</div>
                        <div class='body-info'>{$total_cart}</div>
                    </div>
                    <div class='info'>
                        <div class='head-info'>Phương thức thanh toán:</div>
                        <div class='body-info'>{$method_payment}</div>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        {$row_cart}
                    </tbody>
                </table>
            </div>
        </body>
        </html>
    HTML;

}