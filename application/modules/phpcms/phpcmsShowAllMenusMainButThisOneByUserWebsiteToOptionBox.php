<?php
//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/MenusClass.php');
	startConnectionDB();


	if (!(isset( $_POST['mUId'] )) || $_POST['mUId']==""){exit;}
	if (!(isset( $_POST['mWebId'] )) || $_POST['mWebId']==""){exit;}
	if (!(isset( $_POST['mPId'] )) || $_POST['mPId']==""){exit;}

	
	
	$mUId = $_POST['mUId'];//$_SESSION['myuserid'];
	$mWebId = $_POST['mWebId'];
	$mPId = $_POST['mPId'];
	
	
	
	
	if(!( 
	sanityCheckScapeByReference($mPId, 'string', 20) &&
	sanityCheckScapeByReference($mUId, 'string', 20) &&
	sanityCheckScapeByReference($mWebId, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsShowAllMenusMainButThisOneByUserWebsiteToOptionBox.php';
		exit();
	}


$MenuClass = new MenusClass;


$sql = $MenuClass->checkIfParentToOptionBoxSQL($mPId);
$parentExistsId = $MenuClass->checkIfParentMenuToOptionBox($sql);


$sql = $MenuClass->showAllMenusMainButThisOneAndParentByUserWebsiteSQL($mPId,$mUId,$mWebId,$parentExistsId) ;
$MenuClass->showAllMenusMainButThisOneByUserWebsiteToOptionBox($sql,$parentExistsId);





?>