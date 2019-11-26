<?php
	include($_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/modules/phpgeneral/headercheck.php');	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	require_once(POORBUK_PATH_ABSOLUTE_PHP.'/phplogin/genRandomStringLogin.php');
	startConnectionDB();


	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
	if (!(isset( $_POST['myuserpasscoded'] )) || $_POST['myuserpasscoded']==""){exit;}
	
	
	
	$myuserid = strip_tags($_POST['myuserid']);
	$passUserRandomNow = strip_tags($_POST['myuserpasscoded']);
	$myuserid = htmlspecialchars($myuserid);
	$passUserRandomNow = htmlspecialchars($passUserRandomNow);
	
	$query = @mysql_query("SELECT * FROM poorbuk_user_table WHERE userid='".mysqli_real_escape_string_jarim_ByReference($myuserid)."' AND passUserOriginalCoded='".mysqli_real_escape_string_jarim_ByReference($passUserRandomNow)."' LIMIT 1");	
	if($existe = @mysql_fetch_array($query))
	{
			//RENEW PASS SECOND TIME AFTER LOGIN/REGISTER BEFORE ACCESSING poorbuk
			$passCoded2 = genRandomStringLogin();
			$sql="UPDATE poorbuk_user_table SET passUserOriginalCoded='".$passCoded2."' WHERE userid='".mysqli_real_escape_string_jarim_ByReference($myuserid)."' AND passUserOriginalCoded='".mysqli_real_escape_string_jarim_ByReference($passUserRandomNow)."' LIMIT 1";	
			$result = mysql_query($sql);
		
			$myUser = '{'.
			'"passUserOriginalCoded":"'.$passUserRandomNow.'" ,'.
			'"status":"success"'.
			'}';
			
			echo $myUser;
	}
	else
	{
				$myUser = '{'.
			'"mail":"none" ,'.
			'"pass":"none" ,'.
			'"status":"error"'.
			'"query":"'.$query.'"'.
			
			'}';
			echo $myUser;


	}
?>