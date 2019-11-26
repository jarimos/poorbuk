<?php
		

class Post {

    // Next comes the variable list as defined above
    // Note the key word 'var' and then a comma-separated list
	public static $lort='lortis';
    public $ip,$mail,$passUserOriginalCoded,$passUserOriginalBeforeCoded,
	$passUserRandomNow,$userid,$username,
	$userphoto,$userbirthday,$userlanguage,$usercssbackgroundpicture,
	$usercssbackgroundcolor,$usercssbackgroundpicturesize,$userfolder,$last_id,$connection_DB;

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

/* 2018 CHANGED
public function executeSQL($sql)
{
	//echo '<br>'.$userid.'<br>';
	$this->status=true;

	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$this->status=false;
	}
	
	return $result;
}
 * 
 */
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
			
			
			
			
ALL FUNCTIONS FOR THIS MODULE

function showAllPostsHTML($userid,$myTime,$sql)
function notificationPostUpdateToWhiteWhenPostSeenByUser($userid,$postid) 
function showPostByPostId($userid,$postid,$myTime) 
function showAllPostsUserPlusFriends($userid,$myTime) 
function showAllPostsUserOnly($userid,$myTime) 
function showAllPostsFriendOnly($userid,$myTime,$myfriendid) 
function insertPost($userid,$mypostnow) 
function returnIdForLastPostInserted()
function loveInsert($userid,$myLoveCounternow,$myLovePostId,$myLoveplusminus1) 
function loveNotifications($userid,$myLovePostId,$myLoveplusminus1) 
function commentInsert($userid,$postCommentPostid,$mycommentnow) 
function commentInsertNotificationWhenPostInsert($userid) 
function commentNotifications($userid,$postCommentPostid) 
function cloneInsert($userid,$postContent,$myPostId)
function cloneNotifications($userid,$postContent,$myPostId)
function notificationPostShowAll($userid,$myuserlanguage) 




