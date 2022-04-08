<?php
    session_start();
    if(isset($_POST['dangnhap'])==true){
        $username =$_POST['username'];
        $password =$_POST['password'];

        $conn = new PDO("mysql:host=localhost;dbname=data1;charset=utf8","root","");
        $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM member WHERE username =? AND password =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username,$password]);
        if($stmt->rowCount()==1){
            $user = $stmt->fetch();
            $_SESSION['login_id'] =$user['id'];
            $_SESSION['login_user']=$user['username'];
            echo "Đăng Nhập Thành Công";
            header("location:index.php");
            
            exit();
        }else{
            echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
             header("location:login.php");
         
            exit();
        }
    }

    
    ?>
    