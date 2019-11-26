<?php
		

class MenusClass
{

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
	
	public $pId,$pWebsiteName,$pUserId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pDateHour,$pPublished,$pCommentAllowed,$pLoveAllowed,$pLoveCounter, $pPass,$sql;
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



function showMenuByPostUrlInArray($sql )
{

	$status=true;
	$result = $this->executeSQL($sql);
	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		$arr = array('mUId' =>  $row{'mUId'},'mPId' =>  $row{'mPId'}, 'mName' =>  $row{'mName'},
		'mUrl' =>  $row{'mUrl'}, 'mWebsiteName' =>  $row{'mWebsiteName'},
		'mActive' =>  $row{'mActive'}, 'mPosition' => $row{'mPosition'}, 
		'mType' => $row{'mType'});

		return($arr);

	}
}//END showMenuByPostUrlInArray($sql )


function showAllMenusForPostUrlSQL($mUrl) 
{

	$sql="SELECT * FROM pmenutable WHERE mUrl = '$mUrl' LIMIT 1"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
} //END function





function showAllMenusForPostUrlJSON($sql )
{
	$status=true;
	$result = $this->executeSQL($sql);

	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		$arr = array('status' =>  "success",'mPId' =>  $row{'mPId'},'mName' =>  $row{'mName'}, 'mUrl' =>  $row{'mUrl'}, 
		'mWebsiteName' =>  $row{'mWebsiteName'},'mActive' =>  $row{'mActive'},
		'mPosition' =>  $row{'mPosition'}, 'mType' => $row{'mType'});

		echo json_encode($arr);

	}
}//END showAllMenusForPostUrlJSON($sql )



function showAllMenusForWebsiteNameSQL($mWebsiteName) 
{

	$sql="SELECT * FROM pmenutable WHERE mWebsiteName = '$mWebsiteName' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
}  //END function




function showAllMenusForWebsiteNameToOptionBox($sql)
{

	$result = $this->executeSQL($sql);


	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		

			//echo "pGarbageId = ".$row{'pGarbageId'}."<br>";
			//echo "pTextEditorHTML = ".$row{'pTextEditorHTML'}."<br>";
	
		//echo $row{'mWebsiteName'}."<br>";
		
		echo "<option value='".$mypostcounter."'>".$mypostcounter." - ".$row{'mName'}."</option>";

		$mypostcounter = $mypostcounter+1;
		//echo $row{'mName'}."<br>";
		//echo $row{'mPosition'}."<br>";	
		
	}

} //END function









function updateAllMainMenus($allMenusMainArray,$mPId,$mUId,$mPosition,$mWebsiteName)
{	
//CALL BEFORE showAllMenusMainByUserWebsiteSQL($mUId,$mWebsiteName) 

//echo "<br>mPosition = ".$mPosition."<br>";
//echo "<br>mPId = ".$mPId."<br>";

$myMenuNow = array( array("mPId" => "$mPId", "mPosition" => "$mPosition") );

$i=0;
		foreach ( $allMenusMainArray as $menu ) 
		{
		
		//echo "<br><br>Index = ".$i."<br><br>";		
		  foreach ( $menu as $key => $value ) 
		  {
				if($key == "mPId" && $value =="$mPId")
				{
					//echo "<br><br>THIS IS MY IIIIIIIIndex = ".$i."<br><br>";	
					$myArrayIndexToEliminate = $i;
				
				}
				//echo "<dt>$key</dt><dd>$value</dd>";
		  }
		  	$i = $i +1;
	
		}

$myMenuNowCounter = count($myMenuNow);
/*
echo "
mPId = $mPId
myArrayIndexToEliminate =  $myArrayIndexToEliminate  
myMenuNowCounter = $myMenuNowCounter
";
*/

//ERASE THE LAST MENU INSERTED FROM THE ARRAY
array_splice($allMenusMainArray, $myArrayIndexToEliminate, 1);		
//INSERT THE LAST INSERTED/UPDATED  MENU IN THE ARRAY
array_splice($allMenusMainArray, $mPosition, 0, $myMenuNow);


$i=0;


		foreach ( $allMenusMainArray as $menu ) 
		{
		
		//echo "<br><br>Index = ".$i."<br><br>";		

			

		  foreach ( $menu as $key => $value ) 
		  {
				if($key == "mPId")
				{
					$this->updateMenuPositionBymPId($value,$i);
				
				}


		  }
		  	$i = $i +1;
	
		}
		
} //END function







