<?php
include ("../phpgeneral/headercheck.php");	

require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();


if( sanityCheckScapeByReference($_POST['postmyusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postCommentPosted'], 'string', 3000) &&
    sanityCheckScapeByReference($_POST['postCommentPostid'], 'string', 20))
{
    $userid = $_POST['postmyusernow'];
    $mycommentnow= $_POST['postCommentPosted'];
    $postCommentPostid= $_POST['postCommentPostid'];

}
else
{
    exit();
}	



$newPost = new Post;
$commentInsert = $newPost->commentInsert($userid,$postCommentPostid,$mycommentnow) ;
$commentNotifications = $newPost->commentNotifications($userid,$postCommentPostid);	

echo '
commentInsert'.$commentInsert.'
commentNotifications'.$commentNotifications;	
