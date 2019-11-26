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

/*********SQL BASICS***********************************************/

function insertMenu($mUId,$mWebId,$mPId,$mName,$mParent,$mUrl,$mWebsiteName,$mActive,$mPosition,$mType)
{	

	//echo "<br>insertMenu mPId = ".$mPId."<br>";
		$status =1;
		
		$sql="INSERT INTO poorbuk_cms_menu_table ( mUId,mWebId,mPId,mName,mParent,mUrl,mWebsiteName,mActive,mPosition,mType) VALUES( '$mUId','$mWebId','$mPId','$mName','$mParent','$mUrl','$mWebsiteName','$mActive','$mPosition','$mType')";
		//echo $sql;
		$result = $this->executeSQL($sql);		
		
} //END function




function updateMenu($mUId,$mWebId,$mPId,$mName,$mParent,$mUrl,$mWebsiteName,$mActive,$mPosition,$mType)
{	


	$status=true;
	$sql="UPDATE poorbuk_cms_menu_table SET mUId='$mUId',mWebId = '$mWebId',  mName ='$mName', mParent = '$mParent', mUrl ='$mUrl', mWebsiteName ='$mWebsiteName',
	mActive ='$mActive', mPosition ='$mPosition', mType ='$mType'  WHERE mPId = '$mPId' LIMIT 1";	
	
	//echo $sql;
	$result = $this->executeSQL($sql);

		
} //END function

/**********LIMIT 1************************/

function showMenuByPostUrlSQL($mUrl) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUrl='$mUrl' LIMIT 1";
	return $sql;
	
}  //END function




function show_Menu_By_Pid_SQL($mPId)
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE 	mPId='$mPId' LIMIT 1";
	return $sql;
	
}  //END function



function updateMenuPositionBymPIdSQL($mPId,$mPosition)
{	


	$status=true;
	$sql="UPDATE poorbuk_cms_menu_table SET mPosition ='$mPosition' WHERE mPId='$mPId' LIMIT 1";	
	
	//echo $sql;
	$result = $this->executeSQL($sql);

		
} //END function


/**********END LIMIT 1************************/

function showAllMenus_Uid_Active_Website_SQL($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName'  AND mActive='YES'  ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function




function showAllMenus_Active_WebsiteId_SQL($mWebId)
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mWebId='$mWebId'  AND mActive='YES'  ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function









function showAllMenusForWebsiteNameSQL($mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mWebsiteName = '$mWebsiteName' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
}  //END function


function showAllMenusMainByUserWebsiteSQL($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName' AND  mParent='NO'  ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function



/*****************/
function showAllSUBMenusForParentIdByWebsiteId($mParent,$mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName' AND mParent=$mParent ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function


function showAllMenusMAINForUIDWebsiteId($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mWebsiteName = '$mWebsiteName' 
	AND mUId='$mUId'  AND mParent ='NO' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
}  //END function


/***************************/










function showAllSUBMenusForParentIdByUserWebsiteSQL($mParent,$mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName' AND mParent=$mParent ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function

function showAll_SUBMenus_ForParentId_By_Uid_WebId_SQL($mParent,$mUId,$mWebId)
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUId='$mUId' 
	AND mWebId='$mWebId' AND mParent=$mParent ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
}  //END function


function showAllMenusMAINForUIDWebsiteSQL($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mWebsiteName = '$mWebsiteName' 
	AND mUId='$mUId'  AND mParent ='NO' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
}  //END function

function show_AllMenusMAIN_For_WebsiteId_SQL($mWebId) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mWebId = '$mWebId' AND mParent ='NO' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
}  //END function


function showAllMenusMAIN_For_UID_Webid_SQL($mUId,$mWebId)
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mWebId = '$mWebId' 
	AND mUId='$mUId'  AND mParent ='NO' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
}  //END function
/*********END SQL BASICS*****************************AND mParent='NO'******************/


/**********SHOW MAIN MENUS AND SUB-MENUS TO OPTION BOX*************************************************/
function showAllMenusForWebsiteNameToOptionBox($sql)
{

	$result = $this->executeSQL($sql);

	echo "<option value='-1'>Click To see all</option>";
	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
	
		//WARNNING!!! mParent = $row['mId']; BECAUSE WE CONSIDER THIS MENU AS MAIN
		$mParent = $row['mId'];
		$mUId = $row['mUId'];
		$mWebsiteName= $row['mWebsiteName'];
		echo "<option value='".$row{'mPId'}."'>[".$mypostcounter."]".$row{'mName'}."</option>";
		
		$sql = $this->showAllSUBMenusForParentIdByUserWebsiteSQL($mParent,$mUId,$mWebsiteName);	
		$this->showAllSubMenusForParentIdToOptionsBox($sql);
		
		$mypostcounter = $mypostcounter+1;

	}

} //END function


