<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

//	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
//	if (!(isset( $_POST['username'] )) || $_POST['username']==""){exit;}
	$myuserid2=$_GET["myusernow"];
	$myusername = $_GET["username"] ;
	$allMyFriendIdsToSendTo = $_GET["allMyFriendIdsToSendTo"] ;
	

	
	
	
	
	
	
	
	
	
	$usercounter=0;
	
	$sql="SELECT u.username,u.userphoto,u.userid
	FROM poorbuk_user_table u
	LEFT JOIN poorbuk_amigo_table a
	ON (a.amigouserid= u.userid AND a.amigofriendid= '".$myuserid2."')
	OR (a.amigouserid= '".$myuserid2."' AND a.amigofriendid= u.userid)
	WHERE a.amigofriendstatus='AMIGO' AND u.username LIKE '".$myusername."%'  
	UNION
	SELECT b.username,b.userphoto,b.userid
	FROM poorbuk_user_table b
	WHERE b.userid='".$myuserid2."'	
	COLLATE utf8_spanish2_ci ORDER BY username ASC
	"
	;
	
	//echo $sql;
	$result = @mysql_query($sql);



	if($myusername!="")
	{


		while($row = mysql_fetch_array($result))
		{
			//AVOID SEARCHING FRIENDS THAT ALLREADY ARE IN THE LIST
			$str = $allMyFriendIdsToSendTo;
			$myArray = explode(';',$str);
			/*for($i = 0; $i < count($myArray); $i++){
				//echo "Array$i = $myArray[$i] <br />";
				$myAmigoId=$myArray[$i];							
			}*/

			$elementToSearch = $row['userid'];
			if (in_array($elementToSearch, $myArray)) 
			{
			}
			else
			{
			
				//END AVOID SEARCHING FRIENDS THAT ALLREADY ARE IN THE LIST				
			
				//$userismecontrol= $row['userid'];
				//if ($userismecontrol != $myuserid2)
				//{	

					$usercounter=$usercounter+1;


					if ($usercounter==1)
					{
						echo "
					<table class='tableFindUser'>";
					}
						echo "
					<tr>
						<td  >
							<button class='buttonAddUserToListMessages' name='".$row{'username'}."' value='".$row{'userid'}."' ><img class='imgUserPhotoUserFinderMessages' src='".$row['userphoto']."'>
							<div class='divUserNameFriendMessages'>" . $row['username']."
							</div></button>
						</td>";

					echo "
					</tr>";
				//}//END IF USER IS NOT ME 
				
			}//END if (in_array($elementToSearch, $myAmigoId)) 
		}//END WHILE USERS FOUNDED 
			
			
			
			
			if ($usercounter==0)
			{
				echo '<div id="labelMessagesTheUserNoExist">The user does not exist or is allready on the list or is not your friend<div>';
			}
			else
			{
				echo "</table>";
			}
	
		
	}

?>


