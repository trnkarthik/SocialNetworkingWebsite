<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>


<?php

    $frnd_id=$_GET['frnd_id'];
    
    $query_check="select * from user_acq where user_id=$frnd_id and acq_id= $user_id";   
    $result=mysql_query($query_check);
    $no_of_rows_for_check=mysql_num_rows($result);
    
    if($no_of_rows_for_check >0)
    {
        $main_query="update user_acq set response_code=2 where user_id=$frnd_id and acq_id=$user_id";
        $main_result=mysql_query($main_query);
        if(!$main_result)
        {
            echo "<script>alert('Sorry dude! try after sometime');</script>";
        }
        else
        {
            redirect_to("connection_requests.php");
        }
    }
    else
    {
         $main_query="insert into user_acq(user_id,acq_id,response_code) values($user_id,$frnd_id,2)";
         $main_result=mysql_query($main_query);
         if(!$main_result)
        {
            echo "<script>alert('Sorry dude! try after sometime');</script>";
        }
         else
         {
            redirect_to("connection_requests.php");
        }
    }
    


?>