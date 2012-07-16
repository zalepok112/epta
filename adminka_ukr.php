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
    $query = 'SELECT * FROM users';
    $result = mysql_query($query) or die(mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
      print '<p>id: ' . $row['id'] . ' Користувач: ' . $row['login'] . ' Права: ' . $row['role'] . '<a href="delete_ukr.php?id=' . $row['id'] . '"> Видалити </a><a href="edit_ukr.php?id=' . $row['id'] . '"> Редагувати </a><br /></p>';
    }
?>


<ins><a href="adminka_ukr.php">Укр</a></ins>
<ins><a href="adminka.php">Англ</a></ins>
<ins><a href="index_ukr.php">Головна</a></ins>
</body>
</html>
    