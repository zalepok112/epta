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
<p class="olo"><ins><a href="delete_user.php?id=<?php print $row['login']?>">Delete your account</a></ins></p>
<ins><a href="user_ukr.php">Ukr</a></ins>
<ins><a href="user.php">Eng</a></ins>
<ins><a href="index.php">Home</a></ins>  
    <p>
    <label>Time of registration:<br /></label>
    <?php print $row['time']?><br /><br />
    </p>
    <h2>Your account</h2>
    <p class="olo">
    <img src="images/<?php print $row['login']?>.jpg" />
    </p>
    
    <form action="user.php?id=<?php print $row['login']?>" method="post">
    <p>
    <label>Login:<br /></label>
    <input name="login" type="text" value="<?php print $row['login']?>"  />
    </p>
    <p>
    <label>Password:<br /></label>
    <input name="password" type="text" value="<?php print $row['password']?>"  />
    </p>
    <p>
    <label>email:<br /></label>
    <input name="email" type="text" value="<?php print $row['email']?>"  />
    </p>
    <p>
    <label>Name:<br /></label>
    <input name="name" type="text" value="<?php print $row['email']?>" />
    </p>
    <p>
    <label>Surname:<br /></label>
    <input name="surname" type="text" value="<?php print $row['email']?>" />
    </p>
    <p>
    <label>Date of birth:<br /></label>
    <input name="date" type="text" value="<?php print $row['email']?>" />
    </p>
    <p>
    <input type="submit" name="submit" value="Save" />
    </p>
    </form>
    


</body>
</html>