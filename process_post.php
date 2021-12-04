<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="このページの説明文">
  <title>このページのタイトル</title>
  <link rel="stylesheet" href="/main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

<?php
  try {
    //DB名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=imasDB;host=127.0.0.1';
    $user = 'user';
    $password = 'pass';

    $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    //input_post.phpの値を取得
    $music_name = $_POST['music_name'];
    $attribute = $_POST['attribute'];
    $name = $_POST['name'];


    $sql = "INSERT INTO imasDB (music_name, attribute, name) VALUES (:music_name, :attribute, :name)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
    $stmt = $PDO->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params = array(':music_name' => $music_name, ':attribute' => $attribute, ':name' => $name); // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

    echo "<p>name: ".$music_name."</p>";
    echo "<p>category: ".$attribute."</p>";
    echo "<p>description: ".$name."</p>";
    echo '<p>で登録しました。</p>'; // 登録完了のメッセージ
  } catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
  }

?>
<a href="/imasPHP/index_DB.php" class="form__btn-back">戻る</a>
</body>
</html>