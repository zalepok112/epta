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
session_start();
if (isset($_POST['submit'])){
$bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
       $insert = $bd->exec('INSERT INTO `content` (`id`, `title`, `text`, `title_ukr`, `text_ukr`) VALUES(NULL, "' . $_POST['title'] . '", "' . $_POST['text'] . '",
                 "' . $_POST['title_ukr'] . '", "' . $_POST['text_ukr'] . '")');
    if ($insert)
{
    print '<meta http-equiv="refresh" content="0; url=index_ukr.php">';
}
}
?>

    
    <ins><a href="text_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
    <ins><a href="text.php"><img src="images/gb.png" alt="" /></a></ins>
    <ins><a href="index.php">Головна</a></ins>
    <h2>Статті</h2>
    <form action="text_ukr.php" method="post">
    <p>
    <label>Заголовок(Укр):<br /></label>
    <input name="title_ukr" type="text" size="50" maxlength="50" />
    </p>
    <p>
    <label>Текст(Укр):<br /></label>
    <textarea name="text_ukr" cols="50" rows="6" maxlength="250"></textarea>
    </p>
    <p>
    <label>Заголовок(Англ):<br /></label>
    <input name="title" type="text" size="50" maxlength="50" />
    </p>
    <p>
    <label>Текст(Англ):<br /></label>
    <textarea name="text" cols="50" rows="6" maxlength="250"></textarea>
    </p>
    <p>
    <input type="submit" name="submit" value="Зберегти" />
    </p></form>
    </body>
    </html>