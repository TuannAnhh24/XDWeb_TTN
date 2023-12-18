<?php
function load_kq()
{
    $sql = "SELECT ketqua.*, nguoidung.* 
                FROM ketqua
                INNER JOIN nguoidung ON ketqua.id_nguoidung = nguoidung.id";
    return pdo_query($sql);
}
