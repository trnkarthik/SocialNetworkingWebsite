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

<body >
        <!--//to display header-->
        <div id="header">
             <a href="home.php" style="position:absolute;top:9px;left:5%">Home</a>
             <a href="logout.php" style="position:absolute;top:9px;left:90%">Logout</a>

        </div>
        
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
                        <a href="connections.php?user_id=<?php echo $user_id?>">
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
        
        <div id=show_my_tricks>
        
        <!--  query for retriving all tricks of a particular user comes here-->
        
        
         <?php
         
           $trick_query="select trick,time,trick_id from trick_sharing where user_id=$user_id order by time limit 50";
           
           $tricks=mysql_query($trick_query);
           $no_of_tricks=mysql_numrows($tricks);
           $row=mysql_fetch_array($tricks);
           $trick_limit=0;
           if($no_of_tricks>0)
           {
               do
               {                             
                echo "<a href='trick_show.php?trick=$row[2]' ><div id=tricker_me >".$row[0]." <br/> at $row[1]"."<img src='images/more.png' width=15px height=15px id=more_pic>"."</div></a>"."<p>";
               }while($row=mysql_fetch_array($tricks));
               $trick_limit++;
             
           }
           else
           {
            echo "You haven't posted any tricks yet..try one !";
           }
          
          ?>
        
        
        
        
        </div> 
          
        
          
          
           
        <br/>
        <br/>        
         

</body>