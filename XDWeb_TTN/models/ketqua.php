<?php
function load_kq()
{
    $sql = "SELECT ketqua.*, nguoidung.*, dethi.* 
                FROM ketqua
                INNER JOIN nguoidung ON ketqua.id_nguoidung = nguoidung.id
                INNER JOIN dethi on ketqua.id_dethi = dethi.id";
    return pdo_query($sql);
}
function insert_ketqua($id_nguoidung, $id_dethi, $bodapan, $diem,$so_cau_hoi, $thoiGianLamBai)
{
    $sql = "INSERT INTO ketqua(id_nguoidung, id_dethi, bodapan, diem,so_cau_hoi, thoi_gian_lam_bai) VALUES(?, ?, ?, ?,?,?)";
    pdo_execute($sql, $id_nguoidung, $id_dethi, $bodapan, $diem,$so_cau_hoi, $thoiGianLamBai);
}
function load_kq_user($id_nguoidung)
{
    $sql = "SELECT ketqua.diem, nguoidung.username
                FROM ketqua
                INNER JOIN nguoidung ON ketqua.id_nguoidung = nguoidung.id
                WHERE ketqua.id_nguoidung=?
                ORDER BY ketqua.id DESC";
    return pdo_query($sql,$id_nguoidung);
}
