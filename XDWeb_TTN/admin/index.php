<?php 
    $act = $_GET['act'] ?? "";
    switch ($act) {
        case "":
            echo "<h1>Home</h1>";
            break;
        case "lien-he":
            echo "<h1>Liên Ơi</h1>";
            break;
        case "danh-muc":
            $title ="Danh sách chuyên đề";
           $VIEW = "chuyende/list.php";
            break;
        default:
        $VIEW ="404.php";
    }

    include_once "header.php";
    include_once $VIEW;
    include_once "footer.php";

?>