<?php
    function insert_lichthi($tenkythi,$batdau,$kethuc,$thoigianthi,$sodethi){
        $sql = "INSERT INTO lichthi(tenkythi,batdau,ketthuc,thoigianthi,sodethi) VALUES(?,?,?,?,?)";
        pdo_execute($sql,$tenkythi,$batdau,$kethuc,$thoigianthi,$sodethi);
    }
    function load_all_lichthi(){
        $sql = "SELECT * FROM lichthi ORDER BY id DESC";
        return pdo_query($sql);
    }
    function delete_lichthi($id){
        $sql = "DELETE FROM lichthi WHERE id = ? ";
        pdo_execute($sql,$id);
    }
    function load_one_lt($id){
        $sql = "SELECT * FROM lichthi WHERE id=?";
        return pdo_query_one($sql, $id);
    }
    function update_lichthi($tenkythi,$batdau,$kethuc,$thoigianthi,$sodethi,$id){
        $sql = "UPDATE `lichthi` SET `tenkythi` = '$tenkythi', `batdau` = '$batdau', `ketthuc` = '$kethuc', `thoigianthi` = '$thoigianthi', `sodethi` = '$sodethi' WHERE `lichthi`.`id` = $id";
        return pdo_execute($sql);
   }
   // lich thi  load home
   function load_all_lichthi_home(){
       $sql = "SELECT * FROM lichthi where 1";
       $list_lichthi = pdo_query($sql);
       return $list_lichthi;
   }
?>