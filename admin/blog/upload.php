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
<link rel="stylesheet" href="style2.css">
</head>
    
<body>
    
<?php
 
$img = $_FILES["image_data"];
    $max = count($img["name"]);
    
//print $max;
    
//for($i=0; $i < $max; $i)
    
 
foreach($img["tmp_name"] as $key => $value) {
    //move_uploaded_file($value["tmp_name"],"./img/".$value["name"]);
    $tmp_name[] = $value;
}
    
foreach($img["name"] as $key => $value) {
    //move_uploaded_file($value["tmp_name"],"./img/".$value["name"]);
    $name[] = $value;
}
    
for($i=0; $i < $max; $i++) {
 move_uploaded_file($tmp_name[$i],"./img/".$name[$i]);
}
    
$dbn = 'mysql:dbname=shop;charset=utf8mb4;port=3306;host=localhost';
$user = "root";
$password = "";
$dbh = new PDO($dbn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
for($i = 0; $i < $max; $i++) {
$sql = "INSERT INTO img(name) VAlUES(?)";
$stmt = $dbh -> prepare($sql);
$data[] = $name[$i];
$stmt -> execute($data);
$data = array();
}
 
print "<br><br>完了しました。";
//print "<br><br>";
 
//print "<form>";
//print "<input type='button' onclick='history.back()' value='戻る'>";
 
?>
 
    <form>
<input type='button' onclick='history.back()' value='戻る'>
    </form>
    </body>
</html>