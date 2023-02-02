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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>cms</title>
<link rel="stylesheet" href="style.css">
</head>
    
<body>
 
<?php
    
$dbn = 'mysql:dbname=shop;charset=utf8mb4;port=3306;host=localhost';
$user = "root";
$password = "";
$dbh = new PDO($dbn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT name FROM img WHERE1";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
    
while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if(empty($rec["name"]) === true) {
        break;
    }
    print "<img width='30%' src='img/".$rec['name']."'>";
    print $rec["name"];
    print "<br>";
}
    
?>
    
    
    
</body>
</html>