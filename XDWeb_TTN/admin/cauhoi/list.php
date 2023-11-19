<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
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
                            <td><input type="checkbox" name="id[]" id="" class="checkbox" value=<?=$id?>></td>
                            <td><?php echo $noidung ?></td>
                            <td><img src="<?=$img?>"  width ="90"></td>
                            <td><?=$tenchuyende ?></td>
                            <td><a href="?act=themdapan&id_cauhoi=<?=$id?>">Thêm đáp án</a>
                            <a href="?act=xemdapan&id_cauhoi=<?=$id?>">Xem đáp án</a></td>
                            <td>
                                <input type="button" value="Sửa">
                                <a href="?act=chuyen-de&id=<?= $id ?>"><input type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20"  id="checkall"  type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" id="clearall" type="button" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" type="submit" id="deleteall" value="Xóa Tất cả">
                <a href="?act=themcd"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>