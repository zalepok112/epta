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
$con = mysql_connect("localhost","root","1");
mysql_select_db("test", $con);
$query = 'SELECT * FROM users WHERE `login`="' . $_SESSION['login'] . '"';
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);
if(isset($_POST['submit'])){
  
  $query = 'UPDATE users SET login="' . $_POST['login'] . '", password="' . $_POST['password'] . '", email="' . $_POST['email'] . '",
            name="' . $_POST['name'] . '", surname="' . $_POST['surname'] . '", date="' . $_POST['date'] . '"
            WHERE `login` = "' . $_SESSION['login'] . '"';
  mysql_query($query) or die(mysql_error());
  print 'Зміни збережено';
  }
  
?>
<p class="olo"><ins><a href="delete_user_ukr.php?id=<?php print $row['login']?>">Видалити вашу сторінку</a></ins></p>
<ins><a href="user_ukr.php">Укр</a></ins>
<ins><a href="user.php">Англ</a></ins>
<ins><a href="index_ukr.php">Головна</a></ins>  
    <p>
    <label>Дата реєстрації:<br /></label>
    <?php print $row['time']?><br /><br />
    </p>
    <h2>Ваша сторінка</h2>
    <p class="olo">
    <img src="images/<?php print $row['login']?>.jpg" />
    </p>
    
    <form action="user_ukr.php?id=<?php print $row['login']?>" method="post">
    <p>
    <label>Логін:<br /></label>
    <input name="login" type="text" value="<?php print $row['login']?>"  />
    </p>
    <p>
    <label>Пароль:<br /></label>
    <input name="password" type="text" value="<?php print $row['password']?>"  />
    </p>
    <p>
    <label>email:<br /></label>
    <input name="email" type="text" value="<?php print $row['email']?>"  />
    </p>
    <p>
    <label>Ім'я:<br /></label>
    <input name="name" type="text" value="<?php print $row['email']?>" />
    </p>
    <p>
    <label>Прізвище:<br /></label>
    <input name="surname" type="text" value="<?php print $row['email']?>" />
    </p>
    <p>
    <label>Дата народження:<br /></label>
    <input name="date" type="text" value="<?php print $row['email']?>" />
    </p>
    <p>
    <input type="submit" name="submit" value="Зберегти" />
    </p>
    </form>
    


</body>
</html>