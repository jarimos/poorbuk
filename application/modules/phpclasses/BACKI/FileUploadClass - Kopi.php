<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
//$myString = strtolower($_SERVER['HTTP_REFERER']);
//$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
//if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

class FileUploadClass
{

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
	
	public $userdir,$savefolder,$pathname,$filename;
	const IMAGE_FOLDER = '/images/';	
	const FILE_FOLDER = '/files/';	
	const PATH_AFTER_SERVER_ROOT = '/poorbuk/application/files/users/';
	const MAX_PIC_WIDTH =900;
	//const JPEG_QUALITY=80;//NOT USED 0-100 //TAKE CARE: TOO MUCH QUALITY PICTURES GET BIGGER IN SIZE //THATS WHY RIGHT NOW WE USE ORIGINAL QUALITY
	
	//public $savefolder = $_SERVER['DOCUMENT_ROOT'].PATH_AFTER_SERVER_ROOT.$userdir.IMAGE_FOLDER OR FILE_FOLDER;	
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
	*/	
// End User class definition


function UploadImage($userfolder,$file) 
{

	echo '$userfolder = '.$userfolder.'<br>';
	echo '$_SERVER[DOCUMENT_ROOT] = '.$_SERVER['DOCUMENT_ROOT'].'<br>';
	
	$savefolder = $_SERVER['DOCUMENT_ROOT'].self::PATH_AFTER_SERVER_ROOT.$userfolder.self::IMAGE_FOLDER;	
	//$savefolder = $_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/files/users/'.$userfolder.self::IMAGE_FOLDER;	

	//echo '$savefolder = '.$savefolder.'<br>';
	$pathname = self::PATH_AFTER_SERVER_ROOT.$userfolder.self::IMAGE_FOLDER;
	$max_size = 10;			// maxim size for image file, in Megas


	// Allowed image types
//	$allowtype = array('bmp', 'gif', 'jpg', 'jpeg', 'gif', 'png');

	/** Uploading the image **/
	$rezultat = '';
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
						$rezultat = $rezultat.'';
						return $rezultat;
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
								$rezultat = $pathname.$this->filename;
								// Return the uploaded image.
								return $rezultat;
							}
							else
							{
								$rezultat = '/poorbuk/application/files/imagesdefault/default.jpg';
								// Return the uploaded image.
								return $rezultat;							
							
							}
						}
						else
						{
							$rezultat = '';
							// Return the uploaded image.
							return $rezultat;
						
						}
						
						//echo 'The image was successfully loaded <br>';
						//echo '$userfolder = '.$userfolder;echo '<br>$rezultat = '.$rezultat;
						/******************************/
						

						

					}
				}
			}
			else 
			{ 
				$rezultat ="";// 'The file <b>'. $file['name']. '</b> exceeds the maximum permitted size <i>'. $max_size. 'KB</i>'; 
				return $rezultat;
			}
/*		}
		else 
		{ 
			$rezultat ="";// 'The file <b>'. $file['name']. '</b> has not an allowed extension'; 
		}
*/
	}
	else
	{
				$rezultat ="";// 'The file does NOT exist OR is too big for the server max allowed 
				return $rezultat;
	
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



function UploadFile($userfolder,$file) 
{

	//echo '$userfolder = '.$userfolder.'<br>';
	$savefolder = $_SERVER['DOCUMENT_ROOT'].self::PATH_AFTER_SERVER_ROOT.$userfolder.self::FILE_FOLDER;	
	$pathname = self::PATH_AFTER_SERVER_ROOT.$userfolder.self::FILE_FOLDER;
	$max_size = 30;			// maxim size for image file, in Megas

	//	$allowtype = array('zip', 'rar', 'doc', 'odt', 'rtf', 'txt','ppt','odp','ods','xls','dif','odg','otg','sxd','std','odb','sql','odf','bmp', 'gif', 'jpg', 'jpeg', 'gif', 'png');

	$rezultat = '';
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
						$rezultat = '';
						return $rezultat;
					}
					else//SUCCESS!!!!!
					{
						$rezultat = $pathname.$this->filename;
						// Return the uploaded image.
						return array ($rezultat,$myfilenameX);

					}
				}
			}
			else 
			{ 
				$rezultat ="";// 'The file <b>'. $file['name']. '</b> exceeds the maximum permitted size <i>'. $max_size. 'KB</i>'; 
				return $rezultat;
			}
/*		}
		else 
		{ 
			$rezultat ="";// 'The file <b>'. $file['name']. '</b> has not an allowed extension'; 
		}
*/
	}
	else
	{
				$rezultat ="";// 'The file does NOT exist OR is too big for the server max allowed 
				return $rezultat;
	
	}
}//END function UploadFile($userfolder,$file) 


}//END class FileUploadClass
?>