<?php 
require_once "pdo.php";

function load_all_chuyende(){
    $sql = "SELECT * FROM chuyende ORDER BY id DESC";
    return pdo_query($sql);
}

function load_one_chuyende($id){
    $sql = "SELECT * FROM chuyende WHERE id = ?";
    return pdo_query_one($sql,$id);
}

function insert_chuyende($tenchuyende){
    $sql = "INSERT INTO chuyende(tenchuyende) VALUES(?)";
    pdo_execute($sql,$tenchuyende);
}

function update_chuyende($id,$tenchuyende){
     $sql = "UPDATE chuyende SET tenchuyende = ? WHERE id = ?";
     pdo_execute($sql,$tenchuyende,$id);
}
function delete_chuyende($id){
    $sql = "DELETE FROM chuyende WHERE id = ?";
    pdo_execute($sql,$id);
}
 function xoa_nhieu_cd($id){
    $macd = "";
    foreach ($id as $item){
        $macd .= $item . ", ";
    }
    //Loại bỏ dấu (, ) ở cuối bên phải
    $macd = rtrim($macd, ", ");
    //sql
    $sql = "DELETE FROM chuyende WHERE id IN ($macd)";
    pdo_execute($sql);

 }

 function load_all_chuyende_home(){
    $sql = "SELECT * FROM chuyende where 1";
    $list_chuyende = pdo_query($sql);
    return $list_chuyende;
 }
 function is_exist_chuyende($tenchuyende) {
    // Kết nối với cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "xdweb_ttn");

    // Khởi tạo câu truy vấn
    $sql = "SELECT * FROM chuyende WHERE tenchuyende = '{$tenchuyende}'";

    // Thực hiện truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả
    if (mysqli_num_rows($result) > 0) {
        // Tên chuyên đề đã tồn tại
        return true;
    } else {
        // Tên chuyên đề chưa tồn tại
        return false;
    }
}
function is_exist_chuyende_except($id, $tenchuyende) {
    $conn = mysqli_connect("localhost", "root", "", "xdweb_ttn");

    // Khởi tạo câu truy vấn
    $sql = "SELECT * FROM chuyende WHERE tenchuyende = '{$tenchuyende}'";

    // Thực hiện truy vấn
    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả
    if (mysqli_num_rows($result) > 0) {
        // Tên chuyên đề đã tồn tại
        return true;
    } else {
        // Tên chuyên đề chưa tồn tại
        return false;
    }
}