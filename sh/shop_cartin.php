<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	print 'ようこそゲスト様　';
	print '<a href="member_login.html">会員ログイン</a><br />';
	print '<br />';
}
else
{
	print 'ようこそ';
	print $_SESSION['member_name'];
	print '様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>

<!DOCTYPE html>
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

<?php

try
{

$pro_code=$_GET['procode'];

if(isset($_SESSION['cart'])==true)
{
	$cart=$_SESSION['cart'];
	$kazu=$_SESSION['kazu'];
	if(in_array($pro_code,$cart)==true)
	{
		print 'その商品はすでにカートに入っています。<br />';
		print '<a href="shop_list.php">商品一覧に戻る</a>';
		exit();
	}
}
$cart[]=$pro_code;
$kazu[]=1;
$_SESSION['cart']=$cart;
$_SESSION['kazu']=$kazu;

}
catch(Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

カートに追加しました。<br />
<br />
<a href="shop_list.php">商品一覧に戻る</a>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>