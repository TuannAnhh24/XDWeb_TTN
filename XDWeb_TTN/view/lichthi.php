
    <main>
        <section class="courses">
            <h2>Lịch Thi</h2>
            
                <?php
                foreach ($dslt as $lt){
                    extract($lt);
                    echo '<div class="course">
                <a href="toan.html"><img src="../XDWeb_TTN/anh/Toan-cap-2.jpg"></a>
                <div class="description">
                    <a href="toan.html">
                        <h3 class="chuyende">'.$tenkythi.'</h3>
                    </a>
                    <p class="mota"> số đề thi : '.$sodethi.' <br> bắt đầu - '.$batdau.'</p>
                    <p class="mota"> thời gian thi : '.$thoigianthi.' <br> kết thúc - '.$ketthuc.'</p>
                </div>
                <a href="index.php?act=dethi&id_lichthi='.$id.'" class="btn-xem"><button class="right-button">Xem</button></a>
            </div>';
                }
                ?>
        </section>
    </main>
    <!-- END CONTENT  -->


    