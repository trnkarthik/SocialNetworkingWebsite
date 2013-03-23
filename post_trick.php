<?php

require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];  
?>

<?php

$trick=$_POST['trick'];
$desc=$_POST['desc'];
$result=$_POST['result'];

$time=time()+19800;

$mysqldate = date( 'Y-m-d H:i:s', $time);
$phpdate = strtotime( $mysqldate );


$trick=addslashes($trick);
$desc=addslashes($desc);
$result=addslashes($result);


$query="insert into trick_sharing(trick,description,result,user_id,time,visibility) values('$trick','$desc','$result',$user_id,'$mysqldate',1)";
$result=mysql_query($query);
if(!$result)
{
   
   die("this is error!".mysql_error());
}
else
{
    echo "<script>alert('Hurray ! You have successfully posted ur trick ! try some more')</script>";
    redirect_to("trick_sharing.php");
}




?>