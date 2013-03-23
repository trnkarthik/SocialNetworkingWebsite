<html>
<head>
 
<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_identity=$_SESSION[user_id];
$user_id=$_GET['user_id'];
if(!$user_id)
{
 $user_id=$user_identity;
}
$user_name=get_user_name($user_id);

?>
 
 <title>
  Photo Album of <?php echo $user_name; ?> 
 </title>
<link rel="stylesheet" href="stylesheets/change_profile_pic.css">
<link rel="stylesheet" href="stylesheets/loggedin_page.css">
<link rel="stylesheet" href="stylesheets/photo_album.css">

<script>
function f1()
{
 document.getElementById('light').style.display='block';
 document.getElementById('fade').style.display='block';
}

</script>

</head>

<body>

<!--//to display header-->
        <?php
        include("includes/header.php");
        ?>



<a href = "javascript:void(0)" 
                   onclick = f1() style="position:absolute;top:10%;z-index:10" >
                   +Upload New Picture</a>


<?php
include("includes/change_profile_pic.php");
?>
<br/>


<div id="photo_heading">

<center><h2>Photo Album of <?php echo "<a href='profile_page.php?user_id=$user_id'>".$user_name."</a>"; ?> </h2><br/></center>

<?php

$select_pic=$_GET['select_pic'];

$album_query="SELECT distinct(p.album)  from photos p ,user_photos u where p.photo_id=u.photo_id
                and u.user_id=$user_id";
$albums=mysql_query($album_query);
$no_of_albums=mysql_num_rows($albums);
while($album_row=mysql_fetch_array($albums))
    {
      echo $album_row[0]."<br/>";
    }
?>

<hr style="width:100%" >

</div>
<?php


$photo_query="SELECT p.photo_id from photos p,user_photos u where p.photo_id=u.photo_id and user_id=$user_id order by posted_on desc";
$photo=mysql_query($photo_query);
$no_of_photos=mysql_num_rows($photo);

?>

<div id="picture_perfect">

<?php

if($select_pic=='on')
{
    while($row=mysql_fetch_array($photo))
        {
      
          echo "<div style='width:400px;border:1px solid black;padding:4px'><a href='includes/getpic.php?photo_id= $row[0]' >
          <img src='includes/getpic.php?photo_id= $row[0]' width=80px height=80px
          style='position:relative;left:10px;border:2px solid black;padding:10px 10px 10px 10px'>
          </a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo "<a href='includes/update_profile_pic.php?photo_id= $row[0]' style='color:green;text-decoration:none'>
          make this your profile picture</a>";
          echo "</div>";
      
        }
}
else{
 
    while($row=mysql_fetch_array($photo))
        {
      
          echo "<a href='includes/getpic.php?photo_id= $row[0]' >
          <img src='includes/getpic.php?photo_id= $row[0]' width=260px height=260px
          style='border:2px solid black;padding:10px 10px 10px 10px'>
          </a>";
      
        }
        
}




?>

</div>
</body>

</html> 