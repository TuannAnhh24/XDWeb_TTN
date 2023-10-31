<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username === 'ph42482' && $password === 'ph42482'){
            $_SESSION['username'] = $username;
            header('Location:list.php');
            exit;
        }else{
            $error_message = "Sai tên đăng nhập hoặc mật khẩu";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php
        if(isset($error_message)){
    ?>
    <p><?php echo $error_message ?></p>
    <?php
        }
    ?>
    <form action="" method="POST">
        <label for="">Tên đăng nhập</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="">Mật khẩu</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>