<?php
		

class Menu {

/*
THE MENU START IS DECIDED BY CSS, NOT JS
.menuRellenoBackground{background-color:black;width:100%;height:120px;position:fixed;top:0px;left:0px;}
#divMenuMostrarMenu{display:none;position:fixed;right:40%;top:0px;background-color:black;z-index:9998;}
*/

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
    public $ip,$mail,$passUserOriginalCoded,$passUserOriginalBeforeCoded,
	$passUserRandomNow,$userid,$username,
	$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
	$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder,$last_id;

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
			
USING CONSTANTS
	self::MY_CONSTANT
USING VARIABLES
	$this->mail
			
	*/	

  
 



function menuNotificationPostShowAll($userid) 
{
	$status = 1;
	$this->userid = $userid;
	$myMessageToArrayAvoidRepeating="";

	$counterNewMessages=0;
	
		$sql="
	SELECT * FROM poorbuk_notifications_table 
	LEFT JOIN poorbuk_user_table 
	ON userid=fromuserid
	WHERE seencolor='yellow' and touserid=$userid LIMIT 100";
	//echo $sqlShowConversation;
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query function setUserLanguage<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		$status = false;
	}


	
	$counterNewMessages=0;
	while ($row = mysql_fetch_array($result) && $counterNewMessages<1)
	{
		$counterNewMessages=$counterNewMessages+1;

	}//END WHILE while ($row = mysql_fetch_array($result))
	


	if ($counterNewMessages==0)
	{
		$status= false;
	}
	else
	{
		$status=  true;
	}
	
	
	return $status;

	
}//END notificationPostShowAll()



function menuNotificationMessages() 
{

	$status = 1;

	$userid=$this->userid;
	
	$sql="
	SELECT * FROM poorbuk_messageindex_table mi
	LEFT JOIN poorbuk_message_table m
	ON m.messageid = mi.messageid
	LEFT JOIN poorbuk_user_table u
	ON u.userid = m.fromid
	WHERE mi.userid = $userid AND seencolor='yellow' ORDER BY mi.messageid DESC";
	//echo $sqlShowConversation;
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query function setUserLanguage<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		$status = false;
	}
	$counterNewMessages=0;
	while ($row = mysql_fetch_array($result) && $counterNewMessages<1)
	{
		$counterNewMessages=$counterNewMessages+1;

	}//END WHILE while ($row = mysql_fetch_array($result))
	


	if ($counterNewMessages==0)
	{
		$status=  false;
	}
	else
	{
		$status=  true;
	}

	return $status;
}




function menuNotificationFriends() 
{

	$userid=$this->userid;
	
	$sql="SELECT * FROM poorbuk_amigo_table WHERE amigofriendid = '".$userid."' AND amigofriendstatus='REQUEST SENDED'";
	//echo $sqlShowConversation;
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query function setUserLanguage<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		$status = false;
	}
	$counterNewMessages=0;
	while ($row = mysql_fetch_array($result) && $counterNewMessages<1)
	{
		$counterNewMessages=$counterNewMessages+1;

	}//END WHILE while ($row = mysql_fetch_array($result))
	


	if ($counterNewMessages==0)
	{
		return false;
	}
	else
	{
		return true;
	}


}//END menuNotificationFriends()











} // End User class definition


?>