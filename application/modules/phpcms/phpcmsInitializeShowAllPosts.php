<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	startConnectionDB();

 	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}


	$userid = $_POST['myuserid'];//$_SESSION['myuserid'];

	
	if(!( sanityCheckScapeByReference($userid, 'string', 20)))
	{
		echo 'Error sanityCheckScapeByReference phpcmsInitializeShowAllPosts.php';
		exit();
	}


$PostsClass = new PostsClass;
$sql = $PostsClass->showPostsAll($userid);
$PostsClass->showPostsAllHTML($sql);

/*
$sql = $PostsClass->showPostsGarbageAll($userid);
$PostsClass->showPostsGarbageAllHTML($sql);
*/

?>