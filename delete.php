<?php
session_start();
// var_dump($_SESSION["cart"]);

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
    <meta property="og:url" content="http://iwamegum.stars.ne.jp/daichi/delete.php" >
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

     <article class="delete">
        <?php
        if(isset($_GET["id"])) {
            // 個別削除
            $id = $_GET["id"];
            unset($_SESSION["cart"][$id]);

            print("<h2>カートから商品を削除しました。</h2>");
            print("<h1>引き続きお買い物をお楽しみください。<br>
            自動で切り替わります。</h1>");

            // 3秒後にcart_view.phpへ自動的に移動 
            // header("Refresh:3; url= cart_view.php");  //挙動がおかしくなる
            print("<meta http-equiv='refresh' content='3; URL=cart_view.php'>");

        }else{
            // 全削除
            unset($_SESSION["cart"]);
            print("<h2>買い物かごに商品が入っていません。</h2>");
            print("<h1>ぜひお買い物をお楽しみください。<br>
            ご利用をお待ちしております。<br><br>
            ONLINESHOP
            <i class='fa-notdog fa-solid fa-cart-shopping'></i>
            に切り替わります。</h1>");

            // 3秒後にcart_view.phpへ自動的に移動 
            // header("Refresh:3; url= cart_view.php");  //挙動がおかしくなる
            print("<meta http-equiv='refresh' content='3; URL=cart_view.php'>");
        }
        ?>
     
     </article>

     <footer>
        <small>
            &copy; Daichi no uta 2025 all rights reserved.
        </small>
     </footer>

     <!-- <div class="btn go-cart go-shop">
          <a href="shop.php">大地の詩ONLINESHOPへ</a>
     </div> -->

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