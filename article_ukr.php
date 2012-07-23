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
$row3 = $sel3->fetch(PDO::FETCH_ASSOC);
$sel2 = $bd->query('SELECT * FROM comment WHERE `id_content` = "' . $_GET['id'] . '" && `lang` = "ukr"');
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
    $insert = $bd->exec('INSERT INTO `comment` (`id_com`, `id_content`, `login`, `title`, `koment`, `lang`) VALUES (NULL, "' . $row1['id'] . '", "' . $_SESSION['login'] . '",
                        "' . $title . '", "' . $_POST['koment'] . '", "ukr")');
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
    <form action="article_ukr.php?id=<?php print $row1['id']?>" method="post">
    <p>
    <label>Заголовок:<br /></label>
    <label><?php print $row1['title_ukr']?></label>
    </p>
    <p>
    <label>Текст:<br /></label>
    <label><?php print $row1['text_ukr']?></label>
    </p>
    <?php
    if ($_SESSION['role'] !== NULL)
    {
    print '
    <p>
    <label>Заголовок коментарія: </label>
    <input name="title" type="text" size="15" />
    </p>
    <p>
    <label>Ваш коментарій: </label><br />
    <textarea name="koment" cols="50" rows="3"></textarea>
    </p>
    <p>
    <input type="submit" name="submit" value="Зберегти" />
    </p></form>';
    
     while ($row2 = $sel2->fetch(PDO::FETCH_ASSOC))
    {
      print '<p class= "middle"><b><a href="id_ukr.php?login=' . $row2['login'] . '">' . $row2['login'] . '</a></b><br />' . $row2['title'] . '
             <br />' . $row2['koment'] . '<br />' . $row2['time'] . '</p>';
      
      if ($_SESSION['role'] == 3) {
            print '<a href="del_com_ukr.php?id=' . $row2['id_com'] . '"> Delete</a>';
      }
    }
    $sel4 = $bd->query('SELECT * FROM vote WHERE `id_user` = "' . $row3['id'] . '"');
    $row4 = $sel4->fetch(PDO::FETCH_ASSOC);
    $sel5 = $bd->query('SELECT * FROM `vote` ');
    $sel6 = $bd->query('SELECT COUNT(`mark`) AS `count`, AVG(`mark`) AS average FROM `vote`');
    $row6 = $sel6->fetch(PDO::FETCH_ASSOC);

    print '<p class="olo">
           Середній бал голосування: ' . $row6['average'] . '<br />
           К-сть голосів: ' . $row6['count'] . '</p>';
    if ($_SESSION['role'] == 3) {
    while ($row5 = $sel5->fetch(PDO::FETCH_ASSOC))
    {
      print '<p>id голосування: ' . $row5['id_vote'] . ' id контента: ' . $row5['id_content'] . ' id юзера: ' . $row5['id_user'] . ' оцінка: ' . $row5['mark'] . '
      <a href="del_vote_adm_ukr.php?id=' . $row5['id_vote'] . '"> Видалити </a><br /></p>';
    }
    }
    if (empty($row4['mark']))
    {
    print '<p class="olo">
    <form action="article_ukr.php?id=' . $row1['id'] . '" method="post">
    <input type="radio" name="radiobutton" value="5" />5
    <input type="radio" name="radiobutton" value="4" />4
    <input type="radio" name="radiobutton" value="3" />3
    <input type="radio" name="radiobutton" value="2" />2
    <input type="radio" name="radiobutton" value="1" />1
    <input type="submit" name="vote" value="Проголосувати" /></p>';
    if (isset($_POST['vote'])){
    $insert2 = $bd->exec('INSERT INTO `vote` (`id_vote`, `id_content`, `id_user`, `mark`) VALUES (NULL, "' . $_GET['id'] . '",
                         "' . $row3['id'] . '", "' . $_POST['radiobutton'] . '")');
    print '<meta http-equiv="refresh" content="0; url=article_ukr.php?id=' . $_GET['id'] . '">';
    }
    
    
    }
    else
    {
     print '<p>Дякую за Ваш голос! Ваша оцінка: ' . $row4['mark'] . '
            <a href="del_vote_ukr.php?id=' . $row4['id_vote'] . '"> Видалити</a></p>';  
    }
        }
?>

</body>
</html>