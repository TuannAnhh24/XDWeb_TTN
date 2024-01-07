<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem lại</title>
</head>
<body class="xemlai">
    <div class="khung-ngan">
        <span class="khungchua">Tất Cả</span>
    </div>
    <table class="khung-chua-table">
        <tr class="td-xl">
            <th>Tên Đề Thi</th>
            <th>Điểm Thi</th>
            <th>Thời Gian Hoàn Thành</th>
            <th>Lịch Thi</th>
        </tr>
        <?php foreach($ct_baithi as $bt) : ?>
        <tr class="td-xl-show">
            <td><?= $bt['ten_dethi']?></td>
            <td><?= $bt['diem']?></td>
            <td><?=$bt['thoi_gian_lam_bai']?> giây</td>
            <td><?=$bt['tenkythi']?></td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
