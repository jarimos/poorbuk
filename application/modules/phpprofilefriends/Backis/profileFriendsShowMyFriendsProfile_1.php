<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
	if (!(isset( $_POST['myfriendid'] )) || $_POST['myfriendid']==""){exit;}
	
	
	
	$myfriendid=$_POST["myfriendid"];
	$myuserid2=$_POST["myusernow"];
	
	$sql="SELECT * FROM poorbuk_user_table u
	LEFT JOIN poorbuk_amigo_table a
	ON (a.amigouserid= u.userid AND a.amigofriendid= '".$myuserid2."')
	OR (a.amigouserid= '".$myuserid2."' AND a.amigofriendid= u.userid)
	WHERE userid= '".$myfriendid."' LIMIT 1";
	$result = @mysql_query($sql);

	$usercounter=0;

	while($row = mysql_fetch_array($result))
	{
	
		$usercounter=$usercounter+1;
		if ($usercounter==1)
		{
			echo '<div class="divMyProfileAllWrapper">';
			//echo '<div id="labelMyFriendsProfile">Profile for </div><div  class="myLabelsGeneralInline" >' .$row['username'].'</div>';;
		}

		
		/****USER NAME+PHOTO+NATIONALITY********************************/
		echo "
		<table id='tableProfileShowYo'>";

		echo "	
		<tr>
			<td> 
				<div class='divImgProfileUserPhoto'>
					<img class='imgProfileUserPhoto' src='". $row['userphoto']."'>
				</div>
			</td>
				
		</tr>
			
		<tr>
			<td> 
				<br>
				<div class='divProfileNameUser' >" .$row['username']."</div>
			</td> 
		</tr>
			
		<tr>
		<td>
		<br><br>		

";
		
		/****USER NAME+PHOTO+NATIONALITY********************************/


			//**********FRIENDSHIP STATUS**************************************
			$mystatuscheck =  $row['amigofriendstatus'];
			if ($myfriendid != $myuserid2)
			{
				if ($mystatuscheck =="")
				{
				  
					echo 	'<div  id="'.$row{'userid'}.'" ><button  id="'.$row{'userid'}.'" class="mySubmitAmigo"  value="ADD FRIEND" >ADD FRIEND</button></div>';
				}
				else
				{  	
					echo '<div id="'.$row{'userid'}.'" ><button id="'.$row{'userid'}.'" class="mySubmitAmigo"  value="'.$row['amigofriendstatus'].'" >' .$row['amigofriendstatus']. '</button></div>';
				}
			}

	
			//**********END FRIENDSHIP STATUS**************************************
			echo "
				

		</td>
		</tr>
		</table>";
		

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
		
		//echo '<div id="labelMyFriendsDescription"> My description </div><div  class="myLabelsGeneralInline" >' .$row['username'].'</div><br><br>';
		echo '<div id="divMyUserDescription">'.$myuserdescription.'</div>';
		
		$myuserdescription ="";
		
		$myFriendNameNow= $row['username'];
		$myFriendNameNowLen = strlen($myFriendNameNow);

		if ($myFriendNameNowLen >12)
		{
			$myFriendNameNow= substr($myFriendNameNow,0,12); 
		}
		else
		{
			$myFriendNameNow= $row['username'];
		}
                
	}
	
			

 	echo "<br><br><button id='profileFriendsButtonShowMyFriendFriends' value='" .$row['userid']."' ><div id='labelSeeFriendsOf1' style='display:inline;'>VER AMIGOS DE </div>$myFriendNameNow<div id='labelSeeFriendsOf2'></div></button>";
 
	echo '</div><br><br>';



?>

