<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

class Post {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
    public $ip,$mail,$passUserOriginalCoded,$passUserOriginalBeforeCoded,
	$passUserRandomNow,$userid,$username,
	$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
	$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder,$last_id;

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

  
  
function showAllPostsHTML($userid,$myTime,$sql)
{

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

		echo '<div class="myPost">';
		$result3 = mysql_query("SELECT * FROM poorbuk_user_table WHERE userid='".$row{'postiduser'}."'");	
		$row2 = mysql_fetch_array($result3);
			
			
		/*********POST USER PICTURE AND NAME***************************************************************************/
 

		echo '
		<div  class="divUserPhotoandNameWrapper">
		   
			<div id="'.$row2{'userid'}.'">
				<button class="mySubmitFriendProfile mySubmitFriendProfileFrontPage"  value="'.$row2{'userid'}.'" >
					<div class="divImgPostUserPhoto">
						<img class="imgUserPhotoPost" src="'.$row2['userphoto'].'">
					</div>
					<div class="divUsername">'. $row2['username'].'</div>
				</button>
			</div>
							
		</div >';
		   
		
		/*********POST CONTENT***************************************************************************/
		echo '<div class="nicefont myDivPostMainContent"  id="mypost'.$row{'postid'}.'">';
		echo $row{'postcontent'};
		echo '</div ><br>';
		/*********END POST CONTENT***************************************************************************/
		//&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
		/*********LOVE AND CLONE***************************************************************************/
		echo '<br>';
		$result4 = mysql_query("SELECT loveid FROM poorbuk_love_table 
		WHERE lovePOSTid='".$row{'postid'}."'
		AND loveuserid=$userid");	


		$row4 = mysql_fetch_array($result4);

		echo 			
		'<div class="loveandclonegeneraldiv">';
		if (($row4{'loveid'})>0) 
		{
		echo 	
			
			'<div class="loveCounterAndImage"><img class="buttonheart" src="button-heart.png" alt="Submit" >
			<div class="mylovecounter'.$row{'postid'}.' myLoveCounter">'. $row{'postlove'} .'</div></div>'.
			'<button class="myButtonAll mySubmitLove'.$row{'postid'}.' mySubmitLove"  value="'.$row{'postid'}.'">Unlove</button>'.
			'<button class="myButtonAll myCloneButton" value="'.$row{'postid'}.'" >Clone</button>';

		}
		else
		{
		echo 
			'<div class="loveCounterAndImage"><img class="buttonheart" src="button-heart.png" alt="Submit" style="float:left;" width="48" height="48">
			<div class="mylovecounter'.$row{'postid'}.' myLoveCounter">'. $row{'postlove'} .'</div></div>'.
			'<button class="myButtonAll mySubmitLove"  id="idButtonLove'.$row{'postid'}.'" value="'.$row{'postid'}.'">Love</button>'.
			'<button class="myButtonAll myCloneButton" id="idButtonClone'.$row{'postid'}.'" value="'.$row{'postid'}.'" >Clon</button>';
		}
		echo '</div>';// END '<div class="loveandclonegeneraldiv">';
		/*********END LOVE AND CLONE***************************************************************************/
		
		/*********COMMENTS***************************************************************************/
		echo '<hr>';

		
		//div to store all comments
		//selected by id =$row{'postid'} in code

		
		$result2 = mysql_query("
		SELECT * FROM poorbuk_comment_table c
		LEFT JOIN 
		poorbuk_user_table u 
		ON u.userid=c.commentuserid
		WHERE c.commentpostid='".$row{'postid'}."' 
		ORDER BY commentid ASC");	
		
		
		$counterComments = 0;
		$num_rows = 0;	
		echo '<div class="labelComments" >Comments</div> ';
		//div class="divAllComments" IS OUT THE WHILE BECAUSE NO MATTER IF NO COMMENTS, THIS DIV MUST EXIST FOR NEW COMMENTS.
		echo '<div class="divAllComments" id="myDivAllComments'.$row{'postid'}.'">';	
		while ($row2 = mysql_fetch_array($result2)) 
		{	
		$counterComments = $counterComments +1;
		if ($counterComments==1)
		{
				$num_rows = mysql_num_rows($result2);

		}

			
				echo '<div  class="commentDivMainComment">';		
				//USERNAME DIV
				echo '<div  class="commentDivPhotoUser"><img src="'.$row2{'userphoto'}.'" class="commentImgUserPhoto" /></div >';
				echo '<div  class="commentDivUserName">'.$row2{'username'}.'</div >';
				echo '<div class="commentDivContentDB" >'.$row2{'commentcontent'}.'</div >';
				echo '</div>';

		}
		echo '</div>';
		echo '<br><div class="commentsCounter">Total </div><div class="commentsCounter" id="commentsCounter'.$row{'postid'}.'" >'.$num_rows.'</div><br><br>';
		//div to add new comments
		//selected by name =$row{'postid'} in code
		echo '<div class="myDivWriteYourCommentHere" >Comentar</div>
		<div  class="myDivComment" id="divNewComment'.$row{'postid'}.'" contenteditable="true" >';//</div>';
		echo '</div>';
		
		/*********SUBMIT***************************************************************************/

		//button to submit comments
		//selected by class="mySubmitComment"
		//use the attribute value=$row{'postid'} to localize the correspondent comment by name =$row{'postid'} in code
		echo 	'<button class="myButtonAll mySubmitComment"  value="'.$row{'postid'}.'" >Enviar comentario</button>';
		
		
		/*********END COMMENTS***************************************************************************/
	   
	   	echo '</div>';//class="myPost">'
	   

		//BUTTON SEE MORE POSTS value="'.$row{'postdatehour'}.'"
		$mypostcounter = $mypostcounter +1;
		if ($mypostcounter==7) 
		{
			echo '<br><button class="invisible buttonSeeMorePosts" value="'.$row{'postdatehour'}.'">See more posts</button>';
		
		}		
			
	}	
}


function notificationPostUpdateToWhiteWhenPostSeenByUser($userid,$postid) 
{

	$result=1;
	/****UPDATE ME TO WHITE NO MATTER WHAT...*******************/
	$sql="UPDATE poorbuk_notifications_table 
	SET seencolor='white' 
	WHERE touserid=$userid AND postid=$postid";	

	if (!$result = mysql_query($sql)) 
	{
		//echo "Error query<br>";
		$result = ($result) ? 'true' : 'false';
		//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
	}
	
	return $result;	
	
}

function showPostByPostId($userid,$postid,$myTime) 
{
	$result=1;
	$sql="SELECT *
	FROM poorbuk_post_table 
	WHERE postid= $postid LIMIT 1";
	
	//SQL EXECUTED IN THE NEXT FUNCTION
	
	$this->showAllPostsHTML($userid,$myTime,$sql);
	
	return $result;	
	
}//END showAllPostsUserPlusFriends()




function showAllPostsUserPlusFriends($userid,$myTime) 
{
	
	$sql="SELECT p.postid,p.postcontent,p.postiduser,p.postlove,p.postdatehour
	FROM poorbuk_post_table p
	LEFT JOIN poorbuk_amigo_table a
	ON 
	a.amigofriendstatus='AMIGO'	AND a.amigofriendid= '$userid'
	OR  (a.amigofriendstatus='AMIGO' AND a.amigouserid= '$userid')

	WHERE 
	p.postiduser=a.amigofriendid AND p.postiduser!='$userid' AND p.postdatehour<'$myTime'
	OR  
	p.postiduser=a.amigouserid AND p.postiduser!='$userid' AND  p.postdatehour<'$myTime' 

 

	UNION 
	SELECT p2.postid,p2.postcontent,p2.postiduser,p2.postlove,p2.postdatehour FROM poorbuk_post_table p2
	WHERE 
	 p2.postiduser='$userid'  AND  p2.postdatehour<'$myTime' 
	ORDER BY postid DESC LIMIT 7";

	$this->showAllPostsHTML($userid,$myTime,$sql);
	
}//END showAllPostsUserPlusFriends()



function showAllPostsUserOnly($userid,$myTime) 
{
	
	$sql="SELECT DISTINCT *
	FROM poorbuk_post_table p
	WHERE 
	p.postiduser=$userid 	
	ORDER BY p.postid DESC LIMIT 7";

	$this->showAllPostsHTML($userid,$myTime,$sql);
	
}//END showAllPostsUserPlusFriends()
	
	
	
function showAllPostsFriendOnly($userid,$myTime,$myfriendid) 
{
	
	$sqlAmigoStatus="SELECT amigofriendstatus FROM poorbuk_amigo_table 
	WHERE 
	amigofriendid= $myfriendid AND amigouserid= $userid 
	OR
	amigouserid= $myfriendid AND amigofriendid= $userid 	
	LIMIT 1";
	
	$myAmigoStatus="";
	$resultAmigoStatus = @mysql_query($sqlAmigoStatus);
	while($rowAmigoStatus = mysql_fetch_array($resultAmigoStatus))
	{
		$myAmigoStatus= $rowAmigoStatus['amigofriendstatus'] ;
	}
	

	
	if ($myAmigoStatus=="AMIGO")
	{
	
			$sql="SELECT DISTINCT *
		FROM poorbuk_post_table p
		WHERE 
		p.postiduser=$myfriendid 	
		ORDER BY p.postid DESC LIMIT 40";
		$this->showAllPostsHTML($userid,$myTime,$sql);
	}
	
	
	
}
	
	
function insertPost($userid,$mypostnow) 
{	
	$result =1;	
	$sql="INSERT INTO poorbuk_post_table (postcontent,postiduser)VALUES('".$mypostnow."',".$userid.")";
	
	
	if (!$result = mysql_query($sql)) 
	{
		//echo "Error query<br>";
		$result = ($result) ? 'true' : 'false';
		//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
	}
	$last_id = mysql_insert_id();
	$this->last_id = $last_id;	
	return $result;	
}



	
function loveInsert($userid,$myLoveCounternow,$myLovePostId,$myLoveplusminus1) 
{	
	
		$result =1;
		//UPDATE POST TABLE
		$sql="UPDATE poorbuk_post_table SET postlove='$myLoveCounternow'	WHERE postid='$myLovePostId'";	
		
		//UPDATE LOVE TABLE
		if ($myLoveplusminus1==1)//if love pressed add record to poorbuk_love_table
		{
			$sql2="INSERT INTO poorbuk_love_table (lovepostid,loveuserid)VALUES('$myLovePostId','$userid')"; 
		}
		else//if Unlove pressed delete record from poorbuk_love_table
		{
			$sql2="DELETE FROM poorbuk_love_table WHERE lovepostid=$myLovePostId AND loveuserid=$userid "; 
		}
		
		

	
		if (!$result = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
		}
			if (!$result = mysql_query($sql2)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
		}
		

		
		return $result;
}	





function loveNotifications($userid,$myLovePostId,$myLoveplusminus1) 
{	
		$result=true;

		if ($myLoveplusminus1==1)//if love pressed and userid!= postiduser send notification!!!
		{
			$sql="SELECT postiduser FROM poorbuk_post_table WHERE postid=$myLovePostId LIMIT 1";
			$resultsql = mysql_query($sql);
			
			while ($row = mysql_fetch_array($resultsql))
			{		
				$myPostUserid=$row['postiduser'];		
			}
			if ($myPostUserid!=$userid)
			{
				$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling)	VALUES('$userid','$myPostUserid','$myLovePostId','love')";
				if (!$result = mysql_query($sql)) 
				{
					//echo "Error query<br>";
					$result = ($result) ? 'true' : 'false';
					//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
					echo $result;
				}
			}					
			//include($_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/modules/phpnotifications/phpnotificationsLoveInsertDB.php');

		}

		return $result;
}	



function commentInsert($userid,$postCommentPostid,$mycommentnow) 
{	
	
		$result =1;
		//INSERT COMMENT TABLE
		$sql="INSERT INTO poorbuk_comment_table (commentpostid,commentcontent,commentuserid)
		VALUES('$postCommentPostid','$mycommentnow','$userid')";
		
		if (!$result = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
		}
		
		

		
		return $result;
}	


function commentInsertNotificationWhenPostInsert($userid) 
{	
			$result =1;
			$last_id = $this->last_id;
			
			$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling,seencolor)
			VALUES('$userid','$userid','$last_id ','comment follow','white')";
			//echo 'SQL2'.$sql;
			if (!$result = mysql_query($sql)) 
			{
				//echo "Error query<br>";
				$result = ($result) ? 'true' : 'false';
				//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
				echo $result;
				exit;
			}

