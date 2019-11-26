<?php
		

class GuestBookClass {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
    public $ip,$mail,$passUserOriginalCoded,$passUserOriginalBeforeCoded,
	$passUserRandomNow,$userid,$username,
	$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
	$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder,$last_id,$startConnectionDB;

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

function showAllPosts() 
{

	$status=true;	
	
	$sql="SELECT *
	FROM poorbuk_guestbook_table 
	ORDER BY guestbooid DESC";

	$status = $this->showAllPostsHTML($sql);
	
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}	
	
	return $status;	
	
}//END showAllPosts()
 
  
function showAllPostsHTML($sql)
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
	

	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		if ($mypostcounter ==0)
		{
		
		} 
		
		/*********POST CONTENT***************************************************************************/
		echo '<div class="nicefont myPostGuestBook"  id="myPostGuestBook">';
			echo $row{'guestbooktimestamp'};
			echo '<br><br>';
			echo $row{'guestbookuser'}.'<br>';
			echo '<br><br>';
			echo $row{'guestbookpost'};

		echo '</div ><br>';
	
			
	}	
	
	return $status;	
}

function insertPost($myusername,$mypostnow) 
{	
	$status=true;
	$sql="INSERT INTO poorbuk_guestbook_table (guestbookpost,guestbookuser)VALUES('$mypostnow','$myusername')";
	
	
	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
	}
	$last_id = mysql_insert_id();
	$this->last_id = $last_id;	
	return $status;	
}


} // End User class definition


?>