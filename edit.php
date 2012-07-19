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
$bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
$sel = $bd->query('SELECT * FROM users WHERE `id` = "' . $_GET['id'] . '"');
$row = $sel->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['submit'])){
  $update = $bd->exec('UPDATE users SET role="' . $_POST['role'] . '" WHERE `id` = "' . $_GET['id'] . '"');
  $bd = NULL;
  print '<meta http-equiv="refresh" content="0; url=adminka.php">';
}
?>


<ins><a href="index.php">Home</a><br /><br /></ins>
<p>
<label>Time of registration:<br /></label>
<?php print $row['time']?><br /><br />
</p>
<p>
<label>Last time was online:<br /></label>
<?php print $row['time2']?><br /><br />
</p>
<form action="edit.php?id=<?php print $_GET['id']?>" method="post">
<p>
<label>User's role:<br /></label>
<input type="text" name="role" value="<?php print $row['role']?>" /><br />
<p><br /><input type="submit" name="submit" value="Save" /></p>
</form>
</body>
</html>