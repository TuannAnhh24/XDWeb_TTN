<?php 
require_once "pdo.php";

function tai_all_cd(){
    $sql = "SELECT * FROM chuyende ORDER BY id DESC";
    return pdo_query($sql);
}

function tai_mot_cd($id){
    $sql = "SELECT * FROM chuyende WHERE id = ?";
    return pdo_query($sql,$id);
}

function insert_cd($tenchuyende){
    $sql = "INSERT INTO chuyende(tenchuyende) VALUES(?)";
    pdo_execute($sql,$tenchuyende);
}

function update_cd($id,$tenchuyende){
     $sql = "UPDATE chuyende SET tenchuyende = ? WHERE id = ?";
     pdo_execute($sql,$tenchuyende,$id);
}
function xoa_cd($id){
    $sql = "SELECT * FROM chuyende WHERE id = ?";
    pdo_execute($sql,$id);
}
 function xoa_nhieu($id){
    $macd = "";
    foreach ($id as $item){
        $macd .= $item . ", ";
    }
    $macd = rtrim($macd, ", ");
    //sql
    $sql = "DELETE FROM chuyende WHERE id IN ($macd)";
    pdo_execute($sql);

 }