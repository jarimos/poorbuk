<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['pId'] )) || $_POST['pId']==""){exit;}


	$userid = $_POST['myuserid'];//$_SESSION['myuserid'];
	$pId = $_POST['pId'];
	
	if(!( sanityCheckScapeByReference($pId, 'string', 20)&&sanityCheckScapeByReference($userid, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsButtonEditPost.php';
		exit();
	}


$PostsClass = new PostsClass;
$sql = $PostsClass->showPostsById($pId);
$allMyHTML = $PostsClass->phpcmsButtonEditPostGetHtml($sql );

	echo	$allMyHTML;
		



?>