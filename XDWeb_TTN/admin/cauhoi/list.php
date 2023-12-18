<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH CÂU HỎI</h1>
    </div>
    <div class="row2 form_content ">
        <div><?= $thongbao ?? '' ?></div>
        <form action="" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>NỘI DUNG</th>
                        <th>HÌNH ẢNH</th>
                        <th>CHUYÊN ĐỀ</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($cauhoi as $ch) : ?>
                        <?php extract($ch) ?>
                        <tr>
                            <!-- <td><input type="checkbox" name="id[]" class="checkbox" value="<?= $id ?>"></td> -->
                            <td><?php echo $noidung ?></td>
                            <td>
                                <img src="../img/<?= $hinhanh ?>" width="90" alt="">
                            </td>
                            <td><?= $tenchuyende ?></td>
                            <td>
                                <a href="?act=themdapan&id_cauhoi=<?= $id ?>"><input type="button" value="Thêm đáp án"></a> <br>
                                <a href="?act=dapan&id_cauhoi=<?= $id ?>"><input type="button" value="Xem đáp án"></a>
                            </td>
                            <td>
                                <a href="?act=suach&id_cauhoi=<?= $id ?>"><input type="button" value="Sửa"></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="?act=xoaCH&id_cauhoi=<?= $id ?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <!-- <input class="mr20" id="checkall" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" id="clearall" type="button" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" id="deleteall" type="submit" value="Xóa tất cả"> -->
                <a href="?act=themch"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>