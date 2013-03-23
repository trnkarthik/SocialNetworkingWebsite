<script>
count_for_text=0;
function enable_album_name()
{
    var k=document.getElementById("album_name").disabled;
    k=false;
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

<div id="light_new" class="white_content">
                    
		    <h2><center>Choose Profile Picture</center></h2>		    
		    
		        <center>
			    <a href="photo_album.php?user_id=<?php echo $user_id; ?>&select_pic=on">
			    choose from your albums
			    </a>
			</center>
			
			
			
			
			<br/><br/>
			
			<form action="includes/upload_with_update.php" method="post" enctype="multipart/form-data" style="width:100%;background:#837F7F">
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
			<a href = "javascript:void(0)" onclick = "document.getElementById('light_new').style.display='none';
                        document.getElementById('fade_new').style.display='none';pic_txt_default()" >
                            <img src="images/close.png" width=20px height=20px>
                        </a>
                        </div>
        </div>
	<div id="fade_new" class="black_overlay" 
        ondblclick = "document.getElementById('light_new').style.display='none';
                        document.getElementById('fade_new').style.display='none';pic_txt_default()">
        </div>