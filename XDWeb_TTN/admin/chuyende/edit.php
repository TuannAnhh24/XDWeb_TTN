<div class="row2">
    <div class="row2 font_title">
        <h1>Ê đít danh sách</h1>
    </div>
    <div>
        <form action="" method="post">
            <div>
                <?php echo $thongbao ?? '' ?>
            </div>
            Tên chuyên đề
            <input type="text" name="tenchuyende" id="" value="<?= $tenchuyende?>">
            <br>
            <input type="hidden" name="id" value="<?= $id ?>"> 
            <button type="submit">Thêm</button>
            <a href="?act=chuyen-de">Danh sách</a>
        </form>
    </div>
</div>
