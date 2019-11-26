<?php
		

class PostsClass
{

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
	
	public $pId,$pWebsiteName,$pUId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pDateHour,$pPublished,$pCommentAllowed,$pLoveAllowed,$pLoveCounter, $pPass,$sql;
	//const JPEG_QUALITY=80;//NOT USED 0-100 //TAKE CARE: TOO MUCH QUALITY PICTURES GET BIGGER IN SIZE //THATS WHY RIGHT NOW WE USE ORIGINAL QUALITY
	

	
public function mysql_escape_mimic($inp) {
   /* if(is_array($inp))
        return array_map(__METHOD__, $inp);
	*/

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }

    return $inp;
} 

public function mysql_escape_simple_quote_with_double_quote_Jarim($inp) {
   /* if(is_array($inp))
        return array_map(__METHOD__, $inp);
	*/

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array("'"),array('"'), $inp);
    }

    return $inp;
} 

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
		exit;
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



function addEditorToWesite($pWebId,$newEditorID )
{


/*CHECK THAT THE USER DOES NOT EXIST BEFORE INSERT.....IS LIKE CHECK ROLL???OR ANYTHING...*/



	$sql="SELECT * FROM poorbuk_cms_websites_table WHERE webId='$pWebId' AND find_in_set('$newEditorID', webUsersIDs) > 0";
	//echo $sql;
	$result = $this->executeSQL($sql);
	$num_rows = mysql_num_rows($result);
	//echo "num_rows = ".$num_rows;		


	
	if($num_rows != 0)
	{
			//echo "ERROR: This user exists allready as editor";
	}
	else
	{
	
		/*ADD THE NEW EDITOR ID TO ALL USERS IDS*/
		$webUsersIDs="";
		
		$sql="SELECT webUsersIDs FROM poorbuk_cms_websites_table WHERE webId = '$pWebId' LIMIT 1";
		$result = $this->executeSQL($sql);

		while ($row = mysql_fetch_array($result))
		{
			

			$webUsersIDs= $row{'webUsersIDs'} . ",".$newEditorID;
		
		}	
		
		
		
		/*UPDATE THE USERS IDS FOR THIS WEBSITE ID*/
		$sql="UPDATE poorbuk_cms_websites_table SET webUsersIDs = '$webUsersIDs' WHERE webId = '$pWebId' LIMIT 1";
		$result = $this->executeSQL($sql);
	
	}
	

	

	return $num_rows;
	
	
}























function showPostsAllHTML($sql )
{

	//echo '<br>'.$sql .'<br>';
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
			echo $row{'pUId'}."<br>";
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

			
	}
	
echo '
			</div>';
	
}



function showPostsGarbageByIdSQL($pGarbageId) 
{
	$status=true;
	$sql="SELECT *
	FROM poorbuk_cms_postgarbage_table 
	WHERE pGarbageId= $pGarbageId LIMIT 1";
	

	return $sql;	
	
}//END showAllPostsUserPlusFriends()



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
			echo $row{'pUId'}."<br>";
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
			echo $row{'pUId'}."<br>";
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

$arr = array('pId' =>  $row{'pId'},'pWebId' =>  $row{'pWebId'}, 'pWebsiteName' =>  $row{'pWebsiteName'}
,'pUId' =>  $row{'pUId'}, 'pTitle' =>  $row{'pTitle'},'pUrl' =>  $row{'pUrl'}
, 'pTextEditorHTML' =>  $row{'pTextEditorHTML'}, 'pHeader' => $row{'pHeader'}
, 'pMenu' => $row{'pMenu'}, 'pContent' => $row{'pContent'}, 'pFooter' => $row{'pFooter'},
 'pType' => $row{'pType'}, 'pPublished' => $row{'pPublished'}, 'pCommentAllowed' => $row{'pCommentAllowed'}, 
 'pLoveAllowed' => $row{'pLoveAllowed'}, 'pDateHour' => $row{'pDateHour'}, 'pLoveCounter' => $row{'pLoveCounter'}
 ,'status'=>"success", 'pPass' => $row{'pPass'});

