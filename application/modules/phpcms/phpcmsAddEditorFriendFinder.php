<?php
	include ("../phpgeneral/headercheck.php");	

	//$myuserid3= $_SESSION['myuserid'];
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
	startConnectionDB();
	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}	
	if (!(isset( $_POST['q'] )) || $_POST['q']==""){exit;}	

	
	$userid = $_POST['myusernow'];
	$userNameToFind = $_POST['q'];
	if(!( 
	sanityCheckScapeByReference($userid, 'string', 20) &&
	sanityCheckScapeByReference($userNameToFind, 'string', 60)
	
	))
	{
		//echo 'Username is not set';
		exit();
	}
	
	//echo 'userid = '.$userid;
	$newFriend = new Friend;
	$findFriend = $newFriend->findUsersToListAddEditorToWebsite($userid,$userNameToFind);	
	
	/*
	echo '
	findFriend = '.$findFriend;
	*/

		

	



?>


