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

$staff_code=$_GET['staffcode'];

$dsn='mysql:dbname=shop2;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT name FROM mst_staff WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$staff_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$staff_name=$rec['name'];

$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

スタッフ修正<br />
<br />
スタッフコード<br />
<?php print $staff_code; ?>
<br />
<br />
<form method="post" action="staff_edit_check.php">
<input type="hidden"name="code" value="<?php print $staff_code; ?>">
スタッフ名<br />
<input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br />
パスワードを入力してください。<br />
<input type="password" name="pass" style="width:100px"><br />
パスワードをもう1度入力してください。<br />
<input type="password" name="pass2" style="width:100px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>