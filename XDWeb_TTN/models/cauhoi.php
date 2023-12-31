<?php

require_once "pdo.php";

function load_all_cauhoi(){
    $sql = "SELECT ch.*, tenchuyende FROM cauhoi ch JOIN chuyende cd ON ch.id_chuyende=cd.id  ORDER BY id DESC";
    return pdo_query($sql);
}

function load_one_cauhoi($id){
    $sql = "SELECT * FROM cauhoi WHERE id=?";
    return pdo_query_one($sql, $id);
}

function insert_cauhoi($noidung, $hinhanh, $id_chuyende){
    $sql = "INSERT INTO cauhoi(noidung, hinhanh, id_chuyende) VALUES(?, ?, ?)";
    pdo_execute($sql, $noidung, $hinhanh, $id_chuyende);
}

function update_cauhoi($noidung, $hinhanh, $id_chuyende,$id_cauhoi) {
    $sql = "UPDATE `cauhoi` SET `noidung` = '$noidung', `id_chuyende` = '$id_chuyende'";

    if ($hinhanh !== "") {
        $sql .= ", `hinhanh` = '$hinhanh'";
    }

    $sql .= " WHERE `cauhoi`.`id` = $id_cauhoi";

    return pdo_execute($sql);
}


function delete_cauhoi($id){
    $sql = "DELETE FROM cauhoi WHERE id = ? ";
    pdo_execute($sql,$id);
}

function delete_dapan($id){
    $sql = "DELETE FROM `dapan` WHERE id_cauhoi = ? ";
    pdo_execute($sql,$id);
}



