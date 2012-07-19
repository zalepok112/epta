<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title></title>
<style type="text/css">
body {background-color: #672515;}
</style>
</head>
<body>

<?php
session_start();
if (isset($_POST['submit'])){
     $bd = new PDO ('mysql:host=localhost;dbname=test', 'root', '1');
         if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST ['email'])) {
          $sel =  $bd->query('SELECT id FROM users WHERE login = "' . $_POST['login'] . '"');
          $row = $sel->fetch(PDO::FETCH_ASSOC);
         
          if ($_POST['password'] !== $_POST['pass'])  {
           exit ("Неправльний пароль");    
          }
          if (!empty($row['id'])) {
          exit ("Вибачте користувач з такім логіном вже існує!");
          }
          
function generate_resized_image(){
$max_dimension = 800; // Max new width or height, can not exceed this value.
$dir = "./images/"; // Directory to save resized image. (Include a trailing slash - /)
// Collect the post variables.
$postvars = array(
"image"    => trim($_FILES["image"]["name"]),
"image_tmp"    => $_FILES["image"]["tmp_name"],
"image_size"    => (int)$_FILES["image"]["size"]
//"image_max_width"    => (int)$_POST["image_max_width"],
//"image_max_height"   => (int)$_POST["image_max_height"]
);
// Array of valid extensions.
$valid_exts = array("jpg","jpeg","gif","png");
// Select the extension from the file.
$ext = end(explode(".",strtolower(trim($_FILES["image"]["name"]))));
// Check not larger than 175kb.
if($postvars["image_size"] <= 179200){
// Check is valid extension.
if(in_array($ext,$valid_exts)){
if($ext == "jpg" || $ext == "jpeg"){
$image = imagecreatefromjpeg($postvars["image_tmp"]);
}
else if($ext == "gif"){
$image = imagecreatefromgif($postvars["image_tmp"]);
}
else if($ext == "png"){
$image = imagecreatefrompng($postvars["image_tmp"]);
}
// Grab the width and height of the image.
list($width,$height) = getimagesize($postvars["image_tmp"]);
$newwidth = 150;
$newheight = 150;
// Create temporary image file.
$tmp = imagecreatetruecolor($newwidth,$newheight);
// Copy the image to one with the new width and height.
imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
$filename = $dir.$_POST['login'].'.jpg';
// Create image file with 100% quality.
imagejpeg($tmp,$filename,100);
return "<strong></strong><br/>
<img src=\"".$filename."\" /><br/>
<a href=\"".$filename."\" target=\"_blank\"</a>";
imagedestroy($image);
imagedestroy($tmp);
} else {
return "Файл завеликий. Максимальний розмір 175kb.";
}
} else {
return "Невідомий тип зображення. Ви маєте завантажувати: (jpg, jpeg, gif, png).";
}
}
if(isset($_GET["do"])){
if($_GET["do"] == "upload"){
$upload_and_resize = generate_resized_image();
} else {
$upload_and_resize = "";
}
} else {
$upload_and_resize = "";
}
 echo $upload_and_resize;
          $id_dates = date('Y-m-d H:i:s');
          $insert = $bd->exec ('INSERT INTO users (id, login, password, role, email, time) VALUES (NULL, "' . $_POST['login'] . '", "' . $_POST['password'] . '", 1,
          "' . $_POST['email'] . '", "' . $id_dates . '")');
         }
         else {
         print 'Please, enter all fields!'; 
         }
if ($insert)
{    
    $_SESSION['role'] = 1;
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    print '<meta http-equiv="refresh" content="0; url=index_ukr.php">';
}
}
?>


<ins><a href="reg_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="reg.php"><img src="images/gb.png" alt="" /></a></ins>
<ins><a href="index_ukr.php">Головна</a></ins>  
    <h2>Реєстрація</h2>
    <form action="./reg_ukr.php?do=upload" method="post" enctype="multipart/form-data">
    <p>
    <label>Логін:<br /></label>
    <input name="login" type="text" size="15" maxlength="15" />
    </p>
    <p>
    <label>Пароль:<br /></label>
    <input name="password" type="password" size="15" maxlength="15" />
    </p>
    <p>
    <label>Підтвердіть пароль:<br /></label>
    <input name="pass" type="password" size="15" maxlength="15" />
    </p>
    <p>
    <label>email:<br /></label>
    <input name="email" type="text" size="15" maxlength="20" />
    </p>
    <p>
    <input type="file" name="image" value="Зберегти" />
    </p>
    <p>
    <input type="submit" name="submit" value="Зареєструватися" />
    </p>
    </form>   
    
    
    </body>
    </html>