	*/	

  
  
function showAllPostsHTML($userid,$myTime,$sql)
{
	//echo '<br>'.$userid.'<br>';
	$this->status=true;

        
	

//TEST
       /* $result = $this->executeSQL($sql);
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))  
        {
            
           ECHO $row{'postid'};
            
        }*/
        
//END TEST      
        
	$mypostcounter =0;
        $result = $this->executeSQL($sql);
        //$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        //echo $row;
        //while($row)
        //$num_rows_all_posts = mysqli_num_rows($result);
        //while($num_rows_all_posts>0)
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
                //$num_rows_all_posts=$num_rows_all_posts-1;
		
		if ($mypostcounter ==0)
		{
		
		}

		
		
		echo '<div class="myPost">';
		$sql = "SELECT * FROM poorbuk_user_table WHERE userid='".$row{'postiduser'}." LIMIT 1'";
                $result3 = $this->executeSQL($sql);
                $row2 =mysqli_fetch_array($result3,MYSQLI_ASSOC);

			
			
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
		$sql = "SELECT loveid FROM poorbuk_love_table 
		WHERE lovePOSTid='".$row{'postid'}."'
		AND loveuserid=$userid";	

                $result4 = $this->executeSQL($sql);			
                $row4 =mysqli_fetch_array($result4,MYSQLI_ASSOC);


		echo 			
		'<div class="loveandclonegeneraldiv">';
		if (($row4{'loveid'})>0) 
		{
		echo 	
			
			'<div class="loveCounterAndImage"><img class="buttonheart" src="button-heart.png" alt="Submit" >
			<div class="mylovecounter'.$row{'postid'}.' myLoveCounter">'. $row{'postlove'} .'</div></div>'.
			'<button class="myButtonsLoveClone buttonGeneralJarim mySubmitLove'.$row{'postid'}.' mySubmitLove"  value="'.$row{'postid'}.'">-love</button>'.
			'<button class="myButtonsLoveClone buttonGeneralJarim myCloneButton" value="'.$row{'postid'}.'" >clone</button><br><br>';

		}
		else
		{
		echo 
			'<div class="loveCounterAndImage"><img class="buttonheart" src="button-heart.png" alt="Submit" style="float:left;" width="48" height="60">
			<div class="mylovecounter'.$row{'postid'}.' myLoveCounter">'. $row{'postlove'} .'</div></div>'.
			'<button class="myButtonsLoveClone buttonGeneralJarim mySubmitLove"  id="idButtonLove'.$row{'postid'}.'" value="'.$row{'postid'}.'">+love</button>'.
			'<button class="myButtonsLoveClone buttonGeneralJarim myCloneButton" id="idButtonClone'.$row{'postid'}.'" value="'.$row{'postid'}.'" >clone</button><br><br>';
		}
		echo '</div>';// END '<div class="loveandclonegeneraldiv">';
		/*********END LOVE AND CLONE***************************************************************************/
		
		/*********COMMENTS***************************************************************************/
		echo '<hr>';

		
		//div to store all comments
		//selected by id =$row{'postid'} in code

		
		$sql = "
		SELECT * FROM poorbuk_comment_table c
		LEFT JOIN 
		poorbuk_user_table u 
		ON u.userid=c.commentuserid
		WHERE c.commentpostid='".$row{'postid'}."' 
		ORDER BY commentid ASC";	

                $result2 = $this->executeSQL($sql);			
		
		$counterComments = 0;
		$num_rows = 0;	
		echo '<div class="labelComments">Comments</div> ';
		//div class="divAllComments" IS OUT THE WHILE BECAUSE NO MATTER IF NO COMMENTS, THIS DIV MUST EXIST FOR NEW COMMENTS.
	

                while($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
		{	
		$counterComments = $counterComments +1;
		if ($counterComments==1)
		{

                        $num_rows = mysqli_num_rows($result2);
			echo '<div class="commentsCounter" id="commentsCounter'.$row{'postid'}.'" >'.$num_rows.'</div><br>';
                        echo '<div class="divAllCommentsPostId" style="display:none;">'.$row{'postid'}.'</div>';
			echo '<div class="divAllComments" id="myDivAllComments'.$row{'postid'}.'">';

		}

			
				echo '<div  class="commentDivMainComment">';		
				//USERNAME DIV
				echo '<div  class="commentDivPhotoUser"><img src="'.$row2{'userphoto'}.'" class="commentImgUserPhoto" /></div >';
				echo '<div  class="commentDivUserName">'.$row2{'username'}.'</div >';
				echo '<div class="commentDivContentDB" >'.$row2{'commentcontent'}.'</div >';
				echo '</div>';

		}
		
		if ($counterComments==0)
		{
			//USED FOR NEW COMMENTS WHEN COMMENTS = 0
			echo '<div class="commentsCounter" id="commentsCounter'.$row{'postid'}.'" >0</div><br>';
			echo '<div class="divAllComments" id="myDivAllComments'.$row{'postid'}.'">';

		}
			echo '</div>';
	
				
		
		//div to add new comments
		//selected by name =$row{'postid'} in code
		
		
			echo '
			<div class="newCommentWrapper">
					<div  class="myDivComment" id="divNewComment'.$row{'postid'}.'" contenteditable="true" >
					</div>';
			
			/*********SUBMIT***************************************************************************/

			//button to submit comments
			//selected by class="mySubmitComment"
			//use the attribute value=$row{'postid'} to localize the correspondent comment by name =$row{'postid'} in code
			echo 	'<button class="mySubmitComment"   value="'.$row{'postid'}.'" >OK</button>';
			
			
			/*********END COMMENTS***************************************************************************/
			echo '
			</div>';//class="newCommentWrapper">'	   
	   	echo '
		</div>';//class="myPost">'
	   

		//BUTTON SEE MORE POSTS value="'.$row{'postdatehour'}.'"
		$mypostcounter = $mypostcounter +1;
		if ($mypostcounter==7) 
		{
			echo '<br><button class="invisible buttonSeeMorePosts" value="'.$row{'postdatehour'}.'">See more posts</button>';
		
		}		
			
	}	
	
	return $this->status;	
}


function showCommentsByPostId_SQL($userid,$postid,$myTime) 
{
    $this->status=true;

    $sql = "
    SELECT * FROM poorbuk_comment_table c
    LEFT JOIN 
    poorbuk_user_table u 
    ON u.userid=c.commentuserid
    WHERE c.commentpostid='".$postid."' 
    ORDER BY commentid ASC";	


    $this->status=$this->showCommentsByPostId_HTML($userid,$myTime,$sql);

    return $this->status;	
	
}//END showCommentsByPostId_SQL() 
  
function showCommentsByPostId_HTML($userid,$myTime,$sql)
{
    //echo '<br>'.$userid.'<br>';
    $this->status=true;
    $result = $this->executeSQL($sql);
    $counterComments =0;
    //LOOP UNTIL COMMENTS EXISTS

    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {	
        $counterComments = $counterComments +1;
        if ($counterComments==1)
        {
            //$num_rows = mysql_num_rows($result);
            $num_rows = mysqli_num_rows($result);
//                  echo '<div class="commentsCounter" id="commentsCounter'.$row{'postid'}.'" >'.$num_rows.'</div><br>';
//                  echo '<div class="divAllCommentsPostId" style="display:none;">'.$row{'postid'}.'</div>';
//                  echo '<div class="divAllComments" id="myDivAllComments'.$row{'postid'}.'">';
        }

        echo '<div  class="commentDivMainComment">';		
        //USERNAME DIV
        echo '<div  class="commentDivPhotoUser"><img src="'.$row{'userphoto'}.'" class="commentImgUserPhoto" /></div >';
        echo '<div  class="commentDivUserName">'.$row{'username'}.'</div >';
        echo '<div class="commentDivContentDB" >'.$row{'commentcontent'}.'</div >';
//		echo '</div>';
    }

    return $this->status;	
}























function notificationPostUpdateToWhiteWhenPostSeenByUser($userid,$postid) 
{

	$this->status=true;
	/****UPDATE ME TO WHITE NO MATTER WHAT...*******************/
	$sql="UPDATE poorbuk_notifications_table 
	SET seencolor='white' 
	WHERE touserid=$userid AND postid=$postid";	

        $result = $this->executeSQL($sql);	
			
	return $this->status;	
	
} //END function notificationPostUpdateToWhiteWhenPostSeenByUser



function showPostByPostId($userid,$postid,$myTime) 
{
	$this->status=true;
	$sql="SELECT *
	FROM poorbuk_post_table 
	WHERE postid= $postid LIMIT 1";
	
	//SQL EXECUTED IN THE NEXT FUNCTION
	
	$this->status=$this->showAllPostsHTML($userid,$myTime,$sql);
	
	return $this->status;	
	
}//END showPostByPostId()





function showAllPostsUserPlusFriends($userid,$myTime) 
{

	$this->status=true;	
	
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

	$this->status = $this->showAllPostsHTML($userid,$myTime,$sql);

        $result = $this->executeSQL($sql);		
	if (!$result) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$this->status=false;
	}	
	
