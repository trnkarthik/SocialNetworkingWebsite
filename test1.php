<?php
    require_once("includes/connect.php");
    
    $find_man="select img from pix";
    $find_man_res=mysql_query($find_man);
        if(!$find_man_res){
        echo "man not found";
    }
?>

<?php
      include("includes/header.php");    
    ?>
    <link rel="stylesheet" href="stylesheets/login_page.css">
    <script type="text/javascript" src="javascript/link_functions.js" ></script>    
            <?php
                  
                while($row=mysql_fetch_array($find_man_res))
                {
                    echo "<img src='".$row[0]."'>";
                }
            ?>
                </center>
            </div>   
        </div>
                
</body>

</html>



