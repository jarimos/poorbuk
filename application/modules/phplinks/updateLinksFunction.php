<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/LinksClass.php');
	startConnectionDB();

 	if (!(isset( $_POST['fileLinksTableId'] )) || $_POST['fileLinksTableId']==""){exit;}
	if (!(isset( $_POST['myFileName'] )) || $_POST['myFileName']==""){exit;}


	$userid = $_POST['fileLinksTableId'];//$_SESSION['fileLinksTableId'];
	$myFileName = $_POST['myFileName'];
	
	if(!( sanityCheckScapeByReference($myFileName, 'string', 300)&&sanityCheckScapeByReference($userid, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference';
		exit();
	}



$LinksClass = new LinksClass;
$LinksClass->updateLinksFunction($userid,$myFileName);


?>