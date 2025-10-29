<?php
//セッション開始
session_start();
//共通プログラムを呼び出す
require("function.php");
//関数を実行
lcheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>管理画面</title>
</head>
<body>
     <h1>管理画面</h1>
     <p><a href="input.php">新規登録</a></p>
     <p><a href="edit.php">編集・削除</a></p>
     <p><hr></p>
     <p><a href="../index.php">大地の詩TOPページへ</a></p>
     <p><a href="../shop.php">ONLINESHOPへ</a></p>
</body>
</html>