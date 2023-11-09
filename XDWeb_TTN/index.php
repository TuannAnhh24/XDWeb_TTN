<?php
    require_once "view/header.php";
    $act = $_GET["$id"];   
    switch ($act) {
        case "" :
            $VIEW = "view/home.php";
            break;
    }
    require_once $VIEW;
    require_once "view/footer.php";
?>