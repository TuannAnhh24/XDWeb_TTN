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
            <input type="number" name="time" id="" class="thoigianthi">
            <br>
            Số đề thi
            <input type="number" name="sodethi" id="" class="sodethi">
            <br>
            <button type="submit" class="btnthemb">Thêm</button>
            <a href="?act=lich-thi" class="btnthema">Danh sách</a>
        </form>
    </div>
</div>

