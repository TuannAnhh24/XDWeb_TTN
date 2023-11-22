<?php
    // show lịch thi
    function load_all_lichthi_home(){
        $sql = "SELECT * FROM `lichthi` WHERE 1";
        $list_lichthi = pdo_query($sql);
        return $list_lichthi;
    }
?>