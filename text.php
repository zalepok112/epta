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
$db = mysql_connect ("localhost","root","1");
        mysql_select_db ("test",$db);
        $query = 'INSERT INTO content (id, title, text) VALUES (NULL, "' . $_POST['title'] . '", "' . $_POST['text'] . '")';
if (mysql_query($query))
{
    print '<meta http-equiv="refresh" content="0; url=index.php">';
}
}
?>

    
    <ins><a href="text_ukr.php">Ukr</a></ins>
    <ins><a href="text.php">Eng</a></ins>
    <ins><a href="index.php">Home</a></ins>
    <h2>Articles</h2>
    <form action="text.php" method="post">
    <label>Title:<br /></label>
    <p>
    <input name="title" type="text" size="50" maxlength="50" />
    </p>
    <p>
    <label>Text:<br /></label>
    <textarea name="text" cols="100" rows="15" maxlength="500"></textarea>
    </p>
    <p>
    <input type="submit" name="submit" value="Save" />
    </p></form>
    </body>
    </html>