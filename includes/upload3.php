<?php

require_once("session.php");
require_once("connect.php");
require_once("functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>


<?php

$permission=chmod("/users/", 0777); 



if(!$permission)
{
   echo "not changed perm";
}
else{
   echo "perm changed";
}
//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","1000"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted
 if(isset($_POST['Submit'])) 
 {
 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
        
        echo "<br/>image:".$image;
        
 	//if it is not empty
 	if ($image) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		//print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errors=1;
 		}
 		else
 		{
//get the size of the image in bytes
 //$_FILES['image']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['image']['tmp_name']);

echo "<br/>size : " .$size."<br/>";


//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	echo '<h1>You have exceeded the size limit!</h1>';
	$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//the new name will be containing the full path where will be stored (images folder)
$newname="/users/".$image;

echo $newname;

//we verify if the image has been uploaded, and print error instead
$copied =@copy($_FILES['image']['tmp_name'], $newname);

echo "<br/>file :".$_FILES['image']['tmp_name']."<br/>";

if($_FILES['image']['tmp_name']==null)
{
   echo "file not set";
}




echo ( is_writable('/users/') ) ? 'writable' : 'not writable'; 





if (!$copied) 
{
	echo '<h1>Copy unsuccessfull!</h1>';
	$errors=1;
}



$move=move_uploaded_file($_FILES["file"]["tmp_name"],
      "users/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "users/" . $_FILES["file"]["name"];

if(!$move)
{
   echo "<br/>no move<br/>";
}





}}}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
 	echo "<h1>File Uploaded Successfully! Try again!</h1>";
 }
 
 
 if(!isset($_POST['submit']))
 {
   echo "post not set";
 }

 ?>









 <!--next comes the form, you must set the enctype to "multipart/frm-data" and use an input type "file" -->
 <form name="newad" method="post" enctype="multipart/form-data"  action="">
 <table>
 	<tr><td><input type="file" name="image"></td></tr>
 	<tr><td><input name="Submit" type="submit" value="Upload image"></td></tr>
 </table>	
 </form>
  