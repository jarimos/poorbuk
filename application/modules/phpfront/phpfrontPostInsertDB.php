<?php
include ("../phpgeneral/headercheck.php");	

require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();



$mytime="";

if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postcontentPosted'], 'string', 3000))
{
    $userid = $_POST['myusernow'];
    $mypostnow= $_POST['postcontentPosted'];
}
else
{
    exit();
}


$newPost = new Post;
$insertPost = $newPost->insertPost($userid,$mypostnow);	
$commentInsertNotificationWhenPostInsert = $newPost->commentInsertNotificationWhenPostInsert($userid);	
$returnIdForLastPostInserted = $newPost->returnIdForLastPostInserted();	
$showPostByPostId = $newPost->showPostByPostId($userid,$returnIdForLastPostInserted,$mytime);	


//echo $showPostByPostId;


