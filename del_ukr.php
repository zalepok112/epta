<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"
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
  $query = 'DELETE FROM content WHERE `id` = "' . $_GET['id'] . '"';
  mysql_query($query) or die(mysql_error());
  mysql_close($con);
  print '<meta http-equiv="refresh" content="0; url=kontent_ukr.php">';
}
elseif(isset($_POST['No'])){
  print '<meta http-equiv="refresh" content="0; url=kontent_ukr.php">';
}
?>

<ins><a href="index_ukr.php">Головна</a><br /><br /></ins>
<p>Ви впевнені?</p>
<form action="del_ukr.php?id=<?php print $_GET['id']?>" method="post">
<p><input type="submit" name="Yes" value="Так" /></p>
<p><input type="submit" name="No" value="Ні" /></p>
</form>
</body>
</html>