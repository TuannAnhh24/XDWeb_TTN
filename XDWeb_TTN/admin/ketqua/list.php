<div class="row2">
    <div class="row2 font_title">
        <h1>Kết quả và đánh giá</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Tên thí sinh</th>
                        <th>Bộ đề thi</th>
                        <th>Điểm</th>
                        <td></td>
                    </tr>
                    <?php
                    foreach ($loadkq as $ketqua) {
                        extract($ketqua);
                    ?>
                        <tr>
                            <!-- <td><input type="checkbox" name="" id=""></td> -->
                            <td> <?= $username ?> </td>
                            <td> <?= $bodethi ?> </td>
                            <td> <?= $diem ?> </td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <!-- <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
            </div> -->
        </form>
    </div>
</div>
</div>