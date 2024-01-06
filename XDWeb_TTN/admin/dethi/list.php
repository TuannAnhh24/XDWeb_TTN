<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH ĐỀ THI</h1>
    </div>
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>Lịch thi</th>
                        <th>Tên đề thi</th>
                        <th>Số câu</th>
            
                        <td></td>
                    </tr>
                    <?php 
                        
                        foreach($dethi_admin as $dt){
                            extract($dt);
                            $sua = "index.php?act=suadethi&id=$id";
                            $xoa = "index.php?act=xoadethi&id=$id";
                            foreach($listlichthi as $lt){
                                if ($lt['id'] == $id_lichthi) {
                                    $tenkythi =  $lt['tenkythi'];
                            }
                    }
                            // $xoatk = 'index.php?act=xoatk&id='.$id; 
                    ?> 
                             <tr>
                                    <!-- <td><input type="checkbox" name="" id=""></td> -->
                                    <td> <?=$tenkythi?> </td>
                                    <td> <?=$ten_dethi?> </td>
                                    <td> <?=$socau?> </td>
                                    <td><a href="<?=$sua?>"><input type="button" value="Sửa"></a> <a onclick="return confirm('Bạn có chắc muốn xóa đề thi này không?')" href="<?=$xoa?>"><input type="button" value="Xóa"></td></a>
                                    </tr>
                        <?php } ?>
                    
                </table>
            </div>
            <div class="row mb10 ">
                <!-- <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ"> -->
                <a href="?act=tao-dethi"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
            
        </form>
    </div>
</div>
</div> 