<?php

function LeftStringJarim($string,$numberCharsToCut,$startPosition=0)
{

	//echo "strlen = ".strlen( $string )."<br>";
	$numberCharsToCut = strlen( $string )- (strlen( $string )-$numberCharsToCut+1) ;
	//echo "numberCharsToCut = ".$numberCharsToCut."<br>";
	$string= substr($string,$startPosition,$numberCharsToCut); 
	return $string;
}
function RightStringJarim($string,$numberCharsToCut,$startPosition=0)
{
	$numberCharsToCut = strlen( $string )-$numberCharsToCut-1;
	$numberCharsToCut = $numberCharsToCut * (-1); 
	$string= substr($string,$numberCharsToCut); 
	return $string;
}

function getUserIdNow()
{

	$myUri = $_SERVER['REQUEST_URI'];
	//echo "<br>myUri = ".$myUri."<br>";
	$numberCharsToCut= strpos($myUri,"=");
	$myUserIdSession =RightStringJarim($myUri,$numberCharsToCut);
	//echo "myUserIdSession = ".$myUserIdSession."<br>numberCharsToCut = ".$numberCharsToCut."<br>";
	//echo "<br>myUserIdSession = ".$myUserIdSession;
	return $myUserIdSession;
}


function getUserURLNow()
{

	$myUri = $_SERVER['REQUEST_URI'];
	$numberCharsToCut= strpos($myUri,"?");
	//echo "<br>URL - numberCharsToCut  = $numberCharsToCut";
	if ($numberCharsToCut!="")
	{
		$myUserURLNow= LeftStringJarim($myUri,$numberCharsToCut,1);
	}
	else
	{
		$myUserURLNow= $myUserURLNow = substr($myUri,1);
	}

	//echo"myUserURLNow = ".$myUserURLNow."<br>numberCharsToCut = ".$numberCharsToCut."<br>";
	//echo"<br>myUserURLNow = ".$myUserURLNow;
	return $myUserURLNow;

}






function getWebId($myUserURLSession)
{

	$myUri = $myUserURLSession;
	$numberCharsToCut= strpos($myUri,"/")+1;
	//echo "numberCharsToCut = $numberCharsToCut";
	$myUserURLNow= LeftStringJarim($myUri,$numberCharsToCut,0);
	
	//echo "WebId1 = ".$myUserURLNow;
	$numberCharsToCut= strpos($myUserURLNow,"/");
	//$myUserURLNow= LeftStringJarim($myUserURLNow,$numberCharsToCut,1);
	//echo"myUserURLNow = ".$myUserURLNow."<br>numberCharsToCut = ".$numberCharsToCut."<br>";
	//echo"<br>myUserURLNow = ".$myUserURLNow;
	return $myUserURLNow;

}

function getFinalPath($myUserURLSession)
{

	$myUri = $myUserURLSession;
	$numberCharsToCut= strpos($myUri,"/") +1;
	//echo "<br>FINAL PATH numberCharsToCut = $numberCharsToCut";
	//$numberCharsToCut= $numberCharsToCut*-1;

	
	$myUserURLNow = substr($myUri,$numberCharsToCut);
	//$myUserURLNow= RightStringJarim($myUri,$numberCharsToCut,1);
	//echo"myUserURLNow = ".$myUserURLNow."<br>numberCharsToCut = ".$numberCharsToCut."<br>";
	//echo"<br>myUserURLNow = ".$myUserURLNow;
	return $myUserURLNow;

}



function showFolderFiles($my_file_path,$ignoreFiles)
{

		$dirname = MY_SERVER_ROOT.$my_file_path;
		$files = scandir($dirname);
		//$ignoreFiles = Array(".", "..", "otherfiletoignore");

		foreach($files as $fileName){
			if (!in_array($fileName, $ignoreFiles)) {
				echo "<option value='$fileName' >$fileName</option>";
			}
		} 	

}	


/**************SHOW MENUS ARRAYS IN HTML**********************************************************/
function checkMainmPositionAndActive($mMainCounter,$mPosition,$arrMenuMainAll)
{

			$mActive =  $arrMenuMainAll[$mPosition]["mActive"];
			

			if ($mMainCounter >=  $mPosition)
			{
			
				if ($mActive =="YES")
				{
					return true;	
				}
				else
				{
					return false;
				}
			}

}			


function echoMainMenuName($mMainCounter,$mPosition,$arrMenuMainAll)
{



			if ( checkMainmPositionAndActive($mMainCounter,$mPosition,$arrMenuMainAll))
			{
				return $arrMenuMainAll[$mPosition]["mName"] ;
			}

}	

function echoMainMenuUrl($mMainCounter,$mPosition,$arrMenuMainAll)
{

			if ( checkMainmPositionAndActive($mMainCounter,$mPosition,$arrMenuMainAll))
			{
				return $arrMenuMainAll[$mPosition]["mUrl"] ;
			}
}	
/**************END SHOW MENUS ARRAYS IN HTML**********************************************************/


/******GET ALL MENU PARAMETERS TO ARRAY AND VARIABLES**************************************************************/


/*
function menuNow_ToArray_By_pUrl($pUrl)
{
		$MenuClass = new MenusClass;
		$sql = $MenuClass->showMenuByPostUrlSQL($pUrl);		
		$arrMenuAllParameters = array();		
		$arrMenuAllParameters = $MenuClass->showMenuByPostUrlInArray($sql );
		//echo "<br>arrMenuAllParameters<br>";
		//print_r( $arrMenuAllParameters );
		return $arrMenuAllParameters;
}
*/

function menuNow_ToArray_By_pId($pId)
{
		$MenuClass = new MenusClass;
		$sql = $MenuClass->show_Menu_By_Pid_SQL($pId);		
		$arrMenuAllParameters = array();		
		$arrMenuAllParameters = $MenuClass->show_Menu_By_Pid_Into_Array($sql );
		//echo "<br>arrMenuAllParameters<br>";
		//print_r( $arrMenuAllParameters );
		return $arrMenuAllParameters;
}

/******GET ALL MENUS **************************************************/
/*
function menuAll_Active_ToArray_By_WebsiteName_UId($mUId,$mWebsiteName)
{
		$MenuClass = new MenusClass;
		$sql = $MenuClass->showAllMenus_Uid_Active_Website_SQL($mUId,$mWebsiteName);
		$allMenusArray = $MenuClass->showAllMenusByUserIdAndWebsiteNameArray($sql );
		//echo "<br>allMenusArray<br>";		
		//print_r( $allMenusArray );
		return $allMenusArray;
}
*/

function menuAll_Active_ToArray_By_WebsiteId($mWebId)
{
		$MenuClass = new MenusClass;
		$sql = $MenuClass->showAllMenus_Active_WebsiteId_SQL($mWebId);
		$allMenusArray = $MenuClass->show_AllMenus_By_WebsiteId_Array($sql );
		//echo "<br>allMenusArray<br>";		
		//print_r( $allMenusArray );
		return $allMenusArray;
}


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
                    
                    rcopyfolderfiles( $sourceFile , $destinyFolderDir); 

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


?>