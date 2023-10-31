<?php
    require 'connect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM `courses` WHERE `id` = '$id'";
    $connect -> exec($sql);
    header('location:list.php');
?>  