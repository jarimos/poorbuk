<?php
	require_once(POORBUK_PATH_ABSOLUTE_PHP.'/phplogin/genRandomStringLogin.php');
	//$myuserid3= $_SESSION['myuserid'];
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();
	$myuserid3 = strip_tags($_POST['myuserid']);
	//$ip = $_SERVER['REMOTE_ADDR'];


//	1) IF STILL IP = NOTHING (BECAUSE DELETED THE FIRST POST TO updateIpTableAllIpsToNothing.php FOR 20 SECONDS AGO),
// THEN UPDATE USER_PASSWORD IN USER_TABLE AND DELETE USER FROM IPUSERS_TABLE  IN DB	
	
	//UPDATE USER_PASSWORD IN USER_TABLE 
	$query = @mysql_query("SELECT * FROM poorbuk_ip_table WHERE ipadr=''");
	

	while ($row = mysql_fetch_array($query))
	{
			$passUserRandomNow = genRandomStringLogin();
			echo $userid= $row{'ipuserid'};

			$updateUserPass="UPDATE poorbuk_user_table SET passUserOriginalCoded='".$passUserRandomNow."' WHERE userid='".$row{'ipuserid'}."'" ;	
			$resultupdateUserPass = mysql_query($updateUserPass);
			
	}
	//DELETE USER FROM IPUSERS_TABLE
	$deleteThisUserFromIpTable = @mysql_query("DELETE FROM poorbuk_ip_table WHERE ipadr=''");

	echo 'ALL USERS WITH IPS SET TO NOTHING WITH NEW PASS AND DELETED FROM IP_TABLE';
?>