return($arr);

	}
}






function showPostsByIdJson($sql )
{
	//echo '<br>'.	$sql.'<br>';

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
			echo $row{'pUId'}."<br>";
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

			$arr = array('pId' =>  $row{'pId'},'pWebId' =>  $row{'pWebId'},'pWebsiteName' =>  $row{'pWebsiteName'}
			, 'pUId' =>  $row{'pUId'}, 'pTitle' =>  $row{'pTitle'},'pUrl' =>  $row{'pUrl'}
			, 'pHeader' => $row{'pHeader'}
			, 'pMenu' => $row{'pMenu'}, 'pContent' => $row{'pContent'}, 'pFooter' => $row{'pFooter'}
			, 'pType' => $row{'pType'}, 'pPublished' => $row{'pPublished'}, 'pCommentAllowed' => $row{'pCommentAllowed'}
			, 'pLoveAllowed' => $row{'pLoveAllowed'}, 'pDateHour' => $row{'pDateHour'}, 'pLoveCounter' => $row{'pLoveCounter'}
			, 'status'=>"success", 'pPass' => $row{'pPass'});

			echo json_encode($arr);

	}
}

function convert_pId_pWebId_Json($pId,$pWebId)
{
	
		$arr = array('pId' => $pId, 'pWebId' =>  $pWebId,'status' => 'success');
		echo json_encode($arr);
}

function phpcmsButtonEditPostGetHtml($sql )
{
//echo '<br>'.$sql.'<br>';

	$result = $this->executeSQL($sql);


	$mypostcounter =0;
	while ($row = mysql_fetch_array($result))
	{
		
			echo $row{'pTextEditorHTML'};

	}
}





function insertPost($pWebId,$pWebsiteName,$pUId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass)
{	
//echo "pWebsiteName insertPost = ".$pWebsiteName;
	
		$this->pUId =	$pUId ;
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
		$sql="INSERT INTO poorbuk_cms_post_table ( pWebId,pWebsiteName,pUId, pTitle, pUrl,pTextEditorHTML, pHeader, pMenu, pContent, pFooter, pType, pPublished, pCommentAllowed, pLoveAllowed, pPass) VALUES('$pWebId', '$pWebsiteName','$pUId', '$pTitle','$pUrl', '$pTextEditorHTML', '$pHeader', '$pMenu', '$pContent', '$pFooter', '$pType', '$pPublished', '$pCommentAllowed', '$pLoveAllowed', '$pPass')";
		
		//mysql_query($sql);
		//$last_id = mysql_insert_id();			
		$result = $this->executeSQL($sql);		
		$last_id = mysql_insert_id();	
		$this->pId =	$last_id;		

		//echo "	Last id = $last_id";
		//UPDATE GARBAGE
		$result = $this->insertPostGarbage($this->pId,$pWebId,$pWebsiteName,$pUId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass);
	
		return $last_id;
		
}//END function cloneInse





function updatePost($pId,$pWebId,$pWebsiteName,$pUId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass)
{	
	//echo "<br>1 INSIDE UPDATE Post Title = $pTitle <br>";
//echo "pWebsiteName update = ".$pWebsiteName;

	$this->pId =	$pId;	
	$this->pWebsiteName =	$pWebsiteName ;
	$this->pUId =	$pUId ;
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

	//echo "<br>INSIDE UPDATE Post Title = $pTitle <br>";		
	$status=true;
	$sql="UPDATE poorbuk_cms_post_table SET pWebId = '$pWebId', pWebsiteName = '$pWebsiteName', pUId ='$pUId', pTitle ='$pTitle', pUrl ='$pUrl',pTextEditorHTML = '$pTextEditorHTML', 
	pHeader ='$pHeader', pMenu ='$pMenu', pContent ='$pContent', pFooter ='$pFooter', pType ='$pType', 
	pPublished ='$pPublished', pCommentAllowed ='$pCommentAllowed', pLoveAllowed ='$pLoveAllowed', 
	pPass ='$pPass' WHERE pId='$pId' LIMIT 1";	
	
	$result = $this->executeSQL($sql);
	//echo $sql;
	//UPDATE GARBAGE
	$result = $this->insertPostGarbage($pWebId,$this->pId,$pWebsiteName,$pUId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass);
		
	//echo "$num_rows Rows\n";


	//return $status;
		
}//END function cloneInse




