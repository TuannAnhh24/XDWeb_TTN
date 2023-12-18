<?php 
    extract($da)
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>SỬA ĐÁP ÁN</h1>
        <h2><?= $noidung ?></h2>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Nội dung đáp án <br>
            <textarea class="question-textarea" name="noidung" id="" cols="90" rows="10"><?=$noidung ?></textarea>
            <br>
            Hình ảnh <input class="image-upload" type="file" name="hinhanh" id="">
            <br>
            Đáp án số
            <input type="number" name="type" min="1" max="10" value="<?=$type?>">
            <br>
             Đáp án: <br>
            <input type="radio" id="true" name="caudung" value="1">
            <span for="true">Đúng</span>
            <input type="radio" id="false" name="caudung" value="0">
            <span for="false">Sai</span><br>

            <input type="hidden" name="id_cauhoi" value="<?= $id_cauhoi ?>">
            <br>
            <button type="submit" class="btn-da">Cập nhật</button>
            <input type="hidden" name="" value="<?=$id?>">
            <a class="btn-dsda" href="?act=dapan&id_cauhoi=<?= $id_cauhoi ?>">Danh sách câu hỏi</a>
        </form>
    </div>
</div>

<script>
    document.querySelector('input[name="type"]').addEventListener('change', function(e) {
        if (e.target.value < 1 || e.target.value > 10) {
            alert('Vui lòng nhập một số lớn hơn 0');
            e.target.value = 1;
        }
    });
</script>