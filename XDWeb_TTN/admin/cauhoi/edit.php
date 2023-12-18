<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT CÂU HỎI</h1>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Nội dung câu hỏi <br>
            <textarea class="question-textarea" name="noidung" id="" cols="90" rows="10"><?= $noidung ?></textarea>
            <br>
            Hình ảnh <input class="image-upload" type="file" name="hinhanh" id="" value="<?= $hinhanh ?>">
            <br>
            Chuyên đề
            <select class="select-chuyende" name="id_chuyende" id="">
                <option value="0">Chọn chuyên đề</option>
                <?php foreach ($chuyende as $cd) : ?>
                    <option value="<?= $cd['id'] ?>" <?= ($cd['id'] == $id_chuyende) ? 'selected' : '' ?>>
                        <?= $cd['tenchuyende'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <br>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button style="width: 100px; height: 38px; display: inline-block;" class="submit-button" type="submit">Cập nhật</button>
            <a style="width: 100px; display: inline-block;" class="list-link" href="?act=cau-hoi">Danh sách</a>
        </form>
    </div>
</div>