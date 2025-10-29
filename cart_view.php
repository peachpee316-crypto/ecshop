<?php
//セッション開始してvar_dumpでカートの中身を見てみる
session_start();
// var_dump($_SESSION["cart"]);
// print("<hr>");

//商品情報配列をDBから作る
// DB接続
require("db.php");
//daichiからid,商品名、金額を取ってくるSQL文作成
$sql="SELECT id,item_name,price FROM daichi";
//queryメソッドで情報取得
$kekka=$db->query($sql);
//while文とfetch()使って取ってきた内容をvar_dump
$product=[];  //DBから取得した商品情報を一つの配列に格納している(id重複は最後の行の値だけ残る)
while($line=$kekka->fetch(PDO::FETCH_ASSOC)) {
     // var_dump($line);
     $product[$line["id"]]=[$line["item_name"], $line["price"]];
}

// var_dump($product[0]);

// $total_price=0;  //合計金額の初期化
// //カート内の商品IDをループして価格を取得
// if(isset($_SESSION["cart"])) { //カートが存在する場合のみ処理
//     foreach($_SESSION["cart"] as $val) {
//         if(isset($product[$val[0]])) { //商品IDが$productに存在する場合のみ
//             $total_price += $product[$val[0]][1]; //価格を加算 　var_dump($product);　配列2番目が価格
//         }
//     }
// }
// var_dump($total_price);  //合計金額表示
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
    <title>大地の詩オンラインショップ カート</title>
 
    <!-- googleヒット回避 -->
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">

    <!-- OGP -->
    <meta property="og:title" content="大地の詩 ONLINESHOP">
    <meta property="og:type" content="article">
    <meta property="og:url" content="http://iwamegum.stars.ne.jp/daichi/cart_view.php" >
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

    <article class="cart_view">
        <h1><span>CART</span></h1>
        <?php
        if(isset($_SESSION["cart"])==false or count($_SESSION["cart"])==0) {
            print("<h4 class='center'>カートに商品が入っていません。</h4>");
            print("<div class='btn go-cart'><p><a href='shop.php'>買い物を続ける</a></p></div>");
            exit(); //これ以降のコードを実行しない
        }
        print("<div class='item_group'>");
            $total_price =0;
            foreach($_SESSION["cart"] as $key => $val) {
                // print($val);　//これでカートのid取得できる
                //商品名を表示
                print("<p>{$product[$val[0]][0]}</p>");
                //金額を表示
                $shoukei = $product[$val[0]][1] * $val[1];
                $total_price += $shoukei;
                print("<h4>{$shoukei}円</h4>");
                
                //★作業中　１アイテム消す
                print("<p><a href=\"delete.php?id={$key}\">削除</a></p>");
                print("<hr>");
                
            }          
            print("<h5>合計：{$total_price}円</h5>");
        print("</div>");
        ?>
    </article>

    <footer>
        <small>
            &copy; Daichi no uta 2025 all rights reserved.
        </small>
    </footer>
    <div class="btn go-cart">
        <a href="delete.php">カートを空にする</a>
        <a href="shop.php">買い物を続ける</a>
        <a href="cart_view.php">カートを見る</a>
    </div>
    <div class=" pay">
        <p><a href="#">購入手続き</p>
        <p>合計：<?php print($total_price)?> 円</a></p>
        <p>送料：無料</p>
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