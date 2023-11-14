<?php
 require_once "../models/chuyende.php";
 include_once "header.php"; 
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
    default:
        $VIEW = "404.php";
}
