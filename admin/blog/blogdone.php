<?php
 
// session_start();
// session_regenerate_id(true);
// if(isset($_SESSION["login"]) === false) {
//     print "ログインしていません。<br><br>";
//     print "<a href='set_login.php'>ログイン画面へ</a>";
//     exit();
// }
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>cms</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>
    
<?php
    try {
        
// $cate = $_POST["cate"];
$title = $_POST["title"];
$honbun = $_POST["honbun"];
$img = $_POST["img"];
    
$dbn = 'mysql:dbname=shop;charset=utf8mb4;port=3306;host=localhost';
$user = "root";
$password = "";
$dbh = new PDO($dbn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "INSERT INTO blog(title, honbun, img, time) VALUES(?,?,?,NOW())";
$stmt = $dbh -> prepare($sql);
// $data[] = $cate;
$data[] = $title;
$data[] = $honbun;
$data[] = $img;
$stmt -> execute($data);
 
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
 
登録しました。
<br><br>
<a href="edit_single.php">記事投稿ページへ戻る</a>
<a href="set_top.php">トップメニューへ</a>
    
</body>
</html>