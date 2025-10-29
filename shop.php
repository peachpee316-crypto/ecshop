<?php
//商品一覧ページ(データベースの内容を表示する)(f_shop list参照)
//データベースにつなぐ(daichi 直下に顧客用アクセスのdb.phpを作成)
require("db.php");

//SQL文作成(データを取得なのでSELECT文・？はいらないシンプルな文)
//whileとfetch使って商品の名前などをpタグで表示していく。
$sql = "SELECT * FROM daichi";
//queryメソッドで実行(フォームの内容使っていないのでセキュ対策なしまんま取ってくる)
$kekka = $db->query($sql);

// while($line=$kekka->fetch()){
//      // var_dump($line);

//      print("<p>{$line["item_name"]}</p>");
//      print("<p>{$line["description"]}</p>");
//      print("<p>{$line["keyword"]}</p>");
//      print("<p>{$line["price"]}円</p>");

//      print("<p><img src=\"kanri/image/{$line["img_path"]}\"></p>");
     
//      print("<form method='post' action='cart.php'>");
//      print("<input type='hidden' name='id' value='{$line['id']}'>");

//      print("<button type='submit'>カートに入れる</button>");
//      print("</form>");
     
//      print("<hr>");
// }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
     <!-- Google Tag Manager -->
     <!-- Google tag (gtag.js) -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-LLLW8J78EH"></script>
     <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
     gtag('config', 'G-LLLW8J78EH');
     </script>
     <!-- End Google Tag Manager -->

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>大地の詩オンラインショップページ</title>

     <!-- googleヒット回避 -->
     <meta name="robots" content="noindex">
     <meta name="robots" content="nofollow">

     <!-- OGP -->
     <meta property="og:title" content="大地の詩 ONLINESHOP">
     <meta property="og:type" content="article">
     <meta property="og:url" content="http://iwamegum.stars.ne.jp/daichi/shop.php" >
     <meta property="og:image" content="http://iwamegum.stars.ne.jp/daichi/image/コンセプトの写真.jpg" >
     <meta property="og:site_name" content="大地の詩 ONLINESHOP" > 
     <meta property="og:description" content="オーガニックにこだわり自然の恵みが凝縮された手作り石鹸のONLINESHOPです。敏感肌の方におすすめ！" >  

     <!-- CSS -->
     <link rel="stylesheet" href="CSS/ress.css">
     <link rel="stylesheet" href="CSS/mystyle.css">

     <!-- font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <!--js -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="js/jquery.bgswitcher.js"></script>
     
     <!-- favicon -->
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     
     <!-- touchicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="river.png">

</head>
<body>
     <header>
          <div class="header_1">
               <a href="index.php">
                    <p class="header_2">大地の詩</p>
                    <p>daichinouta</p>
               </a>
          </div>
          <div class="hum">  
               <i class="fa-solid fa-bars"></i>
               <i class="fa-solid fa-xmark"></i>
          </div>   
          <nav>
               <ul>
                    <li><a href="index.php"><i class="fa-solid fa-house"></i>HOME</a></li>
                    <li><a href="concept.php"><i class="fa-solid fa-seedling"></i>CONCEPT</a></li>
                    <li><a href="shop.php"><i class="fa-notdog fa-solid fa-cart-shopping"></i>ONLINESHOP</a></li>
                    
               </ul>
          </nav>
     </header>
     
     <article class="shop">
          <h1><span>ONELINESHOP</span></h1>
          <section>
               <h2>健やかな肌へ、オーガニックの贈り物</h2>
               <p class="catch">大切な方への贈り物に。<br>
                    ラベンダーの香りは、心を安らげ、リラックス効果も。
                    可愛らしいパッケージも魅力です。<br>
                    日頃の感謝の気持ちを込めて、贈ってみてはいかがでしょうか。
               </p>
          
               <div class="shop-in">
                    
                         <?php
                         while($line=$kekka->fetch()){
                         // var_dump($line);
                         ?> 
                         <!-- 　　一旦phpブロック閉じHTMLを直接記述 -->

                         <!-- ★各商品アイテムを囲むdiv追加 -->
                         <div class="item_card">
                              <h3><?php print($line["item_name"]) ?></h3>
                              <div class="product">
                                   <!-- <div class="product_in"> -->
                                   <p><?php print($line["price"]) ?>円</p>
                                   <p><?php print($line["description"]) ?></p>
                                   <!-- </div> -->
                                   <p><?php print($line["keyword"]) ?></p>
                              </div>
                              <!-- <img src="image/soup01.jpg" alt="大地の詩"> -->
                              <img src="kanri/image/<?php print($line['img_path']); ?>" alt="">                            

                              <form action="cart.php" method="post">
                                   <label for="count_<?php print($line['id']); ?>">個数：</label>
                                   <select name="count" id="count_<?php print($line['id']); ?>">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                   </select>
                                   <!-- 'id' を hidden フィールドで送る -->
                                   <input type="hidden" name="id" value="<?php print($line['id']); ?>">
                                   <button class="btn" type="submit">カートに入れる</button>
                              </form>
                              <br>
                              <hr>
                         </div>
                         <?php
                         // ここで再度PHPのブロックを開き、whileループの閉じ括弧（}）の準備
                         } // whileループの閉じ括弧
                         ?>
                    
               </div>
          </section>
          
     </article>

     <footer>
          <small>
               &copy; Daichi no uta 2025 all rights reserved.
          </small>
     </footer>

     <div class="btn go-cart">
          <a href="delete.php">カートを空にする</a>
          <a href="index.php">トップページへ戻る</a>
          <a href="cart_view.php">カートを見る</a>
     </div>
     <script>
          $(".hum").click(function () {
               $("nav").toggleClass("show");
               $(".hum").toggleClass("close");

               //　×マークとハンバーガーアイコンの表示切替え
               if($(".hum").hasClass("close")){
                    $(".hum i:first-child").hide(); // ハンバーガーメニューを消す
                    $(".hum i:last-child").show();  // ×マークを表示する
               }else{
                    $(".hum i:first-child").show();  // ハンバーガーメニューを表示する
                    $(".hum i:last-child").hide();   // ×マークを消す
               }
          });
     </script>
</body>
</html>