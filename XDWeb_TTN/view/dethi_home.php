<main>  
        <section class="courses">
            <h2>Chuyên đề - <?php foreach ($list_chuyende as $cd){echo $cd['tenchuyende'];}  ?></h2>

        <?php
            foreach ($list_dethi_home as $dt){
                foreach ($list_lichthi as $lt){
                    if($lt['id'] == $dt['id_lichthi']){
                        $ten_lichthi = $lt['tenkythi'];
                        $batdau = $lt['batdau'];
                        $ketthuc = $lt['ketthuc'];
                        $thoigianthi = $lt['thoigianthi'];
                }
            }
                echo '<div class="course">
                <a href="#"><img src="../XDWeb_TTN/anh/Toan-cap-2.jpg"></a>
                <div class="description">
                    <a href="#"><h3 class="chuyende">'.$dt['ten_dethi'].'</h3></a>
                    <p class="mota">số câu: '.$dt['socau'].'<br> '.$ten_lichthi.'</p>
                    <p class="mota">Bắt đầu '.$batdau.' -  Kết Thúc '.$ketthuc.' Thời Gian thi : '.$thoigianthi.'</p>
                </div>
                <a href="#" class="btn-xem"><button class="right-button">Vào Thi</button></a>
            </div>';
            }
        ?>
        </section>
    </main>