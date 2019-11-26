<?php
		

class PostsClass
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

function showPostsAllHTML($sql )
{
	//echo '<br>'.$userid.'<br>';
	$status=true;
	
	$result = $this->executeSQL($sql);

	
echo '
			<div class="postsShowAllCMS">
				<h1>POSTS</h1>';	
	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		$mypostcounter =$mypostcounter+1;
		if ($mypostcounter ==0)
		{
		
		}


/*		
			echo $row{'pId'}."<br>";
			echo $row{'pWebsiteName'}."<br>";			
			echo $row{'pUserId'}."<br>";
			echo $row{'pTitle'}."<br>";
			echo $row{'pUrl'}."<br>";
			echo $row{'pTextEditorHTML'}."<br>";
			echo $row{'pHeader'}."<br>";
			echo $row{'pMenu'}."<br>";
			echo $row{'pContent'}."<br>";
			echo $row{'pFooter'}."<br>";
			echo $row{'pType'}."<br>";
			echo $row{'pPublished'}."<br>";
			echo $row{'pCommentAllowed'}."<br>";
			echo $row{'pLoveAllowed'}."<br>";
			echo $row{'pDateHour'}."<br>";
			echo $row{'pLoveCounter'}."<br>";
*/
		
echo '

			<div style="width:300px;float:left;clear:both;margin-bottom:10px;">
				<button class="buttonEditPost" value="'.$row{'pId'}.'" >'.$row{'pTitle'}.'</button>
			</div>
			

';
/*</tr>
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

	</td>*/
			
	}
	
echo '
			</div>';
	
}







function showPostsGarbageAllHTML($sql )
{
	//echo '<br>'.$userid.'<br>';
	$status=true;
	
	$result = $this->executeSQL($sql);

	
echo '
			<div id="showPostsGarbageAllHTML" class="postsShowAllCMS" style="">	
	
	<h1>GARBAGE POSTS</h1>';
	
	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
		$mypostcounter =$mypostcounter+1;
		if ($mypostcounter ==0)
		{
		
		}
		//echo $row{'pId'}."<br>";

/*		
			echo $row{'pId'}."<br>";
			echo $row{'pWebsiteName'}."<br>";	
			echo $row{'pUserId'}."<br>";
			echo $row{'pTitle'}."<br>";
			echo $row{'pUrl'}."<br>";
			echo $row{'pTextEditorHTML'}."<br>";
			echo $row{'pHeader'}."<br>";
			echo $row{'pMenu'}."<br>";
			echo $row{'pContent'}."<br>";
			echo $row{'pFooter'}."<br>";
			echo $row{'pType'}."<br>";
			echo $row{'pPublished'}."<br>";
			echo $row{'pCommentAllowed'}."<br>";
			echo $row{'pLoveAllowed'}."<br>";
			echo $row{'pDateHour'}."<br>";
			echo $row{'pLoveCounter'}."<br>";
*/
		
echo '

			<div style="width:300px;float:left;clear:both;margin-bottom:10px;">
				<button class="buttonEditPostGarbage" value="'.$row{'pGarbageId'}.'" >'.$row{'pTitle'}.'</button>
			</div>
			

';
/*</tr>
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

	</td>*/
			
	}
	
echo '
			</div>';
	
}

function showPostsByIdInArray($sql )
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
			//echo "pGarbageId = ".$row{'pGarbageId'}."<br>";
			//echo "pTextEditorHTML = ".$row{'pTextEditorHTML'}."<br>";
/*		
			echo $row{'pId'}."<br>";
			echo $row{'pWebsiteName'}."<br>";	
			echo $row{'pUserId'}."<br>";
			echo $row{'pTitle'}."<br>";
			echo $row{'pUrl'}."<br>";
			echo $row{'pTextEditorHTML'}."<br>";
			echo $row{'pHeader'}."<br>";
			echo $row{'pMenu'}."<br>";
			echo $row{'pContent'}."<br>";
			echo $row{'pFooter'}."<br>";
			echo $row{'pType'}."<br>";
			echo $row{'pPublished'}."<br>";
			echo $row{'pCommentAllowed'}."<br>";
			echo $row{'pLoveAllowed'}."<br>";
			echo $row{'pDateHour'}."<br>";
			echo $row{'pLoveCounter'}."<br>";
*/

