<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

	//$myuserid3= $_SESSION['myuserid'];
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FriendClass.php');
	startConnectionDB();
	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}	


	
	$userid = $_POST['myusernow'];

	if(!( 
	sanityCheckScapeByReference($userid, 'string', 20) 
	))
	{
		//echo 'Username is not set';
		exit();
	}
	
	//echo 'userid = '.$userid;
	$newFriend = new Friend;
	$friendRequestAcceptAllMakeTheButton = $newFriend->friendRequestAcceptAllMakeTheButton($userid);	
	
	/*
	echo '
	friendRequestAcceptAllMakeTheButton = '.$friendRequestAcceptAllMakeTheButton;
	*/
	

?>

