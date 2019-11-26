<?php

	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();
	$myuserid3 = strip_tags($_POST['myuserid']);
	//$ip = $_SERVER['REMOTE_ADDR'];


/**************************ALARM: HERE WE CHANGE THE HTACCESS ONCE AT A DAY 
*********************VERY QUICKLY (LESS THAN 1 SECOND? ) WHEN THERE IS NO MANY USSERS
*********************WHEN USERS ARE MILLIONS IT TAKES A FEW SECONDS
*********************THATS WHY ITS GOOD TO MAKE IT AT NIGHT, UNTIL WE FIND ANOTHER METHOD****************************/
$start=microtime('get_as_float');

/*UNCOMMENT THIS LINE FOR TIME BASED
$myTimeNow = date("H:i:s");
$timeBetweenStart = '12:40:00';
$timeBetweenEnd = '13:40:18';
if ($myTimeNow>$timeBetweenStart && $myTimeNow<$timeBetweenEnd)
{

UNCOMMENT THIS LINE FOR TIME BASED*/
	$query = @mysql_query("SELECT * FROM poorbuk_ip_table WHERE ipadr<>''");
	
	$myFile = "/poorbuk/js/.htaccess";
	$fh = fopen($myFile, 'a') or die("can't open file");	
	
	while ($row = mysql_fetch_array($query))
	{

		//echo '<br> MY USER '.$row{'ipadr'};
		/**FILE APPEND IPS******************/

		$stringData = " ".$row{'ipadr'};
		fwrite($fh, $stringData);
			
	}
		/**FILE CLOSE AFTER APPEND IPS (AFTER WHILE LOOP)******************/
		fclose($fh);
	
	/****OVERWRITE FUNCTIONAL FILE HTACCESS********************/	
	$destinyFile=$_SERVER['DOCUMENT_ROOT'].'/poorbuk/application/.htaccess';
	$sourceFile = 'js/.htaccess';

	if (!copy($sourceFile, $destinyFile)) 
	{
		echo "failed to copy $file...\n";
	}
	/*********************************************/
	/****OVERWRITE PREPARED TO ORIGINAL EMPTY HTACCESS FOR THE NEXT UPDATE********************/	
	$destinyFile='js/.htaccess';
	$sourceFile = 'js/origin/.htaccess';

	if (!copy($sourceFile, $destinyFile)) 
	{
		echo "failed to copy $file...\n";
	}
	/*********************************************/
	
	
	
//UNCOMMENT THIS LINE FOR TIME BASED    }  

 
/**********************END OVERWRITE HTACCESS*************************/	
$end=microtime('get_as_float');
$total=$end-$start;
echo 'TOTAL TIME FOR OVERWRITTING HTACCES = '.$total.'<br>';





?>