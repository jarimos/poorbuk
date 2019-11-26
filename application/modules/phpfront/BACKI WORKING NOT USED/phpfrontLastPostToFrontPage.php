<?php
	include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
	startConnectionDB();

	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}

	//CHECK FOR TYPE,LENGHT AND EMPTY STRINGS
	$userid = $_POST['myusernow'];
	$idForLastPostInserted= $_POST['idForLastPostInserted'];
	$mytime="";
	if(!( sanityCheckScapeByReference($userid, 'string', 20) && sanityCheckScapeByReference($idForLastPostInserted, 'string', 20)))
	{
		//echo 'Username is not set';
		exit();
	}
	
	$newPost = new Post;
	$showPostByPostId = $newPost->showPostByPostId($userid,$idForLastPostInserted,$mytime);		

//	echo $showPostByPostId;



/***************************/


?>

