<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>


<?php

    $frnd_id=$_GET['frnd_id'];
    
    $query_check1="select * from user_frnds where user_id=$frnd_id and friend_id= $user_id";
    $query_check2="select * from user_frnds where user_id=$frnd_id and friend_id= $user_id";
    $result1=mysql_query($query_check1);
    $result2=mysql_query($query_check2);
    $no_of_rows_for_check1=mysql_num_rows($result1);
    $no_of_rows_for_check2=mysql_num_rows($result2);  
    
      
    if($no_of_rows_for_check1 >0)
    {
        $main_query1="update user_frnds set response_code=2 where user_id=$frnd_id and friend_id=$user_id";
        $main_result1=mysql_query($main_query1);
        if(!$main_result1)
        {
            //echo "<script>alert('Sorry dude! try after sometime');</script>";
        }
        else
        {
            redirect_to("connection_requests.php");
        }
    }
    if($no_of_rows_for_check2 >0)
    {
        $main_query2="update user_acq set response_code=2 where user_id=$frnd_id and acq_id=$user_id";
        $main_result2=mysql_query($main_query2);
        if(!$main_result2)
        {
            //echo "<script>alert('Sorry dude! try after sometime');</script>";
        }
        else
        {
            redirect_to("connection_requests.php");
        }
    }
    else
    {
         $main_query3="insert into user_frnds(user_id,friend_id,response_code) values($user_id,$frnd_id,2)";
         $main_query4="insert into user_frnds(user_id,friend_id,response_code) values($user_id,$frnd_id,2)";
         $main_result3=mysql_query($main_query3);
         $main_result4=mysql_query($main_query4);
         if(!$main_result3)
        {
            //echo "<script>alert('Sorry dude! try after sometime');</script>";
        }
         else
         {
            redirect_to("connection_requests.php");
        }
        if(!$main_result4)
        {
            //echo "<script>alert('Sorry dude! try after sometime');</script>";
        }
         else
         {
            redirect_to("connection_requests.php");
        }
    }
    


?>