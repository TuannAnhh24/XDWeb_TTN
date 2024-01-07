<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPT POLYTECHNIC WEB DESIGN</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <!-- HEADER  -->
    <header class="header">
        <div class="logo">
            <a href="index.php?act="><img src="anh/logo.jpg" alt=""></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php?act=trangchu">Trang chủ</a></li>
                <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                <li><a href="index.php?act=lichthi">Lịch Thi</a></li>
            </ul>
        </div>
        <?php 
            if(isset($_SESSION['user'])){
                extract($_SESSION['user']);
                $avatar = isset($hinhanh) ? $hinhanh : 'img/avatar-trang-4.jpg';
                if($hinhanh){
                    $avatar = "img/".$hinhanh;
                }else{
                    $avatar = 'img/avatar-trang-4.jpg';
                }
        ?>
        <!-- hiển thị ra menu con khi có user đăng nhập  -->
        <div class="profile">
            <img style="border-radius: 100px;" src="<?= $avatar ?>" class="dang_nhap">
            <span class="triangle-down"></span>
            <ul class = "dropdown-menu">
                <li><a href="?act=edit_taikhoan">Thông tin cá nhân</a></li>
                <?php if($quyen == 1){ ?>
                    <li><a href="admin/index.php">Đăng nhập admin</a></li>
                <?php } ?>
                <li><a href="?act=ls-thi">Xem bài thi đã làm</a></li>
                <li><a href="?act=thoat">Đăng xuất</a></li>
            </ul>
        </div> 

        <?php 
            }else{
        ?>
            <!-- đăng nhập không thành công hiển thị menu như bình thường  -->
            <div class="sign-in">
                <a href="?act=dangnhap"><button class="button-sign-in">Đăng nhập</button></a>
            </div>
        <?php } ?>
    </header>
    <!-- END HEADER  -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const profile = document.querySelector(".profile");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        profile.addEventListener("click", function() {
            dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
        });
        });
    </script>