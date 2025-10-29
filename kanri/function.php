<?php
//共通プログラムを設定(functionの後に好きな名前)
function lcheck() {
     //ログインしているか確認
     //もし$_SESSON["login"]がなかったら
     //login.phpに移動
     if (!isset($_SESSION["login"])) {
          header("Location:login.php");
          exit();
     }
}
?>
