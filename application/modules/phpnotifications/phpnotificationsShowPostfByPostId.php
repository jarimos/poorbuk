<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();

if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20)&&
    sanityCheckScapeByReference($_POST['mypostid'], 'string', 20))
{
    $postid = $_POST['mypostid'];	
    $userid = $_POST['myuserid'];
}
else
{
    exit();
}


if (!(isset( $_POST['mytime'] )) || $_POST['mytime']=="")
{
    $myTime = date("Y-m-d H:i:s");
}	
else
{
    $myTime = $_POST['mytime'];	
}


$newPost = new Post;
$notificationPostUpdateToWhiteWhenPostSeenByUser = $newPost->notificationPostUpdateToWhiteWhenPostSeenByUser($userid,$postid);
$showPostByPostId = $newPost->showPostByPostId($userid,$postid,$myTime);



