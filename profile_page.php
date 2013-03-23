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
function get_id_for_del()
{
    echo "hi";
}

?>
    <html>
    <head>
        <title>
            <?php echo $_SESSION[username]?> profile
        </title>

        <link rel="stylesheet" href="stylesheets/loggedin_page.css">
        <link rel="stylesheet" href="stylesheets/profile_page.css">
        <link rel="stylesheet" href="stylesheets/change_profile_pic.css">  
        <script type="text/javascript" src="javascript/pics_zindex.js" ></script>
            
        <script>
        
        
        //global variable
        
        var global_url='nill';
        
        function show_change_pic()
        {
            var k=document.getElementById("change_profile_img");
            k.style.visibility='visible';
        }
        function hide_change_pic()
        {
            var k=document.getElementById("change_profile_img");
            k.style.visibility='hidden';
        }
        function delete_invoke(k)
        {
            alert(k);
            
            /*
            var p=document.getElementById("hide_me");
            p.value=this.id;
            alert(p.value);
            
            t="<?php get_id_for_del() ;?>";
            y=this.value;
            alert(y);
            var k=confirm("Do you want to really delete the post ?");
            if(k==true)
            {
                window.location="home.php";
            }
            */
        }
        </script>          
               
    </head>
    <body>
        <!--//to display header-->
        <?php
        include("includes/header.php");
        ?>

        <!--to dispaly the main content of the page-->
        
        <div id="content">
        
             <!--//to display profile and user details....pic is not included--> 
            <div id="profile_area">
            
                <div id="profile_name_area">
                    This is  <a href="http://localhost/phantom/profile_page.php?user_id=<?php echo $user_id; ?>"><?php echo get_user_name($user_id); ?></a>
                </div>
                <div id="main_profile_area">
                    main profile area
                    
                </div>
                
                <!-- tab styled icons will be dealt here dude !this is simple stuff..but im added a bigggg div tag
                    named 'tabber' to integrate all the tabs just to keep the things simple.Tabber contains all the tabs.
                    Nice name huh !Dont confuse about tabber when you come back --> 
                
                <div id="tabber">
                
                <a href="photo_album.php">
                <div id="pics_tab" class=tab_global>
                    <img src="images/gallery.png" width=100% height=100% >
                </div>
                </a>
                
                <a href="">
                <div id="diary_tab" class=tab_global>
                    <img src="images/online_diary.png" width=100% height=100% >
                </div>
                </a>
                
                <a href="trick_sharing.php">
                <div id="trick_tab" class=tab_global>
                    <img src="images/trick_sharing.png" width=100% height=100% >
                </div>
                </a>
                
                <a href="connections.php">
                <div id="friends_tab" class=tab_global>
                    <img src="images/friends.png" width=100% height=100% >
                </div>
                </a>
                
                <a href="help.php">
                <div id="help_tab" class=tab_global>
                    <img src="images/help.png" width=95% height=95% >
                </div>
                </a>
                
                </div>
                
                

                <div id="profile_tools_area">
                    
                  <!-- Hey dude!  profile options comes here.i have used class method to link the style sheets because
                            i am using the same class for all the options -->
                    
                    
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
                        
                     
                    <div class=profile_options>
                        <a href="help.php?user_id=<?php echo $user_id?>">
                    <img src="images/gallery.png" class=profile_options_img >
                    <center>
                    Help
                    </a>
                    </center>

                    </div>
                        
                    
                    
                                               
                </div>
                
                <!--
                <div id="edit_profile">
                    <div style="margin-bottom:5px;margin-top:5px;font-style:italic;font-weight:bold"><center>Edit Profile</center></div>
                </div>
                -->
                
            </div>        
        
        </div>
        
        <div id="profile_img" onmouseover="show_change_pic()" onmouseout="hide_change_pic()">
            <div id="change_profile_img"  style="visibility:hidden;position:absolute;top:0px;background:white">
                
                
                
                <a href = "javascript:void(0)"
                   onclick = "document.getElementById('light_new').style.display='block';document.getElementById('fade_new').style.display='block'">
                Upload New Picture</a>
                   
            </div>
            
            <?php
            $k=get_profile_pic_id($user_id);
            if(!$k)
            {
                $k=87;
            }
            ?>
            
            <img src="includes/getpic.php?photo_id=<?php echo $k;?>" style="width:100%;height:100%">
        </div>
         
        <!--main area for posts and comments kinda personal hangout spot-->
          
        <div id="update_post">
           
           <form action="update_post.php" method="post" >
           
            
            Update Post:
           <textarea rows=3 cols=50 name="post" style="position:relative;top:6px">
            write something
           </textarea>
            
            <input type="submit">
                
                
           </form>
           
           <a href = "javascript:void(0)"
                   onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
          
           <div id="update_post_add_pic">
            <img src="images/add_pics.png" height=100% width=100% >
           </div>
           
           <!--
           <div id="update_post_add_diary">
            <img src="images/add_diary.png" height=100% width=100% >
           </div>
          -->
       
           </a>      <!-- hyperlink ends here -->
 
             
        </div>
    
        <!-- Connections will be displayed here -->
        
        <?php
        
        include("includes/connections_display_snippet.php");
        
        ?>
         
         <?php
          
             $wish_change=$_GET['wish_change'];
             
             if($wish_change=='on')
            {
              include("includes/user_wish_change.php");
            }
            else
            {
              include("includes/user_wish.php");
            } 
             
         ?> 
           
         
        <div id=album_tiny_disp >
           
           <div style="position:absolute;left:2%;top:2%;height:8%;width:96%;background:#ccc">
            <center>Your Pics</center>
           </div>
          <div style="position:absolute;left:2%;top:12%">  
            <?php

            //tiny images display comes here

            $photo_query="SELECT p.photo_id from photos p,user_photos u where p.photo_id=u.photo_id and user_id=$user_id order by rand() ";
            $photo=mysql_query($photo_query);
            $no_of_photos=mysql_num_rows($photo);

            ?>

            <?php

            //get some random pic numbers

            /*
             for($i=0;$i<=15;)
                 {
                       $temp_rand=rand(1,$no_of_photos);
                       if(check_rand_repeat($pic_print_key,$temp_rand)==1)
                       {
                         $pic_print_key[$i]=$temp_rand;
                           $i++;
                       }
                        else
                        {
                    
                         }
                 }

            */

            $pic_count=0;

            while($row=mysql_fetch_array($photo))
                {
                    if($pic_count<=14)
                       {
                          if($no_of_photos <= 15)
                            {
                               echo "
                               <img src='includes/getpic.php?photo_id= $row[0]' width=80px height=60px style='padding:3px 3px 3px 3px;'>";
                                $pic_count++;
                            }
                          else
                            {
                               echo "<img src='includes/getpic.php?photo_id= $row[0]' width=80px height=60px style='padding:3px 3px 3px 3px;'>";
                               $pic_count++;
                            }
                       }
                    else
                        {
                            break;
                        }
                 }
  
