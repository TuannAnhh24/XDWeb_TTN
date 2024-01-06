<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH CHUYÊN ĐỀ</h1>
    </div>
    <div class="row2 form_content ">
    <div><?= $thongbao ?? '' ?></div>
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>MÃ CHUYÊN ĐỀ</th>
                        <th>TÊN CHUYÊN ĐỀ</th>
                        <th></th>
                    </tr>
                    <?php foreach ($chuyende as $cd) : ?>
                        <?php extract($cd) ?>
                        <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $tenchuyende ?></td>
                            <td>
                                <a href="?act=suacd&id=<?= $id ?>"><input type="button" value="Sửa"></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa chuyên đề này không?')" href="?act=chuyen-de&id=<?= $id ?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="?act=themcd"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>