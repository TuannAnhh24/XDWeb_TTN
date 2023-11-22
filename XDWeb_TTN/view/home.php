<main>
    <section class="courses">
        <h2>Chuyên đề</h2>
        <?php
            foreach ($dscd as $cd){
                extract($cd);
                echo '<div class="course">
            <a href="index.php?act=toan"><img src="../XDWeb_TTN/anh/Toan-cap-2.jpg"></a>
            <div class="description">
                <a href="index.php?act=toan">
                    <h3 class="chuyende">'.$tenchuyende.'</h3>
                </a>
                <p class="mota"> thông tin ... <br> Started - Oct 30, 2023</p>
            </div>
            <a href="index.php?act=dethi" class="btn-xem"><button class="right-button">Xem</button></a>
        </div>';
            }
        ?>
    </section>
</main>