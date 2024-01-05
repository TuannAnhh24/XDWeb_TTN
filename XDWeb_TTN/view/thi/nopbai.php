<div class="main-NB">
    <div class="nopbai">
        <div class="phantieude">
            <span class="tieuchien">Bài làm của bạn đã được gửi đi</span>
            <span class="diem">Điểm của bạn:</span>
            <span class="sodiem"><?= $kq_user[0]['diem'] ?>/10</span>
        </div>
        <div class="phannoidung">
            <span class="tende">Đề số 1</span>

            <div class="thongtinde">
                <i class="fa fa-user"></i>
                <span class="thisinh">Thí Sinh</span>
                <span class="tennguoi"><?= $kq_user[0]['username'] ?></span>
            </div>

            <div class="thongtinde">
                <i class="fa fa-clock"></i>
                <span class="thoigianlam">Thời gian làm bài</span>
                <span class="thoigiandalam">40phút</span>
            </div>

            <div class="thongtinde">
                <i class="fa fa-check-circle"></i>
                <span class="caudung">Số câu trắc nghiệm đúng</span>
                <span class="dung"><?= $soCauDung ?></span>
            </div>

            <div class="thongtinde">
                <i class="fa fa-times-circle"></i>
                <span class="causai">Số câu trắc nghiệm sai</span>
                <span class="sai"><?= $tongSoCau - $soCauDung ?></span>
            </div>

            <div class="thongtinde">
                <i class="fa fa-exclamation-circle"></i>
                <span class="socau">Tổng số câu hỏi trong đề</span>
                <span class="cau"><?=$tongSoCau?></span>
            </div>

            <div class="xemdapan">
                <button class="btn-xemda">Xem đáp án <i class="fa fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>