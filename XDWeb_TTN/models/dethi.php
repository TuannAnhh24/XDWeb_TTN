<?php
    // load đề thi 
    function load_all_dethi_home($id_lichthi){
        $sql = "SELECT * FROM `dethi` where id_lichthi = $id_lichthi ";
        $list_dethi = pdo_query($sql);
        return $list_dethi;
    }
?>