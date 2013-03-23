<?php

require_once("session.php");
require_once("connect.php");
require_once("functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];


?>



<?php


//connect to the database

include("connect.php");


$album=$_GET['album'];
if($album==2)
{
   $album_name=$_GET['album_name'];
}
else
{
   $album_name="profile_pics";
}

echo $album_name;


$time=time()+19800;

$mysqldate = date( 'Y-m-d h:i:s', $time);

$file =$_FILES['image']['tmp_name'];

if(!isset($file))
{
   echo "Please select an image";
}
else
{
   $image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
   $image_name=addslashes($_FILES['image']['name']);
   $image_size=getimagesize($_FILES['image']['tmp_name']);

   if($image_size==false)
   {
      echo "Thats not an image";
   }
   else
   {
      $insert_query1="insert into photos(photo_name,album,posted_on,photo)
         values('$image_name','$album_name','$mysqldate','$image');";
      $insert1=mysql_query($insert_query1);
      
      $get_photoid=mysql_query("select photo_id from photos where photo_name='$image_name' and posted_on='$mysqldate'");
      $photo_id=mysql_result($get_photoid,0);
      
      $insert_query2="insert into user_photos(user_id,photo_id)
         values($user_id,$photo_id);";
      $insert2=mysql_query($insert_query2);
      
      
      if(!$insert1 || !$insert2)
      {
         die("<br/>Error is -".mysql_error());
      }
      else{
         redirect_to("update_profile_pic.php?photo_id=$photo_id");
      }
      
   }
   
}



?>
