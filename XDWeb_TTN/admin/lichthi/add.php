<div class="row2">
    <div class="row2 font_title">
        <h1 class="thilich">THÊM LỊCH THI</h1>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="thongbaolichthi">
                <?php echo $thongbao ?? '' ?>
            </div>
            Tên kỳ thi<br>
            <input type="text" name="tenkythi" id="" class="inputtenkithi">
            <br>
            Ngày bắt đầu <input type="datetime-local" name="batdau" id="" class="ngaybatdau">
            <br>
            Ngày kết thúc <input type="datetime-local" name="ketthuc" id="" class="ngayketthuc">
            <br>
            Thời gian thi 
            <input type="number" name="time" min="1" max="50"class="thoigianthi">
            <br>
            Số đề thi
            <input type="number" name="sodethi" min="1" max="20" class="sodethi">
            <br>
            <button type="submit" class="btnthemb">Thêm</button>
            <a href="?act=lich-thi" class="btnthema">Danh sách</a>
        </form>
    </div>
</div>

<script>
    // validate thời gian thi 
    document.querySelector('input[name="time"]').addEventListener('change', function(e) {
        if (e.target.value < 1 ) {
            alert('Vui lòng nhập một số lớn hơn 0');
            e.target.value = 1;
        } else if (e.target.value > 50){
            alert('Vui lòng nhập một số nhỏ hơn 50');
            e.target.value = 50;
        }
    });

    // validate số đề thi 
    document.querySelector('input[name="sodethi"]').addEventListener('change', function(e) {
        if (e.target.value < 1 ) {
            alert('Vui lòng nhập một số lớn hơn 0');
            e.target.value = 1;
        } else if (e.target.value > 20){
            alert('Vui lòng nhập một số nhỏ hơn 20');
            e.target.value = 20;
        }
    });
</script>

