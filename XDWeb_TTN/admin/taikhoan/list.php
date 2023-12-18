<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH TÀI KHOẢN</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Tên đăng nhập </th>
                        <th>Mật Khẩu</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ Email</th>
                        <th>Ảnh</th>
                        <th>Vai trò</th>
                        <td></td>
                    </tr>
                    <?php 
                        foreach($listtaikhoan as $taikhoan){
                            extract($taikhoan);
                            $xoatk = 'index.php?act=xoatk&id='.$id;
                            if($quyen == 1){
                                $quyen = "Admin";
                            }else{
                                $quyen = "Thí sinh";
                            }
                    ?> 
                             <tr>
                                    <!-- <td><input type="checkbox" name="" id=""></td> -->
                                    <td> <?=$username?> </td>
                                    <td> <?=$password?> </td>
                                    <td> <?=$sodienthoai?> </td>
                                    <td> <?=$diachi?> </td>
                                    <td> <img src="<?=$hinhanh?>" alt=""> </td>
                                    <td> <?=$quyen?> </td>
                                    <td><a onclick="return confirm('Bạn có chắc muốn xóa tài khoản người dùng không?')" href="<?=$xoatk?>"><input type="button" value="Xóa"></td></a>
                                    </tr>
                        <?php } ?>
                    
                </table>
            </div>
            <!-- <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
            </div> -->
        </form>
    </div>
</div>
</div> 