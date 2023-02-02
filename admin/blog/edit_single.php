<?php
 
// session_start();
// // session_regenerate_id(true);
// // if(isset($_SESSION["login"]) === false) {
// //     print "ログインしていません。<br><br>";
// //     print "<a href='setting/set_login.php'>ログイン画面へ</a>";
// //     exit();
// // }
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

// include('../../functions.php');
// $pdo = connect_to_db();

$dbn = 'mysql:dbname=shop;charset=utf8mb4;port=3306;host=localhost';
$user = "root";
$password = "";
$dbh = new PDO($dbn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT name FROM k_menu WHERE1";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
 
while(true) {
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
if(empty($rec["name"]) === true) {
break;
}
$k_menu[] = $rec["name"];
}
$dbh = null;
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
<div id="edit">
<div id="box2">
<form action="upload.php" method="post" enctype="multipart/form-data"> 
イメージファイルアップロード<br>    
<input type="file" name="image_data[]" multiple="multiple">
<input type="submit" value="アップロード">
</form>
<br>
<form action="single_check.php" method="post" enctype="multipart/form-data">
<!-- カテゴリ<br>
    <select name='cate'>
    <?php foreach($k_menu as $key => $value) {;?>
    <option value='<?php print $value;?>'><?php print $value;?></option>
    <?php };?>
    </select>
    <br> -->
タイトル
<br>
<textarea name="title" id="title1"><h1></h1></textarea>
<br>
サムネイル<br>
<input type="text" id="gazou" name="img">
<input type="button" id="bt" value="ok">
<br><br>
 
<div class="tag">
<div id="h1">h1　</div>
<div id="p">p　</div>
<div id="br">br　</div>
<div id="h2">h2　</div>
<div id="img">img　</div>
<a href="img.php" target="blank">imgファイル名検索</a>
</div>
    
<textarea id="area" name="honbun"></textarea>
<br>
<input type="submit" value="ok">
<input type="button" onclick="history.back()" value="戻る">
</form>
</div>
<div id="write">
<h3>タイトル</h3><div id="title"></div>
<h3>サムネイル</h3><div id="sam"></div>
<h3>本文</h3><div id="box"></div>
 
</div>
</div>
   
<script src="main2.js"></script>   
</body>
 
 
</html>