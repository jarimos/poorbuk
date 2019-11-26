<?php
//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/MenusClass.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['mWebsiteName'] )) || $_POST['mWebsiteName']==""){exit;}

//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$mUId = $_POST['myuserid'];//$_SESSION['myuserid'];
	$mWebsiteName = $_POST['mWebsiteName'];
/*	
	if(!( sanityCheckScapeByReference($pId, 'string', 20)&&sanityCheckScapeByReference($mWebsiteName, 'string', 200)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsShowAllMenusForWebsiteNameToOptionBox.php';
		exit();
	}

*/
$MenuClass = new MenusClass;
$sql = $MenuClass->showAllMenusMAINForUIDWebsiteSQL($mUId,$mWebsiteName);
$MenuClass->showAllMenusForWebsiteNameToOptionBox($sql);



?>