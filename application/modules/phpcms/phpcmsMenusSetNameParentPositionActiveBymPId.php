<?php
//echo"111aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/MenusClass.php');

	startConnectionDB();

//	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
//	if (!(isset( $_POST['pWebId'] )) || $_POST['pWebId']==""){exit;}
	if (!(isset( $_POST['mPId'] )) || $_POST['mPId']==""){exit;}

//	if (!(isset( $_POST['mUrl'] )) || $_POST['mUrl']==""){exit;}
	


//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	//$userid = $_POST['myuserid'];//$_SESSION['myuserid'];
	$mPId = $_POST['mPId'];
	
	if(!( sanityCheckScapeByReference($mPId, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsMenusForPostUrl.php';
		exit();
	}

//echo"bbbbbbbb";
$MenuClass = new MenusClass;
$sql = $MenuClass->showMenuByPostUrlSQL ($mPId);
$MenuClass->showAllMenusForPostUrlJSON($sql);



?>