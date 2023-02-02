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
    
//$cate = $_POST["cate"];
$title = $_POST["title"];
$honbun = $_POST["honbun"];
$img = $_POST["img"];
 
// 下記は、$cate カテゴリーを含めている
// if(empty($title) === true or empty($honbun) === true or empty($cate) === true or empty($img) === true) {
  
//     print "必要項目を入力して下さい";
//     print "<br><br>";
//     print "<form>";
//     print "<input type='button' onclick='history.back()' value='戻る'>";
//     print "</form>";
//     exit();
// }

if(empty($title) === true or empty($honbun) === true or empty($img) === true) {
  
    print "必要項目を入力して下さい";
    print "<br><br>";
    print "<form>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
    print "</form>";
    exit();
}
    
    
print $title;
print "<img width='30%' class='bunimg' src='img/".$img."'>";
print $honbun;
 
?>
 
<br><br>
上記内容で登録しますか？<br><br>
<form action="blogdone.php" method="post">
<!-- <input type="hidden" name="cate" value="<?php print $cate;?>"> -->
<input type="hidden" name="title" value="<?php print $title;?>">
<input type="hidden" name="honbun" value="<?php print $honbun;?>">
<input type="hidden" name="img" value="<?php print $img;?>">
<input type="submit" value="OK">   
    
</form>
    
</body>
    
</html>