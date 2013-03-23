<?php
require_once("session.php");
require_once("connect.php");
require_once("functions.php");

?>
<?php
$user_id=$_SESSION[user_id];  
$photo_id=$_REQUEST['photo_id'];
include("connect.php");
$image_query=mysql_query("select photo from photos p,user_photos u
        where p.photo_id=u.photo_id and
        p.photo_id= $photo_id ");
$image=mysql_result($image_query,0);
ob_clean();
header("Content-Type: image/jpeg");
echo $image;
?>