<?php
//セッション開始
session_start();

//----乱数を使って目印を作成(ワンタイム)------
$one_code=random_bytes(16);  //このままだと文字化けするので
$my_code=bin2hex($one_code);  //文字化け対応
// var_dump($my_code);  //取り合えず表示
// var_dump($one_code); //文字化けしている

//セッションとform内にコードを埋め込む(formはbody)
//セッションに目印を保存
$_SESSION["csrf_key"]=$my_code;
//-------------------------------------------

//共通プログラムを呼び出す
require("function.php");
//関数を実行(ログインしているか確認)
lcheck();

//直接アクセス禁止する
if (!isset($_GET["id"])) {
     //idがなかったら
     //index.phpに移動
     header("Location:index.php");
     exit();
}

// id＝5はGET送信　$_GET["id"]で受け取れる
$id=$_GET["id"];
// var_dump($id);

//データベースにつなぐ
require("db.php");

//SELECT文で該当レコードを取ってくる
$sql= "SELECT * FROM daichi WHERE id=?" ;
//prepare executeで穴あきSQL文
$temp=$db->prepare($sql);
$temp->execute([$id]);
//取り合えずfetch()を使って情報を表示
$kekka=$temp->fetch();
// var_dump($kekka);
// ↑ ※別途参照　SELECTボタンにcountry名を表示するため確認
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>アップデート画面</title>
</head>
<body>
     <!-- 商品名、金額などを変更するフォーム -->
     <form action="regist2.php" method="post" enctype="multipart/form-data">
          <!-- 最初からinput枠内にユーザーが選んだTESTが表示されるvalueを利用 -->
          <!-- <p>商品名：<input type="text" name="name" id="" value="TEST"></p> --> 
          <input type="hidden" name="id" value="<?php print($id); ?>">
          <p>商品名：
               <input type="text" name="name" id="" value="<?php print($kekka["item_name"]);?>">
          </p>
          <p>説明：
               <input type="text" name="description" id="" value="<?php print($kekka["description"]);?>">
          </p>
          <p>キーワード：
               <input type="text" name="keyword" id="" value="<?php print($kekka["keyword"]);?>">
          </p>
          <p>価格：
               <input type="text" name="price" id="" value="<?php print($kekka["price"]);?>">
          </p>
          <p>新規画像登録：
               <p><img src="image/<?php print($kekka["img_path"]); ?>" alt=""></p>
               <input type="file" name="img" id="" value="<?php print($kekka["img_path"]);?>">
          </p>
          <p>生産国：
               <select name="country" id="">
                    <option value="1"<?php if($kekka["country"]==1){print("selected");} ?>>日本</option>
                    <option value="2"<?php if($kekka["country"]==2){print("selected");} ?>>フランス</option>
                    <option value="3"<?php if($kekka["country"]==3){print("selected");} ?>>韓国</option>

                    <!-- ここにPHPを入れていく　selectedはhtml上でデフォルト表示される
                    <option value="1">日本</option>
                    <option value="2">フランス</option>
                    <option value="3">韓国</option> -->
               </select>
          </p>
          <input type="hidden" name="csrf_key" value="<?php print($my_code); ?>">
          <p><button type="submit">更新する</button></p>   
     </form>
     <p><a href="index.php">管理画面TOPへ戻る</a></p>
</body>
</html>