<?php
require_once "../models/chuyende.php";
require_once "../models/cauhoi.php";
require_once "../models/dapan.php";
require_once "../models/dethi.php";
require_once "../models/lichthi.php";
require_once "../models/taikhoan.php";
require_once "../models/ketqua.php";
require_once "../models/thongke.php";
require_once "../models/thongbao.php";
include_once "header.php"; //  include_once $VIEW;

$act = $_GET['act'] ?? "";

switch ($act) {
        // ------------------------------------ trang chủ ------------------------------------
    case "":
        echo "<h1>HOME</h1>";
        break;
        // ------------------------------------ Chuyên đề ------------------------------------    
    case "chuyen-de":
        $title = "Danh sách chuyên đề";
        $id = $_GET['id'] ?? 0;
        if ($id !== 0) {
            delete_chuyende($id);
        }
        //xoa nhieu phần tử
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            xoa_nhieu_cd($id);
            $thongbao = "Xóa dữ liệu thành công";
        }
        $chuyende = load_all_chuyende();
        include "chuyende/list.php";
        break;
        // ------------------------------------ Thêm chuyên đề ------------------------------------
    case "themcd":
        $title = "Thêm chuyên đề";

        // Thêm chuyên đề
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Lấy tên chuyên đề từ form
            $tenchuyende = trim($_POST['tenchuyende']);

            // Kiểm tra độ dài và kiểu dữ liệu
            if (strlen($tenchuyende) > 0 && is_string($tenchuyende)) {
                // Kiểm tra tên chuyên đề không trùng lặp
                if (!is_exist_chuyende($tenchuyende)) {
                    // Kiểm tra tên chuyên đề chỉ chứa tiếng Việt và không có ký tự đặc biệt
                    if (preg_match("/^[a-zA-Z0-9_\s\x{0300}-\x{03FF}\x{1EA0}-\x{1EF9}]+$/u", $tenchuyende)) {
                        // Thực hiện thêm chuyên đề vào cơ sở dữ liệu
                        insert_chuyende($tenchuyende);
                        $thongbao = "Thêm dữ liệu thành công";
                    } else {
                        $thongbao = "Tên chuyên đề chỉ chứa tiếng Việt và không có ký tự đặc biệt";
                    }
                } else {
                    $thongbao = "Tên chuyên đề đã tồn tại";
                }
            } else {
                $thongbao = "Dữ liệu không hợp lệ";
            }
        }

        include "chuyende/add.php";
        break;


        // ------------------------------------ Sửa chuyên đề ------------------------------------
    case "suacd":
        $title = "Cập nhật chuyên đề";

        // Xử lý khi người dùng gửi form POST
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Lấy dữ liệu từ form
            $tenchuyende = trim($_POST['tenchuyende']);
            $id = $_POST['id'];

            // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
            if (strlen($tenchuyende) > 0 && is_string($tenchuyende)) {
                // Kiểm tra tên chuyên đề không trùng lặp, không chứa ký tự đặc biệt
                if (!is_exist_chuyende_except($id, $tenchuyende) && preg_match("/^[a-zA-Z0-9_\s\x{0300}-\x{03FF}\x{1EA0}-\x{1EF9}]+$/u", $tenchuyende)) {
                    // Thực hiện cập nhật chuyên đề vào cơ sở dữ liệu
                    update_chuyende($id, $tenchuyende);
                    $thongbao = "Cập nhật dữ liệu thành công";
                } else {
                    $thongbao = "Tên chuyên đề không hợp lệ hoặc đã tồn tại";
                }
            } else {
                $thongbao = "Dữ liệu không hợp lệ";
            }
        }

        // Lấy thông tin id từ tham số truyền vào
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $chuyende = load_one_chuyende($id);

            // Nếu không tìm thấy chuyên đề, có thể xử lý tùy thuộc vào yêu cầu của bạn
            if ($chuyende) {
                extract($chuyende);
                include "chuyende/edit.php";
            } else {
                // Xử lý khi không tìm thấy chuyên đề
                $thongbao = "Không tìm thấy chuyên đề";
            }
        }

        break;


        // ------------------------------------ List câu hỏi ------------------------------------
    case 'cau-hoi':
        $title = "Quản lý câu hỏi";
        $cauhoi = load_all_cauhoi();
        include "cauhoi/list.php";

        break;
        // ------------------------------------ Thêm câu hỏi ------------------------------------
    case 'themch':
        $title = "Thêm câu hỏi";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Lấy dữ liệu từ form
            extract($_POST);

            // Kiểm tra nội dung không rỗng và không chứa ký tự đặc biệt
            if (strlen($noidung) > 0) {
                // Kiểm tra có chọn chuyên đề không
                if (!empty($id_chuyende)) {
                    // Kiểm tra có ảnh được chọn không
                    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                        $file = $_FILES['hinhanh'];
                        $hinhanh = $file['name'];

                        // Kiểm tra ảnh có định dạng đúng
                        if (preg_match("/\.(jpg|jpeg|png)$/i", $hinhanh)) {
                            // Di chuyển ảnh vào thư mục lưu trữ
                            move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);

                            // Thêm câu hỏi vào cơ sở dữ liệu
                            insert_cauhoi($noidung, $hinhanh, $id_chuyende);
                            $thongbao = "Thêm dữ liệu thành công";
                        } else {
                            $thongbao = "Ảnh không đúng định dạng";
                        }
                    } else {
                        // Thêm câu hỏi mà không có ảnh
                        insert_cauhoi($noidung, "", $id_chuyende);
                        $thongbao = "Thêm dữ liệu thành công";
                    }
                } else {
                    $thongbao = "Vui lòng chọn chuyên đề";
                }
            } else {
                $thongbao = "Nội dung không hợp lệ";
            }
        }

        $chuyende = load_all_chuyende();
        include "cauhoi/addCH.php";
        break;


        // ------------------------------------ Xóa câu hỏi ------------------------------------
    case 'xoaCH':
        if (isset($_GET['id_cauhoi'])) {
            delete_dapan($_GET['id_cauhoi']);
            delete_cauhoi($_GET['id_cauhoi']);
        }
        $cauhoi = load_all_cauhoi();
        include "cauhoi/list.php";
        break;

        // ------------------------------------ Sửa câu hỏi ------------------------------------
    case 'suach':
        $title = "Sửa câu hỏi";

        // Kiểm tra có thông số id_cauhoi truyền vào không
        if (isset($_GET['id_cauhoi'])) {
            $id_cauhoi = $_GET['id_cauhoi'];
            $cauhoi = load_one_cauhoi($id_cauhoi);

            // Kiểm tra câu hỏi có tồn tại không
            if ($cauhoi) {
                extract($cauhoi);
                $chuyende = load_all_chuyende();

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    // Lấy dữ liệu từ form
                    $id_cauhoi = $_POST['id'];
                    $id_chuyende = $_POST['id_chuyende'];
                    $noidung = $_POST['noidung'];

                    // Kiểm tra $noidung không rỗng
                    if (strlen($noidung) > 0) {

                        if (!empty($id_chuyende)) {
                            // Kiểm tra có ảnh được chọn không
                            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                                $file = $_FILES['hinhanh'];
                                $hinhanh = $file['name'];

                                // Kiểm tra ảnh có định dạng đúng
                                if (preg_match("/\.(jpg|jpeg|png)$/i", $hinhanh)) {
                                    // Di chuyển ảnh vào thư mục lưu trữ
                                    move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);

                                    // Thực hiện cập nhật câu hỏi vào cơ sở dữ liệu
                                    update_cauhoi($noidung, $hinhanh, $id_chuyende, $id_cauhoi);
                                    $thongbao = "Cập nhật dữ liệu thành công";
                                    header('location: ?act=cau-hoi&id_cauhoi=' . $id_cauhoi);
                                } else {
                                    $thongbao = "Ảnh không đúng định dạng";
                                }
                            } else {
                                // Thực hiện cập nhật câu hỏi mà không có ảnh
                                update_cauhoi($noidung, "", $id_chuyende, $id_cauhoi);
                                $thongbao = "Cập nhật dữ liệu thành công";
                                header('location: ?act=cau-hoi&id_cauhoi=' . $id_cauhoi);
                            }
                        } else {
                            $thongbao = "chưa chọn chuyên đề";
                        }
                    } else {
                        $thongbao = "Nội dung không được để trống";
                    }
                }

                include "cauhoi/edit.php";
            } else {
                // Xử lý khi không tìm thấy câu hỏi
                $thongbao = "Không tìm thấy câu hỏi";
            }
        } else {
            // Xử lý khi không có thông số id_cauhoi truyền vào
            $thongbao = "Vui lòng chọn câu hỏi cần sửa";
        }

        break;

        // ------------------------------------ List đáp án ------------------------------------
    case 'dapan':
        $title = "Quản trị đáp án";
        if (isset($_GET['id_cauhoi'])) {
            $id_cauhoi = $_GET['id_cauhoi'];
            $tencauhoi = load_one_cauhoi($id_cauhoi);
            $tencauhoi = $tencauhoi['noidung'];

            $list_dapan = load_all_dapan_cauhoi($id_cauhoi);
            include  "dapan/list.php";
        }
        break;
        // ------------------------------------ Thêm Đáp án ------------------------------------
    case 'themdapan':
        $title = " Thêm đáp án";

        // Kiểm tra xem id_cauhoi có được truyền vào không
        if (isset($_GET['id_cauhoi'])) {
            $id_cauhoi = $_GET['id_cauhoi'];
            $tencauhoi = load_one_cauhoi($id_cauhoi);
            $tencauhoi = $tencauhoi['noidung'];

            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                // Lấy dữ liệu từ form
                extract($_POST);

                // Kiểm tra các trường dữ liệu không được để trống
                if (!empty($noidung) && !empty($type)) {
                    $caudung = $caudung ?? 0;

                    // Kiểm tra có ảnh được chọn không
                    if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                        $file = $_FILES['hinhanh'];
                        $hinhanh = $file['name'];

                        // Di chuyển ảnh vào thư mục lưu trữ
                        move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);

                        // Thêm đáp án vào cơ sở dữ liệu
                        insert_dapan($noidung, $hinhanh, $type, $caudung, $id_cauhoi);
                        $thongbao = "Thêm dữ liệu thành công";
                    } else {
                        // Thêm đáp án mà không có ảnh
                        insert_dapan($noidung, "", $type, $caudung, $id_cauhoi);
                        $thongbao = "Thêm dữ liệu thành công";
                    }
                } else {
                    $thongbao = "Vui lòng điền đầy đủ thông tin";
                }
            }

            include "dapan/add.php";
        } else {
            $thongbao = "Vui lòng chọn câu hỏi để thêm đáp án";
        }

        break;

        // ------------------------------------ Sửa Đáp án ------------------------------------
    case 'suada':
        $title = "Sửa đáp án";
        if (isset($_GET['id_da'])) {
            $id_da = $_GET['id_da'];
            $da = load_one_dapan($id_da);

            // Kiểm tra đáp án có tồn tại không
            if ($da) {
                extract($da);
                $list_dapan = load_all_dapan_cauhoi($id_cauhoi);

                if ($_SERVER['REQUEST_METHOD'] === "POST") {
                    // Lấy dữ liệu từ form
                    extract($_POST);
                    $caudung = $caudung ?? 0;

                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($noidung) && !empty($type)) {
                        // Kiểm tra có ảnh được chọn không
                        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                            $file = $_FILES['hinhanh'];
                            $hinhanh = $file['name'];

                            // Di chuyển ảnh vào thư mục lưu trữ
                            move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);

                            // Thực hiện cập nhật đáp án vào cơ sở dữ liệu
                            edit_dapan($noidung, $hinhanh, $type, $caudung, $id_da);
                            $thongbao = "Cập nhật dữ liệu thành công";
                            header('location: ?act=dapan&id_cauhoi=' . $id_cauhoi);
                        } else {
                            // Thực hiện cập nhật đáp án mà không có ảnh
                            edit_dapan($noidung, "", $type, $caudung, $id_da);
                            $thongbao = "Cập nhật dữ liệu thành công";
                            header('location: ?act=dapan&id_cauhoi=' . $id_cauhoi);
                        }
                    } else {
                        $thongbao = "Vui lòng điền đầy đủ thông tin";
                    }
                }

                include "dapan/editDa.php";
            } else {
                // Xử lý khi không tìm thấy đáp án
                $thongbao = "Không tìm thấy đáp án";
            }
        } else {
            $thongbao = "Vui lòng chọn đáp án cần sửa";
        }

        break;

        // ------------------------------------ Xóa Đáp án ------------------------------------
    case 'xoada':
        if (isset($_GET['id_da'])) {
            $id_da = $_GET['id_da'];
            $da = load_one_dapan($id_da);
            extract($da);
            $list_dapan = load_all_dapan_cauhoi($id_cauhoi);
            delete_da($id_da);
            header('location: ?act=dapan&id_cauhoi=' . $id_cauhoi);
        }
        break;

        // ------------------------------------ Danh sách đề thi ------------------------------------
    case 'listdethi':
        $title = "danh sách đề thi";

        $dethi_admin = load_dethi_admin();
        $listchuyende = load_all_chuyende();
        $listlichthi = load_all_lichthi();

        // Hiển thị form tạo đề thi
        include "dethi/list.php";
        break;


        // ------------------------------------ trang Đề thi ------------------------------------
    case "tao-dethi":
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Lấy dữ liệu từ form
            extract($_POST);

            // Kiểm tra các trường dữ liệu không được để trống
            if (!empty($chuyende) && !empty($socau) && !empty($id_lichthi) && !empty($tendethi)) {
                // Thực hiện xử lý tạo đề thi
                tao_mang_cauhoi($chuyende, $socau, $id_lichthi, $tendethi);
            } else {
                $thongbao = "Vui lòng điền đầy đủ thông tin";
            }
        }

        // Load danh sách chuyên đề và lịch thi
        $listchuyende = load_all_chuyende();
        $listlichthi = load_all_lichthi();

        // Hiển thị form tạo đề thi
        include "dethi/addDethi.php";
        break;

         // ------------------------------------ Sửa đề thi  ------------------------------------
    case 'suadethi':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $load_de_thi=load_one_dethi($_GET['id']);
            var_dump($load_de_thi);
        }

        // if ($_SERVER['REQUEST_METHOD'] === "POST") {
        //     $id = $_POST['id'];
        //     $tenkythi = $_POST['tenkythi'];
        //     $batdau = $_POST['batdau'];
        //     $ketthuc = $_POST['ketthuc'];
        //     $thoigianthi = $_POST['time'];
        //     $sodethi = $_POST['sodethi'];
        //     update_lichthi($tenkythi, $batdau, $ketthuc, $thoigianthi, $sodethi, $id);
        //     $thongbao = "Sửa thành công";
        // }

        $dethi_admin = load_dethi_admin();
        $listchuyende = load_all_chuyende();
        $listlichthi = load_all_lichthi();
        include "dethi/edit.dethi.php";
        break;

        // ------------------------------------ Xóa Đề Thi ------------------------------------
    case 'xoadethi':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            delete_dethi($_GET['id']);
        }
        $dethi_admin = load_dethi_admin();
        $listchuyende = load_all_chuyende();
        $listlichthi = load_all_lichthi();
        include "dethi/list.php";
        break;

        // ------------------------------------ trang Lịch thi ------------------------------------
    case "lich-thi":
        $title = "Lịch thi";
        $load_LT = load_all_lichthi();
        include "lichthi/list.php";
        break;


    case "themLT":
        $title = "Thêm lịch thi";

        // Kiểm tra có dữ liệu gửi lên từ form không
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Lấy dữ liệu từ form
            $tenkythi = $_POST['tenkythi'];
            $batdau = $_POST['batdau'];
            $ketthuc = $_POST['ketthuc'];
            $thoigianthi = $_POST['time'];
            $sodethi = $_POST['sodethi'];

            // Kiểm tra các trường dữ liệu không được để trống
            if (!empty($tenkythi) && !empty($batdau) && !empty($ketthuc) && !empty($thoigianthi) && !empty($sodethi)) {
                // Thực hiện thêm lịch thi vào cơ sở dữ liệu
                insert_lichthi($tenkythi, $batdau, $ketthuc, $thoigianthi, $sodethi);
                $thongbao = "Thêm dữ liệu thành công";
            } else {
                $thongbao = "Vui lòng điền đầy đủ thông tin";
            }
        }

        // Hiển thị form thêm lịch thi
        include "lichthi/add.php";
        break;
        // ------------------------------------ Xóa Lịch thi ------------------------------------
    case 'xoaLT':

        if (isset($_GET['id_lt'])) {
            delete_lichthi($_GET['id_lt']);
        }
        $load_LT = load_all_lichthi();
        include "lichthi/list.php";
        break;
        // ------------------------------------ Sửa Lịch thi ------------------------------------
    case "suaLT":
        $title = "Cập nhật lịch thi";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $_POST['id'];
            $tenkythi = $_POST['tenkythi'];
            $batdau = $_POST['batdau'];
            $ketthuc = $_POST['ketthuc'];
            $thoigianthi = $_POST['time'];
            $sodethi = $_POST['sodethi'];
            update_lichthi($tenkythi, $batdau, $ketthuc, $thoigianthi, $sodethi, $id);
            $thongbao = "Sửa thành công";
        }
        // lấy thông tin id
        if (isset($_GET['id_lt'])) {
            $id = $_GET['id_lt'];
            $lichthi = load_one_lt($id);
            extract($lichthi);
            include "lichthi/editLT.php";
        }
        break;
        // ------------------------------------ Danh sách tài khoản  ------------------------------------
    case 'tai-khoan':
        $listtaikhoan = loadall_taikhoan();
        include "taikhoan/list.php";
        break;
        // ------------------------------------ Xóa tài khoản  ------------------------------------
    case 'xoatk':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id_tk = $_GET['id'];
            $kt_tk = loadone_taikhoan($id_tk);
            extract($kt_tk);
            if ($quyen == 1) {
                echo "<script> alert('Tài khoản này không thể bị xóa !!!'); </script>";
            } else {
                delete_taikhoan($_GET['id']);
            }
        }
        $listtaikhoan = loadall_taikhoan();
        include "taikhoan/list.php";
        break;
    case 'ketqua':
        $loadkq = load_kq();
        include "ketqua/list.php";
        break;
    case 'thongke':
        $slch = loadsl_ch();
        $sl_user = loadsl_user();
        $load_top10 = load_top10();
        include "thongke/list.php";
        break;

    case 'thongbao':
        $title = "danh sách Thông báo";
        $list_thongbao = list_thongbao();
        include "thongbao/list.php";
        break;
    //add thông báo 
    case 'themthongbao':
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Lấy dữ liệu từ form
            $noidung = $_POST['noidung'];
    
            // Đặt múi giờ thành múi giờ Việt Nam
            date_default_timezone_set('Asia/Ho_Chi_Minh');
    
            // Lấy ngày giờ hiện tại
            $ngaydangObj = new DateTime();
            $ngaydang = $ngaydangObj->format('H:i:s d-m-Y ');
    
            $tenthongbao = $_POST['tenthongbao'];
    
            // Kiểm tra các trường dữ liệu không được để trống
            if (!empty($noidung) && !empty($tenthongbao)) {
                // Kiểm tra lỗi upload file
                if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                    $file = $_FILES['hinhanh'];
                    $image = $file['name'];
    
                    // Kiểm tra ảnh có định dạng đúng
                    if (preg_match("/\.(jpg|jpeg|png)$/i", $image)) {
                        // Di chuyển ảnh vào thư mục lưu trữ
                        move_uploaded_file($file['tmp_name'], "../img/" . $image);
    
                        // Thêm câu hỏi vào cơ sở dữ liệu
                        insert_thongbao($noidung, $ngaydang, $tenthongbao, $image);
                        $thongbao = "Thêm dữ liệu thành công";
                    } else {
                        $thongbao = "Ảnh không đúng định dạng";
                    }
                } else {
                    // Thêm câu hỏi mà không có ảnh
                    insert_thongbao($noidung, $ngaydang, $tenthongbao, "");
                    $thongbao = "Thêm dữ liệu thành công";
                }
            } else {
                $thongbao = "Vui lòng điền đầy đủ thông tin";
            }
        }
        include "thongbao/add.php";
        break;
    
    //xoá thông báo 
    case 'xoatb':{
        if (isset($_GET['id_tb'])) {
            delete_thongbao($_GET['id_tb']);
        }
        $list_thongbao = list_thongbao();
        include "thongbao/list.php";
        break;
    }
    //update thông báo 
    case 'suatb':{
        $title = "Cập nhật thông báo";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $_POST['id'];
            $noidung = $_POST['noidung'];
            
            date_default_timezone_set('Asia/Ho_Chi_Minh');
    
            // Lấy ngày giờ hiện tại
            $ngaydangObj = new DateTime();
            $ngaydang = $ngaydangObj->format('H:i:s d-m-Y ');

            $tenthongbao = $_POST['tenthongbao'];

            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
                $file = $_FILES['hinhanh'];
                $image = $file['name'];
            
                // Kiểm tra ảnh có định dạng đúng
                if (preg_match("/\.(jpg|jpeg|png)$/i", $image)) {
                    // Di chuyển ảnh vào thư mục lưu trữ
                    move_uploaded_file($file['tmp_name'], "../img/" . $image);
            
                    // Thực hiện cập nhật câu hỏi vào cơ sở dữ liệu
                    update_thongbao($noidung,$ngaydang,$tenthongbao,$id,$image);
                    $thongbao = "Cập nhật dữ liệu thành công";
                    header('location: ?act=suatb&id_tb=' . $id);
                } else {
                    $thongbao = "Ảnh không đúng định dạng";
                }
            } else {
                // Thực hiện cập nhật câu hỏi mà không có ảnh
                update_thongbao($noidung,$ngaydang,$tenthongbao,$id,$image);
            $thongbao = "Sửa thành công";
                header('location: ?act=suatb&id_tb=' . $id);
            }
            
        }
        // lấy thông tin id
        if (isset($_GET['id_tb'])) {
            $id = $_GET['id_tb'];
            $load_one_thongbao = load_one_thongbao($id);
            extract($load_one_thongbao);
            include "thongbao/update.php";
        }
        break;
    }
    
    

    default:
        include "404.php";
}
include_once "footer.php";

