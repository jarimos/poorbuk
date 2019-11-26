<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/GuestBookClass.php');
	startConnectionDB();

	
	if (!(isset( $_POST['myusername'] )) || $_POST['myusername']==""){exit;}
	if (!(isset( $_POST['postcontentPosted'] )) || $_POST['postcontentPosted']==""){exit;}
	
	//CHECK FOR TYPE,LENGHT AND EMPTY STRINGS
	$myusername = $_POST['myusername'];
	$mypostnow= $_POST['postcontentPosted'];
	if(!( sanityCheckScapeByReference($myusername, 'string', 30)&&sanityCheckScapeByReference($mypostnow, 'string', 3000)))
	{
		//echo 'Username is not set';
		exit();
	}
	

	
	
	$newGuestBookClass = new GuestBookClass;
	$insertPost = $newGuestBookClass->insertPost($myusername,$mypostnow);	

	echo '
	insertPost'.$insertPost;
	
?>