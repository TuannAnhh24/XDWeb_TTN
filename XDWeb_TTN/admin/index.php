<?php 
    $act = $_GET['act'] ?? "";
    switch ($act) {
        case "":
            echo "<h1>Home</h1>";
            break;
        case "lien-he":
            echo "<h1>Home</h1>";
            break;
        case "danh-muc":
            echo "<h1>Home</h1>";
            break;
        default:
        echo "<h1>404 loi chet me</h1>";
    }


?>