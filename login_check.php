<?php

require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");

// check the validation of login page and redirects to corresponding page depending on the result
$username=$_POST['username'];
$password=$_POST['password'];
$hashed_password=sha1($password);


$query="select user_id,username from users
        where username='{$username}' and hashed_password='{$hashed_password}' ";
$result_set=mysql_query($query);


if(mysql_num_rows($result_set)==1)
{
    $found_user=mysql_fetch_array($result_set);
    $_SESSION[user_id]=$found_user['user_id'];
    $_SESSION[username]=$found_user['username'];
    redirect_to("index.php");
}
else
{
    redirect_to("relogin.php");    
}


?>