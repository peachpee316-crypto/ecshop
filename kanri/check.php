<?php
//直接アクセス禁止
if(!$user=$_POST["user"] or !$pass=$_POST["pass"]){
     header("Location:login.php");
     exit();
}

//データベースにつなぐ
require('db.php');
//login.phpから受け取ったユーザー名とパスワードを変数に代入
//XXS対策
$user = htmlspecialchars($_POST['user'],ENT_QUOTES);
$pass = htmlspecialchars($_POST['pass'],ENT_QUOTES);

//ユーザー名をもとにデータベースから情報取得
// //SQL文
// 文字列と判断させるため''必要(本当は?を使う)
$sql = "SELECT * FROM user WHERE user='{$user}'";
//queryメソッドに渡す(問い合わせ結果。連想配列に変えてくれる)
$temp=$db->query($sql);
//fetchメソッドを使う(オブジェクトからデータを取り出す)
$kekka= $temp->fetch();
// var_dump($kekka);
//パスワードが同じか確認
// $kekka["password"]でデータベースのパスワード
// if($pass==$kekka["password"]){    ↓password_verifyで暗号化したものに変更
if(password_verify($pass,$kekka["password"])){
     // print("ログイン成功");
     //セッションに値を保存 キーはlogin　1という値は「ログイン済み」と設定している
     session_start();
     $_SESSION["login"] = 1;
     //　↑代入する値は何でもいいがキーがあることが大事
     // login　→user_statusなど別の名前でもいい、1→何書いてもいい。保存用の空箱を置いているイメージ
     header("Location:index.php");
     // exit();
}else{
     print("ログイン失敗");
}

//違った場合は「ログイン失敗」と表示
//同じならログイン成功したことをセッションに保存してindex.phpへ
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ログイン中</title>
</head>
<body>
     
</body>
</html>