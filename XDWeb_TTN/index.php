<?php
    require_once "view/header.php";
    $act = $_GET["act"];   
    switch ($act) {
        case "" :
            $VIEW = "view/home.php";
            break;
        case "dangnhap":
            $VIEW = "view/taikhoan/dangnhap.php";
            break;
        case "gioithieu":
            $VIEW = "view/gioithieu&lienhe/gioithieu.php";
            break;
        case "lienhe":
            $VIEW = "view/gioithieu&lienhe/lienhe.php";
            break;
        case "thi" : 
            $VIEW = "view/thi/thi.php";
            break;
        case "nopbai":
            $VIEW = "view/thi/nopbai.php";
        case 'toan':
            $VIEW = "view/baithi/toan.php";
            break;
        case 'tienganh':
            $VIEW = "view/baithi/tienganh.php";
            break;
        case 'vatly':
            $VIEW = "view/baithi/vatly.php";
            break;
    }
    require_once $VIEW;
    require_once "view/footer.php";

   