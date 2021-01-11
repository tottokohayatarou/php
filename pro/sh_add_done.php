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

<?php

try
{

$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name=$_POST['gazou_name'];
$pro_com=$_POST['com'];
$pro_email=$_POST['email'];

$pro_name=htmlspecialchars($pro_name);
$pro_price=htmlspecialchars($pro_price);
$pro_com=htmlspecialchars($pro_com);
$pro_email=htmlspecialchars($pro_email);

$dsn='mysql:dbname=shop2;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO mst_product(name,price,gazou,com,email) VALUES (?,?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_gazou_name;
$data[]=$pro_com;
$data[]=$pro_email;
$stmt->execute($data);

$dbh=null;

print $pro_name;
print 'を追加しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="../sh/shop_list.php">戻る</a>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>