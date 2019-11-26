<?php


	//include ("../phpgeneral/headercheck.php");	

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	startConnectionDB();
	
	if (!(isset( $_POST['pWebId'] )) || $_POST['pWebId']==""){exit;}	
	if (!(isset( $_POST['newEditorID'] )) || $_POST['newEditorID']==""){exit;}


	$pWebId = $_POST['pWebId'];	
	$newEditorID = $_POST['newEditorID'];


	if(!( 

	sanityCheckScapeByReference($pWebId, 'string', 20)
	&& sanityCheckScapeByReference($newEditorID, 'string', 20) 
	))
	{
		//echo 'Username is not set';
		exit();
	}
	
	//echo 'userid = '.$userid;

	$newPosts = new PostsClass;
	//$newPosts->addEditorToWesite($pWebId,$newEditorID);
	
	$insertedStatus = $newPosts->addEditorToWesite($pWebId,$newEditorID);


	echo $insertedStatus;
	/*
	echo '
	friendRequestButton = '.$friendRequestButton;
	*/
	


?>

