<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

class User {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
    var $ip,$mail,$passUserOriginalCoded,$passUserOriginalBeforeCoded,
	$passUserRandomNow,$userid,$username,
	$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
	$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder;

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
    function getUserById($userid) 
	{
	
		$result=0;
		$sql ="SELECT * FROM poorbuk_user_table WHERE userid='$userid' LIMIT 1";
		if (!$result = mysql_query($sql)) 
		{
			echo "Error query function getUserById<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		}	
	
	
	

		
		$status=0;
		if($existe = @mysql_fetch_array($executedQuery))
		{
		
			$this->ip = $ip;
			$this->mail = $mail;
			$this->passUserRandomNow = $passUserRandomNow;
			$this->passUserOriginalCoded = $passUserOriginalCoded;
			$this->userid = $existe{'userid'};
			$this->username = $existe{'username'};
			$this->userphoto = $existe{'userphoto'};
			$this->userbirthday = $existe{'userbirthday'};
			$this->userlanguage = $existe{'userlanguage'};
			$this->userfolder = $existe{'userfolder'};
			$status=1;
		}
	
		return $result;
    } // End getUserById()
	
	
    function register($mail,$passUserOriginalCoded,$ip,$passUserRandomNow,$name) 
	{
	
		$result=0;	
		$sql = 'INSERT INTO poorbuk_user_table (username, passUserOriginalCoded,passUserOriginalCoded, 
		usermail,userlanguage) 
		values ("'.mysqli_real_escape_string_jarim_ByReference($name).'", 
		"'.mysqli_real_escape_string_jarim_ByReference($passUserRandomNow).'",
		"'.mysqli_real_escape_string_jarim_ByReference($passUserOriginalCoded).'",
		"'.mysqli_real_escape_string_jarim_ByReference($mail).'",
		"Spanish")';
		//$last_id = mysql_insert_id();
		
		
		if (!$result = mysql_query($sql)) 
		{
			echo "Error query function register<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		}	
	
	
	
		return $result;
    } // End register()	
	
    function login($mail,$passUserOriginalCoded,$ip,$passUserRandomNow,$passUserOriginalBeforeCoded) 
	{
	
		$result=0;	
		$sql ="SELECT * FROM poorbuk_user_table WHERE usermail='$mail' AND passUserOriginalCoded='$passUserOriginalCoded' LIMIT 1";


		if (!$result = mysql_query($sql)) 
		{
			echo "Error query function login<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		}	
		

		if($existe = @mysql_fetch_array($result))
		{
		
			/*
			INSIDE CLASS USING LIST
			return array(1,$existe{'userid'},$existe{'username'},$existe{'userphoto'},$existe{'userbirthday'},$existe{'userlanguage'},
			$existe{'usercssbackgroundpicture'},$existe{'usercssbackgroundcolor'},$existe{'usercssbackgroundpicturesize'},$existe{'userfolder'});
			
			
			THE CALL FOR LIST OUTSIDE THE CLASS
			list($status,$userid,$username,$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
			$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder) = $newUser->login($mail, $passUserOriginalCoded,$ip,$passUserRandomNow);	
			*/
			
			$this->ip = $ip;
			$this->mail = $mail;
			$this->passUserRandomNow = $passUserOriginalCoded;
			$this->passUserOriginalCoded = $passUserRandomNow;
			$this->userid = $existe{'userid'};
			$this->username = $existe{'username'};
			$this->userphoto = $existe{'userphoto'};
			$this->userbirthday = $existe{'userbirthday'};
			$this->userlanguage = $existe{'userlanguage'};
			$this->userfolder = $existe{'userfolder'};
			$this->passoriginal = $passUserOriginalBeforeCoded;		
			
		}
	
		return $result;
    } // End login()
	
	
	
	
	
    function registerCreateUpdateUserFolder()//$userid,$ip) 
	{	
			$result=0;	
			/**************COPY FOLDERS WITH CONTENT FUNCTIONS ALL RELATED********************************/
			//$userdirid=$last_id;
			//$userdirid=1;
			//$userbasedir = '../../application/files/users/';
			$userbasedir = $_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/files/users/';
			$destinyFolder=$userbasedir.$this->userid;
			$sourceFolder = $_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/files/users/originalacopiarnoborrar';
			//CALL FUNCTION FROM rcopyfolderfiles.php FOR COPY FILES+FOLDERS FROM ORIGINAL FOLDER AND CREATE NEW-FOLDER
			$folderid = rcopyfolderfiles($sourceFolder,$destinyFolder,$this->userid,$userbasedir);
			$userpath = '/poorbuk/application/files/users/';
			$newuserpath=$userpath.$folderid;
			//CAUTION: ECHO FAIL CREATION OF EVAL OBJECT IN REGISTER.JS / UNCOMMENT ONLY FOR TESTING PURPOSES
			//ECHO '<BR><BR>USER DIR ID = <BR>'.$userdirid.'<BR><BR>';
				
			/***************END COPY FOLDERS WITH CONTENT FUNCTIONS ALL RELATED********************************/
				
				
			/**************UPDATE/INSERT USER FOLDER*************"'*********/
			$sql ="UPDATE 
			poorbuk_user_table SET userfolder='".$folderid."'
			WHERE userid='".$this->userid."'";
			/**********************************************************/

			 if (!$result = mysql_query($sql)) 
			{
				echo "Error query function registerCreateUpdateUserFolder<br>";
				$result = ($result) ? 'true' : 'false';
				echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			}	
			
			//UPDATE USER FOLDER IN CLASS
			$this->userfolder = $folderid;
			
			//echo '$status'.$result.'<br>';
			return $result;
			
	}
	
    function registerSendMail()//$userid,$ip) 
	{	
		$adminmail= 'admin@poorbuk.com';
		$subject = 'poorbuk: your username and pass' ;
		$message ="Wellcome to poorbuk. Log in at  http://www.poorbuk.com/ .
		Thanks a lot for using poorbook. You will cooperate for a better world 
		just having fun at the same time. Enjoy :D \n\r
		Username = ".$this->mail."\n\r
		Pass = ".$this->passoriginal;

		//the first adress is the adress the mail will be sent. The question is: who is sent to? user or admin?
		mail($this->mail, $subject,
		$message, "From:" .$adminmail);
		//echo "Thanks a lot for using poorbook. You will cooperate for a better world just having fun at the same time. Enjoy :D";

	
	} //END registerSendMail()
	
    function updateUserIP()//$userid,$ip) 
	{
	
	
				/**********DELETE PREVIOS RECORDS FOR THIS USER IN IPTABLE*********/	
				$deletePreviouslyIpsForThisUser = @mysql_query('DELETE FROM poorbuk_ip_table WHERE ipuserid="'.$this->userid.'"');				
				/**********INSERT IP + USER ID + TIME_NOW INTO IPTABLE************/	
				//$myTimeNow = date("Y-m-d H:i:s"); INSERTED AUTO LIKE TIMESTAMP FIELD IN MYSQL
				$iptableaddnewuser = @mysql_query('INSERT INTO poorbuk_ip_table (ipadr, ipuserid) 
				values ("'.$this->ip.'", 
				"'.$this->userid.'")');
				//echo 'IP = '.$ip.' ID= '.$last_id.' TIMENOW = '.$myTimeNow.' ';
				/********************************************************/	
				/**********HTACCESS INSERT IP***********************************/	
				/*TEMPORALLY OFF				
				$fh = fopen(($_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/.htaccess'), 'a') or die("can't open file");
				$stringData = " ".$ip;
				fwrite($fh, $stringData);
				fclose($fh);
				/**********END HTACCESS INSERT IP***********************************/	
    } // End updateUserIP()
	
	
	
	

	
	
	
	

    function randomPassUpdate()//$passUserRandomNow,$mail,$passUserOriginalCoded) 
	{
		$result=0;
		$sql="UPDATE poorbuk_user_table SET passUserOriginalCoded='".$this->passUserOriginalCoded."'WHERE usermail='".$this->mail."' AND passUserOriginalCoded='".$this->passUserRandomNow."' LIMIT 1";	
		 if (!$result = mysql_query($sql)) 
		{
			echo "Error query function randomPassUpdate<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		}
		
		
		return $result;

    } // End randomPassUpdate()
	
	
	
	

	function makeUserJsonForLogInError()//$ip) 
	{
	
		$myUser = '{'.
		'"mail":"none" ,'.
		'"pass":"none" ,'.
		'"ipadr":"'.$this->ip.'" ,'.	
		'"status":"error"'.
		'}';
				
		return $myUser;

    } // End makeUserJsonForLogInError()
	
	

	 function makeUserJsonForLogIn()
	{
	
				$myUser = '{'.
				'"mail":"'.$this->mail.'" ,'.
				'"passUserOriginalCoded":"'.$this->passUserOriginalCoded.'" ,'.
				//'"userdescription":"'.$existe{'userdescription'}.'" ,'.
				'"userid":"'.$this->userid.'" ,'.
				'"username":"'.$this->username.'" ,'.//'"username":"'.utf8_encode($existe{'username'}).'" ,'.
				'"userphoto":"'.$this->userphoto.'" ,'.
				'"userbirthdate":"'.$this->userbirthday.'" ,'.
				'"userlanguage":"'.$this->userlanguage.'" ,'.
				'"userfolder":"'.$this->userfolder.'" ,'.
				'"ipadr":"'.$this->ip.'" ,'.				
				
				'"status":"success"'.
				'}';
				
				return $myUser;
    } // End makeUserJsonForLogIn()
	
	
	
	
	
function getUserRoll($userid) 
{

	//$userid=$this->userid;
	$sql="SELECT userroll FROM poorbuk_user_table WHERE userid='$userid' LIMIT 1";

	 if (!$result = mysql_query($sql)) 
	{
		echo "Error query function getUserRoll<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
	}
		

	while ($row = mysql_fetch_array($result))
	{
		$userroll=$row{'userroll'};
			
	}

	return $userroll;

}	
	
	
function setUserLanguage($userid,$myuserlanguage) 
{
	$result=0;
	//$userid=$this->userid;
	$sql="UPDATE poorbuk_user_table SET userlanguage='$myuserlanguage' WHERE userid='$userid' LIMIT 1";	


	 if (!$result = mysql_query($sql)) 
	{
		echo "Error query function setUserLanguage<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
	}

	return $result;

}		
	
	

	
	




	
	
	
	

} // End User class definition




?>