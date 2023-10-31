<?php
    $hostname = "localhost";
    $db_name = "masv_examphp1";
    $username = "root";
    $password = "";
    try{
        $connect = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
        $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "kết nốt thành công";
    }
    catch(PDOException $e){
        $e -> getMessage();
    }
?>