$arr = array('pId' =>  $row{'pId'}, 'pWebsiteName' =>  $row{'pWebsiteName'},'pUserId' =>  $row{'pUserId'}, 'pTitle' =>  $row{'pTitle'},'pUrl' =>  $row{'pUrl'}
, 'pTextEditorHTML' =>  $row{'pTextEditorHTML'}, 'pHeader' => $row{'pHeader'}
, 'pMenu' => $row{'pMenu'}, 'pContent' => $row{'pContent'}, 'pFooter' => $row{'pFooter'},
 'pType' => $row{'pType'}, 'pPublished' => $row{'pPublished'}, 'pCommentAllowed' => $row{'pCommentAllowed'}, 
 'pLoveAllowed' => $row{'pLoveAllowed'}, 'pDateHour' => $row{'pDateHour'}, 'pLoveCounter' => $row{'pLoveCounter'}
 ,'status'=>"success", 'pPass' => $row{'pPass'});

return($arr);

	}
}



function showMenuByPostUrlInArray($sql )
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
		

		//echo "pGarbageId = ".$row{'pGarbageId'}."<br>";
		//echo "pTextEditorHTML = ".$row{'pTextEditorHTML'}."<br>";
/*
		echo $row{'mPId'}."<br>";
		echo $row{'mName'}."<br>";	
		echo $row{'mUrl'}."<br>";
		echo $row{'mWebsiteName'}."<br>";
		echo $row{'mActive'}."<br>";
		echo $row{'mPosition'}."<br>";
		echo $row{'mType'}."<br>";
*/


		$arr = array('mUId' =>  $row{'mUId'},'mPId' =>  $row{'mPId'}, 'mName' =>  $row{'mName'},
		'mUrl' =>  $row{'mUrl'}, 'mWebsiteName' =>  $row{'mWebsiteName'},
		'mActive' =>  $row{'mActive'}, 'mPosition' => $row{'mPosition'}, 
		'mType' => $row{'mType'});

		return($arr);

	}
}
function showPostsByIdJson($sql )
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
			//echo "pGarbageId = ".$row{'pGarbageId'}."<br>";
			//echo "pTextEditorHTML = ".$row{'pTextEditorHTML'}."<br>";
/*		
			echo $row{'pId'}."<br>";
			echo $row{'pWebsiteName'}."<br>";	
			echo $row{'pUserId'}."<br>";
			echo $row{'pTitle'}."<br>";
			echo $row{'pUrl'}."<br>";
			echo $row{'pTextEditorHTML'}."<br>";
			echo $row{'pHeader'}."<br>";
			echo $row{'pMenu'}."<br>";
			echo $row{'pContent'}."<br>";
			echo $row{'pFooter'}."<br>";
			echo $row{'pType'}."<br>";
			echo $row{'pPublished'}."<br>";
			echo $row{'pCommentAllowed'}."<br>";
			echo $row{'pLoveAllowed'}."<br>";
			echo $row{'pDateHour'}."<br>";
			echo $row{'pLoveCounter'}."<br>";
*/

			$arr = array('pId' =>  $row{'pId'},'pWebsiteName' =>  $row{'pWebsiteName'}, 'pUserId' =>  $row{'pUserId'}, 'pTitle' =>  $row{'pTitle'},'pUrl' =>  $row{'pUrl'}
			, 'pTextEditorHTML' =>  $row{'pTextEditorHTML'}, 'pHeader' => $row{'pHeader'}
			, 'pMenu' => $row{'pMenu'}, 'pContent' => $row{'pContent'}, 'pFooter' => $row{'pFooter'},
			 'pType' => $row{'pType'}, 'pPublished' => $row{'pPublished'}, 'pCommentAllowed' => $row{'pCommentAllowed'}, 
			 'pLoveAllowed' => $row{'pLoveAllowed'}, 'pDateHour' => $row{'pDateHour'}, 'pLoveCounter' => $row{'pLoveCounter'}
			 ,'status'=>"success", 'pPass' => $row{'pPass'});

			echo json_encode($arr);

	}
}

/*MENUS*/

function showAllMenusForPostUrlSQL($mUrl) 
{

	$sql="SELECT * FROM pmenutable WHERE mUrl = '$mUrl' LIMIT 1"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
} 

function showAllMenusForPostUrlJSON($sql )
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

			$arr = array('status' =>  "success",'mPId' =>  $row{'mPId'},'mName' =>  $row{'mName'}, 'mUrl' =>  $row{'mUrl'}, 
			'mWebsiteName' =>  $row{'mWebsiteName'},'mActive' =>  $row{'mActive'}
			, 'mPosition' =>  $row{'mPosition'}, 'mType' => $row{'mType'});

			echo json_encode($arr);

	}
}

