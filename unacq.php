<?php
require_once("includes/session.php");
require_once("includes/connect.php");
require_once("includes/functions.php");
confirm_logged_in();
$user_id=$_SESSION[user_id];
$frnd_id=$_GET[frnd_id];
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
         
         
           $query1="delete from user_acq where user_id=$user_id and acq_id=$frnd_id";

           $result1=mysql_query($query1);
           if(!$result1)
           {
                $query2="delete from user_acq where acq_id=$user_id and user_id=$frnd_id";
                $result2=mysql_query($query2);
                if(!$result2)
                {
                    echo "<script>alert('delete failed!Sorry')</script>";
                }
                else
                {
                    echo "<script>alert('deleted successfully')</script>";
                }
           }
            else
            {
                    echo "<script>alert('deleted successfully')</script>";
            }
                    
                    
          ?>
        
        </div>
        
            
    </body>
</html>