<?php 
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
    print'ログインされていません。<br />';
    print'<a href="../sh/member_login.html">ログイン画面へ</a>';
    exit();
}else{
    print $_SESSION['member_name'];
    print 'さんログイン中<br />';
    print '<br />';
}
?>
<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>レンタルショップ</title>
  </head>
  <body>
商品追加<br />
<br />
<form method="post" action="sh_add_check.php" enctype="multipart/form-data">
商品名を入力してください。<br />
<input type="text" name="name" style="width:200px"><br />
適当なコードを入力してください。（数字）<br />
<input type="text" name="price" style="width:50px"><br />
画像を選んでください。<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
商品の詳細を入力してください。<br>
<textarea name="com" rows="5" placeholder="詳細を入力して下さい"></textarea><br>
<br>
メールアドレスを入力して下さい<br>
<input type="text" name="email" style="width=200px"><br>
<br>
<a href="https://www.bannerkoubou.com/">画像加工</a><br>
<br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>