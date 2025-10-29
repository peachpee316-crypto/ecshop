<?php
//セッション開始
session_start();
//共通プログラムを呼び出す
require("function.php");
//関数を実行
lcheck();


//データーベースから商品情報を取得し編集・削除へのリンクをつける
// 編集→update.php?id=〇/削除→delete.php?id=〇とリンク先を作れればOK

// データベースにつなぐ
require("db.php");
// daichiテーブルから全データを取得するSQL文作る
$sql = "SELECT * FROM daichi";
// queryメソッドでSQL文実行
$temp=$db->query($sql);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>編集・削除</title>
</head>
<body>
     <h1>編集・削除</h1>
     <?php
     // whileとfetch使って情報を表示（ここからbodyタグ内で)
     while($kekka=$temp->fetch ()) {
          // var_dump($kekka);
          print("<p>");
          print($kekka["item_name"]);
          print(" | "); //ただの仕切り
          //ここでdescriptionとかkeywordとか出してもいい

          //?id　が　$_GET['id'] のようなもの 移動先アドレスバーに表示されているもの
          print("<a href=\"update.php?id={$kekka["id"]}\">【編集する】</a>");
          print(" | "); //ただの仕切り
          print("<a href=\"delete.php?id={$kekka["id"]}\">【削除する】</a>");
          print("<p>");
     }
     ?>
     <p><a href="index.php">管理画面TOPへ戻る</a></p>
</body>
</html>