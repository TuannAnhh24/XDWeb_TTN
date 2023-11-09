<?php
require_once "../models/chuyende.php";

function chuyende_danhsach()
{
    $title = "Danh sách chuyên đề";
    $chuyende = load_all_chuyende();
    
}
