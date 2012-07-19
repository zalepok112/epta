<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
P.middle   {text-align: justify; font-size: 18; font-family: UkrainianIzhitsa,Tahoma; text-indent: 30; font-style: normal; color: #eeccaa; line-height: 25px;}
a:HOVER    {color: #B0CDDC; font-style: italic; style=text-decoration:none}
a:link     {color: #ff8e51;}
a:vlink    {color: #ff8e51;}
a:active   {color: #ff8e51;}
P.picture1 {float: left; margin: 7px 7px 7px 0;}
P.picture  {float: right; margin: 7px 0 7px 7px;}
P.big      {font-family: UkrainianIzhitsa, Tahoma; font-style: normal; text-align: center;
            font-size: 38; color: #eeccaa; margin-top: 10 px; }
a:hover    {color: #ff8e51; font-style: italic;}
P.big1     {font-family: Tahoma; font-style: normal; text-align: center; text-decoration: none;
            font-size: 18; margin-top: 180 px; margin-left: 0 px;}
</style>
</head>
<body>
    
<?php
session_start();
    $db = mysql_connect ("localhost","root","1");
    mysql_select_db ("test",$db);
    $query = 'SELECT * FROM users WHERE `password`="' . $_SESSION['password'] . '"';
    
        if ($_SESSION['role'] == 4) {
           print '<ins><a href="exit.php"> Exit</a><br /><br /></ins>
                   <p><ins><a href="user.php?id=' . $_SESSION['login'] . '">' . $_SESSION['login'] . '</a></ins> - You are banned!</p>';
        }
        
        elseif ($_SESSION['role'] == 3) {
            print '<ins><a href="adminka.php"> Admin Panel</a></ins>
                   <ins><a href="kontent.php"> Content</a></ins>
                   <ins><a href="exit.php"> Exit</a></ins>
                   <p>admin <br /><br /></p>';
        }
        elseif ($_SESSION['role'] == 2) {
            print '<ins><a href="kontent.php"> Content</a></ins>
                   <ins><a href="exit.php"> Exit</a></ins>
                   <p>content adm <br /><br /></p>';
        }
        elseif ($_SESSION['role'] == 1) {
            print '<ins><a href="exit.php"> Exit</a><br /><br /></ins>
                   <ins><a href="user.php?id=' . $_SESSION['login'] . '">' . $_SESSION['login'] . '</a></ins>';
        }
        
    else {
            print '<ins><a href="enter.php"> Log in</a></ins>
                   <ins><a href="reg.php"> Registration</a></ins>
                   <p>guest <br /><br /></p>';
        }
  $content = 'SELECT * FROM content';
    $result = mysql_query($content) or die(mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
      $rest = substr($row['text'], 0, 150);
       if (substr($rest, -1) != ' ') {
        $rest = substr($rest, 0, strrpos($rest, ' '));
      print '<p>' . $row['title'] . '<br />' .  $rest . '<br /><br /></p>';
      }
    }
    
?>


<ins><a href="index_ukr.php">Ukr</a></ins>
<ins><a href="index.php">Eng</a></ins>

<p class="big">
The Formation of Sitch
</p>

<p class="picture">
<img src="sich_mal1.gif" alt="" />
</p>

<p class="middle">
The cossacks, who lived on the steppes of Ukraine, are a well known group of Cossacks.
Their numbers increased greatly between the 15th and 17th centuries, usually led by
Ruthenian boyar or prince nobility, various Polish starostas, merchants,
and runaway peasants from the area of the Poland-Lithuania Commonwealth.
The Zaporozhian Cossacks played an important role in European geopolitics,
participating in a series of conflicts and alliances with the Polish-Lithuanian Commonwealth,
Russia, and the Ottoman Empire. In 1552 on the banks of the Lower Dnieper was formed
the first recorded Zaporizhian Host when Dmytro Vyshnevetsky built a fortress on the island of Khortytsia.
As a result of the Khmelnytsky Uprising in the middle of the 17th century
the Zaporozhian Cossacks managed to briefly create an independent state,
which later became the autonomous Cossack Hetmanate, a suzerainty under
protection of the Russian Tsar but ruled by the local Hetmans for half a century.
Their actions increased tension along the southern border of the Polish-Lithuanian Commonwealth,
which resulted in almost a constant low-level warfare taking place in those territories
for almost the entire existence of the Polish-Lithuanian Commonwealth.
Bohdan Khmelnytskys entry to Kiev. Painted by Nikolai Ivasyuk, end of the 19th century
In the 16th century, with the dominance of the Polish-Lithuanian Commonwealth extending south,
the Zaporozhian Cossacks were mostly, if tentatively,
regarded by the Polish-Lithuanian Commonwealth as their subjects.
Registered Cossacks were a part of the Commonwealth army until 1699.
<br /><br /> <br />
</p>

<p class="picture">
<img src="sich_mal3.gif" alt="" />
</p>

<p class="middle">
Territory of Cossacks nation was called The Land of Zaporizhian Host. 
There are 8 Siches that we know in our time. The internal structure of Cossacks Republic was
some kind of miliary society. Cossacks Republic - it's christian-orthodox democratic republic.
Every cossack was assigned for his own Kurin - it's military-economic unit.
There were 8 such units. The name of the Kurin said some information
about cossacks origins: Ymans'kyi, Korsync'kyi etc.
</p>

<?php>
session_start();
if ($_GET['lang'] == 'ukr') {
    print '<p><a href="index1_ukr.php">
           <b>Наступна</b></a></p>';
}
else {
    print '<p><a href="index1.php">
           <b>Next</b></a></p>';
}
?>

</body>
</html>