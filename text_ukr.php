<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<?php
session_start();
if (isset($_POST['submit'])){
$db = mysql_connect ("localhost","root","1");
        mysql_select_db ("test",$db);
        $query = 'INSERT INTO content (id, title, text) VALUES (NULL, "' . $_POST['title'] . '", "' . $_POST['text'] . '")';
if (mysql_query($query))
{
    print '<meta http-equiv="refresh" content="0; url=index_ukr.php">';
}
}
?>

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    </head>
    <body bgcolor="#672515" color="#eeccaa" link="#ff8e51" alink="#ff8e51" vlink="#ff8e51">
    <P align="right">
    <a href="text_ukr.php">Укр</a>
    <a href="text.php">Англ</a>
    <a href="index.php">Головна</a>
    <h2>Інфа</h2>
    <form action="text_ukr.php" method="post">
    <label>Заголовок:<br></label>
    <input name="title" type="text" size="50" maxlength="50">
    </p>
    <p>
    <label>Текст:<br></label>
    <textarea name="text" cols="100" rows="15" maxlength="500"></textarea>
    </p>
    <p>
    <input type="submit" name="submit" value="Зберегти">
    </p></form>
    </body>
    </html>