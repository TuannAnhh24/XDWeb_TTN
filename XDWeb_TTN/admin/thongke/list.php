<div class="row2">
    <div class="row2 font_title">
        <h1>Số lượng câu hỏi theo chuyên đề</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Tên chuyên đề</th>
                        <th>Số câu hỏi</th>
                    </tr>
                    <?php
                    foreach ($slch as $cauhoi) {
                        extract($cauhoi);
                    ?>
                        <tr>
                            <!-- <td><input type="checkbox" name="" id=""></td> -->
                            <td> <?= $tenchuyende ?> </td>
                            <td> <?= $so_luong_cauhoi ?> </td>
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
    <br><br>
    <div class="row2 font_title">
        <h1>Số lượng người dùng</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Quyền </th>
                        <th>Số lượng người dùng</th>
                    </tr>
                    <?php
                    foreach ($sl_user as $sluser) {
                        extract($sluser);
                    ?>
                        <tr>
                            <!-- <td><input type="checkbox" name="" id=""></td> -->
                            <td> <?= $quyen ?> </td>
                            <td> <?= $user_count ?> </td>
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
    <br><br>
    <div class="row2 font_title">
        <h1>Top 10 thí sinh có điểm cao nhất</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Tên thí sinh</th>
                        <th>Bộ đề thi</th>
                        <th>Điểm</th>
                    </tr>
                    <?php
                    foreach ($load_top10 as $top10) {
                        extract($top10);
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
