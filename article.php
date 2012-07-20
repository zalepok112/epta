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
    print '<meta http-equiv="refresh" content="0; url=article.php?id=' . $_GET['id'] . '">';
}
?>
<p class="olo">
<ins><a href="article_ukr.php?id=<?php print $_GET['id'] ?>"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="article.php?id=<?php print $_GET['id'] ?>"><img src="images/gb.png" alt="" /></a></ins>
</p>

<ins><a href="index.php">Home</a></ins>  
    <h1>Artciles</h1>
    <form action="article.php?id=<?php print $row1['id']?>" method="post">
    <p>
    <label><h2>Title:<br /></h2></label>
    <label><?php print $row1['title']?></label>
    </p>
    <p>
    <label><h2>Text:<br /></h2></label>
    <label><?php print $row1['text']?></label>
    </p>
    <?php
    if ($_SESSION['role'] !== NULL)
    {
    print '
    <p>
    <label>Comments title: </label>
    <input name="title" type="text" size="15" maxlength="15" />
    </p>
    <p>
    <label>Your comment: </label><br />
    <textarea name="koment" cols="50" rows="3" maxlength="150"></textarea>
    </p>
    <p>
    <input type="submit" name="submit" value="Save" />
    </p></form>';
    
     while ($row2 = $sel2->fetch(PDO::FETCH_ASSOC))
    {
      print '<p class= "middle"><b>' . $row2['login'] . '</b><br />' . $row2['title'] . '
             <br />' . $row2['koment'] . '<br /' . $row2['time'] . '</p>';
      
      if ($_SESSION['role'] == 3) {
            print '<a href="del_com.php?id=' . $row2['id_com'] . '"> Delete</a>';
      }
    }
    $sel4 = $bd->query('SELECT * FROM vote WHERE `id_user` = "' . $row3['id'] . '"');
    $row4 = $sel4->fetch(PDO::FETCH_ASSOC);
    if (empty($row4['mark']))
    {
    if (isset($_POST['vote'])){
    $insert2 = $bd->exec('INSERT INTO `vote` (`id_vote`, `id_content`, `id_user`, `mark`) VALUES (NULL, "' . $_GET['id'] . '",
                         "' . $row3['id'] . '", "' . $_POST['vote'] . '")');
    
    print 'Your vote:' . $row4['mark'] . '';
    }
    print '<p class="olo">
    <form action="article.php?id=' . $row4['id_vote'] . '" method="post">
    <input type="radio" name="radiobutton5" value="5" />5
    <input type="radio" name="radiobutton4" value="4" />4
    <input type="radio" name="radiobutton3" value="3" />3
    <input type="radio" name="radiobutton2" value="2" />2
    <input type="radio" name="radiobutton1" value="1" />1
    <input type="submit" name="vote" value="Vote" /></p>';
    
    }
    else
    {
      print '<a href="del_vote.php?id=' . $row4['id_vote'] . '"> Delete</a>';  
    }
    }
?>
</form>
</body>
</html>