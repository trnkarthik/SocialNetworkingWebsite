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
            <?php echo $_SESSION[username]?> profile
        </title>
        
        <link rel="stylesheet" href="stylesheets/loggedin_page.css">
        <link rel="stylesheet" href="stylesheets/profile_page.css">        
        <script type="text/javascript" src="javascript/pics_zindex.js" ></script>
               
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
                
                <div id="main_profile_area">
                    
                </div>
                
                <div id="profile_tools_area">
                    
                </div>
                
                
                
                
                
                
            </div>        
        
        
        </div>
        
        <div id="profile_img">
            
        </div>
        
        <div id="user_assigned_img">
                    
        </div>

        
        
        
        
        

        
         <?php
            require("includes/footer.php");
        ?>
       
    </body>
</html>