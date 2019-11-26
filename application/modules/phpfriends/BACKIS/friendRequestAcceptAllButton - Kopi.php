<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/


	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	//$myUserPassNow = $_POST['myuserpassnow'];
	if (!(isset( $_POST['myusernow'] )) || $_POST['myusernow']==""){exit;}
	if (!(isset( $_POST['myFriendsIdsAllCommaSeparated'] )) || $_POST['myFriendsIdsAllCommaSeparated']==""){exit;}
	
	$myuserid2 = $_POST['myusernow'];	
	$myAmigosAllIds	= $_POST['myFriendsIdsAllCommaSeparated'];
	
	$myAmigoStatus='AMIGO';
	
//ARRAYS FUNCTION EXPLODE
//PASS THE STRING TO EXPLODE TO $str	
	$str = $myAmigosAllIds;

	$myArray = explode(',',$str);
	for($i = 0; $i < count($myArray); $i++){
		//echo "Array$i = $myArray[$i] <br />";
		$myAmigoId=$myArray[$i];
		
		$sql= "UPDATE poorbuk_amigo_table SET amigofriendstatus='$myAmigoStatus' WHERE amigouserid='$myAmigoId' AND amigofriendid='$myuserid2'";
		$requestMessageForAmigoStatus='Felicidades. Ya tienes un amigo mas en poorbuk :)';			
						
		$result = mysql_query($sql);
	
	}
	echo $requestMessageForAmigoStatus;

	//include 'myDBerrorhandler.php';		


?>

