<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM ĐỀ THI</h1>
    </div>
    <div>
        <form action="" method="post">
            <div style="color: red;">
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
            <select class="select-chuyende" name="id_lichthi" id="">
                <option value="0">Chọn lịch thi</option>
                <?php foreach ($listlichthi as $lt) : ?>
                    <option value="<?= $lt['id'] ?>">
                        <?= $lt['tenkythi'] ?>  
                    </option>
                <?php endforeach ?>
            </select>
            <div class="tencd">Tên đề thi</div>
            <input type="text" name="tendethi" class="form-nhapcd" >
          
            <div class="tencd">Số câu</div>
            <input type="number" name="socau" min="1" max="50" class="form-nhapcd" >
            <br>
            <button type="submit" class="submit-cd">Tạo đề thi</button>
            <a href="index.php?act=listdethi" class="dscd">Danh sách</a>
        </form>
    </div>
</div>

<script>
    document.querySelector('input[name="socau"]').addEventListener('change', function(e) {
        if (e.target.value < 1 ) {
            alert('Vui lòng nhập một số lớn hơn 0');
            e.target.value = 1;
        } else if (e.target.value > 50){
            alert('Vui lòng nhập một số nhỏ hơn 50');
            e.target.value = 50;
        }
    });
</script>
