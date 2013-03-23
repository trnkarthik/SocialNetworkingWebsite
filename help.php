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
        
        
        
        <?php
        
        include("includes/hangout_sidebar_left.php");
        include("includes/hangout_topbar.php");

        
        ?>
        
        <div id="help_area">
           
            <a href="#1" >How to sign up</a> <br/>
            <a href="#2" >How to update posts</a> <br/>
            <a href="#3" >How to update Photos</a> <br/>
            <a href="#4" >How to share a trick</a> <br/>
            <hr/> 
            
            <label id=1>
                How to sign up <br/>
                <pre>
                    
	1. Enter the SNPP website URL in the browser address bar and hit enter.
	2. Select the sign up button on the main page of the website.
	3. Fill up the form with the required mandatory details asked like "First Name" "Last Name" "Age" "Sex" etc.
	4. Choose a unique username for your profile.
	5. Create a strong password for your account security.
	6. Accept the terms and conditions set by the website.
	7. Hit the sign-up button to create your account and enjoy making contact with your friends and making new contacts.
	8. If there is an error in the sign-up form like your selected user name, please re-enter your desired username and password in their respective fields and repeat the procedure.
                </pre>
                
            </label>
            
            <label id=2>
                How to update posts
                <pre>
                    
	1. Log in to the SNPP site using your username and password.
	2. Select the update status option on your SNPP wall.
	3. Update your desired status or post or photo in the status bar.
	4. Hit the post button below the update status bar.
	5. Your desired status or post or photo will be updated on which ever wall you posted it.
                </pre>
            </label>
            
            <label id=3>
                How to update Photos
                <pre>
                    
	1. Log in to the SNPP site using your username and password.
	2. Select the photos option on your wall.
	3. Select the upload photos option in your photos page.
	4. Here you will be asked if you want to upload your desired photos in a new album or in an existing one.
	5. If you wish to upload photos in a new album, select the option create a new album.
	6. A new album will be created which you can name according to your comfort.
	7. Upload your desired photos in this new album.
	8. If you wish to upload your photos in an existing album, select your desired album and upload your photos in it.
                </pre>
            </label>
            
            <label id=4>
                How to share a trick
                <pre>
                    
	1. The SNPP provides a new feature "Trick Sharing".
	2. In this feature, you can share various tricks and their descriptions of yours to your friends and aquiantances. 
	3. Select the trick sharing option from the tabber on your homepage.
	4. On the trick sharing page, you will be provided with three fields to fill up: The name of your trick, The description of your trick, The result of your trick.
	5. After you finish filling the details of your trick, you can share your trick with your friends and aquiantances by clicking on the share button.
	6. You can also search for other tricks by entering the name of your desired trick in the trick search bar on your trick sharing wall and hit enter.
                </pre>
            </label>
            
            
            
        </div>


     
     
    </body>
</html>