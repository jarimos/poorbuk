<?php

	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}



	$pUId = $_POST['myuserid'];//$_SESSION['myuserid'];


	if(!( sanityCheckScapeByReference($pUId, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsShowAllMenusForWebsiteNameToOptionBox.php';
		exit();
	}


$PostClass = new PostsClass;
$sql = $PostClass->showWebsiteNamesToOptionBoxSQL($pUId);
$PostClass->showWebsiteNamesToOptionBox($sql);



?>