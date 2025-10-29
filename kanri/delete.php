<?php
//セッション開始
session_start();
//共通プログラムを呼び出す
require("function.php");
//関数を実行
lcheck();


// 直接アクセス禁止したほうがいい
// GET送信で受け取った内容を変数に代入
$id=$_GET["id"];

//データベースにつなぐ
require("db.php");
//SQL文作文
$sql= "DELETE FROM daichi WHERE id=?";
$temp=$db->prepare($sql);
$s=$temp->execute([$id]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>削除画面</title>
</head>
<body>
     <?php
     if($s){
          print("<p>削除しました</p>");
     }else{
          print("</P>削除失敗</p>");
     }
     ?>
     <p><a href="index.php">管理画面TOPへ戻る</a></p>
</body>
</html>