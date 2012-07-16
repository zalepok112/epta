<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<?php
session_start();
if (isset($_POST['submit'])){
     $db = mysql_connect ("localhost","root","1");
        mysql_select_db ("test",$db);
         if (!empty($_POST['login']) && !empty($_POST['password'])) {
          $result = mysql_query ('SELECT id FROM users WHERE login = "' . $_POST['login'] . '"');
          $row = mysql_fetch_assoc ($result);
          if (!empty($row['id'])) {
          exit ("Користувач з таким логіном вже існує!");
          }
          $query = 'INSERT INTO users (id, login, password, role) VALUES (NULL, "' . $_POST['login'] . '", "' . $_POST['password'] . '", 1)';
         }
         else {
         print 'Заповінть всі поля'; 
         }
if (mysql_query($query))
{
    $_SESSION['role'] = 1;
    print '<meta http-equiv="refresh" content="0; url=enter.php">';
}
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
</head>
<body bgcolor="#672515" color="#eeccaa" link="#ff8e51" alink="#ff8e51" vlink="#ff8e51">
    <a href="reg_ukr.php">Укр</a>
    <a href="reg.php">Англ</a>
    <a href="index.php">Головна</a>  
    <h2>Реєстрація</h2>
    <form action="reg_ukr.php" method="post">
    <label>Логін:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
    <p>
    <label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
    <input type="submit" name="submit" value="Зареєструватись">
    </p></form>
    </body>
    </html>