function showAllSubMenusForParentIdToOptionsBox($sql)
{
	//echo $sql;
	$result = $this->executeSQL($sql);
	

	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		echo "<option value='".$row{'mPId'}."'> [SUB] ".$row{'mName'}."</option>";
		
		
		$mypostcounter = $mypostcounter+1;

	}

} 
/**********END SHOW MAIN MENUS AND SUB-MENUS TO OPTION BOX*************************************************/
/**********SHOW MAIN MENUS AND SUB-MENUS TO ORDERED LIST*************************************************/
function showAllMenusForWebsiteNameToOrderedList($sql)
{

	$result = $this->executeSQL($sql);


	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
	

	
		//WARNNING!!! mParent = $row['mId']; BECAUSE WE CONSIDER THIS MENU AS MAIN
		
		$mId = $row['mId'];	
		$mWebId= $row['mWebId'];		
		$mParent = $row['mId'];
		$mUId = $row['mUId'];
		$mWebsiteName= $row['mWebsiteName'];
		$mName = $row['mName'];
		$mUrl = $row['mUrl'];
		
		
		//SET CLASS SUBMENU
		//$sql = $this->showAllSUBMenusForParentIdByUserWebsiteSQL($mParent,$mUId,$mWebsiteName);	
		$sql = $this->showAll_SUBMenus_ForParentId_By_Uid_WebId_SQL($mParent,$mUId,$mWebId);	
		$result2 = $this->executeSQL($sql);		
		$num_rows = mysql_num_rows($result2);		
	
		$classSubmenuAtag="";
		$classSubmenuList="";
		$itemSubmenuCaret="";
		if ($num_rows>0)
		{
				$classSubmenuList="dropdown";	
				$classSubmenuAtag='class ="dropdown-toggle" data-toggle="dropdown"';
				$itemSubmenuCaret= '<span class="caret"></span>';
				
		}

		//echo $mUrl;
		
		//WRITE MAIN MENU
		echo "	<li class='$classSubmenuList menuMain  $mName' >
				 <a $classSubmenuAtag href='$mUrl' rel='nofollow' target='_self'>$itemSubmenuCaret
					$mName
				 </a>
			 ";
		if ($num_rows>0)
		{
			//WRITE SUBMENUS FOR MAIN MENU
			//$sql = $this->showAllSUBMenusForParentIdByUserWebsiteSQL($mParent,$mUId,$mWebsiteName);	
			$sql = $this->showAll_SUBMenus_ForParentId_By_Uid_WebId_SQL($mParent,$mUId,$mWebId);	
			$this->showAllSubMenusForParentIdToOrderedList($sql);
		}	
		
		echo "</li>";
		
		$mypostcounter = $mypostcounter+1;

	}

} //END function



