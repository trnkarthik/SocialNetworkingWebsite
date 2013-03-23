      <div id=wish_disp >
            
            <a href="profile_page.php?wish_change=on">
            <img src="images/change.png" id=change_wish>
            </a>

            <?php

            $wish_query="select user_wish from user_wish where user_id=$user_id";
            $wish_res=mysql_query($wish_query);
            $wish=mysql_result($wish_res,0);
            
            echo "&nbsp;&nbsp;&nbsp;"."<a href='profile_page.php?user_id=$user_id'
                                style='color:green;text-decoration:none'>".get_user_name($user_id).
                                "</a>'s latest wish is<br/>"."&nbsp;&nbsp;&nbsp;".$wish;

            ?>
            
            
            
            
            
        </div>