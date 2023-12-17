<?php
    ob_start();
    session_start();
    include "models/pdo.php";
    include "models/taikhoan.php";
    require_once "view/header.php";
    require_once "models/lichthi.php";
    require_once "models/dethi.php";
    require_once "models/chuyende.php";
    // load lịch thi
    $dslt = load_all_lichthi_home();
    $dscd = load_all_chuyende_home();
    //load đề thi
  
    if (isset($_GET['act']) ){
        $act = $_GET['act'];
    // $act = $_GET['act'] ?? "";  
    switch ($act) {
        case "trangchu" :
            include "view/home.php";
            break;
        // ---------------------------------------------- Trang đăng nhập ---------------------------------------------  
        case "dangnhap":
            if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user,$pass);
                if(is_array($checkuser)){
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php');
                }else {
                    echo "<script type='text/javascript'>alert('Tài khoản không tồn tại. Vui lòng thực hiện đăng ký tài khoản');</script>";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        // ---------------------------------------------- Trang đăng ký ---------------------------------------------
        case "dangky":
            if(isset($_POST['dangky']) && ($_POST['dangky'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $sdt = $_POST['sdt'];
                // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
                $user2 = select_taikhoan_by_user($user);
                if ($user2){
                    // Nếu người dùng tồn tại, hiển thị thông báo lỗi
                    echo "<script type='text/javascript'>alert('Email đã được sử dụng. Vui lòng chọn Email khác');</script>";
                } else {
                    insert_taikhoan($user,$pass,$sdt);
                    echo "<script type='text/javascript'>alert('Đã đăng ký thành công');</script>";
                }
            }
            include "view/taikhoan/dangky.php";
            break;
        // ---------------------------------------- Đăng xuất tài khoản ----------------------------------------
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        // ---------------------------------------- cập nhật tài khoản ----------------------------------------
        case 'edit_taikhoan':
            break;
        case "gioithieu":
            include "view/gioithieu&lienhe/gioithieu.php";
            break;
        case "lienhe":
            include "view/gioithieu&lienhe/lienhe.php";
            break;
        case "vao-thi":
            if(isset($_POST['vao-thi']) && $_POST['vao-thi']) {
                if(isset($_GET['id_dethi'])) {
                    $id_dethi = $_GET['id_dethi'];
                    var_dump($id_dethi);
                    $chitiet = load_chitiet_dethi($id_dethi);
                    include "view/thi/thi.php"; // Bạn có thể đưa dòng này vào bên trong if statement
                } else {
                    include "index.php";
                }
            } else {
                include "index.php"; // Bạn có thể xử lý logic ở đây nếu không có yêu cầu POST vao-thi
            }
            break;
        case "nopbai":
            include "view/thi/nopbai.php";
        case 'toan':
            include "view/baithi/toan.php";
            break;
        case 'tienganh':
            include "view/baithi/tienganh.php";
            break;
        case 'vatly':
            include "view/baithi/vatly.php";
            break;
        

        // case lịch thi
        case 'lichthi':
            $list_lichthi = load_all_lichthi_home();
            include "view/lichthi.php";
            break;
        // case đề thi
        case 'dethi':
            if(isset($_GET['id_lichthi']) && ($_GET['id_lichthi']>0)){
                $id_lichthi = $_GET['id_lichthi'];
            }
            $list_dethi = load_all_dethi_home($id_lichthi);
            $list_lichthi = load_all_lichthi_home();
            include "view/dethi.php";
            break;

        // case đề thi trang chủ 
            case 'dethi_trangchu':
                if(isset($_GET['id_chuyende']) && ($_GET['id_chuyende']>0)){
                    $id_chuyende = $_GET['id_chuyende'];
                   
                }
                $list_dethi_home = load_all_dethi_home($id_chuyende);
                $list_chuyende = load_all_chuyende_dethi($id_chuyende);
                $list_lichthi = load_all_lichthi_home();
                include "view/dethi_home.php";
                break;
            
        

        

        default :
            require_once "view/home.php";
            break;
    } 
    }else {
        include "home.php";
    }
    // require_once $VIEW;
    require_once "view/footer.php";
    ob_end_flush();
?>

   