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
        $sql = "DELETE FROM nguoidung WHERE id=".$id;
        pdo_execute($sql);
    }

    function loadone_taikhoan($id){
        $sql = "SELECT * FROM nguoidung WHERE id=".$id;
        $tk = pdo_query_one($sql);
        return $tk;
    }

    function update_taikhoan($id,$user,$pass,$email,$sdt,$img){
        $sql = "UPDATE `nguoidung` set `username`='$user',`password`='$pass',`hinhanh`='$img',`diachi`='$email',`sodienthoai`='$sdt' WHERE `id`=".$id;
        pdo_execute($sql);
    }

    function checkemail($email){
        $sql= "SELECT * FROM nguoidung WHERE diachi='".$email."' ";
        $sp= pdo_query_one($sql);
        return $sp;
    }
?>