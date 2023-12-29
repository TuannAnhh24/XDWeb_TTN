<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH Thông Báo</h1>
    </div>
    <div class="row2 form_content ">
        <div><?= $thongbao ?? '' ?></div>
        <form action="" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Tên Thông Báo</th>
                        <th>Nội Dung</th>
                        <th>Ngày Đăng</th>
                        <th></th>
                    </tr>
                    <?php foreach ($list_thongbao as $tb) : ?>
                        <?php extract($tb) ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" class="checkbox" value="<?= $id ?>"></td>
                            <td><?php echo $id ?></td>
                            <td><?php echo $tenthongbao ?></td>
                            <td><?php echo $noidung ?></td>
                            <td><?php echo $ngaydang ?></td>
                            <td>
                                <a href="?act=suatb&id_tb=<?= $id ?>"><input type="button" value="Sửa"></a>
                                <a href="?act=xoatb&id_tb=<?= $id ?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" id="checkall" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" id="clearall" type="button" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" id="deleteall" type="submit" value="Xóa tất cả">
                <a href="?act=themthongbao"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>