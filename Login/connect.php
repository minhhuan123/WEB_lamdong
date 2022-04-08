<?php
$connect = mysqli_connect ('localhost', 'root', '', 'data1') or die ('Không thể kết nối tới database');
//mysqli_set_charset($conn, 'UTF8');

if($connect === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
}
else {
echo 'Kết nối DB thành công!';
}


// /* データベース定義 */
// define('DB_HOST','localhost');
// define('DB_NAME','lesson2');
// define('DB_CHAR','utf8mb4');
// define('DSN','mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR.'');
// define('DB_USER','root');
// define('DB_PASS','');
// /* PHPのエラーを表示するように設定 */
// error_reporting(E_ALL & ~E_NOTICE);
// /* */
// define('PWD_LENGTH',5);   // パスワード長
// define('PAGING',5);      // ページネーション単位




?>