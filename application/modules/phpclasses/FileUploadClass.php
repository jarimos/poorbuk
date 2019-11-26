<?php
		

class FileUploadClass
{

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
	
	public $userdir,$savefolder,$pathname,$filename,$newPhysicalPathFile,$saveUserFolder,$fileNameOriginal,$linksFolder,$linksUID;
	const IMAGE_FOLDER = '/images/';	
	const FILE_FOLDER = '/files/';	
	const PATH_AFTER_SERVER_ROOT = 'application/files/users/';
	const MAX_PIC_WIDTH =900;
	//const JPEG_QUALITY=80;//NOT USED 0-100 //TAKE CARE: TOO MUCH QUALITY PICTURES GET BIGGER IN SIZE //THATS WHY RIGHT NOW WE USE ORIGINAL QUALITY
	
	//public $savefolder = POORBUK_PATH_ABSOLUTE_USERS."/".$userdir.IMAGE_FOLDER OR FILE_FOLDER;	
	//public $pathname = PATH_AFTER_SERVER_ROOT.$userdir.IMAGE_FOLDER OR FILE_FOLDER;
	public $max_size = 10240;			// maxim size for image file, in KiloBytes
	public $max_size_pixels ='390px';  // maxim size in pixels for image file, in pixels
	
	

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


function UploadImage($userfolder,$file) 
{
	$this->saveUserFolder = $userfolder;
	//echo '$userfolder = '.$userfolder.'<br>';
	//echo 'POORBUK_PATH_ABSOLUTE_ROOT = '.POORBUK_PATH_ABSOLUTE_ROOT.'<br>';
	
	$savefolder = POORBUK_PATH_ABSOLUTE_USERS."/".$userfolder.self::IMAGE_FOLDER;	
	//$savefolder = $_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/files/users/'.$userfolder.self::IMAGE_FOLDER;	

	//echo '$savefolder = '.$savefolder.'<br>';
	$pathname = self::PATH_AFTER_SERVER_ROOT.$userfolder.self::IMAGE_FOLDER;

	$max_size = 10;			// maxim size for image file, in Megas


	// Allowed image types
//	$allowtype = array('bmp', 'gif', 'jpg', 'jpeg', 'gif', 'png');

	/** Uploading the image **/
	$newPhysicalPath = '';
	// if is received a valid file
	if (isset ($file)) 
	{

		// checks to have the allowed extension
		$myfilenameX=$file['name'];
		$myfilenameXSplitted = explode(".", strtolower($myfilenameX));
/*		$type = end($myfilenameXSplitted);
		if (in_array($type, $allowtype)) 
		{
*/
			// check its size
			$fileSize=$file['size'];
			$max_size =$max_size*1000000;
			//echo '<br>filesize ='.$fileSize.'<br>';
			//echo '<br>max_size ='.$max_size.'<br>';			
			
			if ($file['size']<=$max_size) 
			{
				// if no errors
				if ($file['error'] == 0) 
				{	  
					/*******RENAMING THE UPLOADED FILE TO AVOID DUPLICATES**************/	

					$newPhysicalPath = $this->RenameFile($savefolder,$myfilenameX);
					//echo '<br>PHYSICAL PATH = '.$newPhysicalPath.'<br>';

					
					// if the file can`t be uploaded, return a message
					if (!move_uploaded_file ($file['tmp_name'], $newPhysicalPath)) 
					{
						$newPhysicalPath = $newPhysicalPath.'';
						return $newPhysicalPath;
					}
					else//SUCCESS!!!!!
					{
					
						
						/***CHECK IF IMAGE: IsAnImage RETURNS TRUE OR FALSE**/
						$IsAnImage = $this->IsAnImage($newPhysicalPath); 	
						//echo '<br>$IsAnImage = '.$IsAnImage.'<br>';
						
						if($IsAnImage)
						{
							/***RESIZE IMAGE**/
							$IsImageTypeAllowed = $this->IsImageTypeAllowed($newPhysicalPath);
							//echo '<br>$IsImageTypeAllowed '.$IsImageTypeAllowed.'<br>';
							
							if($IsImageTypeAllowed)
							{
								$this->ResizeImagePixels($newPhysicalPath);							
								$newPhysicalPath = $pathname.$this->filename;
                                                                //REMOVE THE FIRST SLASH FROM THE PATH
                                                                //$newPhysicalPath =  substr($newPhysicalPath,1);
                                                                
								$this->newPhysicalPathFile=$newPhysicalPath;
								// Return the uploaded image.
//                                                                echo '<br><br>newPhysicalPath = '.$newPhysicalPath.'<br><br>';
//                                                                echo '<br><br>pathname = '.$pathname.'<br><br>';
								return $newPhysicalPath;
							}
							else
							{
								$newPhysicalPath = 'application/files/imagesdefault/default.jpg';
								// Return the uploaded image.
								return $newPhysicalPath;							
							
							}
						}
						else
						{
							$newPhysicalPath = '';
							// Return the uploaded image.
							return $newPhysicalPath;
						
						}
						
						//echo 'The image was successfully loaded <br>';
						//echo '$userfolder = '.$userfolder;echo '<br>$newPhysicalPath = '.$newPhysicalPath;
						/******************************/
						

						

					}
				}
			}
			else 
			{ 
				$newPhysicalPath ="";// 'The file <b>'. $file['name']. '</b> exceeds the maximum permitted size <i>'. $max_size. 'KB</i>'; 
				return $newPhysicalPath;
			}
/*		}
		else 
		{ 
			$newPhysicalPath ="";// 'The file <b>'. $file['name']. '</b> has not an allowed extension'; 
		}
*/
	}
	else
	{
				$newPhysicalPath ="";// 'The file does NOT exist OR is too big for the server max allowed 
				return $newPhysicalPath;
	
	}
}//END function UploadImage($userfolder,$file) 


function IsAnImage($newPhysicalPath) 
{
	$type = exif_imagetype($newPhysicalPath); 
	if ($type == true) 
	{

		$IsAnImage=true;
		return $IsAnImage;
	}
	else
	{
		$IsAnImage=false;
		return $IsAnImage;
	}
}

function IsImageTypeAllowed($newPhysicalPath) 
{
		// Get the image type
	  $attrs = getimagesize ( $newPhysicalPath );
	  $imageType = $attrs[2];
	  //echo '<br>$imageType '.$imageType.'<br>' ;

	  
	  // CHECK ALLOWED TYPES
	  switch ( $imageType ) 
	  {
		case IMAGETYPE_GIF:
			$IsImageTypeAllowed=true;
			break;
		case IMAGETYPE_JPEG:
			$IsImageTypeAllowed=true;
			break;
		case IMAGETYPE_PNG:
			$IsImageTypeAllowed=true;
			break;
		case IMAGETYPE_BMP:
			$IsImageTypeAllowed=true;
			break;
		default:		
			$IsImageTypeAllowed=false;

	  } // END switch ( $imageType )
	  
		return $IsImageTypeAllowed;	  
						  
}					  
				
function ResizeImagePixels($newPhysicalPath) 
{




	// Get the image size and type
	  $attrs = getimagesize ( $newPhysicalPath );
	  $imageWidth = $attrs[0];
	  $imageHeight = $attrs[1];
	  $imageType = $attrs[2];
	  //echo '<br>$imageType '.$imageType.'<br>' ;
	  //echo '<br>$imageWidth '.$imageWidth.'<br>' ;
	  
	  // Load the image into memory
	  switch ( $imageType ) 
	  {
		case IMAGETYPE_GIF:
		  $imageResource = imagecreatefromgif ( $newPhysicalPath );
		  break;
		case IMAGETYPE_JPEG:
		  $imageResource = imagecreatefromjpeg ( $newPhysicalPath);
		  break;
		case IMAGETYPE_PNG:
		  $imageResource = imagecreatefrompng ( $newPhysicalPath );
		  break;
		default:		

			$imageResource = "";
	  } // END switch ( $imageType )

		//echo '<br>$imageResource1= '.$imageResource.'<br>';


						  
	if ($imageWidth>600)
	{ 
			if($imageResource != "")
			{
				  // Copy and resize the image to create the thumbnail
				  $thumbHeight = intval ( $imageHeight / $imageWidth * self::MAX_PIC_WIDTH );
				  $thumbResource = imagecreatetruecolor ( self::MAX_PIC_WIDTH, $thumbHeight );
				  imagecopyresampled( $thumbResource, $imageResource, 0, 0, 0, 0, self::MAX_PIC_WIDTH, $thumbHeight, $imageWidth, $imageHeight );
			 
				  // Save the thumbnail
				  switch ( $imageType ) 
				  {
					case IMAGETYPE_GIF:
					  imagegif ( $thumbResource, $newPhysicalPath );
					  break;
					case IMAGETYPE_JPEG:
					  imagejpeg ( $thumbResource, $newPhysicalPath );//ORIGINAL QUALITY
					  //imagejpeg ( $thumbResource, $newPhysicalPath, self::JPEG_QUALITY );//IF WE WANT TO CHOSE QUALITY
					  break;
					case IMAGETYPE_PNG:
					  imagepng ( $thumbResource, $newPhysicalPath );
					  break;
					default:
					  $imageResource = "";
				  }
			}//END if($imageResource != "")

					//echo '<br>$imageResource2= '.$imageResource.'<br>';
	}//END if ($imageWidth>600)
						

}



function RenameFile($savefolder,$myfilenameX)
{
	/*SET THE PROPERTY FILENAME + RETURN THE PHYSICAL PATH FRO THE NEW FILE + AVOID DUPLICATE NAMES*/

	if (isset($savefolder)) 
	{

		//echo 'ORIGINAL FILENAME ='.$myfilenameX.'<br>';
		//ALLOW ONLY LETTERS AND NUMBERS
		$this->fileNameOriginal= $myfilenameX;
		$myfilenameX = preg_replace("/[^a-zA-Z0-9\s\.]/", "", $myfilenameX);
		//REPLACE SPACES WITH UNDERSCORES
		$myfilename=str_replace(' ', '_', $myfilenameX);
		
		//ADD SAVEFOLDER+FILENAME
		//echo 'SAVEFOLDER = '.$savefolder.'<br>';
		//echo 'FILENAME = '.$myfilename.'<br>';
		//echo 'FILENAMEX = '.$myfilenameX.'<br>';	

		$newPhysicalPath = $savefolder.$myfilename;	
		//echo 'RENAMED FILENAME ='.$myfilename.'<br>';

		
		//IF FILE EXISTS ADD NUMBER UNTIL IT DOES NOT EXISTS
		$addNumberToFileName=0;
		//INIT NEW FILENAME: IF NOT EXIST ALLREDY INITIALIZED TO CURRENT FILE
		$myfilenameNew=$myfilename;
		while (file_exists($newPhysicalPath))
		{
			$addNumberToFileName=$addNumberToFileName+1;
			$myfilenameNew=str_replace('.',$addNumberToFileName.'.', $myfilename);
			$newPhysicalPath = $savefolder.$myfilenameNew;	
		}
		//echo 'FINAL PATH+FILENAME ='.$newPhysicalPath.'<br>';	
		//REPLACE FILENAM WITH NEW FILENAME
		$this->filename = $myfilenameNew;
		return $newPhysicalPath;
	}
	
}// END RenameFile



function UploadFile($userfolder,$file,$linksUID="",$linksFolder="") 
{

	$this->linksUID = $linksUID;
	$this->saveUserFolder = $userfolder;
	$this->linksFolder = $linksFolder;
	
	
	

//	echo '$userfolder = '.$userfolder.'<br>'.'$linksFolder = '.$this->linksFolder.'<br>';
	if ($linksFolder == "")
	{
		$savefolder = POORBUK_PATH_ABSOLUTE_USERS."/".$userfolder.self::FILE_FOLDER;	
		$pathname = self::PATH_AFTER_SERVER_ROOT.$userfolder.self::FILE_FOLDER;

	}
	else
	{
                $linksFolder = '/'.$linksFolder.'/';
		$savefolder = POORBUK_PATH_ABSOLUTE_USERS."/".$userfolder.$linksFolder;	
		$pathname = self::PATH_AFTER_SERVER_ROOT.$userfolder.$linksFolder;

		echo "lort2";
	}
        
        /*TEST VARIABLES*/
//        echo "<br>linksFolder ".$linksFolder;  
//        echo "<br>userfolder ".$userfolder;  
//        echo "<br>self::FILE_FOLDER ".self::FILE_FOLDER;       
//        echo "<br>savefolder ".$savefolder;
//        echo "<br>pathname ".$pathname;
	$max_size = 30;			// maxim size for image file, in Megas

	//	$allowtype = array('zip', 'rar', 'doc', 'odt', 'rtf', 'txt','ppt','odp','ods','xls','dif','odg','otg','sxd','std','odb','sql','odf','bmp', 'gif', 'jpg', 'jpeg', 'gif', 'png');

	$newPhysicalPath = '';
	// if is received a valid file
	if (isset ($file)) 
	{

		// checks to have the allowed extension
		$myfilenameX=$file['name'];
		$myfilenameXSplitted = explode(".", strtolower($myfilenameX));
/*		$type = end($myfilenameXSplitted);
		if (in_array($type, $allowtype)) 
		{
*/
			// check its size
			$fileSize=$file['size'];
			$max_size =$max_size*1000000;
			//echo '<br>filesize ='.$fileSize.'<br>';
			//echo '<br>max_size ='.$max_size.'<br>';			
			
			if ($file['size']<=$max_size) 
			{
				// if no errors
				if ($file['error'] == 0) 
				{	  
					/*******RENAMING THE UPLOADED FILE TO AVOID DUPLICATES**************/	

					$newPhysicalPath = $this->RenameFile($savefolder,$myfilenameX);
					//echo '<br>PHYSICAL PATH = '.$newPhysicalPath.'<br>';

					
					// if the file can`t be uploaded, return a message
					if (!move_uploaded_file ($file['tmp_name'], $newPhysicalPath)) 
					{
						$newPhysicalPath = '';
						return $newPhysicalPath;
					}
					else//SUCCESS!!!!!
					{
						
						$newPhysicalPath = $pathname.$this->filename;
//						echo "<br><br>SUCCESS!!! NEW FILE IN = ".$newPhysicalPath."<br><br>";
						$this->newPhysicalPathFile=$newPhysicalPath;
						// Return the uploaded image.
						//return array ($newPhysicalPath,$myfilenameX);
						return array ($this->newPhysicalPathFile,$this->fileNameOriginal,$this->linksFolder,$this->linksUID);

					}
				}
			}
			else 
			{ 
				$newPhysicalPath ="";// 'The file <b>'. $file['name']. '</b> exceeds the maximum permitted size <i>'. $max_size. 'KB</i>'; 
				return $newPhysicalPath;
			}
/*		}
		else 
		{ 
			$newPhysicalPath ="";// 'The file <b>'. $file['name']. '</b> has not an allowed extension'; 
		}
*/
	}
	else
	{
				$newPhysicalPath ="";// 'The file does NOT exist OR is too big for the server max allowed 
				return $newPhysicalPath;
	
	}
}//END function UploadFile($userfolder,$file) 

function multipleFilesToOneFile(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
/*
CALL EXAMPLE TO THIS FUNCTION
if ($_FILES['upload']) {
    $file_ary = $FileUploadClass->multipleFilesToOneFile($_FILES['upload']);

    foreach ($file_ary as $file) {
        print "<br>".'File Name: ' . $file['name']."<br>";
        print 'File Type: ' . $file['type']."<br>";
        print 'File Size: ' . $file['size']."<br>";
		print 'tmp_name: ' . $file['tmp_name']."<br>"."<br>";

	//$NewFileUploaded = $FileUploadClass->UploadFile($userFolder,$file);
	list ($pathFileUploaded, $myfilenameX) = $FileUploadClass->UploadFile($userFolder,$file,$linksFolder);
	$FileUploadClass->tutorialsInsert();
    }
}
*/


























}//END class FileUploadClass
?>