<?php
//データベースにつなぐ
//ローカルホスト用
// try {
//      $db =new PDO("mysql:dbname=mydb;host=127.0.0.1;charset=utf8","root","");
// } catch (PDOException $e) {
//      echo "DB接続エラー：". $e->getMessage();
// }

//スターサーバー　　↑↓にコピーしてdbname、pwを修正
try {
     $db =new PDO("mysql:dbname=iwamegum_mydb;host=127.0.0.1;charset=utf8","iwamegum_admin","MEGUMIm3o1m6o");
} catch (PDOException $e) {
     echo "DB接続エラー：". $e->getMessage();
}


?> 


