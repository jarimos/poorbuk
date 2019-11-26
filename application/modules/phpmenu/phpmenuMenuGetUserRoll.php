<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/MenuClass.php');
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');	
	
	
	startConnectionDB();
	//echo 'lort0';	 
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}	
	if (!(isset( $_POST['myuserlanguage'] )) || $_POST['myuserlanguage']==""){exit;}
	//echo 'lort1';
	
	$userid = $_POST['myusernow'];	
	$myuserlanguage = $_POST['myuserlanguage'];
	
	if(!(sanityCheckScapeByReference($userid, 'string', 20) && sanityCheckScapeByReference($myuserlanguage, 'string', 20) ))
	{
		//echo 'Username is not set';
		exit();
	}
	//echo 'lort2';
	//echo 'userid = '.$userid;
	
	$newUser = new User;
	$userroll = $newUser->getUserRoll($userid);	
	echo $userroll;
	//send 
	
	
	
/*	
	$newPost = new Menu;
	$menuNotificationPostShowAll = $newMenu->menuNotificationPostShowAll($userid);
	$menuNotificationMessages = $newMenu->menuNotificationMessages();
	$menuNotificationFriends = $newMenu->menuNotificationFriends();	
	
	echo $menuNotificationPostShowAll;
	echo $menuNotificationMessages;
	echo $menuNotificationFriends;
	/*echo '
	notificationPostShowAll'.$notificationPostShowAll;*/

/***************************************************/
	
?>


