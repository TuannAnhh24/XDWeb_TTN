<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT CHUYÊN ĐỀ</h1>
    </div>
    <div>
        <form action="" method="post">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Tên chuyên đề
            
            <input type="text" name="tenchuyende" value="<?= $tenchuyende?>">
            <br>
            <input type="hidden" name="id" value="<?= $id ?>"> 
            <button type="submit">Cập nhật</button>
            <a href="?act=chuyen-de">Danh sách</a>
        </form>
    </div>
</div>
