<main>
    <section class="courses">
        <h2>Thông Tin</h2>
        <?php
            foreach ($listthongbao as $tb){
                extract($tb);
                echo '
                <div class="course">
                <a href="index.php?act=thongbao_trangchu&id_thongbao='.$id.'"><img src="../XDWeb_TTN/anh/Toan-cap-2.jpg"></a>
                <div class="description">
                    <a href="index.php?act=thongbao_trangchu&id_thongbao='.$id.'">
                    <input type="hidden" value="'.$id.'" name="id_chuyende">
                        <h3 class="chuyende">'.$tenthongbao.'</h3>
                    </a>
                    <p class="mota"> thông tin ... <br> ngày đăng : '.$ngaydang.'</p>
                </div>
                <a href="index.php?act=thongbao_trangchu&id_thongbao='.$id.'" class="btn-xem"><button class="right-button">Xem</button></a>
            </div>';
            }
        ?>
    </section>
</main>