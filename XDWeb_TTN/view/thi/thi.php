<form action="index.php?act=nopbai" method="POST">
    <div class="dau">
        <button class="btn-thoat"><i class="fas fa-power-off"></i> Thoát</button>
        <span class="tenthisinh"></span>
        
        <span id="countdown" class="countdown" data-is-counting="true"></span>
        <button type="submit" class="btn-nopbai" name="nopbai"><i class="fas fa-paper-plane"></i> Nộp Bài</button>
    </div>

    <div class="than">
    
        <?php $soCau = 1; ?>
        <?php foreach ($chitiet as $index => $ct) : ?>
            <div class="khungcauhoi">
                <h2 class="cauhoi">Câu <?= $soCau ?></h2>
                <span class="hoi">
                    <?php
                        // Kiểm tra và hiển thị nội dung câu hỏi nếu tồn tại
                        if (isset($ct['noidung_cau_hoi'])) {
                            echo $ct['noidung_cau_hoi'];
                        } else {
                            echo 'Nội dung câu hỏi không tồn tại';
                        }
                    ?>
                </span>
               
                <input type="hidden" name="id_dethi" value="<?php echo  (int)$id_dethi?>"> 
                <input type="hidden" name="noidung_cau_hoi_<?=$soCau?>" value="<?php echo $ct['noidung_cau_hoi']?>">
                    <div class="dapan-container">
                    <?php $dapan_key = 'A'; ?>
                        <?php foreach ($ct['dap_an'] as $noidung) : ?>
                            <span class="dapan"><?php echo $dapan_key . '. ' . $noidung['noidung_dap_an'] ?></span>
                            <input type="hidden" name="noidung_dap_an_<?=$soCau?>" value="<?php echo $noidung['noidung_dap_an']?>">
                            <?php $dapan_key++; ?>
                        <?php endforeach ?>
                    </div>
            </div>

            <div class="dapancuaban">
                    <span class="traloi0">Đáp án của bạn</span>
                    <?php $dapan_key = 'A'; ?>
                    <?php foreach ($ct['dap_an'] as $noidung) : ?>
                        <div class="khungtraloi">
                            <?php
                             // Lưu index của câu hỏi
                            $hidden_value = ($noidung['cau_dung'] == 1) ? '1' : '0';
                            ?>
                            <input type="hidden" name="dap_an_cau_<?php echo $soCau  ?>" value="<?php echo $hidden_value; ?>">
                            <span class="traloi" data-cau-hoi="<?= $soCau ?>" data-dap-an="<?php echo $hidden_value; ?>"><?php echo $dapan_key; ?></span>
                        </div>
                        <?php $dapan_key++; ?>
                    <?php endforeach ?>
                </div>
            <?php $soCau++; ?>
        <?php endforeach ?> 
    </div>
</form>

<!-- ô hiển số câu hỏi -->
<div class="khungodapan">
    <span class="dscauhoi">Danh sách câu hỏi</span>
    <?php $soCauHienThi = 1; ?>
    <?php foreach ($chitiet as $ct) : ?>
        <button class="dapanso" data-cau="<?= $soCauHienThi ?>"><?= $soCauHienThi ?></button>
        <?php $soCauHienThi++; ?>
    <?php endforeach ?>
</div>



<script>
  document.querySelectorAll('.traloi').forEach(span => {
    span.addEventListener('click', function() {
        const cauHoiIndex = this.getAttribute('data-cau-hoi');
        const dapAnValue = this.getAttribute('data-dap-an');

        // Kiểm tra xem câu trả lời đã được chọn chưa
        const isActive = this.classList.contains('active');
        const otherAnswers = document.querySelectorAll(`.traloi[data-cau-hoi="${cauHoiIndex}"]`);

        // Nếu câu trả lời đã được chọn, hủy chọn nó, ngược lại thì chọn nó và hủy chọn các câu trả lời khác của cùng một câu hỏi
        if (isActive) {
            this.classList.remove('active');
        } else {
            otherAnswers.forEach(answer => answer.classList.remove('active'));
            this.classList.add('active');
        }

        // Lưu giá trị đáp án vào localStorage nếu câu trả lời được chọn
        if (isActive) {
            localStorage.removeItem(`cau_${cauHoiIndex}`);
        } else {
            localStorage.setItem(`cau_${cauHoiIndex}`, dapAnValue);
        }
        
        // Sau khi xử lý chọn câu trả lời, cập nhật trạng thái của nút "ô số câu hỏi"
        updateQuestionButtons();
    });
});

