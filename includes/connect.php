<?php
require("constants.php");
$db_connect = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if (!$db_connect)
{
     print "Error - Could not connect to MySQL,Database access restricted";
     exit;
}
 
$db_name=mysql_select_db(DB_NAME);
if (!$db_name)
{
     print "Error - Could not connect to MySQL:Database not found";
     exit;
}

?>