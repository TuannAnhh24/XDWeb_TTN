<?php 
require_once "pdo.php";

function tao_mang_cauhoi($chuyende ,$limit,$id_lichthi,$ten_dethi){
                $sql = "SELECT a.id AS cau_hoi_id, a.noidung AS noidung_cau_hoi, 
                            b.id AS dap_an_id, b.noidung AS noidung_dap_an, b.caudung AS cau_dung 
                        FROM cauhoi AS a
                        INNER JOIN dapan AS b ON a.id = b.id_cauhoi
                        WHERE a.id_chuyende = $chuyende
                        ORDER BY RAND()
                        LIMIT $limit";        

                // Thực thi truy vấn sử dụng kết nối PDO từ file pdo.php
                $rows = pdo_query($sql); // Lấy kết quả từ truy vấn SQL

                // Biến đổi dữ liệu từ kết quả truy vấn thành mảng 3 chiều
                $bode = array();
            
                foreach ($rows as $row) {
                    $question_id = $row['cau_hoi_id'];
                    $answer_id = $row['dap_an_id'];
            
                    // Tạo mảng 3 chiều
                    $bode[$question_id]['noidung_cau_hoi'] = $row['noidung_cau_hoi'];
                    $bode[$question_id]['dap_an'][$answer_id]['noidung_dap_an'] = $row['noidung_dap_an'];
                    $bode[$question_id]['dap_an'][$answer_id]['cau_dung'] = $row['cau_dung'];
                }
            
                $bode = json_encode($bode);

                // In ra mảng 3 chiều
                echo "<pre>";
                echo($bode);
                echo "</pre>";
                $sql = "INSERT INTO `dethi` ( `socau`, `bodethi`, `id_lichthi`,`ten_dethi`) VALUES ( '$limit', '$bode', '$id_lichthi', '$ten_dethi')";
                pdo_execute($sql);
            }

    function load_all_dethi_home($id_lichthi){
        $sql = "SELECT * FROM `dethi` where id_lichthi = $id_lichthi ";
        $list_dethi = pdo_query($sql);
        return $list_dethi;
    }
    




    // load đề thi ra trang chủ dựa theo chuyên đề
    function load_dethi_home($id){
        $sql = "SELECT * FROM `dethi` Where id = $id Desc";
        $list_dethi_home = pdo_query($sql);
        return $list_dethi_home;
    }
    function load_all_chuyende_dethi($id){
        $sql = "SELECT * FROM chuyende where id = $id";
        $list_chuyende = pdo_query($sql);
        return $list_chuyende;
     }

 ?>
