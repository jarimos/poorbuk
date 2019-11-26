<?php
	require_once(POORBUK_PATH_ABSOLUTE_PHP.'/phplogin/genRandomStringLogin.php');
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();
	$myuserid3 = strip_tags($_POST['myuserid']);


//DELETE ALL IPS FROM THE IPUSERS_TABLE  
	$sql="UPDATE poorbuk_ip_table SET ipadr=''" ;	
	$result = mysql_query($sql);
	echo 'ALL IPS SET TO NOTHING IN IPTABLE';


?>