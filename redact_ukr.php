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
$sel = $bd->query('SELECT * FROM content WHERE `id` = "' . $_GET['id'] . '"');
$row = $sel->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['submit'])){
  $update = $bd->exec('UPDATE content SET title="' . $_POST['title'] . '", text="' . $_POST['text'] . '",
                    title_ukr="' . $_POST['title_ukr'] . '", text_ukr="' . $_POST['text_ukr'] . '" WHERE `id` = ' .$_GET['id']);
  $bd = NULL;
  print '<meta http-equiv="refresh" content="0; url=kontent_ukr.php">';
}
?>

<ins><a href="index_ukr.php">Home</a><br /><br /></ins>
<form action="redact_ukr.php?id=<?php print $_GET['id']?>" method="post">
<p><input type="text" name="title" value="<?php print $row['title']?>" /><br /></p>
<p><textarea name="text" cols="50" rows="6" maxlehgth="255" ><?php print $row['text']?></textarea></p>
<p><input type="text" name="title_ukr" value="<?php print $row['title_ukr']?>" /><br /></p>
<p><textarea name="text_ukr" cols="50" rows="6" maxlehgth="255" ><?php print $row['text_ukr']?></textarea></p>
<p><br /><input type="submit" name="submit" value="Зберегти" />
</p>
</form>
</body>
</html>