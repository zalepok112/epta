<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
P.olo      {float: right;}
</style>
</head>
<body>

<p class="olo">
<ins><a href="kontent_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="kontent.php"><img src="images/gb.png" alt="" /></a></ins>
</p>

<?php
    $bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
    $sel = $bd->query('SELECT * FROM content');
    while ($row = $sel->fetch(PDO::FETCH_ASSOC)){
      print '<p>id: ' . $row['id'] . ' Заголовок(Англ): ' . $row['title'] . ' Заголовок(Укр): ' . $row['title_ukr'] . '
             <a href="del_ukr.php?id=' . $row['id'] . '"> Видалити </a><a href="redact_ukr.php?id=' . $row['id'] . '"> Редагувати </a><br /></p>';
    }
?>

<ins><a href="text_ukr.php">Додати інфу</a></ins>
<ins><a href="index_ukr.php">Головна</a></ins>
</body>
</html>
    