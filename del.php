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
  $del = $bd->exec('DELETE FROM content WHERE `id` = "' . $_GET['id'] . '"');
  $bd = NULL;
  print '<meta http-equiv="refresh" content="0; url=kontent.php">';
}
elseif(isset($_POST['No'])){
  print '<meta http-equiv="refresh" content="0; url=kontent.php">';
}
?>

<ins><a href="index.php">Home</a><br /><br /></ins>
<p>Are you sure?</p>
<form action="del.php?id=<?php print $_GET['id']?>" method="post">
<p><input type="submit" name="Yes" value="Yes" /><input type="submit" name="No" value="No" /></p>
</form>
</body>
</html>