<script>
count_for_text=0;
function enable_album_name()
{
    var k=document.getElementById('album_name').disabled=false; 
}
function disable_album_name()
{
    var k=document.getElementById('album_name').disabled=true; 
}
function delete_msg_from_light_box()
{
    if(	count_for_text==0)
    {
	document.getElementById("txt_box_pic").value='';
	count_for_text++;

    }
}
function pic_txt_default()
{

	document.getElementById("txt_box_pic").value="write something about your picture :)";
	count_for_text=0;

}
</script>

<div id="light" class="white_content">
                    
		    <!--first check whether any photos are present or not -->
		    
		    <?php
		    
		    $check_pics="select count(p.photo_id) from photos p,user_photo u where p.photo_id=u.photo_id and u.user_id=$user_id ";
		    $check_pics_res=mysql_query($check_pics);
		    $no_of_pics=mysql_result($check_pics_res,0);
		    
		    if($no_of_pics == 0)
		    {
		         echo "<br/><br/>
			 <center>
			     <i> Check your <a href='photo_album.php?user_id= {$user_id}'>photo Albums</a>!<br/>You can select any picture as your profile pic :)</i>
		         </center>";
		    }
		    		    
		    ?>
		    
		    <!--upload photos option -->
		    
		    <br/>
		    <br/>
		    <br/>
		    <form action="includes/upload.php" method="post" enctype="multipart/form-data" style="width:100%;background:#837F7F">
                     <br/>
		     <input type=radio name=album  value=1 checked="checked" >Upload to My Album<br/>
		      <!--
		       <input type=radio name=album value=2 >Create New Album
		       <input type="text" name=album_name  id="album_name" ><br/>
			-->		
		     <input type="file" name="image" >
                       <br/>
		       <br/>
		       
		       
		       
		       <center>
                    <input type="submit" value="Submit" onclick=pic_txt_default()>
		       </center>
                    </form>    
		    
                           
                        <div id=lightbox_close>
			<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';
                        document.getElementById('fade').style.display='none';pic_txt_default()" >
                            <img src="images/close.png" width=20px height=20px>
                        </a>
                        </div>
        </div>
	<div id="fade" class="black_overlay" 
        ondblclick = "document.getElementById('light').style.display='none';
                        document.getElementById('fade').style.display='none';pic_txt_default()">
        </div>