function showAllMenusForWebsiteName($mWebsiteName) 
{

	$sql="SELECT * FROM pmenutable WHERE mWebsiteName = '$mWebsiteName' ORDER BY mPosition ASC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
} 
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

}

function insertPost($pWebsiteName,$pUserId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass)
{	
//echo "pWebsiteName insertPost = ".$pWebsiteName;
	
		$this->pUserId =	$pUserId ;
		$this->pWebsiteName =	$pWebsiteName ;
		$this->pTitle =	$pTitle ;
		$this->pUrl =	$pUrl ;
		$this->pTextEditorHTML =	$pTextEditorHTML ;
		$this->pHeader =	$pHeader ;
		$this->pMenu =	$pMenu ;
		$this->pContent =	$pContent ;
		$this->pFooter =	$pFooter ;
		$this->pType =	$pType ;
		$this->pPublished =	$pPublished ;
		$this->pCommentAllowed =	$pCommentAllowed ;
		$this->pLoveAllowed =	$pLoveAllowed ;
		$this->pPass =	$pPass ;

		$status =1;
		$sql="INSERT INTO poorbuk_cms_post_table ( pWebsiteName,pUserId, pTitle, pUrl,pTextEditorHTML, pHeader, pMenu, pContent, pFooter, pType, pPublished, pCommentAllowed, pLoveAllowed, pPass) VALUES( '$pWebsiteName','$pUserId', '$pTitle','$pUrl', '$pTextEditorHTML', '$pHeader', '$pMenu', '$pContent', '$pFooter', '$pType', '$pPublished', '$pCommentAllowed', '$pLoveAllowed', '$pPass')";
		
		//mysql_query($sql);
		//$last_id = mysql_insert_id();			
		$result = $this->executeSQL($sql);		
		$last_id = mysql_insert_id();	
		$this->pId =	$last_id;		

		//echo "	Last id = $last_id";
		//UPDATE GARBAGE
		$result = $this->insertPostGarbage($this->pId,$pWebsiteName,$pUserId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass);
	
		return $last_id;
		
}//END function cloneInse



function insertMenu($mUId,$mPId,$mName,$mUrl,$mWebsiteName,$mActive,$mPosition,$mType)
{	

	//echo "<br>insertMenu mPId = ".$mPId."<br>";
		$status =1;
		
		$sql="INSERT INTO pmenutable ( mUId,mPId,mName,mUrl,mWebsiteName,mActive,mPosition,mType) VALUES( '$mUId','$mPId','$mName','$mUrl','$mWebsiteName','$mActive','$mPosition','$mType')";
		//echo $sql;
		$result = $this->executeSQL($sql);		
		
}//END functio

function updatePost($pId,$pWebsiteName,$pUserId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass)
{	

//echo "pWebsiteName update = ".$pWebsiteName;
	$this->pId =	$pId;	
	$this->pWebsiteName =	$pWebsiteName ;
	$this->pUserId =	$pUserId ;
	$this->pTitle =	$pTitle ;
	$this->pUrl =	$pUrl ;
	$this->pTextEditorHTML =	$pTextEditorHTML ;
	$this->pHeader =	$pHeader ;
	$this->pMenu =	$pMenu ;
	$this->pContent =	$pContent ;
	$this->pFooter =	$pFooter ;
	$this->pType =	$pType ;
	$this->pPublished =	$pPublished ;
	$this->pCommentAllowed =	$pCommentAllowed ;
	$this->pLoveAllowed =	$pLoveAllowed ;
	$this->pPass =	$pPass ;

		
	$status=true;
	$sql="UPDATE poorbuk_cms_post_table SET  pWebsiteName = '$pWebsiteName', pUserId ='$pUserId', pTitle ='$pTitle', pUrl ='$pUrl',pTextEditorHTML ='$pTextEditorHTML', 
	pHeader ='$pHeader', pMenu ='$pMenu', pContent ='$pContent', pFooter ='$pFooter', pType ='$pType', 
	pPublished ='$pPublished', pCommentAllowed ='$pCommentAllowed', pLoveAllowed ='$pLoveAllowed', 
	pPass ='$pPass' WHERE pTitle='$pTitle' LIMIT 1";	
	
	$result = $this->executeSQL($sql);

	//UPDATE GARBAGE
	$result = $this->insertPostGarbage($this->pId,$pWebsiteName,$pUserId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass);
		
	//echo "$num_rows Rows\n";


	//return $status;
		
}//END function cloneInse


