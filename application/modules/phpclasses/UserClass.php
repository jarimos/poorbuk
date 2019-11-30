<?php
		

class User {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
    public static $lort='lortis';
    public $status,$ip,$mail,$passUserOriginalCoded,$passUserOriginalBeforeCoded,
    $passUserRandomNow,$userid,$username,
    $userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
    $usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder,$userroll,$connection_DB;

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
/*CALL
$result = $this->executeSQL($sql);
*/
	//echo '<br>'.$userid.'<br>';
	$this->status=true;
        $this->connection_DB =  $this->startConnectionDB();

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
function genRandomStringLogin() 
{
/*GENERATE A RANDOM PASS OF 150 CHARS FOR USER SESSION*/

    $characters = '0123456789QWERTYUIOPSDFGHHJKZXCVBNMqwertyuiopasdfghjklzxcvbnm';
    $passLength = 150;
    $passMoreThanLength = 160;
    $Mystring = '';

    //substr("abcdef", -1);  
    for ($p = 0;$p <= $passMoreThanLength;$p++) 
    {
            $Mystring .= substr($characters,mt_rand(0, strlen($characters)),1);

    }

    $Mystring = substr($Mystring,0,$passLength);

    return $Mystring;
}


function password_verification_by_UserId($userid,$password) 
{
       
       
       $this->getUserById($userid);
       
       if ($this->passUserOriginalCoded == sha1($password))
       {
           $this->status=true;
       }
        else 
       {
           $this->status=false;
       }
       

}
function getUserById($userid) 
{
	

                
		$sql ="SELECT * FROM poorbuk_user_table WHERE userid='$userid' LIMIT 1";
                
                $result = $this->executeSQL($sql);	
                $user_exist=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($user_exist)
		{
			$this->mail = $user_exist{'usermail'};
                        //pass= random generated??? = eMeXm96hT7kQkJMeGGkgW8wsEpmePeuBkZPDorM1OD9fwCmhBV7jB0tFjIR8KSTeFRWtlK9N2foaIf6J0PNwCV4oTQyy0HQxPqFRVrzWi29tH7Hmg20EzNHYpfTFTdj2yBnfOjWUNUZgpVGSojzHId
			$this->passUserRandomNow = $user_exist{'passUserRandomNow'};
                        //passUserOriginalCoded= sha1(7) = 902ba3cda1883801594b6e1b452790cc53948fda
			$this->passUserOriginalCoded = $user_exist{'passUserOriginalCoded'};
			$this->userid = $user_exist{'userid'};
			$this->username = $user_exist{'username'};
			$this->userphoto = $user_exist{'userphoto'};
			$this->userbirthday = $user_exist{'userbirthday'};
			$this->userlanguage = $user_exist{'userlanguage'};
			$this->userfolder = $user_exist{'userfolder'};
			$this->userroll = $user_exist{'userroll'};

		}
	
		return $this->status;
} // End getUserById()


function register($mail,$passUserOriginalCoded,$ip,$passUserRandomNow,$name,$language) 
{
    /*OLD ONE
                //$this->connection_DB =  $this->startConnectionDB();

                //$defaultPicture = POORBUK_PATH_ABSOLUTE_ROOT."/application/files/profileimages/myprofil.jpg";
                //$defaultPicture = "application/files/profileimages/myprofil.jpg";

                $sql = 'INSERT INTO poorbuk_user_table (username, passUserOriginalCoded,passUserOriginalCoded, 
		usermail,userlanguage) 
		values ("'.$name.'", 
		"'.$passUserRandomNow.'",
		"'.$passUserOriginalCoded.'",
		"'.$mail.'",
		"'.$language.'"

		)';
                
		//$last_id = mysql_insert_id();
    
                $this->executeSQL($sql);
                return $this->status;
	
*/
/*
 * INSERT WITH PREPARE MYSQLI 2018: NOTE ("sssss") LOOKS LIKE THE FIRST PARAMETER,
 *  BUT IT IS FOR PREPARING 5 STRINGS TYPE FOR THE 5 VARIABLES ($name,$passUserOriginalCoded,$passUserRandomNow,$mail,$language)
 * The argument for the variables may be one of four types:
    i - integer
    d - double
    s - string
    b - BLOB
 */
    $this->connection_DB =  $this->startConnectionDB();
    $INSERT_NEW_USER_PREPARED = $this->connection_DB->prepare("INSERT INTO poorbuk_user_table (username, passUserOriginalCoded,passUserRandomNow, 
                    usermail,userlanguage)  VALUES (?,?,?,?,?)");
    $INSERT_NEW_USER_PREPARED->bind_param("sssss",$name,$passUserOriginalCoded,$passUserRandomNow,$mail,$language);
    $this->status = $INSERT_NEW_USER_PREPARED->execute();		
    return $this->status;
} // End register()	


function checkIfMailExists($mail) 
{
                $MailExists=false;//the mail does exists by default
                
		$sql ="SELECT * FROM poorbuk_user_table WHERE usermail='$mail' LIMIT 1";


                $result = $this->executeSQL($sql);
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                //2018 test
                //$Rowsaffected = null;
                //$Rowsaffected = mysqli_num_rows($result);
		//$Rowsaffected =mysql_num_rows($result);
		//echo "Records selected = ". $Rowsaffected;
                if ($row)
                {
                    $MailExists=true;
                }
                
                /*
                if (is_null($result))
                {
                    $MailExists=false;
                }
		if ($result ==0 )
                {
                    $MailExists=false;
                        
                }
		*/
		return $MailExists;
	
}


function login($mail,$passUserOriginalCoded,$ip,$passUserRandomNow,$passUserOriginalBeforeCoded) 
{
	//echo "hola";
	
		$sql ="SELECT * FROM poorbuk_user_table WHERE usermail='$mail' AND passUserOriginalCoded='$passUserOriginalCoded' LIMIT 1";


                //$result = $this->executeSQL($sql);	
                $this->connection_DB =  $this->startConnectionDB();		
                //2018
                $result=mysqli_query($this->connection_DB,$sql);
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($row)
		{
			
			/*
			INSIDE CLASS USING LIST
			return array(1,$existe{'userid'},$existe{'username'},$existe{'userphoto'},$existe{'userbirthday'},$existe{'userlanguage'},
			$existe{'usercssbackgroundpicture'},$existe{'usercssbackgroundcolor'},$existe{'usercssbackgroundpicturesize'},$existe{'userfolder'});
			
			
			THE CALL FOR LIST OUTSIDE THE CLASS
			list($this->status,$userid,$username,$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
			$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder) = $newUser->login($mail, $passUserOriginalCoded,$ip,$passUserRandomNow);	
			*/
			
			$this->ip = $ip;
			$this->mail = $mail;
			$this->passUserRandomNow = $passUserRandomNow;
			$this->passUserOriginalCoded = $passUserOriginalCoded;
                        $this->passoriginal = $passUserOriginalBeforeCoded;//NOT IN DATABASE. CODED                                           
                        $this->userid = $row{'userid'};
                        $this->username = $row{'username'};
                        $this->userphoto = $row{'userphoto'};
                        $this->userbirthday = $row{'userbirthday'};
                        $this->userlanguage = $row{'userlanguage'};
                        $this->userfolder = $row{'userfolder'};
                        $this->userroll = $row{'userroll'};  
                        $this->status = true;
                            
                            
                            
                    }

                    else
                    {
                            $this->status = false;
                    }

                return $this->status;
} // End login()
	
	

function rcopyfolderfiles($sourceFolder, $destinyFolder) 
{
/*  CALL EXAMPLE
    NOTES:
 * 1- WARNING!!! REMARK THE DESTINY HAVE BACKSLASH AT THE END BUT THE SOURCE HAVE NOT!!!
 * 2- @mkdir AVOID OUTPUT FOR THIS COMMAND WHEN EXECUTED. IT AVOID ERRORS WITH 
 *    "HEADERS ALLREADY SENT" AND SO ON, BUT DOESN'T SHOWS ERRORS IF THE FOLDER-DIR-FILE ALLREADY  EXISTS
 *    TO ACTIVATE mkdir ERRORS REMOVE THE @ FROM @mkdir
    $destinyFolder=$_SERVER['DOCUMENT_ROOT']. '/TEST/pages/';
    $sourceFolder = $_SERVER['DOCUMENT_ROOT']. '/pages';
    echo "destinyFolder = $destinyFolder <br>sourceFolder = $sourceFolder";
    rcopyfolderfiles($sourceFolder, $destinyFolder);
 */
  if (is_dir($sourceFolder)) //COPY FOLDER
  {
        //echo "<br>copy dir = $destinyFolder";
        if  (!@mkdir($destinyFolder, 0755, true)) 
        {
                //die('Failed to create folders OUTSIDE...'.$destinyFolder);
        }
        
        $files = scandir($sourceFolder);

        
        foreach ($files as $file)
        {
            
            if (( $file != '.' ) && ( $file != '..' )) 
            {    
                $sourceFile = $sourceFolder."/".$file;
                if (is_dir($sourceFile)) 
                {
   
                    //warning!!! THE TRICK FOR DESTINY IN FOLDERS IS THAT THE 
                    //SLASH IS AFTER THE FILENAME AND NOT BETWEEN!!!
                    $destinyFolderDir = $destinyFolder.$file."/";

                    //echo "<br>copy folder inside from = $sourceFolderDir";
                    //echo "<br>copy folder inside to = $destinyFolderDir";
                    
                    $this->rcopyfolderfiles( $sourceFile , $destinyFolderDir); 

                }
                else
                {
                    $destinyFile = "$destinyFolder/$file";
                    //echo "<br>copy file inside folder = $destinyFolder.$file";    
                    copy($sourceFile, $destinyFile);    
           
                }
            }

        }
        
        
 }
 else IF (is_file($sourceFolder)) //COPY FILE (IF THE SOURCE IS JUST A FILE )
 {
    echo "<br>copy file source = $sourceFolder";
    echo "<br>copy file folder = $destinyFolder";
    $fileNameFromPath = end(explode('/',$sourceFolder));
    $destinyFolder.= $fileNameFromPath;
    if ($sourceFolder != "." && $sourceFolder != "..") copy($sourceFolder, $destinyFolder); 
 }
 
 //echo "<br>rcopyfolderfiles FINISHED!!!";
}  

function fileNameFromPath($file) 
{ 
    return end(explode('/',$file)); 
}  	
	
	
function registerCreateUpdateUserFolder()//$userid,$ip) 
{	

    /**************COPY FOLDERS WITH CONTENT FUNCTIONS ALL RELATED********************************/
    //$userdirid=$last_id;
    //$userdirid=1;
    //$userbasedir = '../../application/files/users/';
    $userbasedir = POORBUK_PATH_ABSOLUTE_USERS.'/';
    $destinyFolder=$userbasedir.$this->userid."/";
    $sourceFolder = POORBUK_PATH_ABSOLUTE_USERS.'/originalacopiarnoborrar';
    $folderid= $this->userid;
    $this->rcopyfolderfiles($sourceFolder,$destinyFolder);
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

    $result = $this->executeSQL($sql);	

    //UPDATE USER FOLDER IN CLASS

    $this->userfolder = $folderid;

    //echo '$this->status'.$result.'<br>';
    return $this->status;
			
}
	
function registerSendMail()//$userid,$ip) 
{	
    $this->status=true;
    $adminmail= 'admin@poorbuk.com';
    $subject = 'poorbuk: your username and pass' ;
    $message ="Wellcome to poorbuk. Log in at  http://localhost/ .
    Thanks a lot for using poorbook. You will cooperate for a better world 
    just having fun at the same time. Enjoy :D \n\r
    Username = ".$this->mail."\n\r
    Pass = ".$this->passoriginal;

    //the first adress is the adress the mail will be sent. The question is: who is sent to? user or admin?
    $this->status = mail($this->mail, $subject, $message, "From:" .$adminmail);
    //echo "Thanks a lot for using poorbook. You will cooperate for a better world just having fun at the same time. Enjoy :D";
    //CHANGED IN 2018 BECAUSE MAY BE PROBLEMS WITH SERVER
    //CHANGED FROM THIS:
    //return $this->status; 
    //TO THIS:
    return true;
	
} //END registerSendMail()

function mailToForgotMyPass($passUserRandomNow)//$userid,$ip) 
{	

    /************MAIL PASSWORD TO USER********************************************************************/
            $adminmail= 'admin@poorbuk.com';
            //$adminmail= 'jarimortega@gmail.com';
            $mail=$this->mail;//'jarimortega@gmail.com';
            //echo ' - $mail = '.$mail;
            $subject = 'Poorbook: your username and pass' ;
            //$message ="Please, press this link and create a new password: http://localhost/poorbuk/iniciarsesionolvidepassnewpass.php?a=".$passUserRandomNow;
            $message ="Please, press this link and create a new password: http://localhost/poorbuk/index.php?page=iniciarsesionolvidepassnewpass&a=".$passUserRandomNow;
            //the first adress is the adress the mail will be sent. The question is: who is sent to? user or admin?
            $this->status = mail($mail, $subject, $message, "From: " .$adminmail);
            //echo "Thanks a lot for helping people using poorbook. Your password have been sent to your email Enjoy :D";
            /****************END MAIL PASSWORD TO USER**********************************************************/
            //CHANGED IN 2018 BECAUSE MAY BE PROBLEMS WITH SERVER
            //CHANGED FROM THIS:
            //return $this->status; 
            //TO THIS:
            return true;
            
	
} //END registerSendMail()
	
function updateUserIP()//$userid,$ip) 
{
	
//  DELETE PREVIOS RECORDS FOR THIS USER IN IPTABLE
    $sql = 'DELETE FROM poorbuk_ip_table WHERE ipuserid="'.$this->userid.'"';	
    $result = $this->executeSQL($sql);					
    /**********INSERT IP + USER ID + TIME_NOW INTO IPTABLE************/	
    $sql = 'INSERT INTO poorbuk_ip_table (ipadr, ipuserid) 
    values ("'.$this->ip.'", 
    "'.$this->userid.'")';
    $result = $this->executeSQL($sql);
    return $this->status;
} // End updateUserIP()

function updateUserIpOfflineDetection($userid)
{
    $this->userid = $userid;
    $ip = mysqli_real_escape_string_jarim_ByReference($_SERVER['REMOTE_ADDR']);
    $this->ip = $ip;
    //DELETE PREVIOS RECORDS FOR THIS USER IN IPTABLE
    $sql = 'DELETE FROM poorbuk_ip_table WHERE ipuserid="'.$this->userid.'"';	
    $result = $this->executeSQL($sql);					
    //INSERT IP + USER ID + TIME_NOW INTO IPTABLE
    $sql = 'INSERT INTO poorbuk_ip_table (ipadr, ipuserid) 
    values ("'.$this->ip.'", 
    "'.$this->userid.'")';
    $result = $this->executeSQL($sql);
    return $this->status;
} // End updateUserIP()
	
function UpdateUserPicture($myuserphoto,$userid)//$userid,$ip) 
{
	
    $this->status=true;
    if ($myuserphoto !="")//UPDATE PHOTO IF CHANGED
    {
        $sql ="UPDATE 
        poorbuk_user_table SET userphoto='$myuserphoto' WHERE userid='$userid'";
        $result = $this->executeSQL($sql);	
    }				

    return $this->status;
} // End updateUserIP()	
	

	
function password_Update_by_UserId($myNewUserPass,$myuserid,$oldpass)//$passUserRandomNow,$mail,$passUserOriginalCoded) 
{

    //VERIFICATION FUNCTION : SET STATUS TO FALSE IF PASS NOT MATCH
    $this->password_verification_by_UserId($myuserid,$oldpass);
    if ($this->status)
    {
        $myNewUserPass = sha1($myNewUserPass);
        $sql ="UPDATE poorbuk_user_table SET passUserOriginalCoded='$myNewUserPass' WHERE userid='$myuserid'";
        $result = $this->executeSQL($sql);
    }

    return $this->status;          


} 	

function checkIf_RandomSessionPass_for_Mail_Exists($passForgotTemporal,$mail) 
{
/*CHECK IF THE SESSION OR TEMPORAL PASS MATCH*/
	$sql = "SELECT * FROM poorbuk_user_table WHERE usermail='$mail' AND passUserOriginalCoded='$passForgotTemporal'";

        $result = $this->executeSQL($sql);
        $Rowsaffected =mysqli_num_rows($result);
        //echo "Records selected = ". $Rowsaffected;
        //$this->status=true;
        if ($Rowsaffected ==0){$this->status=false;}
        return $this->status;
	
}


function password_Update_Temporal_Pass($passUserOriginalCoded,$passUserRandomNow,$passForgotTemporal,$mail)
{
    $sql ="UPDATE poorbuk_user_table SET passUserOriginalCoded='$passUserOriginalCoded', passUserRandomNow='$passUserRandomNow'
    WHERE usermail='$mail' AND passUserOriginalCoded='$passForgotTemporal' ";
    $result = $this->executeSQL($sql);
    
    return $this->status;          
} // End 	

function password_Update($passUserOriginalBeforeCoded,$passUserRandomNow,$mail)//$passUserRandomNow,$mail,$passUserOriginalCoded) 
{
    $sql ="UPDATE poorbuk_user_table SET passUserOriginalCoded='$passUserOriginalBeforeCoded',passUserRandomNow='$passUserRandomNow'
    WHERE usermail='$mail'  ";
    $result = $this->executeSQL($sql);
    
    return $this->status;          
} // End 	



function randomPassUpdateLogInRegister()//$passUserRandomNow,$mail,$passUserOriginalCoded) 
{
        //$this->passUserOriginalCoded=$passUserRandomNow;
        //$this->mail=$mail;
        $this->status=true;
        $sql="UPDATE poorbuk_user_table SET passUserOriginalCoded='".$this->passUserOriginalCoded."'WHERE usermail='".$this->mail."' AND passUserRandomNow='".$this->passUserRandomNow."' LIMIT 1";	
        $result = $this->executeSQL($sql);

        return $this->status;

} // End randomPassUpdate()

function randomPassUpdate($mail,$passUserRandomNow)//$passUserRandomNow,$mail,$passUserOriginalCoded) 
{
        $this->passUserOriginalCoded=$passUserRandomNow;
        $this->mail=$mail;
        $this->status=true;
        $sql="UPDATE poorbuk_user_table SET passUserOriginalCoded='".$this->passUserOriginalCoded."'WHERE usermail='".$this->mail."'  LIMIT 1";	
        $result = $this->executeSQL($sql);

        return $this->status;

} // End randomPassUpdate()












	
	
	

function makeUserJsonForLogInError()//$ip) 
{

    $myUser = '{'.
    '"mail":"none" ,'.
    '"pass":"none" ,'.
    '"ipadr":"'.$this->ip.'" ,'.	
    '"status":"error"'.
    '}';

    echo $myUser;
    return $myUser;

} // End makeUserJsonForLogInError()
	
	

