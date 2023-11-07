<?php
    require_once "../models.chuyende.php";
    function chuyende_danhsach(){
        $chuyende =tai_all_cd();
        include_once "header.php";
        include_once "chuyende/list.php";
        include_once "footer.php";
    }