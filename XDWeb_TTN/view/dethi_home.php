
<main>  
    <section class="courses">
        <h2>Chuyên đề - <?php foreach ($list_chuyende as $cd) { echo $cd['tenchuyende']; } ?></h2>

        <?php
        foreach ($list_dethi_home as $dt) {
            foreach ($list_lichthi as $lt) {
                if ($lt['id'] == $dt['id_lichthi']) {
                    $ten_lichthi = $lt['tenkythi'];
                    $batdau = $lt['batdau'];
                    $ketthuc = $lt['ketthuc'];
                    $thoigianthi = $lt['thoigianthi'];
                    $id_dethi = $dt['id'];
                }
            }
            echo '
            <div class="course">
                <a href="#"><img src="../XDWeb_TTN/anh/Toan-cap-2.jpg"></a>
                <div class="description">
                    <a href="#"><h3 class="chuyende">' . $dt['ten_dethi'] . '</h3></a>
                    <p class="mota">số câu: ' . $dt['socau'] . '<br> ' . $ten_lichthi . '</p>
                    <p class="mota">Bắt đầu ' . $batdau . ' -  Kết Thúc ' . $ketthuc . ' Thời Gian thi : ' . $thoigianthi . '</p>
                </div>
                <form method="GET" action="index.php">
                    <input type="hidden" name="act" value="vao-thi">
                    <input type="hidden" name="id_dethi" value="' . $id_dethi . '">
                    <button type="submit" class="right-button" name="thi">Vào Thi</button>
                </form>
            </div>';
        }
        ?>
    </section>
</main>