 function makeUserJsonForLogIn()
{
    $this->status=true;
    $myUser = '{'.
         
    '"mail":"'.$this->mail.'", '.
    '"passUserOriginalCoded":"'.$this->passUserOriginalCoded.'" ,'.
    //'"userdescription":"'.$existe{'userdescription'}.'" ,'.
    '"userid":"'.$this->userid.'" ,'.
    '"username":"'.$this->username.'" ,'.//'"username":"'.utf8_encode($existe{'username'}).'" ,'.
    '"userphoto":"'.$this->userphoto.'" ,'.
    '"userbirthdate":"'.$this->userbirthday.'" ,'.
    '"userlanguage":"'.$this->userlanguage.'" ,'.
    '"userfolder":"'.$this->userfolder.'" ,'.
    '"userroll":"'.$this->userroll.'" ,'.
    '"ipadr":"'.$this->ip.'" ,'.				
    '"status":"success"'.
    '}';

    echo $myUser;
    return $this->status;
} // End makeUserJsonForLogIn()
	
	
	
	
	
function getUserRoll($userid) 
{

    //$userid=$this->userid;
    $sql="SELECT userroll FROM poorbuk_user_table WHERE userid='$userid' LIMIT 1";

    $result = $this->executeSQL($sql);


    while ($row = mysql_fetch_array($result))
    {
        $userroll=$row{'userroll'};

    }

    return $userroll;

}	
	
	
function setUserLanguage($userid,$myuserlanguage) 
{
    $this->status=true;
    //$userid=$this->userid;
    $sql="UPDATE poorbuk_user_table SET userlanguage='$myuserlanguage' WHERE userid='$userid' LIMIT 1";	


    $result = $this->executeSQL($sql);

    return $this->status;

}		
	
	

	
	




	
	
	
	

} // End User class definition




