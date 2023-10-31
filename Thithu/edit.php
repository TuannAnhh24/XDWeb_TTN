<?php
    require 'connect.php';
    require 'function.php';
    $sql = "SELECT * FROM `course_categories`";
    $data = $connect -> query($sql);
    $listCategory = $data -> fetchAll(PDO::FETCH_ASSOC);
    $id = $_GET['id'];
    $sql = "SELECT * FROM `courses` WHERE `id` = '$id'";
    $data = $connect -> query($sql);
    $courseEdit = $data -> fetch();
    if(isset($_POST['btn_edit'])){
        $checkUpFile = false;
        $dir = "Image/";
        $up_name = basename($_FILES['image']['name']);
        $upFile = $dir.$up_name;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $upFile)){
            $checkUpFile = true;
        }
        $course_name = $_POST['course_name'];
        $price = $_POST['price'];
        if($checkUpFile == true){
            $image = $upFile;
        }else{
            $image = $courseEdit['image'];
        }
        $category_id = $_POST['category_id'];
        $sql = "UPDATE `courses` SET `course_name` = '$course_name', `price` ='$price', `image` = '$image', `category_id` = '$category_id' WHERE `courses`.`id` = '$id' ";
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
        <input type="text" name="course_name" value="<?php echo $courseEdit['course_name']  ?>"><br><br>
        <label for="">giá</label>
        <input type="text" name="price" value="<?php echo $courseEdit['price']  ?>"><br><br>
        <label for="">Ảnh</label>
        <input type="file" name="image" value="<?php echo $courseEdit['image']  ?>"><br><br>
        <select name="category_id" id="">
            <option value="">--Chọn--</option>
            <?php
                foreach($listCategory as $list){
            ?>
            <option value="<?php echo $list['category_id'] ?>" <?php if($courseEdit['category_id'] = $list['category_id']) echo "selected" ?>><?php echo $list['category_name'] ?></option>
            <?php
                }
            ?>
        </select>
        <input type="submit" name="btn_edit" value="Thêm">
    </form>
</body>
</html>