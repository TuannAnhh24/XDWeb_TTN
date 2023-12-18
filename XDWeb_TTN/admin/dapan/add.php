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
            Đáp án số
            <input type="number" name="type" min="1" max="10" class="cauhoida">
            <br>
            Câu đúng (Tích vào là đúng) <input type="checkbox" name="caudung" value="1" id="" class="caudungda">
            <input type="hidden" name="id_cauhoi" value="<?= $id_cauhoi ?>">
            <br>
            <button type="submit" class="btn-da">Thêm</button>
            <a href="?act=dapan&id_cauhoi=<?= $id_cauhoi ?>" class="btn-dsda">Danh sách đáp án</a>
            <a href="?act=cau-hoi" class="btn-dsda">Danh sách câu hỏi</a>
        </form>
    </div>
</div>

<script>
    document.querySelector('input[name="type"]').addEventListener('change', function(e) {
        if (e.target.value < 1 ||  e.target.value > 10) {
            alert('Vui lòng nhập một số lớn hơn 0');
            e.target.value = 1;
        }
    });
</script>
