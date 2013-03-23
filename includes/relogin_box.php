<div id=login_box>
            
            <form action="login_check.php" method="post">
            <center><h3 style="font-weight:normal">Sign in</h3></center><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Username:&nbsp;&nbsp;<input type="text" name="username"><br/><p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Password:&nbsp;&nbsp;<input type="password" name="password"><br/><p>
           
            <center>
            <input type="submit" value="Sign in" id="submit" >
                        
                       <p> For more sign in options 
                                    <a href = "javascript:void(0)"
                   onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
                    click here</a>                    
                       
            </center>
            </form>
            
</div>

         












         
         //light box code 
         
         <div id="light" class="white_content">
                    <br/>
                    <center><h1>More sign in options</h1></center>   
                       
                       <img src="images/fb.png" width=50px height=50px style="position:absolute;top:40%;left:15%">
                       <img src="images/g1.gif" width=100px height=50px style="position:absolute;top:40%;left:31%"> 
                       <img src="images/y1.jpg" width=100px height=50px style="position:absolute;top:40%;left:53%">
                       <img src="images/tw.png" width=50px height=50px style="position:absolute;top:40%;left:75%">

                        <b style="position:absolute;top:75%;left:40%"><h2>Coming Soon!!!</h2></b>
                        
                        <div id=lightbox_close>
			<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';
                        document.getElementById('fade').style.display='none'">
                            <img src="images/close.png" width=20px height=20px>
                        </a>
                        </div>
        </div>
	<div id="fade" class="black_overlay" 
        ondblclick = "document.getElementById('light').style.display='none';
                        document.getElementById('fade').style.display='none'">>
        </div>