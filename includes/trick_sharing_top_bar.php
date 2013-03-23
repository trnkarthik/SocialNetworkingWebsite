        <div id=top_bar>
         
         <a href="my_tricks.php"> <div id=top_bar_menu_item1 class=top_bar_menu > My Tricks </div> </a>
         <a href="trick_sharing.php"> <div id=top_bar_menu_item2 class=top_bar_menu > Post New Trick </div> </a>
         <a href="trick_search.php"> <div id=top_bar_menu_item3 class=top_bar_menu > Search Trick </div> </a>
               
         <center>
                <?php echo "<a href='profile_page.php?user_id=$user_id'
                         style='position:absolute;top:50%;color:#22487A;'>".$user_name."</a>"; ?>
         </center>
         <center>
          <a href='trick_sharing.php'
                         style='color:green;'>
          Trick Sharing Application
          </a>
         </center>
         
         <div id="top_bar_search" >
          <form action="trick_search.php" method="get">
         Simple Search : &nbsp;<input type="text" name="keyword">
         <input type="submit" id=submit_button value="Search">
          </form>
         </div>
        
        </div>
        
        
       