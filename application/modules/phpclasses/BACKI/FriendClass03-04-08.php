<?php
		

class Friend {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
    public static $lort='lortis';
    public $userid,$friendid,$connection_DB;

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

public function startConnectionDB()
{
    
    include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/myDBini.php');     
    $this->connection_DB = new mysqli("$hostname", "$username", "$password", "$mydatabase");
    // Check connection
    if ($this->connection_DB->connect_error) 
    {
        die("Connection failed: " . $this->connection_DB->connect_error);
    } 
    //echo "startConnectionDB UserClass Connected successfully";
    return $this->connection_DB;
}


public function executeSQL($sql)
{

	$this->status=true;
        if (!$this->connection_DB)
        {
            $this->connection_DB =  $this->startConnectionDB();           
        }


	if (!$result = mysqli_query($this->connection_DB,$sql)) 
                            
	{
                echo("Error description: " . mysqli_error($this->connection_DB));
		//echo "Error query or NULL RESULTS<br>";
		$result = ($result) ? 'true' : 'false';
		//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		//echo $result;
		$this->status=false;
	}
	
	return $result;
        
        
}
/*
public function executeSQL($sql)
{
	//echo '<br>'.$userid.'<br>';
	$status=true;

	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}
	
	return $result;
}
*/
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

function profileFriendsFindAmigoByName($userId,$userNameToSearch,$myFriendId)
{
        $usercounter=0;
        echo '<div class="divFindFriendResultsFor">Resultados para </div>'.$userNameToSearch.'<hr>';

        $sql="SELECT *
        FROM poorbuk_user_table u
        LEFT JOIN poorbuk_amigo_table a
        ON (a.amigouserid= u.userid AND a.amigofriendid= '".$myFriendId."' )
        OR (a.amigouserid= '".$myFriendId."' AND a.amigofriendid= u.userid  )
        WHERE username LIKE '".$userNameToSearch."%' AND userid!='".$myFriendId."' AND a.amigofriendstatus='AMIGO' ORDER BY u.username COLLATE utf8_spanish2_ci ASC";
        
        
        $result = $this->executeSQL($sql);	

	


        /******FIND USER NAME***************************************************/	

        $sqlUsername="
        SELECT  username FROM poorbuk_user_table 
        WHERE userid = '$myFriendId'";

        $sqlUsername = $this->executeSQL($sqlUsername);
        
        while($rowUsername=mysqli_fetch_array($sqlUsername,MYSQLI_ASSOC))
	{
            $username = $rowUsername['username'];		
        }


        /******FRIEND AMIGOS FIND ALL***************************************************/


	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
        //$resultamigo = $this->executeSQL($sqlamigo);
        //$resultamigo = @mysql_query($sqlamigo);
        $mystatuscheck ="";

        $myfriendstatus= $row['amigofriendstatus'];

            $userismecontrol= $row['userid'];
            if ($userismecontrol != $myFriendId)
            {


                $usercounter=$usercounter+1;


                if ($usercounter==1)
                {
                        echo
                "<table class='tableFriendRequestToFrontPage'>";
                }
                echo 
                "
                <tr>

                    <td >
                        <div id=".$row{'userid'}.'>
                            <button class="mySubmitFriendProfile"  value="'.$row{'userid'}.'" >
                                <img class="imgUserPhotoUserFinder" src="'.$row['userphoto'].'">
                                <div class="divUserNameFriend">'. $row['username'].'</div>
                            </button>
                        </div>
                    </td>';



                /******STATUS REQUEST-BUTTON BETWEEN CURRENT USER AND FRIEND-FRIENDS******************************************/

                $userFriendFriend = $row{'userid'};
                $mystatuscheck ="";

                if ($userFriendFriend == $userId)
                {
                    $mystatuscheck = "YO :)";
                }
                else
                {
                    $sqlFriendFriendAndMeStatus="SELECT amigofriendstatus
                    FROM poorbuk_amigo_table 
                    WHERE (amigouserid= '$userFriendFriend' AND amigofriendid= '$userId' )
                    OR (amigouserid= '$userId'  AND amigofriendid= '$userFriendFriend'  )				
                    LIMIT 1";
                    //$resultsqlFriendFriendAndMeStatus = @mysql_query($sqlFriendFriendAndMeStatus);
                    $resultsqlFriendFriendAndMeStatus = $this->executeSQL($sqlFriendFriendAndMeStatus);

                    while($rowsqlFriendFriendAndMeStatus=mysqli_fetch_array($resultsqlFriendFriendAndMeStatus,MYSQLI_ASSOC))
                    {	
                                $mystatuscheck =  $rowsqlFriendFriendAndMeStatus['amigofriendstatus'];
                    }
                }

                if ($mystatuscheck =="")
                {
                    echo '<td><div  id='.$row{'userid'}.'><button  class="mySubmitAmigo"  value="'.$row{'userid'}.'" >ADD FRIEND</button></div></td>';
                }
                else
                {  	

                    if ($mystatuscheck =="YO :)")
                    {
                        echo '<td><div id='.$row{'userid'}.'><button class=""  >'.$mystatuscheck.'</button></div></td>';
                    }
                    else
                    {
                        echo '<td><div id='.$row{'userid'}.'><button class="mySubmitAmigo"  value="'.$row{'userid'}.'" >'.$mystatuscheck.'</button></div></td>';
                    }

                }

                /******END STATUS REQUEST-BUTTON BETWEEN CURRENT USER AND FRIEND-FRIENDS******************************************/



                    echo "</tr>";
            }//END IF USER IS NOT ME 
        //}//END IF USER IS AMIGO 
        }//END WHILE USERS FOUNDED 




