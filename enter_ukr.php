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
    if (isset($_POST['submit'])) {
        if (!empty($_POST['login']) && !empty($_POST['password']))
        {
        $bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
        $id_dates2 = date('Y-m-d H:i:s');
        $update = $bd->exec('UPDATE users SET time2 = "' . $id_dates2 . '" WHERE `login` = "' . $_POST['login'] . '"');
        $sel =  $bd->query('SELECT * FROM users WHERE login = "' . $_POST['login'] . '"');
        if ($sel) {
            $row = $sel->fetch(PDO::FETCH_ASSOC);
            if ($_POST['password'] == $row['password']) {
                $_SESSION['role'] = $row['role'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['login'] = $_POST['login'];
                print '<meta http-equiv="refresh" content="0; url=index_ukr.php">';
            }
            else {
             print '<P> Неправльний логін чи пароль! </P>';
            }  
        }
        else {
             print '<P> Неправльний логін чи пароль! </P>';
        }        
    }
    else {
        print '<p> Заповніть всі поля! </p>';
    }
    }
?>

<ins><a href="enter_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="enter.php"><img src="images/gb.png" alt="" /></a></ins>
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
    <input type="submit" name="submit" value="Логін" />
</p></form>
    </body>
    </html>