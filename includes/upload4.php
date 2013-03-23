<?php

require_once("session.php");
require_once("connect.php");
require_once("functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>


<?php

//have to implement  couple of functions

function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }











if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
   echo "File ". $_FILES['userfile']['name'] ." uploaded successfully.\n";
   $target_dir="users/";
   
   if(is_writable($target_dir))
   {
      echo "<br/>writable";
   }
   else
   {
      echo "<br/>not writable";
      $change_mode=chmod($target_dir,0777);
      if($change_mode)
      {
         echo "<br/>mode changed";
      }
      else
      {
         echo "<br/>mode not changed";
      }
      
   }
   
   
  //copying  
 /*
    $copy_stat=copy($_FILES['userfile']['name'],$target_dir."t");
   if(!$copy_stat)
   {
      echo "file not copied to location";
   }
   else{
      echo "file copy success!";
   }
 */
 
 //moving file
   move_uploaded_file($_FILES['userfile']['tmp_name'],$target_dir."t.jpg");
 
 
 
 
 
}
else
{
   echo "Possible file upload attack: ";
   echo "filename '". $_FILES['userfile']['tmp_name'] . "'.";
}


 ?>









 <!--next comes the form, you must set the enctype to "multipart/frm-data" and use an input type "file" -->
 <form name="newad" method="post" enctype="multipart/form-data"  action="">
 <table>
 	<tr><td><input type="file" name="image"></td></tr>
 	<tr><td><input name="Submit" type="submit" value="Upload image"></td></tr>
 </table>	
 </form>
  