function showAllSubMenusForParentIdToOrderedList($sql)
{
	//echo $sql;
	$result = $this->executeSQL($sql);
	echo '<ul class="dropdown-menu">';
	while ($row = mysql_fetch_array($result))
	{
		
		$mName = $row['mName'];
		$mUrl = $row['mUrl'];
		
		echo "	<li class='$mName' >
				 <a href='$mUrl' rel='nofollow' target='_self'>
					$mName
				 </a>
			 </li>";
		

	}
	echo '</ul>';

} 
/**********END SHOW MAIN MENUS AND SUB-MENUS TO ORDERED LIST*************************************************/

/***********************REORDER MAIN MENUS******************************************/

function show_AllMenus_By_WebsiteId_Array($sql )
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
		'mWebsiteName' =>  $row{'mWebsiteName'},'mActive' =>  $row{'mActive'},
		'mPosition' =>  $row{'mPosition'}, 'mType' => $row{'mType'});

		$arr[$mycounter] = $arrParameters;
		$mycounter =$mycounter+1;

	}
	
		return $arr;
} //END function


function updateAllMenus($allMenusArray,$mPId,$mUId,$mPosition,$mWebsiteName)
//function updateAllMenus($allMenusArray,$mPId,$mPosition)
{	
//REORDER ALL MENUS POSITIONS USING ARRAYS

//CALL BEFORE showAllMenusMainByUserWebsiteSQL($mUId,$mWebsiteName) 

		$allMenusArrayCOUNTER = count($allMenusArray);
		if ($mPosition>$allMenusArrayCOUNTER)
		{	
			$mPosition = $allMenusArrayCOUNTER;
		}
		
		$myMenuNow = array( array("mPId" => "$mPId", "mPosition" => "$mPosition") );
		
		$i=0;
		foreach ( $allMenusArray as $menu ) 
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
		mPosition = $mPosition
		allMenusArrayCOUNTER = $allMenusArrayCOUNTER
		myArrayIndexToEliminate =  $myArrayIndexToEliminate  
		myMenuNowCounter = $myMenuNowCounter
		";
*/		

		//ERASE THE LAST MENU INSERTED FROM THE ARRAY
		array_splice($allMenusArray, $myArrayIndexToEliminate, 1);		
		//INSERT THE LAST INSERTED/UPDATED  MENU IN THE ARRAY
		array_splice($allMenusArray, $mPosition, 0, $myMenuNow);


		$i=0;


		foreach ( $allMenusArray as $menu ) 
		{
		
		//echo "<br><br>Index = ".$i."<br><br>";		

			

		  foreach ( $menu as $key => $value ) 
		  {
				if($key == "mPId")
				{
					$this->updateMenuPositionBymPIdSQL($value,$i);
				
				}


		  }
		  	$i = $i +1;
	
		}
		
} //END function



/***********************END REORDER MAIN MENUS******************************************/


function show_Menu_By_Pid_Into_Array($sql )
{

	$status=true;
	$result = $this->executeSQL($sql);
	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		$arr = array('mUId' =>  $row{'mUId'},'mPId' =>  $row{'mPId'},
		'mWebId' =>  $row{'mWebId'},
		'mName' =>  $row{'mName'},
		'mUrl' =>  $row{'mUrl'}, 'mWebsiteName' =>  $row{'mWebsiteName'},
		'mActive' =>  $row{'mActive'}, 'mPosition' => $row{'mPosition'}, 
		'mType' => $row{'mType'});

		return($arr);

	}
}//END 




/***********PARENT MENUS FUNCTIONS SET IN ORDER OF CALL**********************************/

function checkIfParentToOptionBoxSQL($mPId)
{
	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mPId='$mPId' LIMIT 1";
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
	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mId='$parentExistsId' LIMIT 1";
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


function showAllMenusMainButThisOneAndParentByUserWebsiteSQL($mPId,$mUId,$mWebId,$parentExistsId) 
{

	$sql="SELECT * FROM poorbuk_cms_menu_table WHERE mUId='$mUId' 
	AND mWebId='$mWebId' AND mParent='NO' AND mPId !='$parentExistsId' AND mPId !='$mPId' ORDER BY mPosition";
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


/***********END PARENT MENUS**********************************/



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