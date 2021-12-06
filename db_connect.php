<?php
function db_connect(){
	//データベース接続
    $dsn = 'mysql:dbname=imasDB;host=127.0.0.1';
    $user = 'user';
    $password = 'pass';
 
    $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示
	return $PDO;
}
?>