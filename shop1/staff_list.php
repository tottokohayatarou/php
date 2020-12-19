<?php 
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
    print'ログインされていません。<br />';
    print'<a href="../stalog/staff_login.html">ログイン画面へ</a>';
    exit();
}else{
    print $_SESSION['staff_name'];
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

$dsn='mysql:dbname=shop2;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name FROM mst_staff WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print 'スタッフ一覧<br/><br/>';

print '<form method="post" action="staff_branch.php">';
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
	print $rec['name'];
	print '<br />';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

<br />
<a href="../stalog/staff_top.php">トップメニューへ</a><br />

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>