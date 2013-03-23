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

<body background="red"  >
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
          
        <div id="trick_search_results_area">
         
         
         <?php
         
         //search results comes here          
         
         $keyword=$_GET['keyword'];
         $search_filter=$_GET['search_filter'];
         if(!$search_filter)
         {
          $search_filter="trick";
         }
         
           $search_query="select $search_filter,time,trick_id,user_id from trick_sharing where $search_filter like '%{$keyword}%'";
            
           $search=mysql_query($search_query);
           $no_of_search_results=mysql_numrows($search);
           $row=mysql_fetch_array($search);
            $trick_posted_by=get_user_name($row[3]);
           
           if($no_of_search_results>0)
           {
               do
               {                             
                echo "<a href='trick_show.php?trick=$row[2]' ><div id=tricker_me >".$row[0]." <br/>by".
                               
                "<a href='profile_page.php?user_id=$row[3]'
                         style='color:green;padding:5px;'>". $trick_posted_by."</a>".


                "at $row[1]"."<img src='images/more.png' width=15px height=15px id=more_pic>"."</div></a>"."<p>";
               }while($row=mysql_fetch_array($search));
               $trick_limit++;
             
           }
           else
           {
            echo "<br/><center>No results found for your query!</center>";
           }
          
                    
          ?>

         
         
         
         
         
         
         
         
         
</div>
        
        
        
        
        
        
        
        
        
         

</body>