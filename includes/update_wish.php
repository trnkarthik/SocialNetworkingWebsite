<?php

require_once("session.php");
require_once("connect.php");
require_once("functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>

<?php

$wish=$_GET['latest_wish'];

$top_query="select * from user_wish where user_id=$user_id";
$top_query_res=mysql_query($top_query);
$top_query_res_rows=mysql_numrows($top_query_res);

if($top_query_res_rows>0)
{
    $query="update user_wish set user_wish='$wish' where user_id=$user_id ";
    $result=mysql_query($query);

    if(!$result)
    {
      echo "Sorry ! Try again after some time ";
    }
    else
    {
      redirect_to("../profile_page.php");
    }
}
else
{
    $query="insert into user_wish(user_id,user_wish) values($user_id,'$wish')";
    $result=mysql_query($query);

    if(!$result)
    {
      echo "Sorry ! Try again after some time ";
    }
    else
    {
      redirect_to("../profile_page.php");
    }
}

?>
