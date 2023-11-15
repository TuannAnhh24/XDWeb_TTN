<?php
 require_once "../models/chuyende.php";
 require_once "../models/cauhoi.php";
require_once "../models/dapan.php";
 include_once "header.php"; 
 include_once $VIEW;
 include_once "footer.php";

$act = $_GET['act'] ?? "";

switch ($act) {
    case "":
        echo "<h1>HOME</h1>";
       
        break;
    case "lien-he":
        echo "<h1>LIÊN HỆ</h1>";
        break;
    case "chuyen-de":
        $title = "Danh sách chuyên đề";
        $id = $_GET['id'] ?? 0;
        if ($id !== 0) {
            xoa_cd($id);
        }
        //xoa nhieu pt
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            xoa_nhieu($id);
            $thongbao="Xóa TCP";
        }
        $chuyende = tai_all_cd();
        include "chuyende/list.php";
        break;
    case "themcd":
        $title = "Thêm chuyên đề";

        //Thêm chuyên đề
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $tenchuyende = $_POST['tenchuyende'];
            insert_cd($tenchuyende);
            $thongbao = "Thêm dữ liệu thành công";
        }

        include "chuyende/add.php";
        break;
        case "suacd":
            $title = "Cập nhật chuyên đề";
           
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $tenchuyende =  $_POST['tenchuyende'];
                $id = $_POST['id'];
                update_cd($id,$tenchuyende);
            }
            // lấy thông tin id
            if(isset($_GET['id']) && $_GET['id']){
                $id = $_GET['id'];
                $chuyende = tai_all_cd();
                extract($chuyende);
               include "chuyende/add.php";
            }
            break;
             //Trang thêm câu hỏi
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
