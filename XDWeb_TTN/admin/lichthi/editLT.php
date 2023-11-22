<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM LỊCH THI</h1>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Tên kỳ thi<br>
            <input type="text" name="tenkythi" id=""value="<?=$tenkythi?>">
            <br>
            Ngày bắt đầu <input type="datetime-local" name="batdau" id="" value="<?=$batdau?>">
            <br>
            Ngày kết thúc <input type="datetime-local" name="ketthuc" id="" value="<?=$ketthuc?>">
            <br>
            Thời gian thi 
            <input type="number" name="time" id="" value="<?=$thoigianthi?>">
            <br>
            Số đề thi
            <input type="number" name="sodethi" id="" value="<?=$sodethi?>">
            <br>
            <input type="hidden" name="id" value="<?= $id ?>"> 
            <button type="submit">Cập nhật</button>
            <a href="?act=lich-thi">Danh sách</a>
        </form>
    </div>
</div>