<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}

	$myuserid3 = strip_tags($_POST['myuserid']);
	$myuserid3 = htmlspecialchars($myuserid3);
	$ip = $_SERVER['REMOTE_ADDR'];	
	$sql="UPDATE poorbuk_ip_table SET ipadr='".$ip."'WHERE ipuserid='".mysqli_real_escape_string_jarim_ByReference($myuserid3)."' LIMIT 1";	
	$result = mysql_query($sql);
	echo 'success';
?>