// Function để cập nhật trạng thái của nút "ô số câu hỏi" dựa trên trạng thái của các câu trả lời
function updateQuestionButtons() {
    document.querySelectorAll('.dapanso').forEach(button => {
        const cauHoiIndex = button.getAttribute('data-cau');
        const isActive = document.querySelector(`.traloi[data-cau-hoi="${cauHoiIndex}"].active`);

        if (isActive) {
            button.classList.add('active');
        } else {
            button.classList.remove('active');
        }
    });
}

// Phần sau đây để tái tạo trạng thái đã chọn khi trang web được tải lại
window.onload = function () {
    const countdownDisplay = document.getElementById("countdown");
    const duration = 40 * 60; // 40 phút
    startCountdown(duration, countdownDisplay);

    // Tái tạo trạng thái đã chọn
    document.querySelectorAll('.traloi').forEach(span => {
        const cauHoiIndex = span.getAttribute('data-cau-hoi');
        const dapAnValue = localStorage.getItem(`cau_${cauHoiIndex}`);
        
        if (dapAnValue !== null) {
            span.classList.add('active');
        }
    });

    // Cập nhật trạng thái của nút "ô số câu hỏi" khi trang web được tải lại
    updateQuestionButtons();
};

document.querySelector('.btn-nopbai').addEventListener('click', function() {
    const selectedAnswers = {};
    document.querySelectorAll('.traloi.active').forEach(span => {
        const cauHoiIndex = span.getAttribute('data-cau-hoi');
        const dapAnValue = span.getAttribute('data-dap-an');
        selectedAnswers[cauHoiIndex] = dapAnValue;
    });

    // Xóa các input hidden cũ trước khi thêm input hidden mới
    document.querySelectorAll('input[type="hidden"]').forEach(input => {
        input.remove();
    });

    // Thêm các đáp án đã chọn vào form
    for (const [key, value] of Object.entries(selectedAnswers)) {
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', `dap_an_cau_${key}`);
        hiddenInput.setAttribute('value', value);
        document.querySelector('form').appendChild(hiddenInput);
        // Console log để kiểm tra giá trị của input hidden được thêm vào form
         console.log(`Added hidden input: dap_an_cau_${key} = ${value}`);
    }
    // Thêm trường input hidden 'id_dethi'
    const hiddenIdDethiInput = document.createElement('input');
    hiddenIdDethiInput.setAttribute('type', 'hidden');
    hiddenIdDethiInput.setAttribute('name', 'id_dethi');
    hiddenIdDethiInput.setAttribute('value', '<?php echo (int)$id_dethi ?>');
    document.querySelector('form').appendChild(hiddenIdDethiInput);
});


function startCountdown(duration, display) {
    let timer;
    if (localStorage.getItem('countdownTimer')) {
        timer = localStorage.getItem('countdownTimer');
    } else {
        timer = duration;
    }

    const countdownTimer = setInterval(function () {
        const minutes = parseInt(timer / 60, 10);
        const seconds = parseInt(timer % 60, 10);

        const displayMinutes = minutes < 10 ? "0" + minutes : minutes;
        const displaySeconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = displayMinutes + ":" + displaySeconds;

        if (--timer < 0) {
            clearInterval(countdownTimer);
            document.querySelector('form').submit();
            localStorage.removeItem('countdownTimer'); // Xóa thời gian còn lại khi hết thời gian
        } else {
            localStorage.setItem('countdownTimer', timer); // Lưu thời gian còn lại vào localStorage
        }
    }, 1000);
}

window.onload = function () {
    const countdownDisplay = document.getElementById("countdown");
    const duration = 40 * 60; // 40 phút
    startCountdown(duration, countdownDisplay);
};
</script>