	return $this->status;	
	
}//END showAllPostsUserPlusFriends()



function showAllPostsUserOnly($userid,$myTime) 
{

	$this->status=true;	
	
	$sql="SELECT DISTINCT *
	FROM poorbuk_post_table p
	WHERE 
	p.postiduser=$userid 
	ORDER BY p.postid DESC LIMIT 7";
        
        /* 2018
        $sql="SELECT DISTINCT *
	FROM poorbuk_post_table p
	WHERE 
	p.postiduser=$userid 
        AND p.postdatehour<'$myTime'  
	ORDER BY p.postid DESC LIMIT 7";
         * 
         */
        //echo $sql;

	$this->status = $this->showAllPostsHTML($userid,$myTime,$sql);
        $result = $this->executeSQL($sql);	
	if (!$result) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$this->status=false;
	}	
	
	return $this->status;
	
}//END showAllPostsUserPlusFriends()
	
	
	
function showAllPostsFriendOnly($userid,$myTime,$myfriendid) 
{
	
	$this->status=true;
	$sql="SELECT amigofriendstatus FROM poorbuk_amigo_table 
	WHERE 
	amigofriendid= $myfriendid AND amigouserid= $userid 
	OR
	amigouserid= $myfriendid AND amigofriendid= $userid 	
	LIMIT 1";
	
	$myAmigoStatus="";

        $result = $this->executeSQL($sql);	
        while($rowAmigoStatus=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$myAmigoStatus= $rowAmigoStatus['amigofriendstatus'] ;
	}
	

	
	if ($myAmigoStatus=="AMIGO")
	{
	
		$sql="SELECT DISTINCT *
		FROM poorbuk_post_table p
		WHERE 
		p.postiduser=$myfriendid 
                AND p.postdatehour<'$myTime'
		ORDER BY p.postid DESC LIMIT 7";
		$this->status=$this->showAllPostsHTML($userid,$myTime,$sql);
	}
	
	return $this->status;	
	
}
	
	
function insertPost($userid,$mypostnow) 
{	
	$this->status=true;
	$sql="INSERT INTO poorbuk_post_table (postcontent,postiduser)VALUES('".$mypostnow."',".$userid.")";
	
	
        $result = $this->executeSQL($sql);	
	if (!$result)  
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$this->status=false;
	}
	//$last_id = mysql_insert_id();
        //$this->connection_DB =  $this->startConnectionDB();
        $last_id = mysqli_insert_id($this->connection_DB);
	$this->last_id = $last_id;	
	return $this->status;	
}

