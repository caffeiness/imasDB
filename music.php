<?php
require("db_connect.php");
$sql = "SELECT * FROM imasDB";
$PDO = db_connect();
// SQLステートメントを実行し、結果を変数に格納
$stmt = $PDO->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {
 
  // データベースのフィールド名で出力
  echo $row['music_name'].'：'.$row['name'];
 
  // 改行を入れる
  echo '<br>';
}
if(isset($_POST["del_name"])){
  $del_name = $_POST["del_name"];
  //ここ備忘録
  $del_sql = "DELETE FROM imasDB WHERE music_name = '". $del_name ."'";
  $stmt = $PDO->prepare($del_sql);
  $stmt -> execute();
} else {
  $del_name = "";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="このページの説明">
  <title>このページのタイトル</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
<div id="post_page">
  <form method="post" action="">
    <div>delete name <input type="text" name="del_name" size="30"></div>
    <div><input type="submit" name="submit" value="削除" class="button"></div>
  </form>
</div>
<a href="/imasPHP/index_DB.php" class="form__btn-back">確認</a>
</body>
</html>