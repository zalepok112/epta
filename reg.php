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
          exit ("Sorry, this login has already used!");
          }
          $query = 'INSERT INTO users (id, login, password, role) VALUES (NULL, "' . $_POST['login'] . '", "' . $_POST['password'] . '", 1)';
         }
         else {
         print 'Please, enter all fields!'; 
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
    <a href="reg_ukr.php">Ukr</a>
    <a href="reg.php">Eng</a>
    <a href="index.php">Home</a>  
    <h2>Registration</h2>
    <form action="reg.php" method="post">
    <label>Login:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>
    <p>
    <label>Pass:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
    <input type="submit" name="submit" value="Sign up">
    </p></form>
    </body>
    </html>