<?php
//header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'data1') or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['signup'])){
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['pass']);
$password = trim($_POST['repeat-pass']);

if (empty($name)) {
    array_push($errors, "Name is required"); 
    }
if (empty($email)) {
        array_push($errors, "Email is required"); 
        }
if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($password)) {
    array_push($errors, "Two password do not match"); 
    }



// Kiểm tra username hoặc email có bị trùng hay không
$sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("同じユーザーがあったか、入力されてない!"); window.location.href="signup.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql = "INSERT INTO member (name, email, username, password) VALUES ('$name','$email','$username','$password')";
echo '<script language="javascript">alert("登録出来ました!"); window.location.href="signup.php";</script>';

if (mysqli_query($conn, $sql)){
echo "Tên : ".$_POST['name']."<br/>";
echo "Email đăng nhập: ".$_POST['email']."<br/>";
echo "Tên đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['password']."<br/>";

}
else {
echo '<script language="javascript">alert("エラー発生します。"); window.location.href="signup.php";</script>';
}
}
}
?>