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
                        <th></th>
                        <th>Tên kỳ thi</th>
                        <th>Ngày Bắt Đầu</th>
                        <th>Ngày Kết Thúc</th>
                        <th>Thời Gian Thi</th>
                        <th>Số Đề Thi</th>
                        <th></th>
                    </tr>
                    <?php foreach ($load_LT as $lt) : ?>
                        <?php extract($lt) ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" class="checkbox" value="<?= $id ?>"></td>
                            <td><?php echo $tenkythi ?></td>
                            <td><?php echo $batdau ?></td>
                            <td><?php echo $ketthuc ?></td>
                            <td><?php echo $thoigianthi ?></td>
                            <td><?php echo $sodethi ?></td>
                            <td>
                                <a href="?act=suaLT&id_lt=<?= $id ?>"><input type="button" value="Sửa"></a>
                                <a href="?act=xoaLT&id_lt=<?= $id ?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" id="checkall" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" id="clearall" type="button" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" id="deleteall" type="submit" value="Xóa tất cả">
                <a href="?act=themLT"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>