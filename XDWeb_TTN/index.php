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
    }
    require_once $VIEW;
    require_once "view/footer.php";
?>