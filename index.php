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
     <title>大地の詩トップページ</title>

     <!-- googleヒット回避 -->
     <meta name="robots" content="noindex">
     <meta name="robots" content="nofollow">

     <!-- OGP -->
     <meta property="og:title" content="大地の詩 ONLINESHOP">
     <meta property="og:type" content="website">
     <meta property="og:url" content="http://iwamegum.stars.ne.jp/daichi/index.php" >
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
     <!-- <script src="js/slick.min.js"></script> -->
     <script src="js/jquery.bgswitcher.js"></script>
     <link rel="stylesheet" href="js/slick.css">　　
     <link rel="stylesheet" href="js/slick-theme.css">

     <!-- favicon -->
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     <!-- touchicon -->
     <link rel="apple-touch-icon" sizes="180x180" href="river.png">

     <!-- Clarityヒートマップ -->
     <script type="text/javascript">
     (function(c,l,a,r,i,t,y){
     c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
     t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
     y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
     })(window, document, "clarity", "script", "u36tlcfezn");
     </script>

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
     
     <!-- スライドショー ------->
     <article class="top">
          <h1>Feel the Purity of Organic</h1>
     </article>

     <script>
          $(".top").bgswitcher({
               images: ["image/大地の詩TOP.jpg","image/コンセプトの写真.jpg","image/soup01.jpg","image/soup04.jpg"],
          });
     </script>
     <!------------------------>

     <footer>
          <small>
               &copy; Daichi no uta 2025 all rights reserved.
          </small>
     </footer>

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