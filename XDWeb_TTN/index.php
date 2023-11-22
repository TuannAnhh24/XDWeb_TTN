<?php
    require_once "view/header.php";
    require_once "models/pdo.php";
    require_once "models/lichthi.php";
    require_once "models/dethi.php";
    // load lịch thi
    $dslt = load_all_lichthi_home();
    //load đề thi
  

    $act = $_GET['act'] ?? "";  
    switch ($act) {
        case "trangchu" :
            include "view/home.php";
            break;
        case "dangnhap":
            include "view/taikhoan/dangnhap.php";
            
            break;
        case "gioithieu":
            include "view/gioithieu&lienhe/gioithieu.php";
            break;
        case "lienhe":
            include "view/gioithieu&lienhe/lienhe.php";
            break;
        case "thi" : 
            include "view/thi/thi.php";
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

        default :
            require_once "view/home.php";
            break;
    }
    // require_once $VIEW;
    require_once "view/footer.php";

   