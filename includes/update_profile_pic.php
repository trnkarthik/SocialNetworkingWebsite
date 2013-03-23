<html>
<head>
 
<?php
require_once("session.php");
require_once("connect.php");
require_once("functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];
$photo_id=$_GET['photo_id'];
$user_name=get_user_name($user_id);

?>
 
</head>

<body>

<?php

$photo_id=$_GET['photo_id'];

$top_query="select * from profile_pic where user_id=$user_id";
$top_query_res=mysql_query($top_query);
$top_query_res_rows=mysql_numrows($top_query_res);

if($top_query_res_rows>0)
{
    $query="update profile_pic set photo_id=$photo_id where user_id=$user_id ";
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
    $query="insert into profile_pic(user_id,photo_id) values($user_id,$photo_id)";
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




</div>
</body>

</html> 