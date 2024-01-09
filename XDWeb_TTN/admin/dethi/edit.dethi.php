<div class="row2">
    <div class="row2 font_title">
        <h1>SỬA ĐỀ THI</h1>
    </div>
    <div>
        <form action="" method="post">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Lịch Thi
            <select class="select-chuyende" name="id_lichthi" id="">
                <option value="0" name="tenkythi"><?= $join['tenkythi'] ?></option>
                <?php foreach ($listlichthi as $lt) : ?>
                    <option value="<?= $lt['id'] ?>">
                        <?= $lt['tenkythi'] ?>  
                    </option>
                <?php endforeach ?>
            </select>
            <div class="tencd">Tên đề thi</div>
            <input type="text" name="tendethi" class="form-nhapcd" value="<?= $load_de_thi['ten_dethi'] ?>">
          
            <div class="tencd">Số câu</div>
            <input type="number" name="socau" min="1" max="50" class="form-nhapcd" value="<?= $load_de_thi['socau'] ?>">
            <br>
            <input type="hidden" name="id" value="<?= $id ?>"> 
            <button type="submit" class="submit-cd">Cập nhật đề thi</button>
            <a href="index.php?act=listdethi" class="dscd">Danh sách</a>
        </form>
    </div>
</div>

<script>
    document.querySelector('input[name="socau"]').addEventListener('change', function(e) {
        if (e.target.value < 1 || e.target.value > 50) {
            alert('Vui lòng nhập một số lớn hơn 0');
            e.target.value = 1;
        }
    });
</script>
