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
        if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $checkuser = checkuser($user, $pass);
            if (is_array($checkuser)) {
                $_SESSION['user'] = $checkuser;
                header('location: index.php');
            } else {
                echo "<script type='text/javascript'>alert('Tài khoản không tồn tại. Vui lòng thực hiện đăng ký tài khoản');</script>";
            }
        }
        include "view/taikhoan/dangnhap.php";
        break;
        // ---------------------------------------------- Trang đăng ký ---------------------------------------------
    case "dangky":
        if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $sdt = $_POST['sdt'];
            // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
            $user2 = select_taikhoan_by_user($user);
            if ($user2) {
                // Nếu người dùng tồn tại, hiển thị thông báo lỗi
                echo "<script type='text/javascript'>alert('Email đã được sử dụng. Vui lòng chọn Email khác');</script>";
            } else {
                insert_taikhoan($user, $pass, $sdt);
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


        // case lịch thi
    case 'lichthi':
        $list_lichthi = load_all_lichthi_home();
        include "view/lichthi.php";
        break;
        // case đề thi
    case 'dethi':
        if (isset($_GET['id_lichthi']) && ($_GET['id_lichthi'] > 0)) {
            $id_lichthi = $_GET['id_lichthi'];
        }
        $list_dethi = load_all_dethi_home($id_lichthi);
        $list_lichthi = load_all_lichthi_home();
        include "view/dethi.php";
        break;

        // case thông báo trang chủ 
    case 'thongbao_trangchu':
        if (isset($_GET['id_thongbao']) && ($_GET['id_thongbao'] > 0)) {
            $id_thongbao = $_GET['id_thongbao'];
        }
        $list_tb = load_all_thongbao_home($id_thongbao);
        $onethongbao = load_one_thongbao($id_thongbao);
        include "view/thongbao_home.php";
        break;
    default:
        require_once "view/home.php";
        break;
}
// require_once $VIEW;
require_once "view/footer.php";
