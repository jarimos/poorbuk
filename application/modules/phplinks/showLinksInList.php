<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/LinksClass.php');
	startConnectionDB();

 	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['tutorialsfolder'] )) || $_POST['tutorialsfolder']==""){exit;}


	$userid = $_POST['myuserid'];//$_SESSION['myuserid'];
	$tutorialsfolder = $_POST['tutorialsfolder'];
	
	if(!( sanityCheckScapeByReference($tutorialsfolder, 'string', 50)&&sanityCheckScapeByReference($userid, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference';
		exit();
	}



$LinksClass = new LinksClass;
$sql = $LinksClass->showAllLinksTableQuery($userid,$tutorialsfolder);
$showLinksInListHTML = $LinksClass->showLinksInListHTML($sql);


?>