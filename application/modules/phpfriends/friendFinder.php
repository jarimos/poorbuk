<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
startConnectionDB();


if( 
sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
sanityCheckScapeByReference($_POST['q'], 'string', 60)        
)
{
    $userid = $_POST['myusernow'];
    $userNameToFind = $_POST['q'];
}
else
{
    exit();
}	

$newFriend = new Friend;
$findFriend = $newFriend->findFriend($userid,$userNameToFind);	
	