        if ($usercounter==0)
        {
            echo '<div id="labelTheUserNotInFriendList">Ningún usuario que empieze por '.$userNameToSearch.' es amigo de '.$username.' <div>';
        }
        else
        {
            echo "</table>";
        }


    
}
function findFriend($userid,$userNameToFind)
{

/*GOOD 1 
OPTION 1 USE UNION + LEFT JOIN + IS NULL TO FIND ORPHANES ROWS (USERS WITH NO FRIEND)*/
/*
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

*/

/*GOOD 2
OPTION 2 USE UNION + LEFT JOIN + NOT IN TO FIND ORPHANES ROWS (USERS WITH NO FRIEND)*/
 /*
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
 AND userid != '".$userid."'
 AND username LIKE '".$userNameToFind."%' ORDER BY username COLLATE utf8_spanish2_ci ASC";
  
  */
 /* AQUI EL PRIMER COLLATE utf8_spanish2_ci  DA ERROR DENTRO DE MYSQL???PERO NO DESDE PHP? WIERD...
  $sql="SELECT * FROM poorbuk_user_table u, poorbuk_amigo_table a 
 WHERE u.username LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci 
 AND u.userid!='".$userid."' 
 AND (a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."' ) 
 AND(a.amigouserid= u.userid OR amigofriendid=u.userid) 
 UNION 
 SELECT * from poorbuk_user_table
 LEFT JOIN poorbuk_amigo_table
 ON (amigouserid= userid OR amigofriendid=userid) 
 WHERE userid NOT IN (SELECT amigouserid FROM poorbuk_amigo_table) 
 AND userid NOT IN ( SELECT amigofriendid FROM poorbuk_amigo_table) 
 AND userid != '".$userid."'
 AND username LIKE '".$userNameToFind."%' ORDER BY username COLLATE utf8_spanish2_ci ASC";
  * 
  */

 /*DISABLE TEMPORARY 2018   
  * bECAUSE ERROR = Warning: mysqli_fetch_array() expects parameter 1 to be mysqli_result, string given in C:\xampp\htdocs\poorbuk\application\modules\phpclasses\FriendClass.php on line 385
  * $sql="
SELECT * FROM poorbuk_user_table u
 LEFT JOIN poorbuk_amigo_table a 
 ON( 
 (a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."' ) 
 AND(a.amigouserid= u.userid OR amigofriendid=u.userid) 
)
 WHERE 
userid != '".$userid."'
 AND username LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci
ORDER BY username COLLATE utf8_spanish2_ci ASC";
  */
    
 $sql="
SELECT * FROM poorbuk_user_table u
 LEFT JOIN poorbuk_amigo_table a 
 ON( 
 (a.amigouserid= '".$userid."' OR a.amigofriendid= '".$userid."' ) 
 AND(a.amigouserid= u.userid OR amigofriendid=u.userid) 
)
 WHERE 
userid != '".$userid."'
 AND username LIKE '".$userNameToFind."%' ORDER BY username ASC";
 
 
 
//echo $sql;

	//$StatusFlag ="findFriend";	
	$StatusFlag ="";
//	echo $sql;
	$this->showFriendList($sql,$StatusFlag,$userid);
	
} // End findFriend()



function findUsersToListUserButtonWithUId($userid,$userNameToFind)
{


 $sql="SELECT * FROM poorbuk_user_table 
 WHERE username LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci 
  ORDER BY username COLLATE utf8_spanish2_ci ASC";
 
	$this->findUsersToListUserButtonWithUIdHTML($sql);
	
} // End findFriend()


