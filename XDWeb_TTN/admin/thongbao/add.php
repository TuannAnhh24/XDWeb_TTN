<div class="row2">
    <div class="row2 font_title">
        <h1 class="thilich">THÊM Thông Báo</h1>
    </div>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="thongbaolichthi">
                <?php echo $thongbao ?? '' ?>
            </div>
            tên thông báo<br>
            <input type="text" name="tenthongbao" id="" class="inputtenkithi">
            <br>
            Hình ảnh <input class="image-upload" type="file" name="hinhanh" id="">
            <br>
            Nội dung <input type="text" name="noidung" id="" class="ngaybatdau">
            <br>
            <br>
            <button type="submit" class="btnthemb">Thêm</button>
            <a href="?act=thongbao" class="btnthema">Danh sách</a>
        </form>
    </div>
</div>

