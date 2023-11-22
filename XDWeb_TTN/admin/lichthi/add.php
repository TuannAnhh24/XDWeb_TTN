<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM LỊCH THI</h1>
        <h2><?= $tencauhoi ?></h2>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Nội dung đáp án <br>
            <textarea name="noidung" id="" cols="90" rows="10"></textarea>
            <br>
            Hình ảnh <input type="file" name="hinhanh" id="">
            <br>
            Câu hỏi số
            <input type="number" name="type" id="">
            <br>
            <input type="hidden" name="id_cauhoi" value="<?= $id_cauhoi ?>">
            <br>
            <button type="submit">Thêm</button>
            <a href="?act=dapan&id_cauhoi=<?= $id_cauhoi ?>">Danh sách</a>
        </form>
    </div>
</div>