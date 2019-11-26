<?php
        include ("../phpgeneral/headercheck.php");
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
	$myuserid2=$_POST["myusernow"];

	
	$sql="SELECT * FROM poorbuk_user_table WHERE userid= '".$myuserid2."' LIMIT 1";
	$result = @mysql_query($sql);

	$usercounter=0;
	echo '<div class="divMyProfileAllWrapper">';
	//echo '<div id="labelMyProfile">My profile</div>';
	while($row = mysql_fetch_array($result))
	{
	
	
		/****USER NAME+PHOTO+NATIONALITY************************class='invisible'********/
		echo "<iframe style='display:none;'  id='frameMyProfilePic' name='frameMyProfilePic'  style='color:white;'  ></iframe>	
		<table id='tableProfileShowYo'>";

		echo "	
		<tr>
			<td> 
				<div class='divImgProfileUserPhoto'>
						

				<form  id='formMyProfilePic' action='' method='post' enctype='multipart/form-data' target='frameMyProfilePic' onsubmit=''>
						
						<div class='invisible'>
							<input class='invisible'  id='myuserid' type='text' name='myuserid'>
							<input class='invisible'  id='userfolder' value='lort' type='text' name='userfolder'>
						</div>
						<div class='divImgProfileChangePhoto'>
						
							<div class='labelInput' id='labelChangeYourPicture'>Cambia tu foto </div>
							<div id='divFileImageProfileAllWrapper' >
								<input type='file'  id='myfile' name='myfile' accept='.bmp,.gif,.jpg,.jpeg,.gif,.png'  onchange='myProfilePic();'>
							</div>
						</div>					
				</form>	
				<iframe style='display:none;' id='frameMyProfilePic' name='frameMyProfilePic' src=''  width='200' height='200' frameborder='0'></iframe>	

>
					<img id='imgProfileUserPhoto' class='imgProfileUserPhoto' src='". $row['userphoto']."'>
				</div>
			</td>
				
		</tr>
			
		<tr>
			<td> 
				<br>
				<div class='divProfileNameUser' >" .$row['username']."</div>
			</td> 
		</tr>
			


		</table>";
		
		/****USER NAME+PHOTO+NATIONALITY********************************/
						
		//<div class='nicefontjarim1' >" .$row['userbirthday']."</div>
		echo '<hr>';
		echo "
		<div class='labelGeneral' id='labelDescription'>
			Descripción
		</div>";
		$myuserdescription= trim($row['userdescription']);
		if ($myuserdescription== "")
		{
			$myuserdescription= 'For writing a description press the button Change profile';
		}
		
		//echo '<div id="labelMyDescription"> My description </div><br>';
		echo '<div id="divMyUserDescription">'.$myuserdescription.'</div>';
		
		$myuserdescription ="";

	}
	
	echo '</div>';
  




?>

