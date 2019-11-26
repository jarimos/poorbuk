<?php
//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/MenusClass.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['pWebId'] )) || $_POST['pWebId']==""){exit;}

//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$mUId = $_POST['myuserid'];//$_SESSION['myuserid'];
	$mWebId = $_POST['pWebId'];
	
	if(!( sanityCheckScapeByReference($mUId, 'string', 20)&&sanityCheckScapeByReference($mWebId, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsMenusShowAllForWebIdToOptionBox.php';
		exit();
	}


$MenuClass = new MenusClass;
$sql = $MenuClass->showAllMenusMAIN_For_UID_Webid_SQL($mUId,$mWebId);
//echo $sql;
$MenuClass->showAllMenusForWebsiteNameToOptionBox($sql);



?>