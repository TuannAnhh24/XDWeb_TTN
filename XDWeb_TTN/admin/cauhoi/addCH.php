<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM CÂU HỎI</h1>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Nội dung câu hỏi <br>
            <textarea name="noidung" id="" cols="90" rows="10"></textarea>
            <br>
            Hình ảnh <input type="file" name="hinhanh" id="">
            <br>
            Chuyên đề
            <select name="id_chuyende" id="">
                <option value="0">Chọn chuyên đề</option>
                <?php foreach ($chuyende as $cd) : ?>
                    <option value="<?= $cd['id'] ?>">
                        <?= $cd['tenchuyende'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <br>
            <button type="submit">Thêm</button>
            <a href="?act=cau-hoi">Danh sách</a>
        </form>
    </div>
</div>