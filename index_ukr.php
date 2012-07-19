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
                   <ins><a href="user_ukr.php?id=' . $_SESSION['login'] . '">' . $_SESSION['login'] . ' - Ви заблоковані!</a></ins>';
        }
        elseif ($_SESSION['role'] == 3) {
            print '<ins><a href="adminka_ukr.php"> Адмінка</a></ins>
                   <ins><a href="kontent_ukr.php"> Контент</a></ins>
                   <ins><a href="exit.php"> Вихід</a></ins>
                   <p>Адмін <br /><br /></p>';
        }
        elseif ($_SESSION['role'] == 2) {
            print '<ins><a href="kontent_ukr.php"> Контент</a></ins>
                   <ins><a href="exit.php"> Вихід</a></ins>
                   <p>Адм контента <br /><br /></p>';
        }
        elseif ($_SESSION['role'] == 1) {
            print '<ins><a href="exit.php"> Вихід</a></ins>
                   <ins><a href="user.php?id=' . $_SESSION['login'] . '">' . $_SESSION['login'] . '</a></ins>';
        }
        
    else {
            print '<ins><a href="enter_ukr.php"> Вхід</a></ins>
                   <ins><a href="reg_ukr.php"> Реєстрація</a></ins>
                   <p>Гість <br /><br /></p>';
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
<ins><a href="index_ukr.php">Укр</a></ins>
<ins><a href="index.php">Англ</a></ins>

<p class="big">
Утворення Січі
</p>

<p class="picture">
<img src="sich_mal1.gif" alt="" />
</p>

<p class="middle">
Запорозьке козацьке військо сформувалося в середині 16 століття в середній течії Дніпра,
на незайманій території Запорожжя, розташованій на кордонах Речі Посполитої,
Кримського ханства і Московського царства. Основу війська становили руські шляхтичі та міщани.
Центром запорожців була дніпровська фортеця — Січ, прообразом якої було укріплення,
споруджене волинським князем Дмитром-Байдою Вишневецьким на острові Мала Хортиця 1553 року.
1572 року невелика частина запорожців була взята на службу і вписана до державного реєстру
польським королем Сигізмундом II Августом. Це дало початок реєстровим козакам.
Вони квартирувалися в українських порубіжних містах і називалися «Військом Запорозьким Городовим».
Кількість реєстрових запорожців у 1617—1637 роках становила близько 6 тисяч.
Центром війська розташовувався в Трахтемирові. На противагу привілейованим реєстровцям,
більшість козаків належала до нереєстрового козацтва. Вони проживали на українському порубіжжі,
Запорожжі, так званому Низу, і називалися «Військом Запорозьким Низовим». Їхнім центром була Січ.
Обидві гілки запорозького козацтва мали власне самоврядування з елементами військової демократії,
за зразком шляхетського самоврядування. Незважаючи на військові здобутки і привілеї,
козаки часто зазнавали соціальних утисків з боку місцевої руської і польської шляхти.
Правовий і соціальний гніт ставав причиною козацьких повстань, найбільшими з яких були
повстання Косинського 1591—1593 років, повстання Наливайка 1594 — 1596 років,
повстання Жмайла 1625 року, повстання Федоровича 1630 року,
повстання Сулими 1635, повстання Павлюка 1637 року й повстання Острянина 1637 року.
</p>

<p class="picture">
<img src="sich_mal3.gif" alt="" />
</p>


<p class="middle">
Територія козацької держави називалась Землями війська Запорізького. 
Відомо 8 дніпровських січей. За внутрішнім устроєм 
козацька держава була своєрідним військовим товариством. 
Козацька держава — це християнсько — православна демократична республіка.
Кожен козак приписувався до куреня — військово — господарської одиниці на Січі (їх було 8). 
Назва куренів свідчила про походження козаків: Уманський, Корсунський тощо.
</p>


<?php
session_start();
if ($_GET['lang'] == 'eng') {
    print '<p><a href="index1.php">
           <b>Next</b></a></p>';
}
else {
    print '<p><a href="index1_ukr.php">
           <b>Наступна</b></a></p>';
}
?>

</body>
</html>