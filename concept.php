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
     <title>大地の詩コンセプトページ</title>    

     <!-- OGP -->
     <meta property="og:title" content="大地の詩 ONLINESHOP">
     <meta property="og:type" content="article">
     <meta property="og:url" content="http://iwamegum.stars.ne.jp/daichi/concept.php" >
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
     
     <article class="concept">
          <h1><span>CONCEPT</span></h1>
          <section>
               <h2>健やかな肌へ、オーガニックの贈り物</h2>
               <div class="concept-in">
                    <img src="image/コンセプトの写真.jpg" alt="オーガニック石鹸の画像">
                    <p>オーガニックラベンダーオイルを贅沢に使用。<br>
                         自然の恵みが凝縮された石鹸です。<br>
                         合成香料・着色料不使用。<br>
                         肌へのやさしさにこだわり、一つひとつ丁寧に手作りしていま
                         す。<br>
                         敏感肌の方にもおすすめです。</p>
               </div>
          </section>
     </article>

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