<button class="btn-thoat"><i class="fas fa-power-off"></i> Thoát</button>
<form method="POST" action="index.php?act=nopbai">
    <div class="dau">
        <span class="tenthisinh"></span>
        <span id="countdown" class="countdown"></span>
        <button type="submit" class="btn-nopbai"><i class="fas fa-paper-plane"></i> Nộp Bài</button>
    </div>
    
    <div class="than">
        <?php $soCau = 1; ?>
        <?php foreach ($chitiet as $index => $ct) : ?>
            <div class="khungcauhoi">
                <h2 class="cauhoi">Câu <?= $soCau ?></h2>
                <span class="hoi"><?php echo $ct['noidung_cau_hoi'] ?></span>
                <?php foreach ($ct['dap_an'] as $noidung) : ?>
                    <input type="radio" id="dap_an_cau_<?php echo $index ?>" name="dap_an_cau_<?php echo $index ?>" value="<?php echo $noidung['cau_dung']; ?>">
                    <label for="dap_an_cau_<?php echo $index ?>"><?php echo $noidung['noidung_dap_an'] ?></label>
                <?php endforeach ?>
            </div>
            <?php $soCau++; ?>
        <?php endforeach ?>
    </div>
    <input type="hidden" name="id_dethi" value="<?php echo $id_dethi; ?>">
</form>






</div>

    <!-- ô hiển số câu hỏi -->
    <div class="khungodapan">
        <span class="dscauhoi">Danh sách câu hỏi</span>
        <?php $soCauHienThi = 1; ?>
        <?php foreach ($chitiet as $ct) : ?>
            <button class="dapanso" data-cau="<?= $soCauHienThi ?>"><?= $soCauHienThi ?></button>
            <?php $soCauHienThi++; ?>
        <?php endforeach ?>
    </div>
    </div>


  
     <script>   
   document.addEventListener('DOMContentLoaded', function() {
    var khungTraLoi = document.querySelectorAll('.khungtraloi');

    khungTraLoi.forEach(function(traloi) {
        traloi.addEventListener("click", function() {
            var parentElement = this.parentElement.parentElement;
            if (parentElement && parentElement.getAttribute('id')) {
                var selectedCau = parentElement.getAttribute('id').split('_')[1];
                var buttonCau = document.querySelector('.dapanso[data-cau="' + selectedCau + '"]');

                var isClicked = this.classList.contains("clicked");
                if (!isClicked) {
                    removeSelectedClass();
                    this.classList.add("clicked");
                    parentElement.classList.add('sang');
                    buttonCau.classList.add('sang');
                    highlightCau(selectedCau); // Highlight nút câu hỏi tương ứng
                } else {
                    this.classList.remove("clicked");
                    parentElement.classList.remove('sang');
                    buttonCau.classList.remove('sang');
                    unhighlightCau(selectedCau); // Unhighlight nút câu hỏi tương ứng
                }
            } else {
                console.error('Parent element or its ID attribute is null or undefined');
            }
        });
    });

    function highlightCau(selectedCau) {
        var buttonCau = document.querySelector('.dapanso[data-cau="' + selectedCau + '"]');
        if (buttonCau) {
            buttonCau.classList.add('highlight'); // Thêm lớp 'highlight' cho nút câu hỏi tương ứng
        }
    }

    function unhighlightCau(selectedCau) {
        var buttonCau = document.querySelector('.dapanso[data-cau="' + selectedCau + '"]');
        if (buttonCau) {
            buttonCau.classList.remove('highlight'); // Loại bỏ lớp 'highlight' cho nút câu hỏi tương ứng
        }
    }

    function removeSelectedClass() {
        var traloiElements = document.querySelectorAll('.khungtraloi');
        var dapAnSoButtons = document.querySelectorAll('.dapanso');

        traloiElements.forEach(function(tl) {
            tl.classList.remove("clicked");
        });

        dapAnSoButtons.forEach(function(btn) {
            btn.classList.remove('sang');
        });
    }
;

    function removeSelectedClass() {
        var traloiElements = document.querySelectorAll('.khungtraloi');
        var dapAnSoButtons = document.querySelectorAll('.dapanso');

        traloiElements.forEach(function(tl) {
            tl.classList.remove("clicked");
        });

        dapAnSoButtons.forEach(function(btn) {
            btn.classList.remove('sang');
        });
    }
});
            //js chọn 1 đáp án cho từng câu
               document.addEventListener('DOMContentLoaded', function() {
                    var khungCauHoi = document.querySelectorAll('.khungcauhoi'); // Chọn tất cả các khung câu hỏi

                    khungCauHoi.forEach(function(cHoi) {
                        var khungTraLoi = cHoi.querySelectorAll('.khungtraloi'); // Chọn tất cả các khung trả lời trong mỗi khung câu hỏi

                        khungTraLoi.forEach(function(traloi) {
                            traloi.addEventListener("click", function() {
                                // Loại bỏ lớp đã chọn từ tất cả các khung trả lời trong cùng một khung câu hỏi
                                var allTraLoi = cHoi.querySelectorAll('.khungtraloi');
                                allTraLoi.forEach(function(tl) {
                                    tl.classList.remove("clicked");
                                });

                                // Thêm lớp đã chọn cho khung trả lời được click
                                this.classList.toggle("clicked");
                            });
                        });
                    });
            });
            ///
                    var tralois = document.getElementsByClassName("khungtraloi");
                    for (var i = 0; i < tralois.length; i++) {
                        tralois[i].addEventListener("click", function() {
                            this.classList.toggle("clicked");
                        });
                    }
                    // Khởi tạo biến thời gian
                    var time = 40 * 60 * 1000; // 40 phút bằng 2400000 mili giây

                    // Hàm đếm thời gian
                    function countdown() {
                        // Giảm thời gian
                        time -= 1000;

                        // Cập nhật thời gian còn lại
                        var minutes = Math.floor(time / (60 * 1000));
                        var seconds = Math.floor(time / 1000) - minutes * 60;

                        // Hiển thị thời gian còn lại
                        document.querySelector("#countdown").textContent = minutes + ":" + seconds;

                        // Nếu thời gian hết, thì dừng đếm
                        if (time <= 0) {
                            clearInterval(timer);
                        }
                    }

                    // Khởi chạy đếm thời gian
                    var timer = setInterval(countdown, 1000);

                    // Lấy thẻ button thoát
                    var btnThoat = document.querySelector(".btn-thoat");

                    // Gán sự kiện click cho nút thoát
                    btnThoat.addEventListener("click", function() {
                        // Hiển thị thông báo xác nhận
                        var result = confirm("Bạn có muốn thoát không?");

                        // Nếu chọn "OK" (có) thì thoát, ngược lại quay lại trang
                        if (result) {
                            window.location.href = "toan.html"; // quay về trang 
                        } else {
                            window.location.reload(); // Tải lại trang
                        }
                    });

                    // Lấy thẻ button nộp
                    var btnNopbai = document.querySelector(".btn-nopbai");

                    // Gán sự kiện click cho nút nộp bài
                    btnNopbai.addEventListener("click", function() {
                        // Hiển thị thông báo xác nhận
                        var result = confirm("Bạn có muốn nộp bài không không?");

                        // Nếu chọn "OK" (có) thì thoát, ngược lại quay lại trang
                        if (result) {
                            window.location.href = "trangchu.html"; // sang trang đã nộp
                        } else {
                            window.location.reload(); // Tải lại trang
                        }
                    });

           
    </script> 
   
  
