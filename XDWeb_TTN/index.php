<?php
    require_once "view/header.php";
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
        default :
            require_once "view/home.php";
            break;
    }
    // require_once $VIEW;
    require_once "view/footer.php";

   