<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];  
?>

<?php

$post=$_POST['post'];
$time=time()+19800;

$mysqldate = date( 'Y-m-d H:i:s', $time);
$phpdate = strtotime( $mysqldate );

echo $mysqldate;

$post=addslashes($post);

$query="insert into posts(user_id,post_data,post_time,visibility) values($user_id,'$post','$mysqldate',1)";
$result=mysql_query($query);
if(!$result)
{
   die("this is error!".mysql_error());
}
else
{
    redirect_to("profile_page.php");
}
?>