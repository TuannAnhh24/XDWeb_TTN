<?php
    require 'connect.php';
    require 'function.php';
    $sql = "SELECT * FROM `course_categories`";
    $data = $connect -> query($sql);
    $listCategory = $data -> fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST['btn_add'])){
        $dir = "Image/";
        $up_name = basename($_FILES['image']['name']);
        $upFile = $dir.$up_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $upFile);
        $course_name = $_POST['course_name'];
        $price = $_POST['price'];
        $image = $upFile;
        $category_id = $_POST['category_id'];
        $sql = "INSERT INTO `courses` (`course_name`, `price`, `image`, `category_id`) VALUES ('$course_name', '$price', '$image', '$category_id')";
        $connect -> exec($sql);
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thêm danh sách</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên khóa học</label>
        <input type="text" name="course_name" id=""><br><br>
        <label for="">giá</label>
        <input type="text" name="price" id=""><br><br>
        <label for="">Ảnh</label>
        <input type="file" name="image" id=""><br><br>
        <select name="category_id" id="">
            <option value="">--Chọn--</option>
            <?php
                foreach($listCategory as $list){
            ?>
            <option value="<?php echo $list['category_id'] ?>"><?php echo $list['category_name'] ?></option>
            <?php
                }
            ?>
        </select>
        <input type="submit" name="btn_add" value="Thêm">
    </form>
</body>
</html>