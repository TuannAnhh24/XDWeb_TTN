<?php
    require_once "view/header.php";
    require_once "view/home.php";
    require_once "view/footer.php";

    $act = $_GET['act'] ?? "";
    switch ($act) {
        case"":
            require_once "index.php";
            break;
        case "gioithieu":
            require_once "view/gioithieu.php";
            break;
        
        case 'lienhe':
            require_once "view/lienhe.php";
            break;
            
        default:
        require_once "index.php";
        break;
        }
   