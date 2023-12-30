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
            <input type="hidden" name="id" value="<?= $load_one_thongbao['id'] ?>">
            <input type="text" name="tenthongbao" id="" class="inputtenkithi" value="<?= $load_one_thongbao['tenthongbao'] ?>">
            <br>
            Hình ảnh <input class="image-upload" type="file" name="hinhanh" id="" value="<?= $load_one_thongbao['image'] ?>"><p><img src="../img/<?= $load_one_thongbao['image'] ?>" width="90""></p>
            <br>
            Nội dung <input type="text" name="noidung" id="" class="ngaybatdau" value="<?= $load_one_thongbao['noidung'] ?>">
            <br>
            Ngày đăng <input type="text" id="ngaybatdau" class="ngaybatdau" value="<?= $load_one_thongbao['ngaydang'] ?>" readonly>
            <br>
            <br>
            <button type="submit" class="btnthemb">cập nhật</button>
            <a href="?act=thongbao" class="btnthema">Danh sách</a>
        </form>
    </div>
</div>

