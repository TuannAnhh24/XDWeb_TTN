<?php
function loadsl_ch()
{
    $sql = "SELECT chuyende.id, chuyende.tenchuyende, COUNT(cauhoi.id) as so_luong_cauhoi
                FROM chuyende
                LEFT JOIN cauhoi ON chuyende.id = cauhoi.id_chuyende
                GROUP BY chuyende.id, chuyende.tenchuyende";
    return pdo_query($sql);
}
function loadsl_user(){
    $sql = "SELECT quyen, COUNT(*) as user_count
    FROM nguoidung
    GROUP BY quyen";
    return pdo_query($sql);
}
function load_top10() {
    $sql = "SELECT ketqua.*, nguoidung.*, dethi.*
            FROM ketqua
            INNER JOIN nguoidung ON ketqua.id_nguoidung = nguoidung.id
            INNER JOIN dethi ON ketqua.id_dethi = dethi.id
            ORDER BY diem DESC LIMIT 10";
    return pdo_query($sql);
}

