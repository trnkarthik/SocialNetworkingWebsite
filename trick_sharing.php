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
  Trick Sharing Application
 </title>
    <link rel="stylesheet" href="stylesheets/trick_sharing.css">
    <link rel="stylesheet" href="stylesheets/loggedin_page.css">

</head>

<body>
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
                        <a href="">
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
                        <a href="connections.php">
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
          
             <div id="trick_body">
                 
                <div id=trick_help>
                 <center>?</center>
                </div>
                
                <div id=app_heart>
                 <form action="post_trick.php" method="post">
                     <table cellpadding=10px width=90%>
                         <tr>
                             <td>  Trick : </td>
                             <td>  <input type="text" style="width:75%" name="trick">  </td>
                         </tr>
                                 
                         <tr>
                             <td >     Description :  </td>
                             <td>     <textarea cols=40 rows=8 name="desc" >  </textarea> </td>
                         </tr>
                                       
                         <tr>
                             <td>     Result :  </td>
                             <td>     <input type="text" style="width:75%" name="result">   </td>
                         </tr>
                         
                         <tr>
                             <td>    </td>
                             <td align="center">     <input type="submit" id=submit_button
                                                            value="Share your trick" style="width:120px" >   </td>
                         </tr>
                         
                     </table>
                     
                 </form>                    
                     
                </div>
               
             </div>
          
         </div>
          
          
           
        <br/>
        <br/>        
         

</body>