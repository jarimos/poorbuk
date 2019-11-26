<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
//2018 startConnectionDB();


if (!(isset( $_POST['mytime'] )) || $_POST['mytime']=="")
{
    $myTime = date("Y-m-d H:i:s");
}	
else
{
    $myTime = $_POST['mytime'];	
}

$userid = $_POST['myuserid'];
if(( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20)))
{
   $userid = $_POST['myuserid'];
}
else
{
    exit();
}

$newPost = new Post;

$showAllPostsUserPlusFriends = $newPost->showAllPostsUserPlusFriends($userid,$myTime);
//$showAllPostsUserPlusFriends = $newPost->showAllPostsUserOnly($userid,$myTime);	
	





