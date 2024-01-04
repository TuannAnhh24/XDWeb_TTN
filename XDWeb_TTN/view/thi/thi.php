<form method="POST" action="index.php?act=nopbai">
    <div class="dau">
        <button class="btn-thoat"><i class="fas fa-power-off"></i> Thoát</button>
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
                    <input type="radio" id="dap_an_cau_<?php echo $index ?>" name="dap_an_cau_<?php echo $index ?>" value="<?php echo $noidung['cau_dung']; ?>" class="bucminh" >
                    <label for="dap_an_cau_<?php echo $index ?>" class="bucminhvcl" ><?php echo $noidung['noidung_dap_an'] ?></label>
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
       } );

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
</script>
<style>
        .bucminh {
            display: none; /* Ẩn input để có thể tùy chỉnh giao diện của label */
        }

        .bucminhvcl {
            display: inline-block;
            cursor: pointer; /* Sử dụng cursor pointer khi di chuột qua label */
            padding: 5px 10px; /* Điều chỉnh padding để tăng diện tích bắt sự kiện click */
        }

        /* Ẩn nút radio thực tế, nhưng vẫn giữ được sự chọn lựa */
        .bucminh:checked + .bucminhvcl {
            background-color: #e0e0e0; /* Màu nền khi input được chọn */
        }
</style>
