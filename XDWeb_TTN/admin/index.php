<?php
 require_once "../models/chuyende.php";
 require_once "../models/cauhoi.php";
 require_once "../models/dapan.php";
 require_once "../models/lichthi.php";
 include_once "header.php"; //  include_once $VIEW;

$act = $_GET['act'] ?? "";

switch ($act) {
    // ------------------------------------ trang chủ ------------------------------------
    case "":
        echo "<h1>HOME</h1>";
        break;
    // ------------------------------------ Liên hệ ------------------------------------
    case "lien-he":
        echo "<h1>LIÊN HỆ</h1>";
        break;
    // ------------------------------------ Chuyên đề ------------------------------------    
    case "chuyen-de":
        $title = "Danh sách chuyên đề";
        $id = $_GET['id'] ?? 0;
        if ($id !== 0) {
            delete_chuyende($id);
        }
        //xoa nhieu phần tử
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            xoa_nhieu_cd($id);
            $thongbao="Xóa dữ liệu thành công";
        }
        $chuyende = load_all_chuyende();
        include "chuyende/list.php";
        break;
    // ------------------------------------ Thêm chuyên đề ------------------------------------
    case "themcd":
        $title = "Thêm chuyên đề";
        //Thêm chuyên đề
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $tenchuyende = $_POST['tenchuyende'];
            insert_chuyende($tenchuyende);
            $thongbao = "Thêm dữ liệu thành công";
        }

        include "chuyende/add.php";
        break;
    // ------------------------------------ Sửa chuyên đề ------------------------------------
    case "suacd":
        $title = "Cập nhật chuyên đề";
        
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            $tenchuyende =  $_POST['tenchuyende'];
            $id = $_POST['id'];
            update_chuyende($id,$tenchuyende);
            $thongbao = "Cập nhật dữ liệu thành công";
        }
        // lấy thông tin id
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $chuyende = load_one_chuyende($id);
            extract($chuyende);
            include "chuyende/edit.php";
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
            extract($_POST);
            $file = $_FILES['hinhanh'];
            $hinhanh = $file['name'];
            move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);

            //thêm
            insert_cauhoi($noidung, $hinhanh, $id_chuyende);
            $thongbao = "Thêm dữ liệu thành công";
        }

        $chuyende = load_all_chuyende();
        include  "cauhoi/addCH.php";
        break;
    // ------------------------------------ Xóa câu hỏi ------------------------------------
    case 'xoaCH':

        if(isset($_GET['id_cauhoi'])){
            delete_cauhoi($_GET['id_cauhoi']);
        }
        $cauhoi = load_all_cauhoi();
        include "cauhoi/list.php";
        break;

    // ------------------------------------ Sửa câu hỏi ------------------------------------
    case 'suach':
        $title = "Sửa câu hỏi";
        if(isset($_GET['id_cauhoi'])){
            $id_cauhoi = $_GET['id_cauhoi'];
            $cauhoi = load_one_cauhoi($id_cauhoi);
            extract($cauhoi);
            $chuyende = load_all_chuyende();
        }

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $id_cauhoi = $_POST['id'];
            $id_chuyende = $_POST['id_chuyende'];
            $noidung = $_POST['noidung'];
            $file = $_FILES['hinhanh'];
            $hinhanh = $file['name'];
            move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);
            
            update_cauhoi($noidung, $hinhanh, $id_chuyende, $id_cauhoi);
            $thongbao = "Thêm dữ liệu thành công";
            header('location: ?act=cau-hoi&id_cauhoi='.$id);
        }
        
        
        include "cauhoi/edit.php";
      
        

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
        if (isset($_GET['id_cauhoi'])) {
            $id_cauhoi = $_GET['id_cauhoi'];
            $tencauhoi = load_one_cauhoi($id_cauhoi);
            $tencauhoi = $tencauhoi['noidung'];
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            $caudung = $caudung ?? 0;
            $file = $_FILES['hinhanh'];
            $hinhanh = $file['name'];
            move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);
            insert_dapan($noidung, $hinhanh, $type, $caudung, $id_cauhoi);
            $thongbao = "Thêm dữ liệu thành công";
        }
        include "dapan/add.php";
        break;   
         // ------------------------------------ Sửa Đáp án ------------------------------------
        case 'suada':
            $title = "Sửa đáp án";   
             if(isset($_GET['id_da'])){
                $id_da= $_GET['id_da'];
                $da= load_one_dapan($id_da);
                extract($da);
                $list_dapan = load_all_dapan_cauhoi($id_cauhoi);
             }
             
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                extract($_POST);
                $caudung = $caudung ?? 0;
                $file = $_FILES['hinhanh'];
                $hinhanh = $file['name'];
                move_uploaded_file($file['tmp_name'], "../img/" . $hinhanh);
                edit_dapan($noidung, $hinhanh, $type, $caudung, $id_da);
                $thongbao = "Thêm dữ liệu thành công";
                header('location: ?act=dapan&id_cauhoi='.$id_cauhoi);
            }
             include "dapan/editDa.php";
             break;
             // ------------------------------------ Xóa Đáp án ------------------------------------
            case 'xoada':
            if(isset($_GET['id_da'])){
                $id_da= $_GET['id_da'];
                $da= load_one_dapan($id_da);
                extract($da);
                $list_dapan = load_all_dapan_cauhoi($id_cauhoi);
                 delete_da($id_da);
                header('location: ?act=dapan&id_cauhoi='.$id_cauhoi);
             }
             break;     
            // ------------------------------------ trang Đề thi ------------------------------------
            case "de-thi":
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
                //Thêm chuyên đề
                if ($_SERVER['REQUEST_METHOD'] === "POST") {
                    $tenkythi = $_POST['tenkythi'];
                    $batdau = $_POST['batdau'];
                    $ketthuc = $_POST['ketthuc'];
                    $thoigianthi = $_POST['time'];
                    $sodethi = $_POST['sodethi'];
                    insert_lichthi($tenkythi,$batdau,$ketthuc,$thoigianthi,$sodethi);
                    $thongbao = "Thêm dữ liệu thành công";
                }
        
                include "lichthi/add.php";
                break;
            case 'xoaLT':

                if(isset($_GET['id_lt'])){
                    delete_lichthi($_GET['id_lt']);
                }
                $load_LT = load_all_lichthi();
                include "lichthi/list.php";
                break;
            case "suaLT":
                $title = "Cập nhật lịch thi";
                
                if ($_SERVER['REQUEST_METHOD'] === "POST") {
                    $id = $_POST['id'];
                    $tenkythi = $_POST['tenkythi'];
                    $batdau = $_POST['batdau'];
                    $ketthuc = $_POST['ketthuc'];
                    $thoigianthi = $_POST['time'];
                    $sodethi = $_POST['sodethi'];
                    update_lichthi($tenkythi,$batdau,$ketthuc,$thoigianthi,$sodethi,$id);
                    $thongbao = "Sửa thành công";
                }
                // lấy thông tin id
                if(isset($_GET['id_lt'])){
                    $id = $_GET['id_lt'];
                    $lichthi = load_one_lt($id);
                    extract($lichthi);
                    include "lichthi/editLT.php";
                }
                break;
    default:
        include "404.php";
}
include_once "footer.php";
