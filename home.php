<?php require_once("includes/connect.php");
require_once("includes/functions.php");
require_once("includes/session.php");
     if(logged_in())
      {
         redirect_to("index.php");
      }
?>
    <html> <head>
        <title>
            Welcome to PHANTOM CMS
        </title>
        
        <link rel="stylesheet" href="stylesheets/login_page.css">
        <link rel="stylesheet" href="stylesheets/login_options.css">
        <script type="text/javascript" src="javascript/pics_zindex.js" ></script>
        <script type="text/javascript" src="javascript/link_functions.js" ></script>
        <script type="text/javascript" src="javascript/login_form_validation.js" ></script>

    </head>
    <body>
        
        
        <div id="header">
            
        </div>
        
        <?php
            include("includes/login_box.php");
            
        ?>
        
        <div id="content">
            <h2 style="font-weight:normal">Manage your content quickly,easily
            and effectively.<br/></h2> <h3 style="font-weight:normal">Still dont
            have an account.Create one here... </p>
           
            </h3>
            
            <div id="content_reg_form">
              
            <!--We can use table here.but i personally hate table in html.So I used space char (&nbsp;) :) -->
               
            <form action="new_user_reg.php" method="post" >
           &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
           <h3 style="position:absolute;top:10%;left:3%; font-weight:normal">
                    Username : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" style="position:absolute;top:7%;left:95%; font-weight:normal" class=sha name="username" id=un></h3>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
           <h3 style="position:absolute;top:40px;left:3%; font-weight:normal">Password
           :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="password" style="position:absolute;top:7%;left:95%; font-weight:normal" class=sha name="passwd1" id=pwd1></h3>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <h3 style="position:absolute;top:80px;left:3%; font-weight:normal">Retype
           Password :&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="password" style="position:absolute;top:7%;left:95%; font-weight:normal" class=sha name="passwd2"
                            id=pwd2></h3>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <h3 style="position:absolute;top:120px;left:3%; font-weight:normal">Email
           :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" style="position:absolute;top:7%;left:95%; font-weight:normal" class=sha name="email1"
                            id=em1></h3>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <h3 style="position:absolute;top:160px;left:3%; font-weight:normal">Retype
           Email
           :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" style="position:absolute;top:7%;left:95%; font-weight:normal" class=sha name="email2"
                            id=em2><p/><br/></h3>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" style="position:relative;top:228px;left:0%; font-weight:normal" value="Sign up" id="submit"
                            onclick="validate_form()">
             
            </form>
            
            </div>
            
            <hr style="position:absolute;top:25%;width:75%">
            <hr style="position:absolute;top:91%;width:75%">
                
            </span>
        </div>
        
        <div id=login_search_box>
            
            <h2 style="font-weight:normal;position:relative;left:10%">Check if your friends are here<br/></h2>
            
            <input type="text" id="search_frnds" value="" name="search_query">

            <img src="images/search.jpg" width=30px height=30px id="search_frnds_pic" style="z-index:10"
            onclick="link_me()">
                
              <!-- To add some space after search box -->  
              <p><p>  
            <hr>
              <!-- Random pics comes here -->
              
              
              
              
              <?php

$connection_id_query="select user_id from users order by rand() limit 8";



$connection_id=mysql_query($connection_id_query);
$no_of_connections=mysql_num_rows($connection_id);

?>



<?php


 
    while($row=mysql_fetch_array($connection_id))
        {
           $k=get_profile_pic_id($row[0]);
           ?>

           <a href="profile_page.php?user_id=<?php echo $row[0] ;?>" >
          <img src="includes/getpic.php?photo_id=<?php echo get_profile_pic_id($row[0]) ;?>" width=50px height=50px
          style="position:relative;
          top:0px;left:10%;
          border:2px solid #ccc;
          padding:0px;
          border:1px solid #ccc;
          -moz-box-shadow: 5px 5px 5px #ccc;
          -webkit-box-shadow: 5px 5px 5px #ccc;
          box-shadow: 5px 5px 5px #ccc;">
          </a>

          <?php
        }



?>  
              
              
              
              
              
              
              
                
            
        </div>
        
        
        
        
        
        <?php
            require("includes/footer.php");
        ?>
       
    </body>
</html>