			return $result;
}

function commentNotifications($userid,$postCommentPostid) 
{	

		
		//UPDATE ALL NOTIFICATIONS FOR THIS POST-ID TO YELLOW
		$sql="
		UPDATE poorbuk_notifications_table SET seencolor='yellow'
		WHERE 
		postid=$postCommentPostid AND handling='comment follow'";	
		if (!$result2 = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result2 = ($result2) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result2;
			exit;
		}
			
		
		//DELETE ALL NOTIFICATIONS FROM THIS POST-ID FOR THIS USER	

		$sql="DELETE FROM poorbuk_notifications_table 
		WHERE postid=$postCommentPostid AND touserid=$userid 
		AND handling='comment follow' LIMIT 1";
		//echo 'SQL1'.$sql;

		if (!$result3 = mysql_query($sql)) 
		{
			echo "Error query<br>";
			$result3 = ($result3) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result3;
			exit;
		}

		/******INSERT NOTIFICATION FOR ME AND FOR THIS POSTID IN WHITE***********/

		$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling,seencolor)
		VALUES('$userid','$userid','$postCommentPostid','comment follow','white')";
		//echo 'SQL2'.$sql;
		if (!$result = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			exit;
		}



	return $result;
	
	
}// END commentNotifications($userid,$postCommentPostid) 

