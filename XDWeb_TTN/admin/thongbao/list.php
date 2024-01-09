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
                        <th>Tên Thông Báo</th>
                        <th>Ảnh</th>
                        <th>Nội Dung</th>
                        <th>Ngày Đăng</th>
                        <th></th>
                    </tr>
                    <?php foreach ($list_thongbao as $tb) : ?>
                        <?php extract($tb) ?>
                        <tr>
                            <td><?php echo $tenthongbao ?></td>
                            <td><img src="../img/<?= $image ?>" width="90" alt=""></td>
                            <td><?php echo substr($noidung, 0, 100); ?> ... </td>

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
                <a href="?act=themthongbao"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>