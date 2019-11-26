<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['pGarbageId'] )) || $_POST['pGarbageId']==""){exit;}


	$userid = $_POST['myuserid'];//$_SESSION['myuserid'];
	$pGarbageId = $_POST['pGarbageId'];
	
	if(!( sanityCheckScapeByReference($pGarbageId, 'string', 20)&&sanityCheckScapeByReference($userid, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsButtonEditPost.php';
		exit();
	}


$PostsClass = new PostsClass;
$sql = $PostsClass->showPostsGarbageByIdSQL($pGarbageId);
//echo $sql;
echo 
$PostsClass->phpcmsButtonEditPostGetHtml($sql );



?>