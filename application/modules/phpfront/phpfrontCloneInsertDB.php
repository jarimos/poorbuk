<?php
include ("../phpgeneral/headercheck.php");	

require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();


if( sanityCheckScapeByReference($_POST['postmyusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['myPostId'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postcontentPosted'], 'string', 3000))
{
    $userid = $_POST['postmyusernow'];//$_SESSION['myuserid'];
    $postContent= $_POST['postcontentPosted'];
    $myPostId = $_POST['myPostId'];
}
else
{
    exit();
}


$newPost = new Post;
$cloneInsert = $newPost->cloneInsert($userid,$postContent,$myPostId) ;
$cloneNotifications = $newPost->cloneNotifications($userid,$postContent,$myPostId);	

echo '
cloneInsert'.$cloneInsert.'
cloneNotifications'.$cloneNotifications;	

