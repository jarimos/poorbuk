<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
startConnectionDB();


if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) )
{
    $userid = $_POST['myusernow'];
}
else
{
    exit();
}		

$newFriend = new Friend;
$friendRequestsShowAll = $newFriend->friendRequestsShowAll($userid);	
	


