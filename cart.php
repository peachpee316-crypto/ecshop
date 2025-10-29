<?php
//shop.php 「カートに入れる」php文から
//POST送信で送られたidを変数に代入しておく
// var_dump($_POST);

//XSS対策 数値でなければデフォルト1にする
$id=htmlspecialchars($_POST["id"],ENT_QUOTES,"UTF-8");
$count=htmlspecialchars($_POST["count"],ENT_QUOTES,"UTF-8");
if(!is_numeric($count)){
    $count=1;
}

// データベースにつなぐ
require("db.php");
//id番号をもとに情報を取得するSQL文作成(SELECT文)
$sql= "SELECT item_name,price FROM daichi WHERE id=?";
//prepare execute　fetchで取得情報を配列下
$temp=$db->prepare($sql);
$temp->execute([$id]);
$kekka= $temp->fetch();  //該当行が1つなのでwhileしなくてもいい
//var_dumpしつつ
// 商品名$item 金額を$priceに代入して表示
// var_dump($kekka);
$item=$kekka["item_name"];
$price=$kekka["price"];
$syoukei=$price*$count;
//-----今カート追加したものを表示-----

//----カートに蓄積されたもの-----
session_start();
//ここからセッションを使ってカートに入れる 
// $_SESSION 配列の中に「cart」というキー（名前）で保存
if (isset($_SESSION["cart"])==false) {
     //かごがない場合 かご持たせて、カートにid,個数を追加する
     $_SESSION["cart"] = [];
     $_SESSION["cart"][] = [$id,$count];
} else {
     //ある場合
     $_SESSION["cart"][] = [$id,$count];
}
// var_dump($_SESSION["cart"]);


//商品合計金額の計算
$total_price = 0;
// $_SESSION["cart"]の商品情報をループしてid価格を取得、
foreach($_SESSION["cart"] as $val) {
    $item_id= $val["0"]; //商品id
    $item_count= $val[1]; //商品の個数

    // 商品の価格をデータベースから取得
    $sql= "SELECT price FROM daichi WHERE id=?";
    //prepare execute　fetchで取得情報を配列下
    $temp=$db->prepare($sql);
    $temp->execute([$item_id]);
    $kekka= $temp->fetch();  //該当行が1つなのでwhileしなくてもいい
    //var_dumpしつつ
    // 商品名$item 金額を$priceに代入して表示
    // var_dump($kekka);
    $price=$kekka["price"];
    //小計を計算
    $subtotal=$price * $item_count;
    //合計金額に加算していく
    $total_price += $subtotal;
}
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
    <meta property="og:url" content="http://iwamegum.stars.ne.jp/daichi/cart.php" >
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
     
    <article class="cart">
        <h1><span>ONELINESHOP_CART</span></h1>
        <section>
            <h2 class="center">カートに商品を追加しました。</h2>
            <img src="image/cart.png" alt="カートのアイコン" class="cart-img">

            <div class="cart-list">
                <!-- <h2>カートの中身一覧</h2> -->
                <p>商品名：<?php print($item); ?></p>
                <p>個数：<?php print($count); ?>個</p>
                <p>価格：<?php print($syoukei); ?>円</p>
            </div>
            <!-- <hr> -->

            <div class="total">
                <p>合計金額: <?php print($total_price); ?>円</p>
            </div>

            <!-- <p><a href="shop.php">ショップに戻る</a></p>
            <p><a href="cart_view.php">カートの中身一覧</a></p> -->

            <!-- <button><a href="shop.php">買い物を続ける</a></button>
            <button><a href="cart_view.php">カートを見る</a></button> -->

            <!-- <form action="" method="post">
                <p><a href="shop.php"><button type="submit">買い物を続ける</button></a></p>
                <p><a href=""><button type="submit">購入手続きへ進む</button></a></p>
            </form> -->
        </section>
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