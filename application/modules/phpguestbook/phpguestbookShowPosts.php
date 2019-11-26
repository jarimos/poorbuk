<?php
	include ("../phpgeneral/headercheck.php");	

	//$myuserid3= $_SESSION['myuserid'];
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/GuestBookClass.php');
	startConnectionDB();
/*	
	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}	
	if (!(isset( $_POST['mytime'] )) || $_POST['mytime']=="")
	{
		$myTime = date("Y-m-d H:i:s");
	}	
	else
	{
		$myTime = $_POST['mytime'];	
	}
	
	$userid = $_POST['myuserid'];
	if(!( sanityCheckScapeByReference($userid, 'string', 20)))
	{
		//echo 'Username is not set';
		exit();
	}
*/	
	//echo 'userid = '.$userid;
	$newGuestBookClass = new GuestBookClass;
	//$showAllPostsUserPlusFriends = $newGuestBookClass->showAllPostsUserPlusFriends($userid,$myTime);	

	$showAllPostsUserPlusFriends = $newGuestBookClass->showAllPosts();	
	
	//echo $userid;
	
	//echo $showAllPostsUserPlusFriends;
		
		

?>

