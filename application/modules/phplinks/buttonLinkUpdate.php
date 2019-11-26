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
$LinksClass->updateLinkTable($userid,$tutorialsfolder);


//END fun
	//$myPostId = $_POST['myPostId'];
	
/*	if(!( sanityCheckScapeByReference($myPostId, 'string', 20)&&sanityCheckScapeByReference($userid, 'string', 20)&&
	sanityCheckScapeByReference($myPostId, 'string', 3000)))
	{
		echo 'Username is not set';
		exit();
	}

*/
	
	//include($_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/modules/phpnotifications/phpnotificationsCloneInsertDB.php');
		
/*	$newPost = new Post;
	$cloneInsert = $newPost->cloneInsert($userid,$postContent,$myPostId) ;
	$cloneNotifications = $newPost->cloneNotifications($userid,$postContent,$myPostId);	

	echo '
	cloneInsert'.$cloneInsert.'
	cloneNotifications'.$cloneNotifications;	
*/






?>