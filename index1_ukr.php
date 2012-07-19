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
<ins><a href="index_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="index.php"><img src="images/gb.png" alt="" /></a></ins>
</p>
    
<?php
session_start();
    $bd = new PDO('mysql:host=localhost;dbname=test', 'root', '1'); 
    $sel = $bd->query('SELECT * FROM `users` WHERE `password`="' . $_SESSION['login'] . '"');
     
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
  
  $sel2 = $bd->query('SELECT * FROM `content`');
  $res = $bd->query('SELECT * FROM `content`');
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
      $rest = substr($row['text_ukr'], 0, 150);
       if (substr($rest, -1) != ' ') {
        $rest = substr($rest, 0, strrpos($rest, ' '));
      print '<h2><p class="middle"><a href="article_ukr.php?id=' . $row['id'] . '">' . $row['title_ukr'] . '</a><br /></p></h2>
             <p class="middle">' .  $rest . '<br /><br /></p>';
      }
    }
    
?>


<h1><p class="big">
Устрій
</p></h1>

<p class="picture1">
<img src="sich_mal2.gif" />
</p>

<p class="middle">
Запорозька Січ була обведена високими валами, на яких був частокіл і зруби,
що на них ставилися гармати. Між валами була широка площа, на краю якої стояли курені,
будинки, де мешкали запорожці. Козацька залога на Запорозькій Січі, що звалася також кошем,
нараховувала кілька тисяч (іноді це число доходило до 10 тис.) озброєних козаків.
На площі містилася церква, будинки старшини, школа та інші господарські та військові споруди.
Січова церква і духовенство перебували під зверхністю Києво-Межигірської архимандрії.
Площа біля церкви була центром суспільно-політичного життя Запорозької Січі,
де відбувалися Січові ради тощо. Поза валами був Січовий базар, куди приїжджали
купці зі своїми товарами. Панівну верству Запорозької Січі становили не феодали як привілейований стан,
а власники рибних промислів, багаті скотарі й торговці, а пізніше,
в міру розвитку землеробства та інших галузей господарства — власники великих зимівників,
водяних млинів, чумацьких валок тощо. Усю старшину обирали на військовій козацькій раді,
причому у виборах мало право брати участь усе козацтво. Однак, попри це,
козацька заможна верхівка в більшості випадків добивалася вигідних для себе ухвал козацької ради.
Відзначаючи специфічні риси політичної організації запорозького козацтва,
Січ називають «козацькою республікою». Запорозькі козаки становили товариство — громаду,
яка поділялася на курені. Найвищим органом влади на Січі була військова козацька рада,
у якій брали участь усі козаки. Рада обирала кошового отамана, козацьку старшину,
спільно вирішувала найважливіші питання. На Запорозькій Січі діяв козацький військовий суд,
який нещадно карав за вбивство товариша, крадіжки у побратимів. Каралися також приведення у Січ жінок,
пияцтво під час походів, кривда жінки, зухвалість до начальства тощо.
На Запоріжжі при церквах діяли школи, де діти козаків навчалися письма, церковного читання, співу та музики.
Ще одним показником розвитку культури на Січі було шанобливе ставлення запоріжців до книги.
Звичайно, купувати та дарувати книги могли дозволити собі лише заможні козаки.
</p>



<?php
session_start();
if ($_GET['lang'] == 'eng') {
    print '<p><a href="index.php">
           <b>Back</b></a></p>';
}
else {
    print '<p><a href="index_ukr.php">
           <b>Назад</b></a></p>';
}
?>

</body>
</html>