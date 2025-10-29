<?php
     //セッション開始
     session_start();

     //ワンタイム SESSIONで保存したPWが同じか確認
     // var_dump($_SESSION["csrf_key"]);
     // print("<hr>");
     // var_dump($_POST["csrf_key"]);

     //$_SESSION["csrf_key"]または$_POST["csrf_key"]がない
     // または、一致しない場合は注意文を出す
     if (!isset($_SESSION["csrf_key"]) or !isset($_POST["csrf_key"])) {
          print("不正アクセスです");  //別のページに飛ばしたりしてもいい
          exit();

     } else if($_SESSION["csrf_key"] != $_POST["csrf_key"]) {
          print("不正アクセスです"); //別のページに飛ばしたりしてもいい
          exit();
     }

     //共通プログラムを呼び出す
     require("function.php");
     //関数を実行
     lcheck();

     //直アク禁止 する
     if (!isset($_POST["name"])) {
          //nameがなかったら
          //index.phpに移動
          header("Location:index.php");
          exit();
     }

     //データーベースにつなぐ
     require("db.php") ;

     //フォームで送られた内容を変数に入れよう 　XSS対策
     $name = htmlspecialchars($_POST["name"],ENT_QUOTES);
     $description = htmlspecialchars($_POST["description"],ENT_QUOTES);
     $keyword = htmlspecialchars($_POST["keyword"],ENT_QUOTES);
     $price = htmlspecialchars($_POST["price"],ENT_QUOTES);
     $country = htmlspecialchars($_POST["country"],ENT_QUOTES);
      
     //画像の準備
     $file = $_FILES["img"];
     //拡張子
     $ext=substr($file["name"],-4);
     $times=time(); //現在の時刻
     //保存する場所と名前を指定する
     $filename="image/{$times}$ext"; //ファイル名を作成

     //ファイル移動
     move_uploaded_file($file["tmp_name"], $filename);

     //登録保存用のファイル名を作る
     // $filenames=$times . $ext;

     //prepare execute使って穴あきSQL文作成
     $sql= "INSERT INTO daichi SET item_name=?,description=?,keyword= ?,price= ?,img_path=?,country= ?";
     // print($sql);  確認用SQL文
     //prepareとexecute使ってデータベースに情報登録
     $temp=$db->prepare($sql);
     $filenames="/{$times}{$ext}";
     $s=$temp->execute([$name,$description,$keyword,$price,$filenames,$country]) ;
     // var_dump($s) ; //ここがtrueなら成功してる
     //ここでデータベースに情報が登録されたか、
     // imageフォルダに画像が移動したか確認
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>登録</title>
</head>
<body>
     <?php
     if($s) {
          print("<p>登録完了しました</p>");
     } else {
          print("<p>登録に失敗しました</p>");
     }
     ?>
     <p><a href="index.php">管理画面TOPへ戻る</a></p>
</body>
</html>