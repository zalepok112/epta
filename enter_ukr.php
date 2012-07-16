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
    if (isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['password'])){
        $db = mysql_connect ("localhost","root","1");
        mysql_select_db ("test",$db);
        $query = 'SELECT * FROM users WHERE login = "' . $_POST['login'] . '"';
        if (mysql_query($query)) {
            $res = mysql_query($query);
            $row = mysql_fetch_assoc($res);
            if ($_POST['password'] == $row['password']) {
                $_SESSION['role'] = $row['role'];
                $_SESSION['password'] = $_POST['password'];
                print '<meta http-equiv="refresh" content="0; url=index_ukr.php">';
            }
            else {
             print '<P> Неправильний логін або пароль! </P>';
            }  
        }
        else {
             print '<P> Неправильний логін або пароль! </P>';
        }        
    }
?>


<ins><a href="enter.php">Англ</a></ins>
<ins><a href="enter_ukr.php">Укр</a></ins>
<ins><a href="index_ukr.php">Головна</a></ins>
    <h2>Вхід</h2>
    <form action="enter_ukr.php" method="post">
    <p>
    <label>Логін:<br /></label>
    <input name="login" type="text" size="15" maxlength="15" />
    </p>
    <p>
    <label>Пароль:<br /></label>
    <input name="password" type="password" size="15" maxlength="15" />
    </p>
    <p>
    <input type="submit" name="submit" value="Ввійти" />
</p></form>
    </body>
    </html>