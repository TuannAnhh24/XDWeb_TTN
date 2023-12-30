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
                <span class="cau"><?= $tongSoCau ?></span>
            </div>

            <div class="xemdapan">
                <button class="btn-xemda">Xem đáp án <i class="fa fa-chevron-right"></i></button>
            </div>
        </div>
    </div>

    <div class="luyentapthem">

        <span class="tieukhien">Luyện tập thêm</span>


        <div class="khungthemde">
            <div class="dethem">
                <img src="https://kenh14cdn.com/thumb_w/620/2020/5/7/anh-chup-man-hinh-2020-05-07-luc-21725-ch-15888358985481136770590-crop-1588835923512355295665.png" alt="" height="20">
                <span class="tendethem">Đề số 1</span>
                <span class="soluongluyentap">Số luyện tập : 124234</span>
                <span class="soluongcauhoi">Số cauhoi : 124</span>
            </div>
        </div>

        <div class="khungthemde">
            <div class="dethem">
                <img src="https://kenh14cdn.com/thumb_w/620/2020/5/7/anh-chup-man-hinh-2020-05-07-luc-21725-ch-15888358985481136770590-crop-1588835923512355295665.png" alt="" height="20">
                <span class="tendethem">Đề số 1</span>
                <span class="soluongluyentap">Số luyện tập : 124234</span>
                <span class="soluongcauhoi">Số cauhoi : 124</span>
            </div>
        </div>

        <div class="bietthemde">
            <span class="xemtiepdeconkhong">Xem thêm </span>
            <i class="fa fa-chevron-down"></i>
        </div>

    </div>
</div>