function updateMenusPositions($sql,$mPId,$mPosition,$mWebsiteName,$mUId)
{	
//CALL BEFORE showAllMenusMainByUserWebsiteSQL($mUId,$mWebsiteName) 

	$result = $this->executeSQL($sql);
	$rowsNumber = mysql_num_rows($result);
	echo "
	<br>rowsNumber = ".$rowsNumber."<br>";
	$arr = array(array());

	$mycounter =0;
	while ($row = mysql_fetch_array($result))
	{
	
	$mPIdNow = $row{'mPId'};
	$mPositionNow = $row{'mPosition'};
	echo "
	<br>NEW mPIdNow = ".$mPIdNow."<br>";

	
	$topPosition = $rowsNumber -1;
	
/*	
	
	//UPDATE ALL UNDER IF MENUS INSERTED IN THE MIDDLE OF THE LIST
	if($topPosition > $mPosition )
	{
	//UPDATE ALL MINUS 1 UNDER THIS POSITION
			if ($mPosition>=$mPositionNow && $mPId != $mPIdNow )
			{
				echo "
				<br>alert5 UPDATE!! MINUS!!!!! checkIfMenuPostionBeforeIsEmpty == true= $mPositionNow<br>";
				$mPositionNow = $mPositionNow -1;
				$this->updateMenuPositionBymPId($mPIdNow,$mPositionNow);				
			
				
			}
	}
		
*/
		
$checkIfMenuPostionBeforeIsEmpty = false;

		if($mPositionNow >0 && $mPId != $mPIdNow)
		{				
					echo "
					<br>alert-3 mPosition >0 =  $mPositionNow<br>";
					$mPositionBefore = $mPositionNow -1;
					$checkIfMenuPostionBeforeIsEmpty = $this->checkIfMainMenuPostionBeforeIsEmpty($mPositionBefore,$mWebsiteName,$mUId);	
					
					
					echo "
					<br>checkIfMenuPostionBeforeIsEmpty  = ".$checkIfMenuPostionBeforeIsEmpty."<br>";
					if($checkIfMenuPostionBeforeIsEmpty == true)
					{
						echo "
						<br>alert-2 UPDATE!! MINUS!!!!! checkIfMenuPostionBeforeIsEmpty == true= $mPositionNow<br>";
						$mPositionNow = $mPositionNow -1;
						$this->updateMenuPositionBymPId($mPIdNow,$mPositionNow);	
					}
					

		}
			


if ($checkIfMenuPostionBeforeIsEmpty == false)
{			
			if ($mPosition<=$mPositionNow)
			{
				echo "
				<br>alert1 mPosition<=mPositionNow = $mPositionNow<br>";
				if($mPId != $mPIdNow)
				{
					echo "<br>alert2 mPId != mPIdNow= $mPositionNow<br>";
					if($mPosition == $mPositionNow)
					{
						echo "
						<br>alert3 mPosition == mPositionNow = $mPositionNow<br>";
		
						if($mPositionNow >0)
						{				
								echo "
								<br>alert4 mPosition >0 =  $mPositionNow<br>";
								$mPositionBefore = $mPosition -1;
								$checkIfMenuPostionBeforeIsEmpty = $this->checkIfMainMenuPostionBeforeIsEmpty($mPositionBefore,$mWebsiteName,$mUId);	
								
								
								echo "
								<br>checkIfMenuPostionBeforeIsEmpty  = ".$checkIfMenuPostionBeforeIsEmpty."<br>";
								if($checkIfMenuPostionBeforeIsEmpty == true)
								{
									echo "
									<br>alert5 UPDATE!! MINUS!!!!! checkIfMenuPostionBeforeIsEmpty == true= $mPositionNow<br>";
									$mPositionNow = $mPositionNow -1;
									$this->updateMenuPositionBymPId($mPIdNow,$mPositionNow);	
								}
								else
								{
									echo "
									<br>alert6 UPDATE!!  checkIfMenuPostionBeforeIsEmpty == false= $mPositionNow<br>";
									$mPositionNow = $mPositionNow +1;
									if ($mPositionNow>$topPosition){$mPositionNow=$topPosition;}
									$this->updateMenuPositionBymPId($mPIdNow,$mPositionNow);	
								}	
						}
						else
						{
							echo "
							<br>alert7 UPDATE!! mPosition <0= $mPositionNow<br>";
							$mPositionNow = $mPositionNow +1;
							$this->updateMenuPositionBymPId($mPIdNow,$mPositionNow);	
						}	
						

					}
					else
					{
						echo "
						<br>alert8 UPDATE!! mPosition != mPositionNow = $mPositionNow<br>";
						
						$mPositionNow = $mPositionNow +1;
						if ($mPositionNow>$topPosition){$mPositionNow=$topPosition;}
						$this->updateMenuPositionBymPId($mPIdNow,$mPositionNow);	
					}	
				}
				else //if ($mPosition > $mycounter)
				{
				
					echo"<br>NO CHANGES FOR ACTUAL POST ID = $mPIdNow<br>";
				
				}

				
					
			}
			else //if ($mPosition > $mycounter)
			{
			
				echo"<br>NO CHANGES FOR ID = $mPIdNow<br>";
			
			}

}
			
			
			//$mycounter =$mycounter+1;
	
	}

		
} //END function



