
    <!-- CONTENT  -->
    <main>
        <section class="courses">
            <h2>Đề Thi</h2>
            <?php
            $tenkythi = '';
                foreach ($list_lichthi as $lt) {
                if ($lt['id'] == $id_lichthi) {
                    $tenkythi =  $lt['tenkythi'];
                    break;
                }
                }
                foreach ($list_dethi as $dt){
                    extract($dt);   
                    echo '<div class="course">
                <a href="toan.html"><img src="../XDWeb_TTN/anh/Toan-cap-2.jpg"></a>
                <div class="description">
                    <a href="toan.html">
                        <h3 class="chuyende">'.$bodethi.'</h3>
                    </a>
                    <p class="mota">số câu : '.$socau.' <br> Tên Kì Thi - '.$tenkythi.'</p>
                </div>
                <a href="toan.html" class="btn-xem"><button class="right-button">Xem</button></a>
            </div>';
                }
            ?>
            
        </section>
    </main>
