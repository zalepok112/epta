<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
</head>
<body>

<?php
session_start(); 
          $_SESSION['login'] = NULL;
          $_SESSION['password'] = NULL;
          $_SESSION['role'] = 0;
          print '<meta http-equiv="refresh" content="0; url=index.php">';
?>

</body>
</html>