 <div id=top_bar>
         
         <a href="profile_page.php?user_id=<?php echo $user_id; ?>" style="color:#22487A">
         
         <div id="hero_img">
         <a href="profile_page.php?user_id=<?php echo $user_id ;?>" >
                 <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($user_id) ;?>" width=100% height=100%
                      style="border:2px solid #ccc;padding:0px">
                 </a>
         </div>
         
         <div id="hero_name">
                <br/>
                 <center>
                        
                 <a href="profile_page.php?user_id=<?php echo $user_id ;?>" >        
                 <?php echo $_SESSION[username];  ?>
                 </a>
                 </center>
         </div>
         </a>

         
         <div id="top_bar_search" >
          <form action="search_connections.php" method="get">
         Find Connections : &nbsp;<input type="text" name="keyword">
         <input type="submit" id=submit_button value="Search">
          </form>
         </div>
        
        </div>
        
        