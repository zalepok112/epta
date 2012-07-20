<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
P.olo {float: right;}
P.middle   {text-align: justify; font-size: 18; font-family: Tahoma; text-indent: 30; font-style: normal; color: #eeccaa; line-height: 25px;}

</style>
</head>
<body>

<?php
session_start();
$bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
$time = date('Y-m-d H:i:s');
$sel3 = $bd->query('SELECT * FROM users WHERE `password` = "' . $_SESSION['password'] . '"');
$sel2 = $bd->query('SELECT * FROM comment WHERE `id_content` = "' . $_GET['id'] . '"');
$sel1 = $bd->query('SELECT * FROM content WHERE `id` = "' . $_GET['id'] . '"');
$row1 = $sel1->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['submit'])){
    $title = $_POST['title'];
    if (empty($title))
    {
        $title =  substr($_POST['koment'], 0, 15);
        if (substr($title, -1) != ' ') {
        $title = substr($title, 0, strrpos($title, ' '));
        }
    }
    $insert = $bd->exec('INSERT INTO `comment` (`id_com`, `id_content`, `login`, `title`, `koment`) VALUES (NULL, "' . $row1['id'] . '", "' . $_SESSION['login'] . '",
                        "' . $title . '", "' . $_POST['koment'] . '")');
    $update = $bd->exec('UPDATE comment SET time = "' . $time . '" WHERE `koment` = "' . $_POST['koment'] . '"');
    print '<meta http-equiv="refresh" content="0; url=article_ukr.php?id=' . $_GET['id'] . '">';
}
?>
<p class="olo">
<ins><a href="article_ukr.php?id=<?php print $_GET['id'] ?>"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="article.php?id=<?php print $_GET['id'] ?>"><img src="images/gb.png" alt="" /></a></ins>
</p>

<ins><a href="index_ukr.php">Головна</a></ins>  
    <h1>Статті</h1>
    <form action="article.php?id=<?php print $row1['id']?>" method="post">
    <p>
    <label><h2>Зголовок:<br /></h2></label>
    <label><?php print $row1['title_ukr']?></label>
    </p>
    <p>
    <label><h2>Текст:<br /></h2></label>
    <label><?php print $row1['text_ukr']?></label>
    </p>
    <?php
    
    while ($row2 = $sel2->fetch(PDO::FETCH_ASSOC))
    {
      print '<p class= "middle"><b>' . $row2['login'] . '</b><br />' . $row2['title'] . '<br />' . $row2['koment'] . '<br /' . $row2['time'] . '</p>';
      if ($_SESSION['role'] == 3) {
            print '<a href="del_com_ukr.php?id=' . $row2['id_com'] . '"> Видалити</a>';
      }
    }
    if ($_SESSION['role'] !== NULL)
    {
    print '
    <p>
    <label>Заголовок коментарія: </label>
    <input name="title" type="text" size="15" maxlength="15" />
    </p>
    <p>
    <label>Ваш коментарій: </label><br />
    <textarea name="koment" cols="50" rows="3" maxlength="150"></textarea>
    </p>
    <p>
    <input type="submit" name="submit" value="Зберегти" />
    </p></form>';
    }
?>

</body>
</html>