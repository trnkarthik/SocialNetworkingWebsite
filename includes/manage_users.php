Admins can only view this page


<?php

require_once("connect.php");

$user_show="select user_id,username from users";
$user_show_result=mysql_query($user_show);
if(!$user_show_result){
    die(mysql_error());
}
else{

echo "<table border=1px bgcolor=white cellspacing=1 id='tab_style'>";
     echo "<tr>";
     echo "<th style='width:10%;color:red;background:#ECE5B6'></th>";
     echo "<th style='width:10%;color:red;background:#ECE5B6'>User ID</th>";
     echo "<th style='width:10%;color:red;background:#E0FFFF'>Username</th>";
     
     while($row=mysql_fetch_array($user_show_result))
     {
      echo "<tr>";
      echo "<td style='background:#E0FFFF'><center><input type='checkbox'></center></td>";
      echo "<td style='background:#E0FFFF'><center>".$row[0]."</center></td>";
      echo "<td style='background:#ECE5B6'><center>".$row[1]."</center></td>";
      echo "<tr>";
     }
 
 
     echo "</table>";
}



?>