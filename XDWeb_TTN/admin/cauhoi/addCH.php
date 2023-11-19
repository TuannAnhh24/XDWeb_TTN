<div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="error-message">
            <?php echo $thongbao ?? '' ?>
        </div>
        Nội dung câu hỏi <br>
        <textarea class="question-textarea" name="noidung" id="" cols="90" rows="10"></textarea>
        <br>
        Hình ảnh <input class="image-upload" type="file" name="hinhanh" id="">
        <br>
        <br>
        Chuyên đề
        <select class="select-chuyende" name="id_chuyende" id="">
            <option value="0">Chọn chuyên đề</option>
            <?php foreach ($chuyende as $cd) : ?>
                <option value="<?= $cd['id'] ?>">
                    <?= $cd['tenchuyende'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button class="submit-button" type="submit">Thêm</button>
        <a class="list-link" href="?act=cau-hoi">Danh sách</a>
    </form>
</div>

</div>
