<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
</style>
</head>
<body>

<?php
if(isset($_POST['Yes'])){
  $bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
  $del = $bd->exec('DELETE FROM users WHERE `id` = "' . $_GET['id'] . '"');
  $bd = NULL;
  print '<meta http-equiv="refresh" content="0"; url="adminka_ukr.php">';
}
elseif(isset($_POST['No'])){
  print '<meta http-equiv="refresh" content="0"; url="adminka_ukr.php">';
}
?>

<ins><a href="index_ukr.php">Головна</a><br /><br /></ins>
<h2>Ви впевнені?</h2>
<form action= "delete_ukr.php?id=<?php print $_GET['id']?>" method="post">
<p><input type="submit" name="Yes" value="Так" /></p>
<p><input type="submit" name="No" value="Ні" /></p>
</form>
</body>
</html>