<?php
if(isset($_POST["search_name"])){
  $music_name = $_POST['search_name'];
  require("db_connect.php");
  //$name =  $_GET["idol"];
  var_dump($music_name);
  //var_dump($_GET["idol"]);
  $sql = "SELECT * FROM imasDB WHERE music_name LIKE '%". $music_name ."%'";
  $PDO = db_connect();
  // SQLステートメントを実行し、結果を変数に格納
  $stmt = $PDO->query($sql);
  echo '<br>';
  // foreach文で配列の中身を一行ずつ出力
  foreach ($stmt as $row) {
    // データベースのフィールド名で出力
    echo $row['music_name'].'：'.$row['name'];
    // 改行を入れる
    echo '<br>';
  }
} else {
  $search_name = "";
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
    <div>search music-name <input type="text" name="search_name" size="30"></div>
    <div><input type="submit" name="submit" value="検索" class="button"></div>
  </form>
<a href="/imasPHP/imas.php" class="form__btn-back">戻る</a>
</div>
</body>
</html>