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
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $id_nguoidung = $_SESSION['user']['id'];
            $soCauDung = 0; // Số câu đúng
            $tongSoCau = 0; // Tổng số câu
            $dapAnCauHoi = array(); // Mảng lưu thông tin câu hỏi, đáp án và giá trị đã chọn
    
            // Lặp qua từng câu hỏi để lấy giá trị đáp án
            foreach ($_POST as $key => $value) {
                //id_dethi
                if($key==='id_dethi'){
                    $id_dethi =$value ;
                }
                // Kiểm tra nếu key chứa 'dap_an_cau_' thì đó là đáp án của từng câu hỏi
                if (strpos($key, 'dap_an_cau_') !== false) {
                    $tongSoCau++; 
    
                    // Lấy chỉ số câu hỏi
                    $cauHoiIndex = str_replace('dap_an_cau_', '', $key);
    
                    // Kiểm tra xem thông tin câu hỏi và đáp án có tồn tại trong $_POST không
                    $noidung_cau_hoi_key = 'noidung_cau_hoi_' . $cauHoiIndex;
                    $noidung_dap_an_key = 'noidung_dap_an_' . $cauHoiIndex;
                    
                    if (isset($_POST[$noidung_cau_hoi_key]) && isset($_POST[$noidung_dap_an_key])) {
                        // Lưu thông tin câu hỏi, đáp án và giá trị đã chọn vào mảng
                        $cauHoi = array(
                            'noidung' => $_POST[$noidung_cau_hoi_key], // Nội dung câu hỏi
                            'dap_an_da_chon' => $_POST[$noidung_dap_an_key], // Đáp án
                            'cau_dung' => $value // Đáp án đã chọn
                        );
                        // Lưu vào mảng $dapAnCauHoi với key là chỉ số câu hỏi
                        $dapAnCauHoi[$cauHoiIndex] = $cauHoi;
    
                        // Kiểm tra đáp án có đúng không
                        if ($value === '1') {
                            $soCauDung++; // Nếu đúng, tăng số câu đúng lên 1
                        }
                    }
                }
            }
    
            // Tính điểm dựa trên số câu đúng
            $diem = ($tongSoCau > 0) ? (10 / $tongSoCau) * $soCauDung : 0;
    
            // // Hiển thị số câu đúng, tổng số câu và điểm của người dùng
            // echo "Số câu đúng: $soCauDung<br>";
            // echo "Tổng số câu: $tongSoCau<br>";
            // echo "Điểm của bạn: $diem";

            // chuyển mảng thành chuổi đẻ nhét vào dâtabasse
            $bodapan = json_encode($dapAnCauHoi);
           
            
            insert_ketqua($id_nguoidung, $id_dethi, $bodapan, $diem,$tongSoCau);
            $kq_user=load_kq_user($id_nguoidung);
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
    case 'thongbao_trangchu':
        if (isset($_GET['id_thongbao']) && ($_GET['id_thongbao'] > 0)) {
            $id_thongbao = $_GET['id_thongbao'];
        }
        $list_tb = load_all_thongbao_home($id_thongbao);
        include "view/thongbao_home.php";
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
    case 'xemlai':{
        include "view/thi/xemlaibaidathi.php";
        break;
    }
    default:
        require_once "view/home.php";
        break;
}
// require_once $VIEW;
require_once "view/footer.php";
