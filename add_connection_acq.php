<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>


<?php

    $frnd_id=$_GET['frnd_id'];
    
    $query="insert into user_acq(user_id,acq_id,response_code) values($user_id,$frnd_id,1)";
    $result=mysql_query($query);
    
    if(!$result)
    {
        echo "<script> alert('retry please');<script>";
        redirect_to("search_connections.php");
    }
    else
    {
        redirect_to("search_connections.php");
    }

?>