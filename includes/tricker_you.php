<?php
         
           $trick_query="select trick,time,trick_id from trick_sharing order by time desc limit 8";
           
           $tricks=mysql_query($trick_query);
           $no_of_tricks=mysql_numrows($tricks);
           $row=mysql_fetch_array($tricks);
           if($no_of_tricks>0)
           {
             
               do
               {                             
                echo "<a href='trick_show.php?trick=$row[2]'><div id=tricker_me >".$row[0]." <br/> at $row[1]"."<img src='images/more.png' width=15px height=15px id=more_pic>"."</div></a>"."<p>";
               }while($row=mysql_fetch_array($tricks));

           }
           else
           {
            echo "You haven't posted any tricks yet..try one !";
           }
          
          ?>
           
           