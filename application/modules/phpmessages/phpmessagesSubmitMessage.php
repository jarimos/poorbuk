<?php
	include ("../phpgeneral/headercheck.php");	
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
	if (!(isset( $_POST['myPrivateMessage'] )) || $_POST['myPrivateMessage']==""){exit;}
	if (!(isset( $_POST['allMyFriendIdsToSendTo'] )) || $_POST['allMyFriendIdsToSendTo']==""){exit;}
	
	$myuseridnow= $_POST['myusernow'];
	
	if( sanityCheckScapeByReference($myuseridnow, 'string', 20) != FALSE)
	{
		//ALL IS OK
	}
    else
	{
		//echo 'SOMETHING WRONG';
		exit();
	}	

 
	$allMyFriendIdsToSendTo = $_POST['allMyFriendIdsToSendTo'];
	$myPrivateMessage= trim($_POST['myPrivateMessage']);

	//DONE IN JS ALLREADY JUS BACKI --- ADD USER ID TO STRING OF USERS IDS
	//$allMyFriendIdsToSendTo = $allMyFriendIdsToSendTo.';'.$myuseridnow;
	//STRING TO ARRAY
	$allMyFriendIdsToSendToArray = explode(";", $allMyFriendIdsToSendTo);
	//ARRAY LENGHT
	$arrlength=count($allMyFriendIdsToSendToArray);
	//SORT ARRAY TO STORE IN DB ALLWAYS IN THE SAME ORDER, 
	//SO WE CAN MATCH THE STRING DIRECTLY NO MATTER OF THE ORDER THE USERS ARE
	//STORED IN THE MESSAGE USER-LIST
	sort($allMyFriendIdsToSendToArray);
	
	$allMyFriendNames="";
	
	//GET ALL ORDERED ELEMENTS INTO STRING TO poorbuk_message_table toid
	for($x=0;$x<$arrlength;$x++)
	{
	
	/*ALL MY FRIEND NAMES TO STRING LOOK UP IN DB / AFTER WE INSERT ALL AS ONE STRING IN MESSAGETABLE*/
	$myFriendToIdInLoop =$allMyFriendIdsToSendToArray[$x];
	$sql="SELECT username FROM poorbuk_user_table 
	WHERE userid=$myFriendToIdInLoop LIMIT 1;";
	$resultsql = mysql_query($sql);
	while ($rowUserName = mysql_fetch_array($resultsql))
	{
	

		$myFriendNameNow= $rowUserName['username'];
		$myFriendNameNowLen = strlen($myFriendNameNow);

		if ($myFriendNameNowLen >9)
		{
			$myFriendNameNow= substr($myFriendNameNow,0,9); 
		}
			//echo $myFriendNameNow.'-'.$myFriendNameNowLen.'----';
		
		if($x==0)
		{$allMyFriendNames=  $myFriendNameNow;}
		else
		{$allMyFriendNames=  $allMyFriendNames.'-'.$myFriendNameNow;}
	}
	/*ALL MY FRIEND IDS ORDERED TO STRING */
		if($x==0)
			{$allMyFriendIdsToOrdered=  $allMyFriendIdsToSendToArray[$x];}
		else
			{$allMyFriendIdsToOrdered=  $allMyFriendIdsToOrdered.';'.$allMyFriendIdsToSendToArray[$x];}
	}
	
	
	//echo 'allMyFriendNames = '.$allMyFriendNames;
	$sql="INSERT INTO poorbuk_message_table (fromid,toid,toname,messagetext)
	VALUES($myuseridnow,'$allMyFriendIdsToOrdered','$allMyFriendNames','$myPrivateMessage')";

	$result = mysql_query($sql);
	//get THE INSERTED MESSAGE ID
	$last_id = mysql_insert_id();
	

	for($x=0;$x<$arrlength;$x++)
	{
	
	
		$MyFriendIdsToSendToOneByOne=  $allMyFriendIdsToSendToArray[$x];

		//$mydate = date('Y-m-d H:i:s');
		if ($myuseridnow==$MyFriendIdsToSendToOneByOne)//SEEN-COLOR WHITE
		{
			$sql="INSERT INTO poorbuk_messageindex_table (messageid,userid,seencolor)
			VALUES('$last_id','$MyFriendIdsToSendToOneByOne','white')";					
		}
		else //SEEN-COLOR DEFAULR DB (FOR NOT SEEN MESSAGES, MAY BE YELLOW)
		{
			$sql="INSERT INTO poorbuk_messageindex_table (messageid,userid)
			VALUES('$last_id','$MyFriendIdsToSendToOneByOne')";		
		}
		$result = mysql_query($sql);
		
		/*
		echo $sql.'<br>';
		ECHO 'result='.$result;
		*/

	}
	
			
	$myObjectFriendIds = '{'.
	'"allMyFriendIdsToOrdered":"'.$allMyFriendIdsToOrdered.'" ,'.	
	'"status":"success"'.
	'}';
	echo $myObjectFriendIds;


?>