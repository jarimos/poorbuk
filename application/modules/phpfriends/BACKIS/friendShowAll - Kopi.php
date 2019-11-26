<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
	startConnectionDB();
	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}	


	
	$userid = $_POST['myusernow'];

	if(!( 
	sanityCheckScapeByReference($userid, 'string', 20) 
	))
	{
		//echo 'Username is not set';
		exit();
	}
	
	//echo 'userid = '.$userid;
	$newFriend = new Friend;
	$friendRequestsShowAll = $newFriend->friendRequestsShowAll($userid);	
	
	/*
	echo '
	friendRequestsShowAll = '.$friendRequestsShowAll;
	
	*/






/***************************************************/
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();
	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
	$myuserid2 = $_POST['myusernow'];	

	
	//echo 'my user id = '.$myuserid2.'<br>';

	
	
	$sqlamigo="
	SELECT DISTINCT  * FROM poorbuk_amigo_table 
	LEFT JOIN poorbuk_user_table 
	ON (userid= amigouserid OR userid= amigofriendid) AND userid <> '$myuserid2'
	WHERE (amigouserid = $myuserid2 OR amigofriendid = $myuserid2) AND (amigofriendstatus='AMIGO')
	ORDER BY username COLLATE utf8_spanish2_ci ASC";
	$resultamigo = @mysql_query($sqlamigo);
	$myamigoscounter =0;
	while($rowamigo = mysql_fetch_array($resultamigo))
	{

		  

			$myamigoscounter = $myamigoscounter+ 1;

			if ($myamigoscounter==1)
			{
				echo '
				<div id="divAllMyFriends" >
					All my friends
				</div><hr>';
				echo "<table class='tableFriendRequestToFrontPage' >";
			/*	echo "
				<tr>
					<th class='labelUser' id='labelUser' >User</th>
					<th class='labelShow' id='labelShow' >Show</th>
					<th class='labelFriendship' id='labelFriendship'>Friendship</th>			
				</tr>";
			*/
			}

			
			
			echo '
				<tr>
				
					<tr>

						<td >
							<div id="'.$rowamigo{'userid'}.'">
								<button class="mySubmitFriendProfile"  value="'.$rowamigo{'userid'}.'" >
									<img class="imgUserPhotoUserFinder" src="'.$rowamigo['userphoto'].'">
									<div class="divUserNameFriend">'. $rowamigo['username'].'</div>
								</button>
							</div>
						</td>';
				
			echo "

					<td >
						<div  id='".$rowamigo{'userid'}."'>
							<button class='mySubmitAmigo buttonRemoveFriend' id='buttonRemoveFriend'  value='".$rowamigo{'userid'}."' >REMOVE FRIEND</button>
						</div>
					</td>
				</tr>";
			
//		}//END WHILE USER
	  
		
	}//END WHILE AMIGO
		if ($myamigoscounter>=1){echo "</table>";}
		echo '<hr>';
		
?>
