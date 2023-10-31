<?php
    session_start();
    require 'connect.php';
    require 'function.php';
    $sql = "SELECT * FROM `courses` as p INNER JOIN `course_categories` as c ON p.category_id = c.category_id";
    $data = $connect -> query($sql);
    $listCourse = $data -> fetchAll(PDO::FETCH_ASSOC);
    //showArray($listCourse);
    if(!isset($_SESSION['username'])){
        header('location:login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <style>
        table tr th{
            border-bottom: 5px solid red;
            padding: 20px 50px;
        }
        table tr td{
            border-bottom: 1px solid green;
            padding: 20px 50px;
        }
        img{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <h1>Xin chào, <?php echo $_SESSION['username'] ?></h1>
    <a href="logout.php">Đăng xuất</a>
    <h1>Danh sách</h1>
    <a href="add.php">Thêm</a>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên khóa học</th>
            <th>Giá</th>
            <th>Tên thể loại</th>
            <th>Ảnh</th>
            <th>Chức năng</th>
        </tr>
        <?php
            $stt = 0;
            foreach($listCourse as $course){
                $stt++;
        ?>
        <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $course['course_name'] ?></td>
            <td><?php echo $course['price'] ?></td>
            <td><?php echo $course['category_name'] ?></td>
            <td><img src="<?php echo $course['image'] ?>" alt=""></td>
            <td><a href="edit.php?id=<?php echo $course['id'] ?>">Sửa</a> | 
            <a onclick="return confirm('Bạn có muốn xóa không')" href="delete.php?id=<?php echo $course['id'] ?>">Xóa</a></td>
        </tr>
        <?php
            }
        ?>
        
    </table>
</body>
</html>