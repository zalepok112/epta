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
session_start();
if(isset($_POST['Yes'])){
  $bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
  $del = $bd->exec('DELETE FROM users WHERE `login` = "' . $_SESSION['login'] . '"');
  $bd = NULL;
  print '<meta http-equiv="refresh" content="0; url=user.php">';
  session_unset();
}
elseif(isset($_POST['No'])){
  print '<meta http-equiv="refresh" content="0; url=<a href="user.php?id=' . $_SESSION['login'] . '">' . $_SESSION['login'] . '</a>"';
}
?>

<ins><a href="index.php">Home</a><br /><br /></ins>
<p>Are you sure?</p>
<form action="delete_user.php?id=<?php print $_SESSION['login']?>" method="post">
<p><input type="submit" name="Yes" value="Yes" /><input type="submit" name="No" value="No" /></p>
</form>
</body>
</html>