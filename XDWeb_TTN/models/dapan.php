<?php
    require_once "pdo.php";

    function load_all_dapan(){
        $sql = "SELECT * FROM dapan ORDER BY id DESC";
        return pdo_query($sql);
    }
    function load_one_dapan($id){
        $sql = "SELECT * FROM dapan WHERE id =? ";
        return pdo_query_one($sql,$id);
    }
    function insert_dapan($noidung, $hinhanh, $type , $caudung , $id_cauhoi){
        $sql = "INSERT INTO cauhoi(noidung, hinhanh, `type` ,  caudung, id_cauhoi) VALUES (?,?,?)";
        pdo_execute($sql,$noidung, $hinhanh, $type , $caudung , $id_cauhoi);
    }
?>