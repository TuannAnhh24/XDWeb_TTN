<!-- CONTENT  -->
<form action="index.php?act=dangky" method="post" class="form" onsubmit="return validatePassword();">
        <img src="anh/logo.jpg" alt="Avatar" class="avatar">
        <h2 class="title">Đăng Ký</h2>
        <!-- <label for="username"><b>Tên Đăng Nhập</b></label>
        <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" required> -->
        <label for="username"><b>Tên Đăng Nhập</b></label>
        <input type="text" placeholder="Nhập tên đăng nhập" name="user" class="common-class input-text" >
        <label for="password"><b>Mật Khẩu</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass" class="common-class password" >
        <label for="password"><b>Nhập lại Mật Khẩu</b></label>
        <input type="password" placeholder="Nhập lại mật khẩu" name="pass_nl" id="pass_nl" class="common-class password" >
        <label for="number"><b>Nhập số điện thoại</b></label>
        <input type="text" placeholder="Nhập số điện thoại" name="sdt" class="common-class input-text" >
        <!-- <label for="address"><b>Địa chỉ</b></label>
        <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text" required>
        <label for="date"><b>Ngày tháng năm sinh</b></label>
        <input type="date" placeholder="Nhập ngày tháng năm sinh" name="date" required class="date"><br> -->
        <!-- <label for="gioitinh"><b>Giới tính</b></label>
        <input type="checkbox" placeholder="" name="nam" value="nam" class="checkbox" required> nam
        <input type="checkbox" name="nu" class="checkbox"> nữ -->
        <p style="color: red; text-align: center; font-weight: bold;"><?php echo $message; ?></p>
        <input type="submit" name="dangky" class="btn" value="Đăng ký"></input>
        <div class="container">
            <span class="psw"><a href="index.php?act=dangnhap" class="link">Đăng nhập</a></span>
        </div>
        <hr class="solid">
    </form>

    <!-- END CONTENT  -->