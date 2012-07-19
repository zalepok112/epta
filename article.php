<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
P.olo {float: right;}
</style>
</head>
<body>

<?php
session_start();
$bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
$sel = $bd->query('SELECT * FROM content WHERE `id`="' . $_GET['id'] . '"');
$row = $sel->fetch(PDO::FETCH_ASSOC);
?>
<p class="olo">
<ins><a href="article_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="article.php"><img src="images/gb.png" alt="" /></a></ins>
</p>

<ins><a href="index.php">Home</a></ins>  
    <h1>Artciles</h1>
    <form action="article.php?id=<?php print $row['id']?>" method="post">
    <p>
    <label><h2>Title:<br /></h2></label>
    <label><?php print $row['title']?></label>
    </p>
    <p>
    <label><h2>Text:<br /></h2></label>
    <label><?php print $row['text']?></label>
    </p>
    </form>
    


</body>
</html>