<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();
	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
	$myuserid2 = $_POST['myusernow'];	
	
	$sqlamigo="SELECT * FROM poorbuk_amigo_table WHERE amigofriendid = '".$myuserid2."' AND amigofriendstatus='REQUEST SENDED'";
	$resultamigo = @mysql_query($sqlamigo);
	
	$counter=0;
	$counter1=false;
	
	while($rowamigo = mysql_fetch_array($resultamigo))
	{
		$counter= $counter+1;
	
	  
			/******************************************************************************/
			$sql="SELECT * FROM poorbuk_user_table WHERE userid= '".$rowamigo['amigouserid']."'";
			$result = @mysql_query($sql);

			while($row = mysql_fetch_array($result))
			{
			
				if ($counter == 1)
				{
					$counter1=true;

					echo 
					"<table class='tableFriendRequestToFrontPage' >
			";
				}
				echo 
						"<tr>
							<td>
								<img class='imgUserPhotoUserFinder' src='".$row['userphoto']."'>
								<br>
								<div class='divUserNameFriend'>" . $row['username']."
								</div>
							</td>
						
							<td>
							
									<button class='mySubmitAmigo'  value='".$row{'userid'}."' >ACCEPT FRIENDSHIP</button>
					
							</td>				
							<td>
								<button class='mySubmitAmigo'  value='".$row{'userid'}."' >DENY FRIENDSHIP</button>
							</td>
						</tr>";
			}//END WHILE USER

	}//END WHILE AMIGO
				
	if ($counter1==true)
	{ 
		echo "</table>"; 
	}


?>

