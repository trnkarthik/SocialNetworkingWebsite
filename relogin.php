<?php
require_once("includes/connect.php");
require_once("includes/functions.php");
require_once("includes/session.php");
     if(logged_in())
      {
         redirect_to("index.php");
      } 
?>
    <html>
    <head>
        <title>
            Welcome to PHANTOM CMS
        </title>
        
         <link rel="stylesheet" href="stylesheets/login_page.css">
         <link rel="stylesheet" href="stylesheets/relogin_page.css">
         <link rel="stylesheet" href="stylesheets/login_options.css">
            <script type="text/javascript" src="javascript/pics_zindex.js" >
            </script>
               
    </head>
    <body>
        
        
        <div id="header">
            
        </div>
        
        <?php
            include("includes/relogin_box.php");
            
        ?>
        
        <div id="relogin_content">
            <h3 style="font-weight:normal">Error username or password submitted!!!<p></h3>
            <h4 style="font-weight:normal">Please check out caps lock button on your computer<br/></h4>

            <a href="home.php">Home</a>
                
            </span>
        </div>
        
        
                    
            <hr style="position:absolute;top:27%;width:99%">
            <hr style="position:absolute;top:85%;width:99%">
        
        
        
        <?php
            require("includes/footer.php");
        ?>
       
    </body>
</html>