function checkIfMainMenuPostionBeforeIsEmpty($mPositionBefore,$mWebsiteName,$mUId) 
{

	$sql="SELECT * FROM pmenutable WHERE mPosition=$mPositionBefore AND mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName'    AND mType='Main' LIMIT 1";
	echo $sql;
	$result = $this->executeSQL($sql);


	$mypostcounter =true;
	while ($row = mysql_fetch_array($result))
	{
		$mypostcounter =false;
	}
	
	return $mypostcounter;
	
}  //END function



function updateMenuPositionBymPId($mPId,$mPosition)
{	


	$status=true;
	$sql="UPDATE pmenutable SET mPosition ='$mPosition' WHERE mPId='$mPId' LIMIT 1";	
	
	//echo $sql;
	$result = $this->executeSQL($sql);

		
} //END function

function insertMenu($mUId,$mPId,$mName,$mParent,$mUrl,$mWebsiteName,$mActive,$mPosition,$mType)
{	

	//echo "<br>insertMenu mPId = ".$mPId."<br>";
		$status =1;
		
		$sql="INSERT INTO pmenutable ( mUId,mPId,mName,mParent,mUrl,mWebsiteName,mActive,mPosition,mType) VALUES( '$mUId','$mPId','$mName','$mParent','$mUrl','$mWebsiteName','$mActive','$mPosition','$mType')";
		//echo $sql;
		$result = $this->executeSQL($sql);		
		
} //END function







function updateMenu($mUId,$mPId,$mName,$mParent,$mUrl,$mWebsiteName,$mActive,$mPosition,$mType)
{	


	$status=true;
	$sql="UPDATE pmenutable SET mUId='$mUId',  mName ='$mName', mParent = '$mParent', mUrl ='$mUrl', mWebsiteName ='$mWebsiteName',
	mActive ='$mActive', mPosition ='$mPosition', mType ='$mType'  WHERE mPId = '$mPId' LIMIT 1";	
	
	//echo $sql;
	$result = $this->executeSQL($sql);

		
} //END function




function showMenuByPostUrl($mUrl) 
{

	$sql="SELECT * FROM pmenutable WHERE mUrl='$mUrl' LIMIT 1";
	return $sql;
	
}  //END function