function insertPostGarbage($pId,$pWebId,$pWebsiteName,$pUId,$pTitle,$pUrl,$pTextEditorHTML,$pHeader,$pMenu,$pContent,$pFooter,$pType,$pPublished,$pCommentAllowed,$pLoveAllowed, $pPass)
{	
		//UPDATE GARBAGE
		$sql="INSERT INTO poorbuk_cms_postgarbage_table ( pId,pWebId,pWebsiteName,pUId, pTitle, pUrl,pTextEditorHTML, pHeader, pMenu, pContent, pFooter, pType, pPublished, pCommentAllowed, pLoveAllowed, pPass) VALUES( '$pId','$pWebId','$pWebsiteName','$pUId', '$pTitle','$pUrl', '$pTextEditorHTML', '$pHeader', '$pMenu', '$pContent', '$pFooter', '$pType', '$pPublished', '$pCommentAllowed', '$pLoveAllowed', '$pPass')";	
		$result = $this->executeSQL($sql);

}

function insertWeb($pWebsiteName,$pUId)
{	
		//UPDATE GARBAGE
		$sql="INSERT INTO poorbuk_cms_websites_table ( webName,webUsersIDs) VALUES( '$pWebsiteName','$pUId')";	
		$result = $this->executeSQL($sql);
		$last_id = mysql_insert_id();				
		return $last_id;

}

function showPostsAll($userid) 
{

/*
	$sql="SELECT * FROM poorbuk_cms_websites_table w 
	INNER JOIN poorbuk_cms_post_table p
	ON w.webId=p.pWebId AND find_in_set('$userid', w.webUsersIDs) > 0
	ORDER BY pId DESC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
*/
	
	

	$sql="SELECT * FROM poorbuk_cms_websites_table w 
	INNER JOIN poorbuk_cms_post_table p
	ON w.webId=p.pWebId AND find_in_set('$userid', w.webUsersIDs) > 0
	INNER JOIN poorbuk_cms_menu_table m
	ON  	m.mPId = p.pId
	ORDER BY  webId DESC, mPosition ASC"; 
	
	//echo $sql;
/*
$sql = "SELECT *
from poorbuk_cms_websites_table w, poorbuk_cms_post_table p
WHERE w.webId=p.pWebId AND find_in_set('$userid', w.webUsersIDs) > 0;";

*/

	//$sql="SELECT * FROM poorbuk_cms_post_table ORDER BY pId DESC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	return	$sql;		
	
} 
function showPostsGarbageAll($userid) 
{

	//$sql="SELECT * FROM poorbuk_cms_postgarbage_table ORDER BY pGarbageId DESC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";
	$sql="SELECT * FROM  poorbuk_cms_websites_table w 
	INNER JOIN poorbuk_cms_postgarbage_table p
	ON w.webId=p.pWebId AND find_in_set('$userid', w.webUsersIDs) > 0
	ORDER BY pId DESC"; //WHERE userFolder='$linksFolder' AND linksUID='$userid' ORDER BY myFileName ASC";	
	
	return	$sql;		
	
} 

function showPostsById($pId) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pId='$pId' LIMIT 1";
	return $sql;
	
	
} 

function showWebsiteNamesToOptionBoxSQL($pUId) 
{

	//$sql="SELECT DISTINCT pWebsiteName FROM poorbuk_cms_post_table WHERE pUId='$pUId' ";
	$sql="SELECT * FROM poorbuk_cms_websites_table WHERE  find_in_set('$pUId', webUsersIDs) > 0";

	return $sql;
	//	$sql="SELECT DISTINCT pWebsiteName FROM poorbuk_cms_post_table WHERE pUId='$pUId' AND  pWebsiteName='$pWebsiteName'  LIMIT 1";
	
} 

