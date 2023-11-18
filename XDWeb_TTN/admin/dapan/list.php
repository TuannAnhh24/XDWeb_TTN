<div class="row2">
    <div class="row2 font_title">
        <h1>Đáp án của câu hỏi</h1>
        <h2><?= $tencauhoi ?></h2>
    </div>
    <div class="row2 form_content ">
        <div><?= $thongbao ?? '' ?></div>
        <form action="" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>NỘI DUNG</th>
                        <th>HÌNH ẢNH</th>
                        <th>TYPE</th>
                        <th>CÂU ĐÚNG</th>
                        <th></th>
                    </tr>
                    <?php foreach ($list_dapan as $da) : ?>
                        <?php extract($da) ?>
                        <tr>
                            <td><input type="checkbox" name="id[]" class="checkbox" value="<?= $id ?>"></td>
                            <td><?php echo $noidung ?></td>
                            <td>
                                <img src="../img/<?= $hinhanh ?>" width="90" alt="">
                            </td>
                            <td><?= $type ?></td>
                            <td>
                                <?= $caudung ? 'Đáp án đúng' : 'Đáp án sai' ?>
                            </td>
                            <td>
                                <a href=""><input type="button" value="Sửa"></a>
                                <a href=""><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" id="checkall" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" id="clearall" type="button" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" id="deleteall" type="submit" value="Xóa tất cả">
                <a href="?act=themch"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>