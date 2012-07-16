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
  $con = mysql_connect("localhost","root","1");
  mysql_select_db("test", $con);
  $query = 'DELETE FROM users WHERE `id` = ' . $_GET['id'];
  mysql_query($query) or die(mysql_error());
  mysql_close($con);
  print '<meta http-equiv="refresh" content="0; url=adminka.php">';
}
elseif(isset($_POST['No'])){
  print '<meta http-equiv="refresh" content="0; url=adminka.php">';
}
?>

<ins><a href="index.php">Home</a><br /><br /></ins>
<h2>Are you sure?</h2>
<form action= "delete.php" method="post">
<p><input type="submit" name="Yes" value="Yes" /></p>
<p><input type="submit" name="No" value="No" /></p>
</form>
</body>
</html>