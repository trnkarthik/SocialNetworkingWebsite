<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];

?>
    <html>
    <head>
        <title>
            Welcome to SNPP Hangout
        </title>
        
         <link rel="stylesheet" href="stylesheets/loggedin_page.css">
         <link rel="stylesheet" href="stylesheets/hangout.css">
         <link rel="stylesheet" href="stylesheets/login_options.css">
         <link rel="stylesheet" href="stylesheets/change_profile_pic.css">   
            
            <script type="text/javascript" src="javascript/pics_zindex.js" >
            </script>
                       
            <script>
            function f1()
            {
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block';
            }

            </script>


               
    </head>
    <body>
        
        <!--//to get lightbox effect in upload picture (used in sidebar)-->        
        <?php
        include("includes/change_profile_pic.php");
        ?>
        
        <!--//to display header-->
        <?php
        include("includes/header.php");
        ?>

        // to dispaly the main content of the page
        
        
        
        <?php
        
        include("includes/hangout_sidebar_left.php");
        include("includes/hangout_topbar.php");

        
        ?>
        
         
         <?php
        
        include("includes/tiny_album_index_page.php");

        
        ?>
         
         
         <?php
         
         /*
         
         //checking for admin 
         
          $rank_checker_query="select rank from users where user_id='{$_SESSION[user_id]}'";
          $rank_checker_result=mysql_query($rank_checker_query);
          $rank_checker=mysql_result($rank_checker_result,0);
          
          if($rank_checker==1)
          {
            //include("includes/admin_body.php");
          }
          else
          {
            include("includes/user_body.php");
          }
        
        
        */
         
        ?>     

        
        
        <div id="profile_posts" style="background:;width:75%">
           
         <?php
         
         
         $posts_query="select post_data,post_time,post_id,user_id from posts where user_id
                                in(
                                select user_id from users where 
                                    user_id  in
                                    (
                                    select user_id from user_frnds
                                    where friend_id=$user_id  and response_code=2
                                    union 
                                    select friend_id from user_frnds
                                    where user_id=$user_id  and response_code=2
                                    union
                                    select user_id from user_acq
                                    where acq_id=$user_id  and response_code=2
                                    union 
                                    select acq_id from user_acq
                                    where user_id=$user_id  and response_code=2
                                    union
                                    select user_id from users where user_id=$user_id
                                    )
                                )
                                order by post_time desc";
                                
                                
                                
         $posts=mysql_query($posts_query);
         $no_of_posts=mysql_numrows($posts);
         
         echo $no_of_posts."<br/>";
         
         if($no_of_posts%2==0)
         {
             for($i=0;$i<$no_of_posts;$i=$i+2)
              {
                  $row=mysql_fetch_array($posts);
                  
                  ?>
                  
                  <!--pic insertion starts here-->
                  
                  <a href="profile_page.php?user_id=<?php echo $row[3] ;?>"  id=post_mgmt1>
                  <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[3]) ;?>" width=60px height=60px
                      style="border:2px solid #ccc;padding:0px">
                        </a>
                  
                   <!--pic insertion ends here-->

                  <?php
                  echo "<div id='post_mgmt1'><a href='profile_page.php'>".get_user_name($row[3])."</a> updated his status as : <br/>";
                  ?>
                  
                  <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>
                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
                  $row=mysql_fetch_array($posts);
                  
                  ?>
                  
                  <!--pic insertion starts here-->
                  
                  <a href="profile_page.php?user_id=<?php echo $row[3] ;?>"  id=post_mgmt2>
                  <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[3]) ;?>" width=60px height=60px
                      style="border:2px solid #ccc;padding:0px">
                        </a>
                  
                   <!--pic insertion ends here-->

                  <?php

         
                  echo "<div id='post_mgmt2'><a href='profile_page.php'>".get_user_name($row[3])."</a> updated his status as : <br/>";
                  ?>
                  
                  <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>
                  
                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
                  
                  
                
               }
         }
         else
         {
           for($i=0;$i<$no_of_posts-1;$i=$i+2)
              {
                  $row=mysql_fetch_array($posts);
                  
                  ?>
                  
                  <!--pic insertion starts here-->
                  
                  <a href="profile_page.php?user_id=<?php echo $row[3] ;?>"  id=post_mgmt1>
                  <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[3]) ;?>" width=60px height=60px
                      style="border:2px solid #ccc;padding:0px">
                        </a>
                  
                   <!--pic insertion ends here-->

                  <?php
                  echo "<div id='post_mgmt1'><a href='profile_page.php'>".get_user_name($row[3])."</a> updated his status as : <br/>";
                  ?>
                  
                <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>              
                  

                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
                  $row=mysql_fetch_array($posts);
                  
                  ?>
                  
                  <!--pic insertion starts here-->
                  
                  <a href="profile_page.php?user_id=<?php echo $row[3] ;?>"  id=post_mgmt2>
                  <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[3]) ;?>" width=60px height=60px
                      style="border:2px solid #ccc;padding:0px">
                        </a>
                  
                   <!--pic insertion ends here-->

                  <?php     
                  
                  echo "<div id='post_mgmt2'><a href='profile_page.php'>".get_user_name($row[3])."</a> updated his status as : <br/>";
                  ?>
                  
                 <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>                
                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
               }
                 
                  $row=mysql_fetch_array($posts);
                 
                 ?>
                  
                  <!--pic insertion starts here-->
                  
                  <a href="profile_page.php?user_id=<?php echo $row[3] ;?>"  id=post_mgmt1>
                  <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[3]) ;?>" width=60px height=60px
                      style="border:2px solid #ccc;padding:0px">
                        </a>
                  
                   <!--pic insertion ends here-->

                  <?php
                 
                 
                  echo "<div id='post_mgmt1'><a href='profile_page.php'>".get_user_name($row[3])."</a> updated his status as : <br/>";
                  ?>
                  
                   <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>
                              

                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
         }
         
          echo "<br/><br/>";
          
          
         echo "<input type='hidden' value='no' id=hide_me>";


          
         ?>
         
         
         <div id="divider">
        </div>
         
        </div>        
     
     
    </body>
</html>