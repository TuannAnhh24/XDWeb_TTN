<?php
 require_once "../models/chuyende.php";
 require_once "../models/cauhoi.php";
 require_once "../models/dapan.php";
 include_once "header.php"; //  include_once $VIEW;
 include_once "footer.php";

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
        $VIEW = "cauhoi/add.php";
        break;

    case 'dapan':
        $title = "Quản trị đáp án";
        if (isset($_GET['id_cauhoi'])) {
            $id_cauhoi = $_GET['id_cauhoi'];
            $tencauhoi = load_one_cauhoi($id_cauhoi);
            $tencauhoi = $tencauhoi['noidung'];

            $list_dapan = load_all_dapan_cauhoi($id_cauhoi);
            $VIEW = "dapan/list.php";
        }
        break;
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

        $VIEW = "dapan/add.php";
        break;   
    default:
        $VIEW = "404.php";
}

