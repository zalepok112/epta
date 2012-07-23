<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
P.olo      {float: right;}
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

<p class="olo">
<ins><a href="index1_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="index1.php"><img src="images/gb.png" alt="" /></a></ins>
</p>
    
<?php
session_start();
    $bd = new PDO('mysql:host=localhost;dbname=test', 'root', '1'); 
    $sel = $bd->query('SELECT * FROM `users` WHERE `password`="' . $_SESSION['password'] . '"');
    
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
  $sel2 = $bd->query('SELECT * FROM `content`');
  $res = $bd->query('SELECT * FROM `content`');
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
      $rest = substr($row['text'], 0, 150);
       if (substr($rest, -1) != ' ') {
        $rest = substr($rest, 0, strrpos($rest, ' '));
      print '<p class="middle"><a href="article.php?id=' . $row['id'] . '">' . $row['title'] . '</a><br /></p>
             <p class="middle">' .  $rest . '<br /><br /></p>';
      }
    }
    
?>


<p class="big">
Organisation and government
</p>

<p class="picture1">
<img src="sich_mal2.gif" />
</p>

<p class="middle">
The Zaporizhian Host was led by the Sich Rada that elected a Kosh Otaman as the leader of the host.
He was aided by a head secretary (pysar), head judge, head archivist. During the military operations
the Ottoman carried an unlimited power supported by his staff as the military collegiate.
He decided with an agreement from the Rada whether or not to support a certain Hetman
(such as Bohdan Khmelnytsky) or other leaders of state.
Some sources refer to the Zaporizhian Sich as a "cossack republic", as the highest
power in it belonged to the assembly of all its members, and because the leaders (starshyna)
were elected. The Cossacks formed a society (hromada) that consisted of "kurins"
(each with several hundred cossacks). There was a cossack military court that
severely punished violence and stealing among compatriots; the bringing of women to the Sich;
the consumption of alcohol in periods of conflict, etc. The administration of the Sich
provided Orthodox churches and schools for the religious and secular education of children.
The Sich population had an international component, and apart from Ukrainians included Moldavians,
Tatars, Poles, Lithuanians, Jews and Russians. The social structure was also complex, consisting of:
destitute gentry and boyars, szlachta (Polish nobility), merchants, peasants, outlaws of every sort,
run-away slaves from Turkish galleys, run-away serfs (as the Zaporizhian polkovnyk Pivtorakozhukha),
etc. Some of those that were not accepted to the Host formed
gangs of their own claiming to be Cossacks as well. However,
after the Khmelnytsky Uprising these formations largely disappeared
and were integrated mainly into Hetmanate society.
</p>



<?php
session_start();
if ($_GET['lang'] == 'ukr') {
    print '<p><a href="index_ukr.php">
           <b>Назад</b></a></p>';
}
else {
    print '<p><a href="index.php">
           <b>Back</b></a></p>';
}
?>

</body>
</html>