function showWebsiteNamesToOptionBox($sql)
{
	$result = $this->executeSQL($sql);

	//echo "<option value='-2'>$sql</option>";
	echo "<option value='-1'>All...</option>";

	while ($row = mysql_fetch_array($result))
	{
		$pWebsiteName= $row['webName'];
		$webId = $row['webId'];
		
		echo "<option value='$webId'>$pWebsiteName</option>";
		
	}

}

function showPostsByWebsiteNameSQL($pUId,$pWebId) 
{

/*
	$sql="SELECT *  FROM poorbuk_cms_post_table WHERE pUId='$pUId' AND  pWebId='$pWebId'  ";
	return $sql;
*/

	$sql="SELECT * FROM poorbuk_cms_websites_table w 
	INNER JOIN poorbuk_cms_post_table p
	ON w.webId=p.pWebId AND find_in_set('$pUId', w.webUsersIDs) > 0
	INNER JOIN poorbuk_cms_menu_table m
	ON  	m.mPId = p.pId
	WHERE webId = '$pWebId'
	ORDER BY  webId DESC, mPosition ASC"; 

	//echo $sql;
	return $sql;

} 




function showPostsByUrl($pUrl) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUrl='$pUrl' LIMIT 1";
	return $sql;
	
} 




function showPosts_By_PUrl_WebId($myUserURLFinalPath,$myUserURLSessionWebId)
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUrl='$myUserURLFinalPath' AND pWebId='$myUserURLSessionWebId' LIMIT 1";
	return $sql;
	
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

function phpcmslookupUrlExistsByPostIdWebId($pUId,$pUrl,$pWebId,$pId="") 
{

	//RETURN TRUE IF A POST WITH THE SAME URL AND
	//DIFFERENT POST-ID IS FOUNDED
	if ($pWebId!="")
	{
		if ($pId!="")
		{
			$sql="SELECT * FROM poorbuk_cms_post_table WHERE pWebId = '$pWebId' AND pUId = '$pUId' AND pUrl='$pUrl' AND  pId<>$pId LIMIT 1";
		}
		else
		{
			$sql="SELECT * FROM poorbuk_cms_post_table WHERE pWebId = '$pWebId' AND pUId = '$pUId' AND pUrl='$pUrl'  LIMIT 1";	
		}		
	
	}
	else
	{
		if ($pId!="")
		{
			$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUId = '$pUId' AND pUrl='$pUrl' AND  pId<>$pId LIMIT 1";
		}
		else
		{
			$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUId = '$pUId' AND pUrl='$pUrl'  LIMIT 1";	
		}	
	
	}





	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);

	return $num_rows;	

} 

function lookupUrlExistsForThisUser($pUId,$pUrl) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pUId = '$pUId' AND pUrl='$pUrl'  LIMIT 1";	
	

	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);

	return $num_rows;	

} 

function lookupUrlExistsForThisWebId($myUserURLSessionWebId,$pUrl) 
{

	$sql="SELECT * FROM poorbuk_cms_post_table WHERE pWebId = '$myUserURLSessionWebId' AND pUrl='$pUrl'  LIMIT 1";	
	

	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);
	//echo "<br>num_rows = $num_rows";	
	//echo "<br>sql = $sql";
	return $num_rows;	

} 

function lookupIfWebIdExists($pWebId) 
{

	//RETURN TRUE IF A POST WITH THE SAME URL IS FOUND
	if ($pWebId!="")
	{
		$sql="SELECT * FROM poorbuk_cms_websites_table WHERE webId='$pWebId'  LIMIT 1";



	$result = $this->executeSQL($sql);	
	$num_rows = mysql_num_rows($result);
	return $num_rows;	
	}
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
