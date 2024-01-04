<!-- CONTENT  -->
<?php
    if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
        extract($_SESSION['user']);
        $hinhpath="img/".$hinhanh;
        if(is_file($hinhpath)){
            $hinh=$hinhpath;
        }
    }
?>

<form action="index.php?act=edit_taikhoan" method="POST" enctype="multipart/form-data" onsubmit="return validatePassword();">
    <div class="hoso">
        <div class="ho_so_cua_toi">
            <p>Thông tin người dùng</p>
            Quản lý thông tin hồ sơ để bảo mật tài khoản
        </div>
        <div class="thongtinhoso">
            <div class="thong_tin_ho_so">
            <table class="thongtin_user">
                    <tr >
                        <td>
                            <label for="username"><b>Tên đăng nhập</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" value="<?= $username?>" >
                        </td>
                    </tr> 

                    <tr>
                        <td>
                            <label for="email"><b>Email</b></label>
                        </td>
                        <td>
                            <input type="email" placeholder="Nhập Email" name="email" id="email" class="common-class email" value="<?= $diachi?>"  >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="password"><b>Mật Khẩu</b></label>
                        </td>
                        <td>
                            <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass" class="common-class password" value="<?= $password?>"  >
                        </td>
                </tr>

                <tr>
                        <td>
                            <label for="password"><b>Nhập lại Mật Khẩu</b></label>
                        </td>
                        <td>
                            <input type="password" placeholder="Nhập lại mật khẩu" name="pass_nl" id="pass_nl" class="common-class password" value="<?= $password?>" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="number"><b>Nhập số điện thoại</b></label>
                        </td>
                        <td>
                            <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text" value="<?= $sodienthoai?>" >
                        </td>
                    </tr>
                </table>
                    <br>
                <p style="color: red; text-align: center; font-weight: bold;"><?php echo $message; ?></p>
                <div style="margin-left: 250px;">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input style="width: 150px;" type="submit" name="capnhat" class="btn" value="Cập nhật"></input>
                </div>
            </div>
            <div  class="thong_tin_anh" >
                <div class="anhdaidien">
                    Ảnh đại diện
                </div>
                <div class="hinhanh">
                    <img src="<?php echo $hinh ?>" alt="Avatar">
                </div>
                <div class="thaydoi" >
                    <input type="file" name="hinhanh">
                </div>
                <div class="noidung">
                    Dụng lượng file tối đa 1 MB<br>
                    Định dạng:.JPEG, .PNG
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function validatePassword() {
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("pass_nl").value;

    if (password != confirmPassword) {
        alert("Mật khẩu không khớp. Vui lòng nhập lại.");
        return false;
    }

    return true;
}
</script>