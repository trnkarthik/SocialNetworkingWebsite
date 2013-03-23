<?php

require_once("includes/connect.php");
require_once("includes/functions.php");
require_once("includes/session.php");

$username=$_POST["username"];
$password1=$_POST["passwd1"];
$email1=$_POST["email1"];
$hashed_password=sha1($password1);


$query="insert into users(username,hashed_password,email,rank) values('{$username}','{$hashed_password}','{$email1}',10)";
$result=mysql_query($query);


//checking query status

if(!$result)
{
    echo "done wrong";
    redirect_to("home.php");
}
else
{
    $query="select user_id,username from users
        where username='{$username}' and hashed_password='{$hashed_password}' ";
    $result_set=mysql_query($query);
    $found_user=mysql_fetch_array($result_set);
    $_SESSION[user_id]=$found_user['user_id'];
    $_SESSION[username]=$found_user['username'];
    
    $pic_query="insert into profile_pic(user_id,photo_id) values($_SESSION[user_id],87)";
    $pic_query_res=mysql_query($pic_query);
    
    if(!$pic_query_res)
    {
        echo "<script>alert('error in dealing with profile picture! try manually')</script>";      
    }
    else
    {    
    redirect_to("index.php");
    }  
    
}
?>