<?php 
require_once "pdo.php";

function tao_mang_cauhoi($chuyende ,$limit){
                $sql = "SELECT cauhoi.id AS cau_hoi_id, cauhoi.noidung AS noidung_cau_hoi, 
                        dapan.id AS dap_an_id, dapan.noidung AS noidung_dap_an, dapan.caudung AS cau_dung 
                        FROM cauhoi AS a
                        INNER JOIN dapan AS b ON a.id = b.id_cauhoi
                        WHERE cauhoi.id_chuyende = $chuyende
                        ORDER BY RAND()   
                        LIMIT $limit";        

                // Thực thi truy vấn sử dụng kết nối PDO từ file pdo.php
                $rows = pdo_query($sql); // Lấy kết quả từ truy vấn SQL

                // Biến đổi dữ liệu từ kết quả truy vấn thành mảng 3 chiều
                $multi_dimensional_array = array();
            
                foreach ($rows as $row) {
                    $question_id = $row['cau_hoi_id'];
                    $answer_id = $row['dap_an_id'];
            
                    // Tạo mảng 3 chiều
                    $multi_dimensional_array[$question_id]['noidung_cau_hoi'] = $row['noidung_cau_hoi'];
                    $multi_dimensional_array[$question_id]['dap_an'][$answer_id]['noidung_dap_an'] = $row['noidung_dap_an'];
                    $multi_dimensional_array[$question_id]['dap_an'][$answer_id]['cau_dung'] = $row['cau_dung'];
                }
            
                // In ra mảng 3 chiều
                echo "<pre>";
                print_r($multi_dimensional_array);
                echo "</pre>";
            }
?>