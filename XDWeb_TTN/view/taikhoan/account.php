<main class="mainTT">
    <h1 class="h1_updateTT">Cập Nhật Thông Tin Cá Nhân</h1>

    <form action="/cap-nhat-thong-tin" method="post" class="updateTT" enctype="multipart/form-data">
        <label for="avatar">Avatar</label>
        <input type="file" id="avatar" name="avatar" required><br><br>

        <label for="hoTen">Họ và Tên:</label>
        <input type="text" id="hoTen" name="hoTen" placeholder="Nhập họ và tên" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Nhập địa chỉ email" required><br><br>

        <label for="sdt">Số Điện Thoại:</label>
        <input type="tel" id="sdt" name="sdt" placeholder="Nhập số điện thoại" required><br><br>

        <label for="diaChi">Địa Chỉ:</label>
        <textarea id="diaChi" name="diaChi" placeholder="Nhập địa chỉ" required></textarea><br><br>

        <label for="pass">Mật khẩu cũ</label>
        <input type="password" id="oldPass" name="pass" required><br><br>

        <label for="pass">Mật khẩu mới</label>
        <input type="password" id="newPass" name="pass" required><br><br>

        <label for="pass">Nhập lại mật khẩu mới</label>
        <input type="password" id="comfirmPass" name="pass" required><br><br>

        <label for="">Giới Tính</label>
        <input type="radio" name="gioitinh">Nam
        <input type="radio" name="gioitinh">Nữ <br><br>

        <label for="date">Ngày Tháng Năm Sinh</label>
        <input type="date" id="date" name="date" required><br><br>


        <input type="submit" value="Cập Nhật" class="btn-capnhat">
    </form>
</main>