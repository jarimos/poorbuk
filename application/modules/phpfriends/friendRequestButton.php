<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
startConnectionDB();

if( 
sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) 
&& sanityCheckScapeByReference($_POST['myAmigoId'], 'string', 20)
&& sanityCheckScapeByReference($_POST['myAmigoStatus'], 'string', 20)
)
{
    $userid = $_POST['myusernow'];
    $myAmigoId = $_POST['myAmigoId'];
    $myAmigoStatus = $_POST['myAmigoStatus'];

}
else
{
    exit();
}


$newFriend = new Friend;
$friendRequestButton = $newFriend->friendRequestButton($userid,$myAmigoId,$myAmigoStatus);	

