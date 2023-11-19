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
            <textarea name="noidung" id="" cols="90" rows="10" value="<?=$noidung?>"></textarea>
            <br>
            Hình ảnh <input type="file" name="hinhanh" id="">
            <br>
            Câu hỏi số
            <input type="number" name="type" id="" value="<?=$type?>">
            <br>
            Câu đúng (Tích vào là đúng) <input type="checkbox" name="caudung" value="1" id="">
            <input type="hidden" name="id_cauhoi" value="<?= $id_cauhoi ?>">
            <br>
            <button type="submit">Thêm</button>
            <input type="hidden" name="" value="<?=$id?>">
            <a href="?act=dapan&id_cauhoi=<?= $id_cauhoi ?>">Danh sách</a>
        </form>
    </div>
</div>