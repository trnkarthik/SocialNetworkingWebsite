<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];  
?>

<?php

$post_id=$_GET['post_id'];

$check_user_id=" select user_id from posts where post_id=$post_id ;";
$check_user_id2=mysql_query($check_user_id);
$row=mysql_fetch_array($check_user_id2);
$user_id_for_check=$row[0];

if($user_id_for_check==$user_id)
{
   $query="delete from posts where post_id=$post_id ";
   $result=mysql_query($query);
   if(!$result)
      {
       die("this is error!".mysql_error());
      }
   else
      {
       redirect_to("profile_page.php");
      } 
}
else
{
   echo "<script>alert('You dont have permission to delete this post !');</script>";
   include("profile_page.php");
}

?>