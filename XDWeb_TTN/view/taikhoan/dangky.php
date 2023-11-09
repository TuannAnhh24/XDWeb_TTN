<form action="/login" method="post" class="form">
    <img src="anh/logo.jpg" alt="Avatar" class="avatar">
    <h2 class="title">Đăng Ký</h2>
    <label for="username"><b>Tên Đăng Nhập</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" required>
    <label for="password"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password" class="common-class password" required>
    <label for="password"><b>Nhập lại Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập lại mật khẩu" name="password_nl" class="common-class password" required>
    <label for="number"><b>Nhập số điện thoại</b></label>
    <input type="text" placeholder="Nhập số điện thoại" name="number" class="common-class input-text" required>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Nhập Email" name="email" class="common-class email" required>
    <label for="address"><b>Địa chỉ</b></label>
    <input type="text" placeholder="Nhhập địa chỉ" name="address" class="common-class input-text" required>
    <label for="date"><b>Ngày tháng năm sinh</b></label>
    <input type="date" placeholder="Nhập ngày tháng năm sinh" name="date" required class="date"><br>
    <label for="gioitinh"><b>Giới tính</b></label>
    <input type="checkbox" placeholder="" name="nam" value="nam" class="checkbox" required> nam
    <input type="checkbox" name="nu" class="checkbox"> nữ
    <input type="checkbox" name="xangphanhot" class="checkbox"> Lưỡng Long Hợp Thể
    <button type="submit" class="btn">Đăng ký</button>
    <div class="container">
        <span class="psw"><a href="dangnhap.html" class="link">Đăng nhập</a></span>
    </div>
    <hr class="solid">
    <!-- END CONTENT  -->
</form>