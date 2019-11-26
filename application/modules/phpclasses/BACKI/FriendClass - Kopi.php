<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

class Friend {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
    public $userid,$friendid;

    // Next come all our methods with their argument lists



	

public function listMyProperties() 
{
    echo "My properties are: ";
    print_r( get_object_vars( $this ) );

}

public function listMyConstants()
{
    $reflect = new ReflectionClass(get_class($this));
	print_r($reflect->getConstants());
}

public function listMyMethods() 
{
    echo "My methods are: ";
    print_r(get_class_methods( $this ) );
}

 /*		
 
SHOW ALL PROPERTIES CONSTANTS AND METHODS
 
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FileUploadClass.php');
	$FileUploadClass = new FileUploadClass;
	echo "<br><br><br>PROPERTIES CLASS<br><br>";
	$FileUploadClass->listMyProperties();
	echo "<br><br><br>PROPERTIES CONSTANTS<br><br>";
	$FileUploadClass->listMyConstants();
	echo "<br><br><br>LIST MY METHODS<br><br>";
	$FileUploadClass->listMyMethods();

MAKING NEW OBJECTS
	$newPost = new Post;
	$notificationPostShowAll = $newPost->notificationPostShowAll($userid,$myuserlanguage);

	echo $notificationPostShowAll;
	echo '
	notificationPostShowAll'.$notificationPostShowAll;

INITIALIZING VARIABLES
			$this->ip = $ip;
			$this->mail = $mail;
	*/	
function findFriend($userid,$userNameToFind)
{


	$sql="SELECT *
	FROM poorbuk_user_table u
	LEFT JOIN poorbuk_amigo_table a
	ON (a.amigouserid= u.userid AND a.amigofriendid= '".$userid."' )
	OR (a.amigouserid= '".$userid."' AND a.amigofriendid= u.userid  )
	WHERE username  LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci AND userid!='".$userid."'  ORDER BY u.username COLLATE utf8_spanish2_ci ASC";



/*USE UNION + LEFT JOIN + IS NULL TO FIND ORPHANES ROWS (USERS WITH NO FRIEND)*/

$sql="
SELECT * FROM poorbuk_user_table u, poorbuk_amigo_table a
WHERE
u.username LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci AND u.userid!='".$userid."' 
AND (a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."' ) 
AND (a.amigofriendstatus!='AMIGO') 
AND(a.amigouserid= u.userid OR amigofriendid=u.userid) 
UNION
SELECT * FROM poorbuk_user_table u
LEFT JOIN poorbuk_amigo_table a
ON
(a.amigouserid= u.userid OR amigofriendid=u.userid) 
WHERE amigoid is NULL AND u.username LIKE '".$userNameToFind."%' 

ORDER BY username COLLATE utf8_spanish2_ci ASC";




 $sql="SELECT * FROM poorbuk_user_table u, poorbuk_amigo_table a 
 WHERE u.username LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci 
 AND u.userid!='".$userid."' 
 AND (a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."' ) 
 AND (a.amigofriendstatus!='AMIGO') 
 AND(a.amigouserid= u.userid OR amigofriendid=u.userid) 
 UNION 
 SELECT * from poorbuk_user_table
 LEFT JOIN poorbuk_amigo_table
 ON (amigouserid= userid OR amigofriendid=userid) 
 WHERE userid NOT IN (SELECT amigouserid FROM poorbuk_amigo_table) 
 AND userid NOT IN ( SELECT amigofriendid FROM poorbuk_amigo_table) 
 AND username LIKE '".$userNameToFind."%' ORDER BY username COLLATE utf8_spanish2_ci ASC";
 




	//$StatusFlag ="findFriend";	
	$StatusFlag ="";
	echo $sql;
	$this->showFriendList($sql,$StatusFlag);
	
} // End findFriend()


function findFriendInMyFriendList($userid,$userNameToFind)
{
	$status=1;

	$sql="SELECT * FROM poorbuk_user_table u
	JOIN poorbuk_amigo_table a
	ON (a.amigouserid= u.userid AND a.amigofriendid= '".$userid."' AND a.amigofriendstatus='AMIGO' )
	OR (a.amigouserid= '".$userid."' AND a.amigofriendid= u.userid AND a.amigofriendstatus='AMIGO' )
	WHERE u.username  LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci AND u.userid!='".$userid."'  ORDER BY u.username COLLATE utf8_spanish2_ci ASC";

/*	GOOD 2
	$sql="SELECT * FROM poorbuk_amigo_table a 
	JOIN poorbuk_user_table u
	ON (u.username  LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci AND u.userid!='".$userid."' )
	WHERE  (a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."') AND a.amigofriendstatus='AMIGO' AND
        (a.amigouserid= u.userid OR amigofriendid=u.userid)
        ORDER BY u.username COLLATE utf8_spanish2_ci ASC";
*/
/*	GOOD 3
$sql="SELECT * FROM poorbuk_amigo_table a, poorbuk_user_table u 
	WHERE u.username  LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci AND u.userid!='".$userid."' AND 
	(a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."') AND a.amigofriendstatus='AMIGO'
	AND(a.amigouserid= u.userid OR amigofriendid=u.userid)
        ORDER BY u.username COLLATE utf8_spanish2_ci ASC";

	*/

//	echo $sql;
	$this->showFriendList($sql);	

	
} // End findFriendInMyFriendList()







function friendsShowAll($userid)
{
	$status=1;
	
	
	$sql="
	SELECT DISTINCT  * FROM poorbuk_amigo_table 
	LEFT JOIN poorbuk_user_table 
	ON (userid= amigouserid OR userid= amigofriendid) AND userid <> '$userid'
	WHERE (amigouserid = $userid OR amigofriendid = $userid) 
	ORDER BY username COLLATE utf8_spanish2_ci ASC";
	
	//echo $sql;
	$StatusFlag='AMIGO';
	$this->showFriendList($sql,$StatusFlag);	

	
} // End findFriendInMyFriendList()














function showFriendList($sql,$StatusFlag='',$userid='')
{

	$status=1;
	
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showFriendList<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}

	$usercounter=0;
	
	while($row = mysql_fetch_array($result))
	{
	
		$myAmigoStatus ="";				
		$usercounter=$usercounter+1;
		
		if ($usercounter ==1 && $StatusFlag =="FRIEND_REQUEST") 
		{
			echo '<div id="divNewFriendRequests">Accept new friends?</div><br>';
			
			//THIS FUNCTION HAVE ITS OWN COUNTER. SHOWS THE BUTTON ONLY IF MORE THAN 1 FRIEND REQUEST
			$this->friendRequestAcceptAllMakeTheButton($userid);
			
		}
	
		
		$myAmigoStatus =  $row['amigofriendstatus'];
		
		/*
		echo '$StatusFlag = '.$StatusFlag.'
		myAmigoStatus = '.$myAmigoStatus;
		*/
	
		if ($StatusFlag =="findFriend" && $myAmigoStatus !='AMIGO') 
		{
			echo 
			'
				<div class="divFinderFriend">
					<div style="float:left;">
						<button class="mySubmitFriendProfile"  value="'.$row{'userid'}.'" >
							<img class="imgUserPhotoUserFinder" src="'.$row['userphoto'].'">
							<div class="divUserNameFriend">'. $row['username'].'</div>
						</button>
					</div>';
		}
		if ($StatusFlag !="findFriend") 
		{
			echo 
			'
				<div class="divFinderFriend">
					<div style="float:left;">
						<button class="mySubmitFriendProfile"  value="'.$row{'userid'}.'" >
							<img class="imgUserPhotoUserFinder" src="'.$row['userphoto'].'">
							<div class="divUserNameFriend">'. $row['username'].'</div>
						</button>
					</div>';		
		
		}
		
	


		


		switch($myAmigoStatus)
		{
			case 'AMIGO'://warning: THIS IS DIFFERENT. BECAUSE WE WANT OUR CODE TO BE EASIER TO UNDERSTAND, WE SET ATTR. VALUE MANUALLY.
			
				if ($StatusFlag !="findFriend") 
				{
					echo '
					<div style="float:left;">
						<button  class="mySubmitAmigo buttonRemoveFriend"  id="'.$row{'userid'}.'" value ="REMOVE FRIEND" >REMOVE FRIEND</button>
					</div>';
				}
				
				break;
			case ''://warning: THIS IS DIFFERENT. BECAUSE WE WANT OUR CODE TO BE EASIER TO UNDERSTAND, WE SET ATTR. VALUE MANUALLY.
				echo '
				<div style="float:left;">
					<button  class="mySubmitAmigo mySubmitAmigo"  id="'.$row{'userid'}.'" value ="ADD FRIEND" >ADD FRIEND</button>
				</div>';
				break;
			case 'REQUEST SENDED'://warning: THIS IS DIFFERENT BECAUSE WE GIVE TO CHOICES TO THE USER FOR THE SAME STATUS: SO WE SET ATTR. VALUE MANUALLY.
			
				if ($StatusFlag =="FRIEND_REQUEST") 
				{
					echo "		
					<div style='float:left;'>
						<button class='mySubmitAmigo mySubmitAmigoHalfSize'  id='".$row{'userid'}."' value ='YES' >YES</button>
						<button class='mySubmitAmigo mySubmitAmigoHalfSize'  id='".$row{'userid'}."' value ='NO' >NO</button>
					</div>";
				}
				else
				{
				echo '
					<div style="float:left;">
						<button  class="mySubmitAmigo mySubmitAmigo"  id="'.$row{'userid'}.'" value ="'.$row['amigofriendstatus'].'" >REQUEST SENT</button>
					</div>';			
				}

				break;
		   
			default:
				echo '
				<div style="float:left;">
					<button class="mySubmitAmigo"  id="'.$row{'userid'}.'" value ="'.$row['amigofriendstatus'].'" >' .$row['amigofriendstatus']. '</button>
				</div>';			
				break;
		}		
	
		//**********END FRIENDSHIP STATUS**************************************			
			
		echo '</div>';

	}//END WHILE USERS FOUNDED 
	
	
	
	//SHOW MESSAGE IF NO FRIENDS FOUNDED IN SEARCH BY NAME
	if ($usercounter==0)
	{
	
		//AVOID SHOWING THIS MESSAGE IN MY FRIENDS LIST (IF NO FRIENDS) OR  IN REQUEST (IF NO REQUESTS)
		if ($StatusFlag !="AMIGO" && $StatusFlag !="FRIEND_REQUEST") 
		{
			echo '<div id="labelTheUserNoExist">El usuario no existe o ya está en tu lista de amigos<div>';
		}
	}
		
		
	return $status;

}// End showFriendList()
	

	
function friendRequestAcceptAllButton($userid)
{

	$status=1;
	$sql="
	UPDATE poorbuk_amigo_table 
	SET amigofriendstatus='AMIGO'
	WHERE 
	amigofriendid= '".$userid."' 
	AND amigofriendstatus='REQUEST SENDED' ";
	

	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showFriendList<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}


	return $status;

}//friendRequestAcceptAllButton

function friendRequestAcceptAllMakeTheButton($userid)
{

	$status=1;
	$sql=
	"SELECT * FROM poorbuk_amigo_table 
	WHERE amigofriendid = '".$userid."' AND amigofriendstatus='REQUEST SENDED'";
	

	if (!$result = mysql_query($sql)) 
	{
		echo "Error query friendRequestAcceptAllMakeTheButton<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}

	$counter=0;
	$allRequestsIds="";
	
	while($rowAmigoFriendRequest = mysql_fetch_array($result))
	{
		$counter= $counter+1;

	}//END WHILE AMIGO
				
	if ($counter > 1)
	{
		echo"<button id='buttonFriendRequestAcceptAll' >ACCEPT ALL REQUEST</button><br><br>";
	}
	return $status;

}//friendRequestAcceptAllMakeTheButton


function friendRequestsShowAll($userid)
{
	//INTERN CALL  $this->friendRequestAcceptAllMakeTheButton($userid);

	$status=1;

	$sql="
	SELECT * FROM poorbuk_amigo_table a
	LEFT JOIN poorbuk_user_table u
	ON u.userid= a.amigouserid
	WHERE amigofriendid = '".$userid."' AND amigofriendstatus='REQUEST SENDED'";


	$StatusFlag ="FRIEND_REQUEST";
	$this->showFriendList($sql,$StatusFlag,$userid);	

	return $status;
	

}//friendRequestAcceptAllMakeTheButton
	

function friendRequestButton($userid,$myAmigoId,$myAmigoStatus)
{

	
	/*echo '
	$myAmigoStatus'.$myAmigoStatus;*/

	$flagStatusExists = false;
	$requestMessageForAmigoStatus='';	

	If ($myAmigoStatus=="REMOVE FRIEND" OR $myAmigoStatus=="NO")
			{
				$flagStatusExists = true;
				$myAmigoStatus = "";
				$sql="DELETE FROM `poorbuk_amigo_table` WHERE `amigofriendid`=$myAmigoId AND amigouserid=$userid OR `amigofriendid`=$userid AND amigouserid=$myAmigoId";
				$requestMessageForAmigoStatus='Operación efectuada';
			}
	If ($myAmigoStatus=="ADD FRIEND")
			{
				$flagStatusExists = true;
				$myAmigoStatus="REQUEST SENDED";
				$sql="INSERT INTO poorbuk_amigo_table (amigouserid,amigofriendid,amigofriendstatus)VALUES('$userid','$myAmigoId','$myAmigoStatus')";
				$requestMessageForAmigoStatus='Tu petición ha sido enviada';			
			}
	If ($myAmigoStatus=="YES")
			{
				$flagStatusExists = true;
				$myAmigoStatus="AMIGO";
				$sql= "UPDATE poorbuk_amigo_table SET amigofriendstatus='$myAmigoStatus' WHERE amigouserid='$myAmigoId' AND amigofriendid='$userid'";
				$requestMessageForAmigoStatus='Felicidades.Un amigo mas en poorbuk';			
			}

	if ($flagStatusExists == true)		
	{
		$result = mysql_query($sql);
		$status="success";
	}
	else 
	{
		$status="error";
	}
		$myMessagge = '{'.
	'"message":"'.$requestMessageForAmigoStatus.'" ,'.	
	'"status":"'.$status.'" '.	
	'}';
	
	echo $myMessagge;

}//friendRequestButton






function friendRequestButtonTranslateStatus($myAmigoStatus)
{
//NOT USED ANYMORE


	//translate BUTTONS FOR SPANISH
	switch($myAmigoStatus)
	{
		case 'BORRAR AMIGO':
			$myAmigoStatus="REMOVE FRIEND";
			break;
		case 'SUGERIR AMISTAD':
			$myAmigoStatus="ADD FRIEND"; break;
		case 'ACEPTAR AMISTAD':
			$myAmigoStatus="YES";break;
	   
		case 'DENEGAR AMISTAD':
			$myAmigoStatus="NO";break;
	}
	
	return $myAmigoStatus;

} //friendRequestButtonTranslateStatus






































	
	

} // End User class definition




?>