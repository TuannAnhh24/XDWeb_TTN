<?php
session_start();
require_once "models/pdo.php";
require_once "models/taikhoan.php";
require_once "view/header.php";
require_once "models/lichthi.php";
require_once "models/dethi.php";
require_once "models/chuyende.php";
require_once "models/ketqua.php";
require_once "models/thongbao.php";
// load lịch thi
$dslt = load_all_lichthi_home();
$dscd = load_all_chuyende_home();
$listthongbao = list_thongbao();
//load đề thi


$act = $_GET['act'] ?? "";
switch ($act) {
    case "trangchu":
        include "view/home.php";
        break;
        // ---------------------------------------------- Trang đăng nhập ---------------------------------------------  
        case "dangnhap":
            $message = ""; // Tạo biến message để lưu thông báo
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                // Kiểm tra xem tất cả các trường đã được điền hay chưa
                if (empty($user) || empty($pass)) {
                    $message = "Vui lòng điền đầy đủ thông tin.";
                } else {
                    $checkuser = checkuser($user, $pass);
                    if (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        header('location: index.php');
                    } else {
                        $message = "Tài khoản không tồn tại. Vui lòng thực hiện đăng ký tài khoản";
                    }
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        
        // ---------------------------------------------- Trang đăng ký ---------------------------------------------
        case "dangky":
            $message = ""; // Tạo biến message để lưu thông báo
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $pass_nl = $_POST['pass_nl'];
                $sdt = $_POST['sdt'];
        
                // Kiểm tra xem tất cả các trường đã được điền hay chưa
                if (empty($user) || empty($pass) || empty($pass_nl) || empty($sdt)) {
                    $message = "Vui lòng điền đầy đủ thông tin.";
                } else {
                    // Kiểm tra xem mật khẩu có khớp nhau hay không
                    if ($pass != $pass_nl) {
                        $message = "Mật khẩu không khớp. Vui lòng nhập lại.";
                    } else {
                        // Kiểm tra xem tên đăng nhập đã tồn tại trong cơ sở dữ liệu chưa
                        $user2 = select_taikhoan_by_user($user);
                        if ($user2) {
                            // Nếu người dùng tồn tại, hiển thị thông báo lỗi
                            $message = "Tên đăng nhập đã được sử dụng. Vui lòng chọn tên đăng nhập khác";
                        } else {
                            insert_taikhoan($user, $pass, $sdt);
                            $message = "Đã đăng ký thành công";
                        }
                    }
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
            $message = ""; // Tạo biến message để lưu thông báo
            if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                $user = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $sdt = $_POST['sdt'];
                $id = $_POST['id'];
                // Kiểm tra xem tất cả các trường đã được điền hay chưa
                if (empty($user) || empty($email) || empty($pass) || empty($sdt) || empty($id)) {
                    $message = "Vui lòng điền đầy đủ thông tin.";
                } else {
                    if(isset($_FILES['hinhanh']['name']) && $_FILES['hinhanh']['name'] != '') {
                        // Người dùng tải lên hình ảnh mới
                        $img = $_FILES['hinhanh']['name'];
                        $target_dir = "img/";
                        $target_file = $target_dir.basename($_FILES["hinhanh"]["name"]);
                        if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$target_file)) {
                            // end update hình ảnh
                            update_taikhoan($id,$user,$pass,$email,$sdt,$img);
                        } else {
                            $message = "Có lỗi xảy ra khi tải lên hình ảnh. Vui lòng thử lại.";
                        }
                    } else {
                        // Người dùng không tải lên hình ảnh mới, giữ nguyên hình ảnh hiện tại
                        $current_user = checkuser($user,$pass);
                        $img = $current_user['hinhanh'];
                        update_taikhoan($id,$user,$pass,$email,$sdt,$img);
                    }
                    $_SESSION['user'] = checkuser($user,$pass);
                    $message = "Cập nhật thông tin thành công.";
                    
                }
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        // ---------------------------------------- Giới thiệu ----------------------------------------
    case "gioithieu":
        include "view/gioithieu&lienhe/gioithieu.php";
        break;
        // ---------------------------------------- liên hệ ----------------------------------------
    case "lienhe":
        include "view/gioithieu&lienhe/lienhe.php";
        break;
        // ---------------------------------------- trang thi ----------------------------------------
    case "vao-thi":
        if (isset($_GET['id_dethi'])) {
            $id_dethi = $_GET['id_dethi'];
            $chitiet = load_cau_hoi($id_dethi);
            include "view/thi/thi.php";
        }
        break;
    case "nopbai":
        $soCauDung = 0;
        $tongSoCau = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_nguoidung = $_SESSION['user']['id'];
            $id_dethi = $_POST['id_dethi'];
            $chitiet = load_cau_hoi($id_dethi);
            $soCauDung = 0;
            $bodapan = array();
            foreach ($chitiet as $index => $ct) {
                if (isset($_POST['dap_an_cau_' . $index])) {
                    $selectedAnswer = $_POST['dap_an_cau_' . $index];
                    $isCorrect = false;
                    $selectedAnswerContent = '';

                    foreach ($ct['dap_an'] as $noidung) {
                        if ($selectedAnswer == $noidung['cau_dung']) {
                            $selectedAnswerContent = $noidung['noidung_dap_an'];
                            if ($noidung['cau_dung'] == 1) {
                                $isCorrect = true;
                                $soCauDung++;
                            }
                            break;
                        }
                    }

                    $bodapan[] = $ct['noidung_cau_hoi'] . ': ' . ($isCorrect ? 'Đúng' : 'Sai') . '. Đáp án bạn chọn: ' . $selectedAnswerContent;
                }
            }
            $tongSoCau = count($chitiet);
            $diem = ($tongSoCau > 0) ? (10 / $tongSoCau) * $soCauDung : 0;
            $bodapan = implode(', ', $bodapan);
            insert_ketqua($id_nguoidung, $id_dethi, $bodapan, $diem);
        }
        if (isset($_SESSION['user']['id'])) {
            $id_nguoidung = $_SESSION['user']['id'];
            $kq_user = load_kq_user($id_nguoidung);
        }
        include "view/thi/nopbai.php";
        break;

    case 'toan':
        include "view/baithi/toan.php";
        break;
    case 'tienganh':
        include "view/baithi/tienganh.php";
        break;
    case 'vatly':
        include "view/baithi/vatly.php";
        break;


        // ---------------------------------------- lịch thi ----------------------------------------
    case 'lichthi':
        $list_lichthi = load_all_lichthi_home();
        include "view/lichthi.php";
        break;
        // ---------------------------------------- đề thi ----------------------------------------
    case 'dethi':
        if (isset($_GET['id_lichthi']) && ($_GET['id_lichthi'] > 0)) {
            $id_lichthi = $_GET['id_lichthi'];
        }
        $list_dethi = load_all_dethi_home($id_lichthi);
        $list_lichthi = load_all_lichthi_home();
        include "view/dethi.php";
        break;

        // case đề thi trang chủ 
    case 'dethi_trangchu':
        if (isset($_GET['id_chuyende']) && ($_GET['id_chuyende'] > 0)) {
            $id_chuyende = $_GET['id_chuyende'];
        }
        $list_dethi_home = load_all_dethi_home($id_chuyende);
        $list_chuyende = load_all_chuyende_dethi($id_chuyende);
        $list_lichthi = load_all_lichthi_home();
        include "view/dethi_home.php";
        break;
        // case ketqua&danhgia
    case 'ketqua':
        $kq = load_kq();
        if ($kq[0]['diem'] >= 9 && $kq[0]['diem'] <= 10) {
            $danhgia = "Tốt";
        } elseif ($kq[0]['diem'] >= 7 && $kq[0]['diem']< 9) {
            $danhgia = "Khá";
        } elseif ($kq[0]['diem'] >= 5 && $kq[0]['diem'] < 7) {
            $danhgia = "Trung bình";
        } else {
            $danhgia = "Kém";
        }
        include "view/danhgia/ketqua.php";
        break;
    default:
        require_once "view/home.php";
        break;
}
// require_once $VIEW;
require_once "view/footer.php";
