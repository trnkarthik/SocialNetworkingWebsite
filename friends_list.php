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
         
         $user_id=$_GET['user_id'];
         
           $search_query="select friend_id from user_frnds where response_code=2 and
           user_id=$user_id 
           union
           select user_id from user_frnds where response_code=2 and
           friend_id=$user_id ";
                          
            
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
                        <td style="width:10%">                            

                    <a href="profile_page.php?user_id=<?php echo $row[0] ;?>" >
                    <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[0]) ;?>" width=60px height=60px
                      style="border:2px solid black;padding:0px">
                    </a>

                        </td>
                        <td style="width:20%">                            
                          <?php  echo "<a href='profile_page.php?user_id=$row[0]' >".get_user_name($row[0])." </a>";  ?>
                        </td>
                        <td valign="middle">
                             <a href="unfrnd.php?frnd_id=<?php echo $row[0];?>">Unfriend</a>
                        </td>
                    </tr>
                </table>
                </center>
                
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