<?php
//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['pWebId'] )) || $_POST['pWebId']==""){exit;}

//echo"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	$pUId = $_POST['myuserid'];//$_SESSION['myuserid'];
	$pWebId = $_POST['pWebId'];

	if(!( sanityCheckScapeByReference($pUId, 'string', 20)&&sanityCheckScapeByReference($pWebId, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsShowAllMenusForWebsiteNameToOptionBox.php';
		exit();
	}


$PostClass = new PostsClass;
$sql = $PostClass->showPostsByWebsiteNameSQL($pUId,$pWebId);
//echo $sql;
$PostClass->showPostsAllHTML($sql);



?>