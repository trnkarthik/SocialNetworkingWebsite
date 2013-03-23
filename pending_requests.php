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
         <link rel="stylesheet" href="stylesheets/connections.css">   
            
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
        
        <div id="main_search" >
          <form action="search_connections.php" method="get">
         Find Connections : &nbsp;<input type="text" name="keyword">
         <input type="submit" id=submit_button value="Search">
          </form>
         </div>
       
        
        <?php
        
        include("includes/hangout_sidebar_left.php");
        include("includes/hangout_topbar.php");
     
        
        ?>
        
        <div id="results_area">   
        
        <hr/>
        
        <?php
         
         
         //search results comes here          
         
         $keyword=$_GET['keyword'];
         
           $search_query="select user_id,username from users where user_id!=$user_id and
                                user_id in(
                                    select friend_id from user_frnds
                                    where user_id=$user_id and response_code=1
                                    union
                                    select acq_id from user_acq
                                    where user_id=$user_id and response_code=1
                                                )
                          ";
       

           $search=mysql_query($search_query);
           $no_of_search_results=mysql_numrows($search);
           $row=mysql_fetch_array($search);
           
           if($no_of_search_results>0)
           {
               do
               {
                ?>
                <center>
                <table width=80%>
                    <tr>
                        <td style="width:25%">
                            
                            
<a href="profile_page.php?user_id=<?php echo $row[0] ;?>" >
                  <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[0]) ;?>" width=60px height=60px
                      style="border:2px solid black;padding:0px">
                        </a>
                        </td>
                        
                        <td style="width:25%">                            
                          <?php  echo "<a href='profile_page.php?user_id=$row[0]' >".$row[1]." </a>";  ?>
                        </td>
                       <!--
                        <td valign="middle">
                             <a href="add_connection_frnd.php?frnd_id=<?php echo $row[0];?>">Add connection as friend</a>
                        </td>
                        <td valign="middle">
                             <a href="add_connection_acq.php?frnd_id=<?php echo $row[0];?>">Add connection as Acquaintance</a>
                        </td>
                        -->        
        
                    </tr>
                </table>
                </center>
                
                <hr/>
                
                <?php
                               
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
</html>