function returnIdForLastPostInserted()
{
	return $this->last_id;

}

	
function loveInsert($userid,$myLoveCounternow,$myLovePostId,$myLoveplusminus1) 
{	
	
		$this->status=true;
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
		
		

	
                $result = $this->executeSQL($sql);	
                if (!$result) 
		{
			echo "Error query showAllPostsHTML<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}
		
                $result = $this->executeSQL($sql2);	
                if (!$result) 
		{
			echo "Error query showAllPostsHTML<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql2.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}
		

		
		return $this->status;
}	





function loveNotifications($userid,$myLovePostId,$myLoveplusminus1) 
{	
		$this->status=true;

		if ($myLoveplusminus1==1)//if love pressed and userid!= postiduser send notification!!!
		{
			$sql="SELECT postiduser FROM poorbuk_post_table WHERE postid=$myLovePostId LIMIT 1";
			
                        $result = $this->executeSQL($sql);	
                        if (!$result)  
			{
				echo "Error query showAllPostsHTML<br>";
				$result = ($result) ? 'true' : 'false';
				echo $sql.'<br>  RESULT = '.$result.'<br><br>';
				echo $result;
				$this->status=false;
			}
			
                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{		
				$myPostUserid=$row['postiduser'];		
			}
			if ($myPostUserid!=$userid)
			{
				$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling)	VALUES('$userid','$myPostUserid','$myLovePostId','love')";
                                $result = $this->executeSQL($sql);	
                                if (!$result) 
				{
					echo "Error query showAllPostsHTML<br>";
					$result = ($result) ? 'true' : 'false';
					echo $sql.'<br>  RESULT = '.$result.'<br><br>';
					echo $result;
					$this->status=false;
				}
			}					
			//include($_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/modules/phpnotifications/phpnotificationsLoveInsertDB.php');

		}

		return $this->status;
}	



function commentInsert($userid,$postCommentPostid,$mycommentnow) 
{	
	
		$this->status =1;
		//INSERT COMMENT TABLE
		$sql="INSERT INTO poorbuk_comment_table (commentpostid,commentcontent,commentuserid)
		VALUES('$postCommentPostid','$mycommentnow','$userid')";
		
                $result = $this->executeSQL($sql);	
                if (!$result) 
		{
			echo "Error query showAllPostsHTML<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}
		
		

		
		return $this->status;
}	




function commentInsertNotificationWhenPostInsert($userid) 
{	
		$this->status =1;
		$last_id = $this->last_id;
		
		$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling,seencolor)
		VALUES('$userid','$userid','$last_id ','comment follow','white')";
		//echo 'SQL2'.$sql;
                $result = $this->executeSQL($sql);	
                if (!$result)  
		{
			echo "Error query commentInsertNotificationWhenPostInsert<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}

		return $this->status;
}

function commentNotifications($userid,$postCommentPostid) 
{	

		$this->status =1;		
		//UPDATE ALL NOTIFICATIONS FOR THIS POST-ID TO YELLOW
		$sql="
		UPDATE poorbuk_notifications_table SET seencolor='yellow'
		WHERE 
		postid=$postCommentPostid AND handling='comment follow'";	
                $result = $this->executeSQL($sql);	
                if (!$result)  
		{
			echo "Error query commentNotifications<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}


			
		
		//DELETE ALL NOTIFICATIONS FROM THIS POST-ID FOR THIS USER	

		$sql="DELETE FROM poorbuk_notifications_table 
		WHERE postid=$postCommentPostid AND touserid=$userid 
		AND handling='comment follow' LIMIT 1";
		//echo 'SQL1'.$sql;

                $result = $this->executeSQL($sql);	
                if (!$result)  
		{
			echo "Error query commentNotifications<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}

		/******INSERT NOTIFICATION FOR ME AND FOR THIS POSTID IN WHITE***********/

		$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling,seencolor)
		VALUES('$userid','$userid','$postCommentPostid','comment follow','white')";
		//echo 'SQL2'.$sql;
                $result = $this->executeSQL($sql);	
                if (!$result) 
		{
			echo "Error query commentNotifications<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}



		return $this->status;
	
	
}// END commentNotifications($userid,$postCommentPostid) 

function cloneInsert($userid,$postContent,$myPostId)
{	
	
		$this->status =1;
		$sql="INSERT INTO poorbuk_post_table (postcontent,postiduser)VALUES('$postContent','$userid')";

		
                $result = $this->executeSQL($sql);	
                if (!$result)  
		{
			echo "Error query cloneInsert<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}

		return $this->status;
		
}//END function cloneInsert($userid,$postContent,$myPostId)


function cloneNotifications($userid,$postContent,$myPostId)
{	
	
	$this->status =1;
	
	//SEARCH POSTUSERID
	$sql="SELECT postiduser FROM poorbuk_post_table 
	WHERE postid=$myPostId LIMIT 1";
        $result = $this->executeSQL($sql);	
	if (!$result) 
	{
		echo "Error query cloneNotifications<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$this->status=false;
	}


	
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		
		$myPostUserid=$row['postiduser'];
		
	}
	
	//IF POST IS NOT FROM THIS USER, INSERT NOTIFICATION
	if ($myPostUserid!=$userid)
	{
		$sql="INSERT INTO poorbuk_notifications_table  (fromuserid,touserid,postid,handling)
		VALUES('$userid','$myPostUserid','$myPostId','clon')";
                $result = $this->executeSQL($sql);	
                if (!$result) 
		{
			echo "Error query cloneNotifications<br>";
			$result = ($result) ? 'true' : 'false';
			echo $sql.'<br>  RESULT = '.$result.'<br><br>';
			echo $result;
			$this->status=false;
		}
	}	


	return $this->status;
	
}// END function cloneInsert($userid,$postContent,$myPostId)

function notificationPostShowAll($userid,$myuserlanguage) 
{

	$this->status=1;

	$myMessageToArrayAvoidRepeating="";

	$counterNewMessages=0;
	
	$sql="
	SELECT * FROM poorbuk_notifications_table 
	LEFT JOIN poorbuk_user_table 
	ON userid=fromuserid
	WHERE seencolor='yellow' and touserid=$userid LIMIT 100";
	//echo $sqlShowConversation;
        
        
        $result = $this->executeSQL($sql);	
	
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
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

	
	return $this->status;
	
}//END notificationPostShowAll()

} // End User class definition


?>