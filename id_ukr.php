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
$bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
$sel = $bd->query('SELECT * FROM users WHERE `login`="' . $_GET['login'] . '"');
$row = $sel->fetch(PDO::FETCH_ASSOC);

?>
<ins><a href="id_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="id.php"><img src="images/gb.png" alt="" /></a></ins>
<ins><a href="index.php">Home</a></ins>  
    <p>
    <label>Дата реєстрації:<br /></label>
    <?php print $row['time']?><br /><br />
    </p>
    <h2><?php print $row['login']?></h2>
    <p class="olo">
    <img src="images/<?php print $row['login']?>.jpg" alt="" />
    </p>
    <p>
    <label>email:<br /></label>
    <label><?php print $row['email']?></label>
    </p>
    <p>
    <label>Ім'я:<br /></label>
    <label><?php print $row['name']?></label>
    </p>
    <p>
    <label>Прізвище:<br /></label>
    <label><?php print $row['surname']?></label>
    </p>
    <p>
    <label>Дата народження:<br /></label>
    <label><?php print $row['date']?></label>
    </p>
    


</body>
</html>