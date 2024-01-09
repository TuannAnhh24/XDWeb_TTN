<?php 
require_once "pdo.php";

        function load_cau_hoi($id){
            $sql = "SELECT *FROM `dethi` WHERE id=$id";
            $row = pdo_query_one($sql);
            $bocauhoi = $row['bodethi'];
            $bocauhoi = json_decode($bocauhoi,true);
            return (array) $bocauhoi;
        }

        function tao_mang_cauhoi($chuyende ,$limit,$id_lichthi,$ten_dethi){
            $sql = "SELECT a.id AS cau_hoi_id, a.noidung AS noidung_cau_hoi, 
                        b.id AS dap_an_id, b.noidung AS noidung_dap_an, b.caudung AS cau_dung , b.id_cauhoi AS ma_cauhoi
                    FROM cauhoi AS a
                    INNER JOIN dapan AS b ON a.id = b.id_cauhoi
                    WHERE a.id_chuyende = $chuyende
                    ORDER BY a.id, b.id";  // Sắp xếp theo ID câu hỏi và ID đáp án

            // Thực thi truy vấn sử dụng kết nối PDO từ file pdo.php
            $rows = pdo_query($sql); // Lấy kết quả từ truy vấn SQL

            // Biến đổi dữ liệu từ kết quả truy vấn thành mảng 3 chiều
            $bode = array();

            foreach ($rows as $row) {
                $question_id = $row['cau_hoi_id'];
                $answer_id = $row['dap_an_id'];
                $id_cauhoi = $row['ma_cauhoi'];

                // Tạo mảng 3 chiều, nếu chưa tồn tại
                if (!isset($bode[$question_id]['noidung_cau_hoi'])) {
                    $bode[$question_id]['noidung_cau_hoi'] = $row['noidung_cau_hoi'];
                    $bode[$question_id]['dap_an'] = array(); // Tạo mảng để lưu trữ các đáp án
                }

                // Thêm các câu trả lời vào mảng của câu hỏi tương ứng
                $bode[$question_id]['dap_an'][$answer_id]['noidung_dap_an'] = $row['noidung_dap_an'];
                $bode[$question_id]['dap_an'][$answer_id]['cau_dung'] = $row['cau_dung'];
            }

            // Chuyển mảng thành chuỗi JSON
            $bode_json = json_encode($bode);

            // In ra mảng 3 chiều
            echo "<pre>";
            echo($bode_json);
            echo "</pre>";

            // Thêm dữ liệu vào bảng đề thi
            $sql_insert = "INSERT INTO `dethi` (`socau`, `bodethi`, `id_lichthi`,`ten_dethi`) 
                        VALUES ( '$limit', '$bode_json', '$id_lichthi', '$ten_dethi')";
            pdo_execute($sql_insert);
        }
        function load_chitiet_dethi($id_dethi){
            $sql = "SELECT socau, bodethi, id_lichthi, ten_dethi FROM dethi WHERE id = $id_dethi";
            $result = pdo_query_one($sql); // Giả sử hàm pdo_query_one trả về một dòng dữ liệu từ truy vấn SQL

            if ($result) {
                $bode_json = $result['bodethi']; // Lấy dữ liệu JSON của bộ đề

                $bode = json_decode($bode_json, true); // Chuyển đổi JSON thành mảng PHP

                $details = [
                    'socau' => $result['socau'],
                    'bodethi' => $bode,
                    'id_lichthi' => $result['id_lichthi'],
                    'ten_dethi' => $result['ten_dethi']
                ];

                return $details; // Trả về mảng chi tiết của đề thi
            } else {
                return null; // Trả về null nếu không tìm thấy dữ liệu cho id_dethi
            }
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
     function load_dethi_admin(){
        $sql = "SELECT * FROM dethi ";
        return pdo_query($sql);
     }

     function delete_dethi($id) {
        $sql = 'DELETE FROM `dethi` WHERE `id` = '.$id;
        pdo_execute($sql);
    }

    function load_one_dethi($id){
        $sql = "SELECT * FROM `dethi` WHERE id=".$id;
        $dethi = pdo_query_one($sql);
        return $dethi;
    }

    function join_dethi_lichthi($id){
        $sql = "SELECT lichthi.tenkythi FROM `dethi` INNER JOIN `lichthi` on dethi.id_lichthi = lichthi.id WHERE dethi.id = ".$id;
        $result = pdo_query($sql);
        if (!empty($result)) {
            return $result[0];
        }
        return null;
    }

    function update_dethi($tendethi, $socau, $id) {
        $sql = "UPDATE `dethi` SET `ten_dethi` = ?, `socau` = ? WHERE `id` = ?";
        pdo_query($sql, $tendethi, $socau, $id);
    }

    function update_lichthi_formdethi($tenkythi, $id) {
        $sql = "UPDATE `lichthi` SET `tenkythi` = ? WHERE `id` IN (SELECT `id_lichthi` FROM `dethi` WHERE `id` = ?)";
        pdo_query($sql, $tenkythi, $id);
    }

     
 ?>
