<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/


	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
	startConnectionDB();
	//echo 'lort0';	 
	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}	
	if (!(isset( $_POST['myuserlanguage'] )) || $_POST['myuserlanguage']==""){exit;}
	//echo 'lort1';
	
	$userid = $_POST['myuserid'];	
	$myuserlanguage = $_POST['myuserlanguage'];
	
	if(!(sanityCheckScapeByReference($userid, 'string', 20) && sanityCheckScapeByReference($myuserlanguage, 'string', 20) ))
	{
		//echo 'Username is not set';
		exit();
	}
	//echo 'lort2';
	//echo 'userid = '.$userid;
	$newUser = new User;
	$userLanguage = $newUser->setUserLanguage($userid,$myuserlanguage);

	echo $userLanguage;



?>

