<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM ĐỀ THI</h1>
    </div>
    <div>
        <form action="" method="post">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Chuyên đề
            <select class="select-chuyende" name="chuyende" id="">
                <option value="0">Chọn chuyên đề</option>
                <?php foreach ($listchuyende as $cd) : ?>
                    <option value="<?= $cd['id'] ?>">
                        <?= $cd['tenchuyende'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <div class="tencd">Tên đề thi</div>
            <input type="text" name="bode" class="form-nhapcd" >
          
            <div class="tencd">Số câu</div>
            <input type="number" name="socau" class="form-nhapcd" >
            <br>
            <button type="submit" class="submit-cd">Tạo đề thi</button>
            <a href="" class="dscd">Danh sách</a>
        </form>
    </div>
</div>