function showAllMenusMainByUserIdAndWebsiteName($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM pmenutable WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName'  AND mActive='YES' AND mParent='NO' AND mType='Main' ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function



function showAllMenusMainByUserWebsiteSQL($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM pmenutable WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName' AND mParent='NO' AND mType='Main' ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function



/***********PARENT MENUS**********************************/
function checkIfParentToOptionBoxSQL($mPId,$mUId,$mWebsiteName)
{
	$sql="SELECT * FROM pmenutable WHERE mPId='$mPId' LIMIT 1";
	//echo $sql;
	return $sql;
} //END function

function checkIfParentMenuToOptionBox($sql)
{

	$result = $this->executeSQL($sql);

	$parentExistsId = "NO";
	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		$parentExistsId = $row{'mParent'};

	}
	
	
	if ($parentExistsId !="NO")
	{
		$sql = $this->getParentMenuSQL($parentExistsId);	
		$this->getParentMenuToOptionBox($sql);		
	}
/*
	echo "
	parentExistsId = $parentExistsId";
*/
	return $parentExistsId;
} //END function





function getParentMenuSQL($parentExistsId)
{
	$sql="SELECT * FROM pmenutable WHERE mId='$parentExistsId' LIMIT 1";
	//echo $sql;
	return $sql;
} //END function




function getParentMenuToOptionBox($sql)
{
	$result = $this->executeSQL($sql);

	while ($row = mysql_fetch_array($result))
	{
		
		echo "<option value='".$row{'mId'}."'>".$row{'mName'}."</option>";

	}
	
	
} //END function


function showAllMenusMainButThisOneByUserWebsiteSQL($mPId,$mUId,$mWebsiteName,$parentExistsId) 
{

	$sql="SELECT * FROM pmenutable WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName' AND mParent='NO' AND mPId !='$parentExistsId' AND mPId !='$mPId' ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function

function showAllMenusMainButThisOneByUserWebsiteToOptionBox($sql,$parentExistsId)
{

	$result = $this->executeSQL($sql);
	
	//SHOW ALLWAYS OPTION NO
	echo "<option value='NO'>NO</option>";

	$mypostcounter =0;
	
	while ($row = mysql_fetch_array($result))
	{
		
		echo "<option value='".$row{'mId'}."'>".$row{'mName'}."</option>";

		$mypostcounter = $mypostcounter+1;

		
	}

} //END function

function showAllMenusMainByUserIdAndWebsiteNameArray($sql )
{
	//echo '<br>'.$userid.'<br>';
	$status=true;
	$result = $this->executeSQL($sql);

	$arr = array(array());

	$mycounter =0;
	while ($row = mysql_fetch_array($result))
	{
		



		$arrParameters = array('status' =>  "success",'mId' =>  $row{'mId'},'mPId' =>  $row{'mPId'},'mName' =>  $row{'mName'},
		'mParent' =>  $row{'mParent'}, 'mUrl' =>  $row{'mUrl'}, 
		'mWebsiteName' =>  $row{'mWebsiteName'},'mActive' =>  $row{'mActive'}
		, 'mPosition' =>  $row{'mPosition'}, 'mType' => $row{'mType'});

		$arr[$mycounter] = $arrParameters;
		$mycounter =$mycounter+1;

	}
	
		return $arr;
} //END function



function showPostsGarbageById($pGarbageId) 
{

	$sql="SELECT * FROM poorbuk_cms_postgarbage_table WHERE pGarbageId='$pGarbageId' LIMIT 1";
	return $sql;
	
}  //END function



function RenameUrl($pUrl)
{
	/*SET THE PROPERTY FILENAME + RETURN THE PHYSICAL PATH FRO THE NEW FILE + AVOID DUPLICATE NAMES*/

	if (isset($pUrl)) 
	{

		//echo 'ORIGINAL FILENAME ='.$pUrl.'<br>';
		//ALLOW ONLY LETTERS AND NUMBERS
		$pUrl = preg_replace("/[^a-zA-Z0-9\_\-\s\.]/", "", $pUrl);
		//REPLACE SPACES WITH UNDERSCORES
		$pUrl=str_replace(' ', '_', $pUrl);

		$this->pUrl = $pUrl;
		return $pUrl;
	}
	
} //END function



}//END class FileUploadClass
?>