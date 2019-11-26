<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

class Menu {

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
		//echo "Error query<br>";
		$result = ($result) ? 'true' : 'false';
		//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
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

	
}//END notificationPostShowAll()



function menuNotificationMessages() 
{

	$userid=$this->userid;
	
	$sql="
	SELECT * FROM poorbuk_messageindex_table mi
	LEFT JOIN poorbuk_message_table m
	ON m.messageid = mi.messageid
	LEFT JOIN poorbuk_user_table u
	ON u.userid = m.fromid
	WHERE mi.userid = $userid AND seencolor='yellow' ORDER BY mi.messageid DESC";
	//echo $sqlShowConversation;
	$result = mysql_query($sql);
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


}




function menuNotificationFriends() 
{

	$userid=$this->userid;
	
	$sql="SELECT * FROM poorbuk_amigo_table WHERE amigofriendid = '".$userid."' AND amigofriendstatus='REQUEST SENDED'";
	//echo $sqlShowConversation;
	$result = mysql_query($sql);
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