<form method="POST" action="index.php?act=nopbai">
    <div class="dau">
        <button class="btn-thoat"><i class="fas fa-power-off"></i> Thoát</button>
        <span class="tenthisinh"></span>
        <span id="countdown" class="countdown"></span>
        <button type="submit" class="btn-nopbai"><i class="fas fa-paper-plane"></i> Nộp Bài</button>
    </div>

    <div class="than">
        <?php $soCau = 1; ?>
        <?php foreach ($chitiet as $index => $ct) : ?>
            <div class="khungcauhoi">
                <h2 class="cauhoi">Câu <?= $soCau ?></h2>
                <span class="hoi"><?php echo $ct['noidung_cau_hoi'] ?></span>
                <?php foreach ($ct['dap_an'] as $noidung) : ?>
                    <input type="radio" id="dap_an_cau_<?php echo $index ?>" name="dap_an_cau_<?php echo $index ?>" value="<?php echo $noidung['cau_dung']; ?>">
                    <label for="dap_an_cau_<?php echo $index ?>"><?php echo $noidung['noidung_dap_an'] ?></label>
                <?php endforeach ?>
            </div>
            <?php $soCau++; ?>
        <?php endforeach ?>
    </div>
    <input type="hidden" name="id_dethi" value="<?php echo $id_dethi; ?>">
</form>





<div class="khungodapan">
    <span class="dscauhoi">Danh sách câu hỏi</span>
    <button class="dapanso">1</button>
    <button class="dapanso">2</button>
    <button class="dapanso">3</button>
    <button class="dapanso">4</button>
    <button class="dapanso">5</button>
    <button class="dapanso">6</button>
    <button class="dapanso">7</button>
    <button class="dapanso">8</button>
    <button class="dapanso">9</button>
    <button class="dapanso">10</button>
</div>
</div>

<script>
    var tralois = document.getElementsByClassName("khungtraloi");
    for (var i = 0; i < tralois.length; i++) {
        tralois[i].addEventListener("click", function() {
            this.classList.toggle("clicked");
        });
    }
    // Khởi tạo biến thời gian
    var time = 40 * 60 * 1000; // 40 phút bằng 2400000 mili giây

    // Hàm đếm thời gian
    function countdown() {
        // Giảm thời gian
        time -= 1000;

        // Cập nhật thời gian còn lại
        var minutes = Math.floor(time / (60 * 1000));
        var seconds = Math.floor(time / 1000) - minutes * 60;

        // Hiển thị thời gian còn lại
        document.querySelector("#countdown").textContent = minutes + ":" + seconds;

        // Nếu thời gian hết, thì dừng đếm
        if (time <= 0) {
            clearInterval(timer);
        }
    }

    // Khởi chạy đếm thời gian
    var timer = setInterval(countdown, 1000);

    // Lấy thẻ button thoát
    var btnThoat = document.querySelector(".btn-thoat");

    // Gán sự kiện click cho nút thoát
    btnThoat.addEventListener("click", function() {
        // Hiển thị thông báo xác nhận
        var result = confirm("Bạn có muốn thoát không?");

        // Nếu chọn "OK" (có) thì thoát, ngược lại quay lại trang
        if (result) {
            window.location.href = "index.php?act=lichthi"; // quay về trang 
        } else {
            window.location.reload(); // Tải lại trang
        }
    });
</script>