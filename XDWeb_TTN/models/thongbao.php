<?php
    function list_thongbao(){
        $sql = "SELECT * FROM thongbao ORDER BY id DESC";
        return pdo_query($sql);
    }
    function insert_thongbao($noidung,$ngaydang,$tenthongbao,$image){
        $sql = "INSERT INTO `thongbao`(`noidung`, `ngaydang`, `tenthongbao`,`image`) VALUES (?,?,?,?)";
        pdo_execute($sql,$noidung,$ngaydang,$tenthongbao,$image);
    }
    function update_thongbao($noidung,$ngaydang,$tenthongbao,$id,$image){
        if($image !=""){
            $sql = "UPDATE `thongbao` SET `noidung` = '$noidung', `ngaydang` = '$ngaydang', `tenthongbao` = '$tenthongbao' ,`image` = '$image' WHERE `thongbao`.`id` = $id";
        } else {
            $sql = "UPDATE `thongbao` SET `noidung` = '$noidung', `ngaydang` = '$ngaydang', `tenthongbao` = '$tenthongbao'  WHERE `thongbao`.`id` = $id";
        }
        return pdo_execute($sql);
    }
    function delete_thongbao($id){
        $sql = "DELETE FROM thongbao WHERE id = ? ";
        pdo_execute($sql,$id);
    }
    function load_one_thongbao($id){
        $sql = "SELECT * FROM thongbao WHERE id = ? ";
        return pdo_query_one($sql,$id);
    }
    function load_all_thongbao_home($id){
        $sql = "SELECT * FROM thongbao where id = $id";
        $list_tb = pdo_query($sql);
        return $list_tb;
     }

?>
