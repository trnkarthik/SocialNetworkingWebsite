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

$trick_id=$_GET['trick'];

?>
 <title>
  Trick Sharing Application
 </title>
    <link rel="stylesheet" href="stylesheets/trick_sharing.css">
    <link rel="stylesheet" href="stylesheets/loggedin_page.css">

<script>
function show_trick_help()
{
 document.getElementById("trick_help_hidden").style.visibility='visible';
}
function hide_trick_help()
{
 document.getElementById("trick_help_hidden").style.visibility='hidden';
}

</script>

</head>

<body style="z-index:1" ondblclick=hide_trick_help() >
        <!--//to display header-->
        <?php
        include("includes/header.php");
        ?>
        
        <?php
          include("includes/trick_sharing_top_bar.php");
        ?>
        
        <div id=sidebar_left>
         
        <div id=sidebar_left_toppers>
         
                    <div class=profile_options>
                       <a href="photo_album.php?user_id=<?php echo $user_id?>">
                    <img src="images/gallery.png" class=profile_options_img >
                    <center>
                    Photo Albums
                    </a>
                    </center>

                    </div>
                        
                     
                    <div class=profile_options>
                        <a href="photo_album.php?user_id=<?php echo $user_id?>">
                    <img src="images/online_diary.png" class=profile_options_img >
                    <center>
                    Online Diary
                    </a>
                    </center>

                    </div>
                        
                     
                    <div class=profile_options>
                        <a href="trick_sharing.php?user_id=<?php echo $user_id?>">
                    <img src="images/trick_sharing.png" class=profile_options_img style="left:10px; width:50px">
                    <center>
                    Share a Trick
                    </a>
                    </center>

                    </div>
                        
                     
                    <div class=profile_options>
                        <a href="photo_album.php?user_id=<?php echo $user_id?>">
                    <img src="images/friends.png" class=profile_options_img >
                    <center>
                    Friends
                    </a>
                    </center>

                    </div>
         
         
        </div>
         
         <!-- your latest tricks comes here ! -->
         
         <div id="your_tricks">
          
          <div id=your_tricks_title>
              <center>Your Recent Tricks</center>
           </div>
          
          <?php 
          include("includes/tricker_me.php");
          ?>
          
          
         </div>
         
        </div>
        
        <div id=sidebar_right>
          
           <div id=sidebar_right_title >
              <center>Recent Tricks posted on snpp</center>
           </div>
           
           
           <?php 
          include("includes/tricker_you.php");
          ?>
     
        </div>
        
          <?php
           include("includes/trick_search_form.php");
        ?>
          
         <div id=trick_area>
          
          <?php
           
           //to get the data of a trick
           
          
           $trick_query="select trick,description,result,user_id,time
           from trick_sharing where trick_id=$trick_id ";
           
           $tricks=mysql_query($trick_query);
           $no_of_tricks=mysql_numrows($tricks);
           $row=mysql_fetch_array($tricks);
           $trick=$row[0];
           $description=$row[1];
           $result=$row[2];
           $trick_posted_id=$row[3];
           $trick_posted_by=get_user_name($trick_posted_id);
           $posted_at=$row[4];

          ?>          
          
             <div id="trick_body">
                 
                <div id=trick_help onclick=show_trick_help() onkeypress=show_trick_help() onmousedown=show_trick_help()>
                 <center>?</center>
                </div>
                
                <div id=trick_help_hidden style="visibility:hidden">
                 
                </div>
                
                <div id=app_heart>
                 <form action="post_trick.php" method="post">
                      
                     <table cellpadding=10px width=90%>
                         <tr>
                             <td > Trick by :<br/> <?php echo "<a href='profile_page.php?user_id=$trick_posted_id'
                             style='color:#22487A'>".$trick_posted_by ;?> </td>
                             <td> at :<br/><?php echo $posted_at ;?> </td>
                         </tr>
                         
                         <tr>
                             <td>  Trick : </td>
                             <td><textarea cols=30 rows=2 name="desc" disabled="disabled"> <?php echo $trick; ?>
                             </textarea> </td>
                         </tr>
                                 
                         <tr>
                             <td >     Description :  </td>
                             <td>     <textarea cols=40 rows=8 name="desc" disabled="disabled"> <?php echo $description; ?>
                             </textarea> </td>
                         </tr>
                                       
                         <tr>
                             <td>     Result :  </td>
                             <td>
                             <textarea cols=30 rows=2 name="desc" disabled="disabled"> <?php echo $result; ?>
                             </textarea></td>
                         </tr>
                         
                         
                         
                     </table>
                     
                 </form>                    
                     
                </div>
               
             </div>
          
         </div>
          
          
        
        <br/>
        <br/>
        <center>Dude ,<?php echo "<a href='profile_page.php?user_id=$user_id'>".$user_name."</a>"; ?>!
        Share a trick man.. </center>
        
         

</body>