function updateMenu($mUId,$mPId,$mName,$mUrl,$mWebsiteName,$mActive,$mPosition,$mType)
{	


	$status=true;
	$sql="UPDATE pmenutable SET mUId='$mUId',  mName ='$mName', mUrl ='$mUrl', mWebsiteName ='$mWebsiteName',
	mActive ='$mActive', mPosition ='$mPosition', mType ='$mType'  WHERE mPId = '$mPId' LIMIT 1";	
	
	//echo $sql;
	$result = $this->executeSQL($sql);

		
}//END function cloneInse

function insertPostGarbage($pId,$pWebsiteName,$pUserId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass)
{	
		//UPDATE GARBAGE
		$sql="INSERT INTO poorbuk_cms_postgarbage_table ( pId,pWebsiteName,pUserId, pTitle, pUrl,pTextEditorHTML, pHeader, pMenu, pContent, pFooter, pType, pPublished, pCommentAllowed, pLoveAllowed, pPass) VALUES( '$pId','$pWebsiteName','$pUserId', '$pTitle','$pUrl', '$pTextEditorHTML', '$pHeader', '$pMenu', '$pContent', '$pFooter', '$pType', '$pPublished', '$pCommentAllowed', '$pLoveAllowed', '$pPass')";	
		$result = $this->executeSQL($sql);

}
function showPostsAll() 
{

	$sql="SELECT * FROM poorbuk_cms_post_table ORDER BY pId DESC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
} 
function showPostsGarbageAll() 
{

	$sql="SELECT * FROM poorbuk_cms_postgarbage_table ORDER BY pGarbageId DESC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
} 

function showPostsById($pId) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pId='$pId' LIMIT 1";
	return $sql;
	
	
} 

function showPostsByUrl($pUrl) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUrl='$pUrl' LIMIT 1";
	return $sql;
	
} 

function showMenuByPostUrl($mUrl) 
{

	$sql="SELECT * FROM pmenutable WHERE mUrl='$mUrl' LIMIT 1";
	return $sql;
	
} 

function showAllMenusMainByUserIdAndWebsiteName($mUId,$mWebsiteName) 
{

	$sql="SELECT * FROM pmenutable WHERE mUId='$mUId' 
	AND mWebsiteName='$mWebsiteName'  AND mActive='YES' AND mType='Main' ORDER BY mPosition";
	//echo $sql;
	return $sql;
	
} 

function showAllMenusMainByUserIdAndWebsiteNameArray($sql )
{
	//echo '<br>'.$userid.'<br>';
	$status=true;
	$result = $this->executeSQL($sql);

	$arr = array(array());

	$mycounter =0;
	while ($row = mysql_fetch_array($result))
	{
		



		$arrParameters = array('status' =>  "success",'mPId' =>  $row{'mPId'},'mName' =>  $row{'mName'}, 'mUrl' =>  $row{'mUrl'}, 
		'mWebsiteName' =>  $row{'mWebsiteName'},'mActive' =>  $row{'mActive'}
		, 'mPosition' =>  $row{'mPosition'}, 'mType' => $row{'mType'});

		$arr[$mycounter] = $arrParameters;
		$mycounter =$mycounter+1;

	}
	
		return $arr;
}
function showPostsGarbageById($pGarbageId) 
{

	$sql="SELECT * FROM poorbuk_cms_postgarbage_table WHERE pGarbageId='$pGarbageId' LIMIT 1";
	return $sql;
	
	
} 

function lookupPostsByTitleExists($pTitle) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pTitle='$pTitle' LIMIT 1";
	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);
	return $num_rows;	

	
} 

function lookupUrlExistsInAnotherPostId($pUrl,$pId="") 
{

	//RETURN TRUE IF A POST WITH THE SAME URL AND
	//DIFFERENT POST-ID IS FOUNDED
	
	
	if ($pId!="")
	{
		$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUrl='$pUrl' AND  pId<>$pId LIMIT 1";
	}
	else
	{
		$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUrl='$pUrl'  LIMIT 1";	
	}

	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);
	return $num_rows;	

} 

function lookupIfPostExists($pId) 
{

	//RETURN TRUE IF A POST WITH THE SAME URL IS FOUND
	if ($pId!="")
	{
		$sql="SELECT * FROM poorbuk_cms_post_table WHERE pId='$pId'  LIMIT 1";
	}


	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);
	return $num_rows;	

} 


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
	
}// END RenameFile



}//END class FileUploadClass
?>