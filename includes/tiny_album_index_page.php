<div id=album_tiny_disp1 >
           
           <div style="position:absolute;left:2%;top:2%;height:8%;width:96%;background:#ccc">
            <center>Random Pics of your friends</center>
           </div>
          <div style="position:absolute;left:2%;top:12%">  
            <?php

            //tiny images display comes here

            $photo_query="SELECT p.photo_id from photos p,user_photos u where p.photo_id=u.photo_id and user_id
                                    in (
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
                                   order by rand() ";
            $photo=mysql_query($photo_query);
            $no_of_photos=mysql_num_rows($photo);

            ?>

            <?php


            $pic_count=0;

            while($row=mysql_fetch_array($photo))
                {
                    if($pic_count<=26)
                       {
                          if($no_of_photos <= 27)
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


<div id=album_tiny_disp2 >
           
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