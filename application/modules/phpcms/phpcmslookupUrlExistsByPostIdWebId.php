<?php	include ("../phpgeneral/headercheck.php");		require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');			require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');	startConnectionDB(); 		if (!(isset( $_POST['pUserId'] )) || $_POST['pUserId']==""){exit;}		if (!(isset( $_POST['pUrl'] )) || $_POST['pUrl']==""){exit;}		$pWebId = $_POST['pWebId'];	$pUserId = $_POST['pUserId'];	$pUrl = $_POST['pUrl'];	$pId = $_POST['pId'];//NO sanity BECAUSSE IT CAN BE EMPTY 	if(!( 		sanityCheckScapeByReference($pUserId, 'string', 20) && 		sanityCheckScapeByReference($pUrl, 'string', 200) 	))	{		echo 'Error sanityCheckScapeByReference phpcmsButtonInsertPost.php';		exit();	}$PostsClass = new PostsClass;$pUrl = $PostsClass->RenameUrl($pUrl);$phpcmslookupUrlExistsByPostIdWebId = $PostsClass->phpcmslookupUrlExistsByPostIdWebId($pUserId,$pUrl,$pWebId,$pId);//echo $pUrl;//echo '$phpcmslookupUrlExistsByPostIdWebId ='.$phpcmslookupUrlExistsByPostIdWebId;if ($phpcmslookupUrlExistsByPostIdWebId){	$arr = array('pathError' =>  true,'phpcmslookupUrlExistsByPostIdWebId' =>  $phpcmslookupUrlExistsByPostIdWebId);	echo json_encode($arr);	}else{	//echo "path-ok";	$arr = array('pathError' =>  false,'phpcmslookupUrlExistsByPostIdWebId' =>  $phpcmslookupUrlExistsByPostIdWebId);	echo json_encode($arr);}?>	