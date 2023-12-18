<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT CHUYÊN ĐỀ</h1>
    </div>
    <div>
        <form action="" method="post">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div> <br>
            <span class="tencd">Tên chuyên đề</span> <br> <br>
            
            <input type="text" name="tenchuyende" class="form-nhapcd" value="<?= $tenchuyende?>">
            <br>
            <input type="hidden" name="id"  value="<?= $id ?>"> 
            <button type="submit" class="submit-cd">Cập nhật</button>
            <a href="?act=chuyen-de" class="dscd">Danh sách</a>
        </form>
    </div>
</div>