?>

      </div>   
                        
        </div>        
       
        
        <div id="profile_posts">
           
         <?php
         
         
         $posts_query="select post_data,post_time,post_id from posts where user_id=$user_id order by post_time desc";
         $posts=mysql_query($posts_query);
         $no_of_posts=mysql_numrows($posts);
         
         echo $no_of_posts;
         
         if($no_of_posts%2==0)
         {
             for($i=0;$i<$no_of_posts;$i=$i+2)
              {
                  $row=mysql_fetch_array($posts);
                  echo "<div id='post_mgmt1'><a href='profile_page.php'>".get_user_name($user_id)."</a> updated his status as : <br/>";
                  ?>
                  
                  <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>
                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
                  $row=mysql_fetch_array($posts);
                  echo "<div id='post_mgmt2'><a href='profile_page.php'>".get_user_name($user_id)."</a> updated his status as : <br/>";
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
                  echo "<div id='post_mgmt1'><a href='profile_page.php'>".get_user_name($user_id)."</a> updated his status as : <br/>";
                  ?>
                  
                <a href="delete_post.php?post_id=<?php echo $row[2]; ?>">
                  <div class="post_options_button">
                   <img src="images/trash.png" width=100% height=100% > 
                  </div>                  
                  </a>              
                  

                  
                  <?php
                  echo $row[0]." <br/>at <i>".$row[1]."</i><br/></div>";
                  $row=mysql_fetch_array($posts);
                  echo "<div id='post_mgmt2'><a href='profile_page.php'>".get_user_name($user_id)."</a> updated his status as : <br/>";
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
                  echo "<div id='post_mgmt1'><a href='profile_page.php'>".get_user_name($user_id)."</a> updated his status as : <br/>";
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
        
        <br/><br/><br/>
        
         <?php
                include("includes/change_profile_pic.php");
                include("includes/real_change_profile_pic.php");
         ?>
        
        
        
        <?php
            //require("includes/footer.php");
        ?>
        

    </body>
</html>