function findUsersToListUserButtonWithUIdHTML($sql,$StatusFlag='',$userid='')
{


        $result = $this->executeSQL($sql);	

	
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
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

			echo '<div style="float:left;">
					<button  class="buttonWithUId"  value ="'.$row{'userid'}.'" >ADD TO LIST</button>
				</div></div>';
		
		
	}
		
	return $this->status;

}// End findUsersToListUserButtonWithUIdHTML()
	
	
function findUsersToListAddEditorToWebsite($userid,$userNameToFind)
{


 $sql="SELECT * FROM poorbuk_user_table 
 WHERE username LIKE '".$userNameToFind."%' COLLATE utf8_spanish2_ci 
  ORDER BY username COLLATE utf8_spanish2_ci ASC";
 
	$this->findUsersToListAddEditorToWebsiteHTML($sql);
	
} // End findFriend()


function findUsersToListAddEditorToWebsiteHTML($sql,$StatusFlag='',$userid='')
{


	
        $result = $this->executeSQL($sql);


	
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	
			echo 
			'
				<div class="divFinderFriend">
					<div style="float:left;">
						<button class="mySubmitFriendAddEditorToWebsite"  value="'.$row{'userid'}.'" >
							<img class="imgUserPhotoUserFinder" src="'.$row['userphoto'].'">
							<div class="divUserNameFriend">'. $row['username'].'</div>
						</button>
					</div>
				</div>';

		
		
	}
		
	return $this->status;

}// End findUsersToListAddEditorToWebsiteHTML()


function findFriendInMyFriendList($userid,$userNameToFind)
{
	$this->status=1;

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
	$this->status=1;
	
	
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
        //$this->connection_DB =  $this->startConnectionDB();		
        //2018
/*       
        
        $result=mysqli_query($this->connection_DB,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$this->status=1;
 * 
 */
        $this->status=1;
        $result = $this->executeSQL($sql);
	$usercounter=0;
	
	//while($row = mysql_fetch_array($result))
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
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
		{/*
		<div class="divUserNameFriend">'. $row['username'].' Userid= '.$userid.'</div>
		<div class="divUserNameFriend">'. $row['username'].'</div>*/
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
					<button  class="mySubmitAmigo"  id="'.$row{'userid'}.'" value ="ADD FRIEND" >ADD FRIEND</button>
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
		
	// CHANGED 2018 
        // return $this->status; CHANGED FOR return $this->status;
	return $this->status;

}// End showFriendList()
	

	
function friendRequestAcceptAllButton($userid)
{

	$this->status=1;
	$sql="
	UPDATE poorbuk_amigo_table 
	SET amigofriendstatus='AMIGO'
	WHERE 
	amigofriendid= '".$userid."' 
	AND amigofriendstatus='REQUEST SENDED' ";
	
        $result = $this->executeSQL($sql);

	return $this->status;

}//friendRequestAcceptAllButton

function friendRequestAcceptAllMakeTheButton($userid)
{

	$this->status=1;
	$sql=
	"SELECT * FROM poorbuk_amigo_table 
	WHERE amigofriendid = '".$userid."' AND amigofriendstatus='REQUEST SENDED'";
	
        $result = $this->executeSQL($sql);	
	if (!$result) 
	{
		echo "Error query showFriendList<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}

	//$usercounter=0;
	
	//while($row = mysql_fetch_array($result))

        
        /*
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query friendRequestAcceptAllMakeTheButton<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}
*/
	$counter=0;
	$allRequestsIds="";
	
	//while($rowAmigoFriendRequest = mysql_fetch_array($result))
        while($rowAmigoFriendRequest=mysqli_fetch_array($result,MYSQLI_ASSOC));
	{
		$counter= $counter+1;

	}//END WHILE AMIGO
				
	if ($counter > 1)
	{
		echo"<button id='buttonFriendRequestAcceptAll' >ACCEPT ALL REQUEST</button><br><br>";
	}
	return $this->status;

}//friendRequestAcceptAllMakeTheButton


function friendRequestsShowAll($userid)
{
	//INTERN CALL  $this->friendRequestAcceptAllMakeTheButton($userid);

	$this->status=1;

	$sql="
	SELECT * FROM poorbuk_amigo_table a
	LEFT JOIN poorbuk_user_table u
	ON u.userid= a.amigouserid
	WHERE amigofriendid = '".$userid."' AND amigofriendstatus='REQUEST SENDED'";


	$StatusFlag ="FRIEND_REQUEST";
	$this->showFriendList($sql,$StatusFlag,$userid);	

	return $this->status;
	

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
                $result = $this->executeSQL($sql);
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