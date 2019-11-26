<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
//startConnectionDB();


if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['myfriendid'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['q'], 'string', 100) )
{
    $userId=$_POST["myusernow"];
    $myFriendId=$_POST["myfriendid"];	
    $userNameToSearch = $_POST["q"];
}
else
{
    exit();
}	
	
$newFriend = new Friend;
$findFriend = $newFriend->profileFriendsFindAmigoByName($userId,$userNameToSearch,$myFriendId);

	


