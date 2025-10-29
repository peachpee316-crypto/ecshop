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
//関数を実行
lcheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>新規登録フォーム</title>
</head>
<body>
     <h1>新規登録フォーム</h1>
     <!-- 画像はenctype="multipart/form-data 忘れずに -->
     <form action="regist.php" method="post" enctype="multipart/form-data">
          <p>
               <label for="name">商品名：</label>
               <input type="text" name="name[]" id="" required>
          </p>
          <p>
               <label for="description">説明：</label>
               <input type="text" name="description[]" id="">
          </p>
          <p>
               <label for="keyword">キーワード：</label>
               <input type="text" name="keyword[]" id="">
          </p>
          <p>
               <label for="price">価格：</label>
               <input type="number" name="price[]" id="" required>
          </p>
          <p>
               <label for="img">画像登録：</label>
               <input type="file" name="img[]" id="" required>
          </p>
          <p>
               <label for="country">生産国：</label>
               <select name="country" id="">
                    <option value="1">日本</option>
                    <option value="2">フランス</option>
                    <option value="3">韓国</option>
               </select>
          </p>
          <input type="hidden" name="csrf_key[]" value="<?php print($my_code); ?>">
          <p><button type="submit">登録する</button></p>
     </form>
     <p><a href="index.php">管理画面TOPへ戻る</a></p>
</body>
</html>