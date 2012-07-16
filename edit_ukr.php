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
$con = mysql_connect("localhost","root","1");
mysql_select_db("test", $con);
$query = 'SELECT * FROM users WHERE `id` = ' .$_GET['id'];
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);
if(isset($_POST['submit'])){
  $query = 'UPDATE users SET login="' . $_POST['login'] . '", password="' . $_POST['password'] . '" WHERE `id` = ' .$_GET['id'];
  mysql_query($query) or die(mysql_error());
  print '<meta http-equiv="refresh" content="0; url=adminka_ukr.php">';
}
mysql_close($con);
?>

<ins><a href="index_ukr.php">Головна</a><br /><br /></ins>
<form action="edit_ukr.php" method="post">
<p><input type="text" name="login" value="<?php print $row['login']?>" /><br /></p>
<p><input type="text" name="password" value="<?php print $row['password']?>" /><br /></p>
<p><br /><input type="submit" name="submit" value="Зберегти" /></p>
</form>
</body>
</html>