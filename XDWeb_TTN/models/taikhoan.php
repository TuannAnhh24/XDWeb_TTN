<?php
    function checkuser($user,$pass){
        $sql= "SELECT * FROM nguoidung WHERE username='".$user."' AND password='".$pass."' ";
        $sp= pdo_query_one($sql);
        return $sp;
    }

    function select_taikhoan_by_user($user){
        $sql= "SELECT * FROM nguoidung WHERE username = ? ";
        return pdo_execute_and_fetch($sql,$user);
    }

    function insert_taikhoan($user,$pass,$sdt){
        $sql= "INSERT INTO nguoidung(username,`password`,sodienthoai) VALUES('$user','$pass','$sdt')";
        pdo_execute($sql);
    }

    function loadall_taikhoan(){
        $sql = "SELECT * FROM nguoidung order by id desc ";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }

    function delete_taikhoan($id){
        // $sql = "UPDATE danh_muc SET trang_thai = '1' WHERE id_dm=".$id_dm;
        $sql = "DELETE FROM nguoidung WHERE id=".$id;
        pdo_execute($sql);
    }

?>