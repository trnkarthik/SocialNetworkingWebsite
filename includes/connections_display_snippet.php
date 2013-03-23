<div id=friends_disp >
           
<?php

$connection_id_query="select user_id,username from users where user_id!=$user_id and
                                user_id  in(
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
                                                )
                          ";



$connection_id=mysql_query($connection_id_query);
$no_of_connections=mysql_num_rows($connection_id);

?>



<?php


 
    while($row=mysql_fetch_array($connection_id))
        {
           $k=get_profile_pic_id($row[0]);
           ?>

           <a href="profile_page.php?user_id=<?php echo $row[0] ;?>" >
          <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[0]) ;?>" width=60px height=60px
          style="border:2px solid black;padding:0px">
          </a>

          <?php
        }



?>
            
</div>