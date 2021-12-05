<?php
$dsn = 'mysql:dbname=imasDB;host=127.0.0.1';
$user = 'user';
$password = 'pass';
$sql = "SELECT * FROM imasDB";
$PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
// SQLステートメントを実行し、結果を変数に格納
$stmt = $PDO->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {
 
  // データベースのフィールド名で出力
  echo $row['music_name'].'：'.$row['name'];
 
  // 改行を入れる
  echo '<br>';
}
?>