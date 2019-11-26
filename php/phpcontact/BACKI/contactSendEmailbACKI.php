<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
	if (!(isset( $_POST['message'] )) || $_POST['message']==""){exit;}
	
	$mailfrom = strip_tags($_POST['mail']);
	$message= strip_tags($_POST['message']);
	
	//IF NO MESSAGGE EXIT!!!

		/************MAIL PASSWORD TO USER********************************************************************/
		$adminmail= 'admin@poorbuk.com';
		$subject = 'Poorbuk contact form' ;
		//$message ="Wellcome to poorbook \n\r Username = ".$mail."\n\r Pass = ";
		//the first adress is the adress the mail will be sent. The question is: who is sent to? user or admin?
		mail($adminmail, $subject, $message, "From: " .$mailfrom);
		//echo "Thanks a lot for helping people using poorbook. Your password have been sent to your email Enjoy :D";
		/****************END MAIL PASSWORD TO USER**********************************************************/
		// sleep for 3 seconds SHOWING MESSAGGE  // YOUR PASS HAS BEEN SENT TO YOU...
		//sleep(3);
		//Include("index.php"); ;

?>