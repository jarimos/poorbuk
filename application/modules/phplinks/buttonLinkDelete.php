<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/LinksClass.php');
	startConnectionDB();

 	if (!(isset( $_POST['fileLinksTableId'] )) || $_POST['fileLinksTableId']==""){exit;}

	$fileLinksTableId = $_POST['fileLinksTableId'];//$_SESSION['fileLinksTableId'];

	
	if(!( sanityCheckScapeByReference($fileLinksTableId, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference';
		exit();
	}



$LinksClass = new LinksClass;
$LinksClass->deleteLinksFunction($fileLinksTableId);


?>