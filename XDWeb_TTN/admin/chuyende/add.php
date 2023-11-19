<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM CHUYÊN ĐỀ</h1>
    </div>
    <div>
        <form action="" method="post">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            <div class="tencd">Tên chuyên đề</div>
            <input type="text" name="tenchuyende" class="form-nhapcd" >
            <br>
            <button type="submit" class="submit-cd">Thêm</button>
            <a href="?act=chuyen-de" class="dscd">Danh sách</a>
        </form>
    </div>
</div>
