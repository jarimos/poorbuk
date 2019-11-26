<?php
include ("../phpgeneral/headercheck.php");	

require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();


$mytime="";

if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postId'], 'string', 20))
{
   $userid = $_POST['myusernow'];
   $postId= $_POST['postId'];
}
else
{
    exit();
}

$newPost = new Post;
//	$showPostByPostId = $newPost->showPostByPostId($userid,$postId,$mytime);		
$showCommentsByPostId = $newPost->showCommentsByPostId_SQL($userid,$postId,$mytime);



