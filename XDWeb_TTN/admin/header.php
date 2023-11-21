<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? '' ?></title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/cssadd.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="boxcenter">
        <!-- BIGIN HEADER -->
        <header>
            <div class="row mb header_admin">
                <h1>Admin</h1>
            </div>
            <div class="row mb menu">
                <ul>

                    <li><a href="?act=home">Trang chủ</a></li>
                    <li><a href="?act=chuyen-de">Chuyên đề</a></li>
                    <li><a href="?act=cau-hoi">Câu hỏi</a></li>
                    <li><a href="">Khách hàng</a></li>
                    <li><a href="?act=de-thi">Đề thi</a></li>
                    <li><a href="?act=lich-thi">Lịch thi</a></li>
                    <li><a href="">Thống kê</a></li>
                </ul>
            </div>
        </header>
        <!-- END HEADER -->