<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/ProfileClass.php');
//2018 startConnectionDB();


if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['myfriendid'], 'string', 20) )
{
	$userid = $_POST['myusernow'];	
	$myfriendid = $_POST['myfriendid'];
}
else
{
    exit();
}	

/******FIND USER NAME***************************************************/

$newProfile = new Profile;
$newProfile->profileFriendsButtonShowAllFriendFriends($userid,$myfriendid);


