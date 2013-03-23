<?php
    require_once("includes/connect.php");
    $man=$_GET['query'];
    
    $find_man="select username from users where username like '%{$man}%'";
    $find_man_res=mysql_query($find_man);
?>
<?php
    function display_frnds()
    {
    echo "<table border=1px bgcolor=white cellspacing=1 id='tab_style'>";
     echo "<tr>";
     echo "<th style='width:10%;color:red;background:#ECE5B6'>User ID</th>";


    while($row=mysql_fetch_array($find_man_res))
    {
      echo "<tr>";
      echo "<td style='background:#E0FFFF'><center>".$row[0]."</center></td>";
      echo "<tr>";
    }
    echo "</table>";
    }
    
?>

<?php
      include("includes/header.php");    
    ?>
    <link rel="stylesheet" href="stylesheets/login_page.css">
    <script type="text/javascript" src="javascript/link_functions.js" ></script>    
              
        
</head>
<body>
            
        <div id="header">
            <a href="index.php" >home </a>
        </div>
        
        
        <div id=search_search_box>
            
            <h2 style="font-weight:normal;position:relative;left:10%">Check if your friends are here</h2>
            
            <input type="text" id="search_frnds" value="<?php echo $man; ?>" name="search_query">

            <img src="images/search.jpg" width=30px height=30px style="position:absolute;top:11%;left:40%;z-index:10"
            onclick="link_me()">
                <p>
                <hr>
                    <h2 style="font-weight:normal;position:relative;left:10%">
                        Yo Yo! You found some friends here.Login to find what they are doing</h2>
                    <h3>
                    
            <div style="position:absolute;top:32%;width:90%;">
                 <center> 
            <?php
                  
                echo "<table id='tab_style'>";
                echo "<tr>";
                echo "<th style='width:20%;color:red;background:#3090C7'>User ID</th>";
                while($row=mysql_fetch_array($find_man_res))
                {
                    echo "<tr>";
                    echo "<td style='background:#3090C7;height:40px'><center>".strtoupper($row[0])."</center></td>";
                    echo "<tr>";
                }
                    echo "</table>";
            ?>
                </center>
            </div>   
        </div>
         
          
        
</body>

</html>



