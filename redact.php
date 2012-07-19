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
$query = 'SELECT * FROM content WHERE `id` = ' .$_GET['id'];
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);
if(isset($_POST['submit'])){
  $query = 'UPDATE content SET title="' . $_POST['title'] . '", text="' . $_POST['text'] . '" WHERE `id` = ' .$_GET['id'];
  mysql_query($query) or die(mysql_error());
  print '<meta http-equiv="refresh" content="0; url=kontent.php">';
}
mysql_close($con);
?>

<ins><a href="index.php">Home</a><br /><br /></ins>
<form action="redact.php?id=<?php print $_GET['id']?>" method="post">
<p><input type="text" name="title" value="<?php print $row['title']?>" /><br /></p>
<p><textarea name="text" cols="150" rows="15" maxlehgth="1500" ><?php print $row['text']?></textarea></p>
<p><br /><input type="submit" name="submit" value="Save" />
</p>
</form>
</body>
</html>