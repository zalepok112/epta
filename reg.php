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
           exit ("<p>Incorrect password</p>");    
          }
          if (!empty($row['id'])) {
          exit ("<p>Sorry, this login has already used!</p>");
          }
          
function generate_resized_image(){
$max_dimension = 800; // Max new width or height, can not exceed this value.
$dir = "./images/"; // Directory to save resized image. (Include a trailing slash - /)
// Collect the post variables.
$postvars = array(
"image"    => trim($_FILES["image"]["name"]),
"image_tmp"    => $_FILES["image"]["tmp_name"],
"image_size"    => (int)$_FILES["image"]["size"]
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
exit ('You dont download an image or its size is bigger than 175 Kb!');
}
} else {
exit ('Invalid file type. You must upload an image file. (jpg, jpeg, gif, png).');
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
 
          $id_dates = date('Y-m-d H:i:s');
          $insert = $bd->exec('INSERT INTO users (id, login, password, role, email, time) VALUES (NULL, "' . $_POST['login'] . '", "' . $_POST['password'] . '", 1,
          "' . $_POST['email'] . '", "' . $id_dates . '")');
         }
         else {
         exit ('<p>Please, enter all fields!</p>'); 
         }
if ($insert)
{    
    $_SESSION['role'] = 1;
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    print '<meta http-equiv="refresh" content="0; url=index.php">';
}
}
?>


<ins><a href="reg_ukr.php"><img src="images/ua.png" alt="" /></a></ins>
<ins><a href="reg.php"><img src="images/gb.png" alt="" /></a></ins>
<ins><a href="index.php">Home</a></ins>  
    <h2>Registration</h2>
    <form action="reg.php?do=upload" method="post" enctype="multipart/form-data">
    <p>
    <label>Login:<br /></label>
    <input name="login" type="text" size="15" maxlength="15" />
    </p>
    <p>
    <label>Password:<br /></label>
    <input name="password" type="password" size="15" maxlength="15" />
    </p>
    <p>
    <label>Confirm your password:<br /></label>
    <input name="pass" type="password" size="15" maxlength="15" />
    </p>
    <p>
    <label>email:<br /></label>
    <input name="email" type="text" size="15" maxlength="20" />
    </p>
    <p>
    <input type="file" name="image" value="Save" />
    </p>
    <p>
    <input type="submit" name="submit" value="Sign up" />
    </p>
    </form>   
    
    
    </body>
    </html>