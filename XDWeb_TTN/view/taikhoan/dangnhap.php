<form action="/login" method="post" class="form">
    <img src="anh/logo.jpg" alt="Avatar" class="avatar">
    <h2 class="title">Đăng Nhập</h2>
    <label for="username"><b>Tên Đăng Nhập</b></label>
    <input type="text" placeholder="Nhập tên đăng nhập" name="username" class="common-class input-text" required>
    <label for="password"><b>Mật Khẩu</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password" class="common-class password" required>
    <button type="submit" class="btn">Đăng Nhập</button>
    <div class="container">
        <label>
            <input type="checkbox" checked="checked" name="remember" class="checkbox"> Nhớ đăng nhập
        </label>
        <span class="psw"><a href="quenmk.html" class="link">Quên mật khẩu?</a></span>
    </div>
    <hr>
    <p>Bạn chưa có tài khoản? <a href="dangky.html" class="link">Đăng ký ngay</a>.</p>
</form>