<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM ĐÁP ÁN</h1>
        <h2><?= $tencauhoi ?></h2>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Nội dung đáp án <br>
            <textarea name="noidung" id="" cols="90" rows="10" class="ndda"></textarea>
            <br>
            Hình ảnh <input type="file" name="hinhanh" id="" class="hinhanhda">
            <br>
            Câu hỏi số
            <input type="number" name="type" id="" class="cauhoida">
            <br>
            Câu đúng (Tích vào là đúng) <input type="checkbox" name="caudung" value="1" id="" class="caudungda">
            <input type="hidden" name="id_cauhoi" value="<?= $id_cauhoi ?>">
            <br>
            <button type="submit" class="btn-da">Thêm</button>
            <a href="?act=dapan&id_cauhoi=<?= $id_cauhoi ?>" class="btn-dsda">Danh sách</a>
        </form>
    </div>
</div>

