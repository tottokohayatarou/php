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

if(isset($_SESSION['cart'])==true)
{
	$cart=$_SESSION['cart'];
	$kazu=$_SESSION['kazu'];
	$max=count($cart);
}
else
{
	$max=0;
}

if($max==0)
{
	print 'カートに商品が入っていません。<br />';
	print '<br />';
	print '<a href="shop_list.php">商品一覧へ戻る</a>';
	exit();
}

$dsn='mysql:dbname=shop2;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

foreach($cart as $key=>$val)
{
	$sql='SELECT code,name,price,gazou FROM mst_product WHERE code=?';
	$stmt=$dbh->prepare($sql);
	$data[0]=$val;
	$stmt->execute($data);

	$rec=$stmt->fetch(PDO::FETCH_ASSOC);

	$pro_name[]=$rec['name'];
	$pro_price[]=$rec['price'];
	if($rec['gazou']=='')
	{
		$pro_gazou[]='';
	}
	else
	{
		$pro_gazou[]='<img src="../pro/gazou/'.$rec['gazou'].'">';
	}
}
$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

カートの中身<br />
<br />
<table class="table table-striped">
<tr>
<td>商品</td>
<td>商品画像</td>
<!-- <td>価格</td> -->
 <td>数量</td>
<!-- <td>小計</td>  -->
<td>削除</td>
</tr>
<form method="post" action="kazu_change.php">
<?php for($i=0;$i<$max;$i++)
	{
?>
<tr>
	<td><?php print $pro_name[$i]; ?></td>
	<td><?php print $pro_gazou[$i]; ?></td>
	<!-- <td><?php print $pro_price[$i]; ?>円</td> -->
	<td><input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
	<!-- <td><?php print $pro_price[$i]*$kazu[$i]; ?>円</td> -->
	<td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
</tr>
<?php
	}
?>
</table>
<input type="hidden" name="max" value="<?php print $max; ?>">
<input type="submit" value="変更"><br />
<input type="button" onclick="history.back()" value="戻る">
</form>
<br />
<a href="shop_form.html">手続きへ進む</a><br />

<?php 
	if(isset($_SESSION["member_login"])==true){
		print'<a href="shop_kantan_check.php">会員限定注文フォーム</a><br />';
	}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>