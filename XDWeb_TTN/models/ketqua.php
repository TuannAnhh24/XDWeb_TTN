<?php
function load_kq()
{
    $sql = "SELECT ketqua.*, nguoidung.*, dethi.* 
                FROM ketqua
                INNER JOIN nguoidung ON ketqua.id_nguoidung = nguoidung.id
                INNER JOIN dethi on ketqua.id_dethi = dethi.id";
    return pdo_query($sql);
}
