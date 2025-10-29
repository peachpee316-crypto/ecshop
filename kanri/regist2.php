<?php
     //セッション開始
     session_start();

     //ワンタイム SESSIONで保存したPWが同じか確認
     // var_dump($_SESSION["csrf_key"]);
     // print("hr");
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

     //update.phpのid情報(hidden)、item_name、price の全ての情報が届いているのを確認
     // var_dump($_POST);
     // print("<hr>");
     // var_dump($_FILES);
     // ↑できればvar_dumpで送られる内容を確認しよう

     //POST送信の内容を変数に入れる(updateから)
     $id = $_POST["id"];
     $name = $_POST["name"];
     $description =$_POST["description"];
     $keyword = $_POST["keyword"];
     $price = $_POST["price"];
     $country = $_POST["country"];
     

     //画像の準備
     $file = $_FILES["img"];

     //ここから画像が有るときと,無いときで分岐
     //画像があるときだけ画像を移動する
     if($file["name"] != ""){
          $ext=substr($file["name"],-4);    //拡張子
          $times=time(); //現在の時刻
          //保存する場所と名前を指定する
          $filename="image/{$times}$ext"; //ファイル名を作成
          //FILESで得た情報をもとに画像をimageフォルダに移動
          move_uploaded_file($file["tmp_name"],$filename);
     }
     
     //データーベースにつなぐ
     require("db.php");

     //ここから再度分岐 ファイルが選択されたとき(ファイルあり)
     if($file["name"] != ""){
          //更新用穴あきSQL文作成(P152)(プレースホルダー付き)
          $sql = "UPDATE daichi SET item_name=?,description=?,keyword= ?,price= ?,img_path=?,country= ? WHERE id=? " ;
          //prepareとexecute使う
          $temp = $db->prepare($sql);
          $filenames="{$times}{$ext}";
          $s = $temp->execute([$name,$description,$keyword,$price,$filenames,$country,$id]);
     }else{
          //画像がないときのSQL文作成 (img_path=? なし)
          $sql = "UPDATE daichi SET item_name=?,description=?,keyword=?,price=?,country=? WHERE id=?";
          // prepareとexecute使って情報を更新（$filenames　なし）
          $temp = $db ->prepare($sql);
          $s = $temp -> execute([$name,$description,$keyword,$price,$country,$id]) ;
     }
     //データが変わっているか確認
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>更新完了</title>
</head>
<body>
     <?php
     if($s){
          print("<p>更新完了しました</p>");
     } else {
          print("<p>更新に失敗しました</p>");
     }
     ?>

     <p><a href="index.php">管理画面TOPへ戻る</a>
</body>
</html>