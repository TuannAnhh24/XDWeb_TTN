<form action="?act=dangnhap" method="post" class="form">
    <img src="anh/logo.jpg" alt="Avatar" class="avatar">
    <h2 class="title">Đăng Nhập</h2>
    <label for="username"><b>Tên Đăng Nhập</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="user" class="common-class input-text" required>
    <label for="password"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass" class="common-class password" required>
    <input type="submit" name="dangnhap" class="btn" value="Đăng Nhập"></input>
    <div class="container">
        <label>
            <input type="checkbox" checked="checked" name="remember" class="checkbox"> Nhớ đăng nhập
        </label>
        <span class="psw"><a href="?act=quenmk" class="link">Quên mật khẩu?</a></span>
    </div>
    <hr>
    <p>Bạn chưa có tài khoản? <a href="?act=dangky" class="link">Đăng ký ngay</a>.</p>
</form>