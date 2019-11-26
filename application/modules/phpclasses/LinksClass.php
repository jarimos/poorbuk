<?php
		

class LinksClass
{

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
	
	public $linksFolder,$linksUID,$newPhysicalPathFile,$fileNameOriginal;
	//const JPEG_QUALITY=80;//NOT USED 0-100 //TAKE CARE: TOO MUCH QUALITY PICTURES GET BIGGER IN SIZE //THATS WHY RIGHT NOW WE USE ORIGINAL QUALITY
	


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
		echo "<br>FUNCTION = ". __FUNCTION__;
		echo "<br>CLASS+METHOD = ".__METHOD__;
	}
	
	return $result;
	
	//CALL $result = $this->executeSQL($sql);
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


FUNCTION PASSING OPTIONAL PARAMETERS
UploadFile($userfolder,$file,$tutorials=0) 
WHERE $tutorials IS THE OPTIONAL PARAMETER WITH A DEFAULT VALUE


	*/	
// End User class definition

function showAllLinksTableHTML($sql)
{
	//echo '<br>'.$userid.'<br>';
	$status=true;
	
	$result = $this->executeSQL($sql);

	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		$mypostcounter =$mypostcounter+1;
		if ($mypostcounter ==0)
		{
		
		}
		/*
			echo $row{'fileLinksTableId'}."<br>";
			echo $row{'myFileName'}."<br>";
			echo $row{'myFilePath'}."<br>";
			echo $row{'userFolder'}."<br>";
			echo $row{'linksUID'}."<br>";
		*/
echo '
<table class="tableLinks" >


<tr>
	<td colspan="4" >
			<div style="width:300px;">
				<a data-ajax="false" href="'.$row{'myFilePath'}.'" >'.$row{'myFileName'}.'</a>
			</div>

	</td>
</tr>
<tr id="tableRow'.$row{'fileLinksTableId'}.'">	
	<td style="width:50px;">
				<label>'.$mypostcounter.'</label></br>

		
	</td>
	<td >

				<input type="text" class="inputEditLinkName" name="inputEditLinkName" value="'.$row{'myFileName'}.'">	
		
	</td>
	<td>	
				<button class="butEditLinkSave" value="'.$row{'fileLinksTableId'}.'" >Change</button>		
	</td>
	<td>
				<button class="butLinkDelete" value="'.$row{'fileLinksTableId'}.'" >Delete</button>		
				<div class="myFileName" style="display:none;">'.$row{'myFileName'}.'</div>
				<div class="userFolder" style="display:none;">'.$row{'userFolder'}.'</div>

	</td>

</tr>
</table>
';

			
	}
	
}



function linksInsert($newPhysicalPathFile,$fileNameOriginal,$linksFolder,$linksUID)
{	

$this->newPhysicalPathFile = $newPhysicalPathFile;
$this->fileNameOriginal = $fileNameOriginal;
$this->linksFolder = $linksFolder;
$this->linksUID = $linksUID;
		$status =1;
		$sql="INSERT INTO poorbuk_filelinks_table (myFileName,myFilePath,userFolder,linksUID)VALUES('$this->fileNameOriginal','$this->newPhysicalPathFile','$this->linksFolder','$this->linksUID')";

		
		$result = $this->executeSQL($sql);

		//return $status;
		
}//END function cloneInse




function showAllLinksTableQuery($userid,$linksFolder) 
{

	$this->linksUID = $userid;
	$this->linksFolder = $linksFolder;	
	$status=true;
	$sql="SELECT * FROM poorbuk_filelinks_table WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	//echo $sql;
	return $sql;
} 




function showLinksInListHTML($sql)
{
	//echo '<br>'.$userid.'<br>';
	$status=true;
	$result = $this->executeSQL($sql);

	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		if ($mypostcounter ==0)
		{
		
		}
		/*
			echo $row{'fileLinksTableId'}."<br>";
			echo $row{'myFileName'}."<br>";
			echo $row{'myFilePath'}."<br>";
			echo $row{'userFolder'}."<br>";
			echo $row{'linksUID'}."<br>";
		*/
		echo '<li><a data-ajax="false" href="'.$row{'myFilePath'}.'" >'.$row{'myFileName'}.'</a></li>';
			
	}
}





function updateLinksFunction($fileLinksTableId,$myFileName) 
{
	$status=true;
	$sql="UPDATE poorbuk_filelinks_table SET myFileName='".$myFileName."'WHERE fileLinksTableId='$fileLinksTableId' LIMIT 1";	
	$result = $this->executeSQL($sql);
	return $status;
} 



function deleteLinksFunction($fileLinksTableId) 
{
	$status=true;
	$sql="DELETE FROM poorbuk_filelinks_table WHERE fileLinksTableId='$fileLinksTableId' LIMIT 1";	
	$result = $this->executeSQL($sql);
	return $status;
} 




}//END class FileUploadClass
?>