function cloneInsert($userid,$postContent,$myPostId)
{	
	
		$result =1;
		$sql="INSERT INTO poorbuk_post_table (postcontent,postiduser)VALUES('$postContent','$userid')";

		
		if (!$result = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
		}
		
		return $result;
		
}//END function cloneInsert($userid,$postContent,$myPostId)


function cloneNotifications($userid,$postContent,$myPostId)
{	
	
	$result =1;
	
	//SEARCH POSTUSERID
	$sql="SELECT postiduser FROM poorbuk_post_table 
	WHERE postid=$myPostId LIMIT 1";
		if (!$result = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
		}
	
	while ($row = mysql_fetch_array($result))
	{
		
		$myPostUserid=$row['postiduser'];
		
	}
	
	//IF POST IS NOT FROM THIS USER, INSERT NOTIFICATION
	if ($myPostUserid!=$userid)
	{
		$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling)
		VALUES('$userid','$myPostUserid','$myPostId','clon')";
		if (!$result = mysql_query($sql)) 
		{
			//echo "Error query<br>";
			$result = ($result) ? 'true' : 'false';
			//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
		}
	}	


	return $result;
	
}// END function cloneInsert($userid,$postContent,$myPostId)

function notificationPostShowAll($userid,$myuserlanguage) 
{

	$myMessageToArrayAvoidRepeating="";

	$counterNewMessages=0;
	
		$sql="
	SELECT * FROM poorbuk_notifications_table 
	LEFT JOIN poorbuk_user_table 
	ON userid=fromuserid
	WHERE seencolor='yellow' and touserid=$userid LIMIT 100";
	//echo $sqlShowConversation;
	if (!$result = mysql_query($sql)) 
	{
		//echo "Error query<br>";
		$result = ($result) ? 'true' : 'false';
		//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
	}
	
	
	while ($row = mysql_fetch_array($result))
	{
		$counterNewMessages=$counterNewMessages+1;
		if ($counterNewMessages==1)
		{
			echo '<table id="tableNotificationsPost" >';
		}
		
		 
 
		//GET DATA INTO VARIABLES FROM DATABASE
		$messagefromname = $row{'username'};
		$messagefromphoto = $row{'userphoto'};
		$messaggetoid = $row{'touserid'};
		$handling = $row{'handling'};	
		$postid = $row{'postid'};		
		$seencolor = $row{'seencolor'};	
		$messagedate=$row{'notificationdatehour'};
		$backcolorunread= $seencolor;
		
		
		
		/*******MODULO TO REPLACE THE DATE WITH TODAY OR YESTERDAY IF IT MATCH***********/	
		POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/dateCheckerTodayYesterday.php';	


		echo "<tr class='trNotification".$postid."'>";
		echo "<td class='tdFirstNotificationsPost' >";//style='background-color:'".$backcolorunread."';
				echo '<button class="buttonSeeNotification" value="'.$postid.'"><div  class="divUserNamePlusPhotoMessages"><img src="'.$messagefromphoto.'" class="imgUserPhotoMessages" /></div >';
		
		

		 echo "<div  class='labelNotificationTeaser'>".$handling."</div>
		 <div  class='labelNotificationFromName'>".$messagefromname."</div >
		
		<div class='labelDateMessages'>".$messagedate."</div>
		</button>
		";

			
		echo "</tr>";


	}//END WHILE while ($row = mysql_fetch_array($result))
	


	if ($counterNewMessages==0)
	{
	}
	else
	{
		echo "</table>";
	}

	

	
}//END notificationPostShowAll()

} // End User class definition


?>