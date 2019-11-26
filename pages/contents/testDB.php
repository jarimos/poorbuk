<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
//$_SESSION['myProfileEdit']=false;
//echo 'DOCUMENT_ROOT = '.$_SERVER['DOCUMENT_ROOT'].'HTTP_HOST = '.$_SERVER['HTTP_HOST'];
/*
$sql="set
  session character_set_server = 'latin1',
  session character_set_results = 'latin1',
  session character_set_connection = 'latin1',
  session character_set_client = 'latin1',

  session collation_server = 'latin1_spanish_ci',
  session collation_connection = 'latin1_spanish_ci'";
$meter = @mysql_query($sql);*/
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	//The require_once statement is identical to require except PHP will check if the 
	//file has already been included, and if so, not include (require) it again.
	$con = startConnectionDB();
/*
	$mail = strip_tags($_POST['mail']);
	$passUserOriginalCoded = strip_tags($_POST['pass']);
	$userid = strip_tags($_POST['userid']);
	$other = strip_tags($_POST['other']);
	$passUserRandomNow = sha1($passUserOriginalCoded);*/

/*************NEW HERE****************************************************/
if (!(isset( $_POST['mail'] )) || $_POST['mail']==""){exit;}


//echo "POST[mail]= ".$action.'<br><br>';
echo $_SERVER['HTTP_REFERER'].' REFERRER<br>';
echo $_SERVER['HTTP_HOST'].' HOST<br>';

/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/


//$eventid
//$stampdatehour
$userid =1;
$eventfor='me and friends';
$titel='jódete';
$description='me encanta que me la chupes';
$eventdate='2014-05-25';
$eventtime='18:20';




//$sql='INSERT INTO poorbuk_event_table (userid,eventfor,titel,description,eventdate,eventtime)values($userid,$eventfor,$titel,$description,$eventdate,$eventtime)';
$sql='INSERT INTO poorbuk_event_table 
(userid,eventfor,titel,description,eventdate,eventtime)
values
("'.$userid.'","'.$eventfor.'","'.$titel.'","'.$description.'","'.$eventdate.'","'.$eventtime.'")';

 if (!$meter = @mysql_query($sql)) {
    echo "Error INSERT.\n";
    exit;
};
$meter = ($meter) ? 'true' : 'false';
echo $sql.'  RESULT = '.$meter;


	$query = @mysql_query("SELECT * FROM poorbuk_event_table");
	while ($row = mysql_fetch_array($query))
	{
		
			$userid= $row{'userid'};
			$eventfor= $row{'eventfor'};
			$titel= $row{'titel'};
			$description= $row{'description'};
			$eventdate= $row{'eventdate'};
			$eventtime= $row{'eventtime'};
			
			echo $userid.'<br>'.$eventfor.'<br>'.$titel.'<br>'.$description.'<br>'.$eventdate.'<br>'.$eventtime;
			
			

																								
			
	}
	

$query = ($query) ? 'true' : 'false';
echo '  RESULT = '.$query;

/*SELECT *
     FROM t1
     WHERE _latin1 'MÃƒÂ¼ller' COLLATE latin1_german2_ci = k;
     SELECT *
     FROM t1
     WHERE k LIKE _latin1 'MÃƒÂ¼ller' COLLATE latin1_german2_ci;*/
	//$return_value="";
/*	$query = @mysql_query("SELECT * FROM poorbuk_user_table WHERE username COLLATE utf8_spanish2_ci LIKE '%ÃƒÂ±%' ORDER BY username COLLATE utf8_spanish2_ci");//COLLATE utf8_spanish_ci ASC utf8_spanish2_ci
	while ($row = mysql_fetch_array($query)) {
    echo $row['username'].'<br><br>';
	
}





/*************END NEW HERE***********************************************************/
/***ERRORS!!!!!!********************************  
/*if (!mysql_set_charset('utf8[utf8_spanish_ci]',$con)) {
    echo "Error: Unable to set the character set.\n";
    exit;
}
if (!mysql_query("SET CHARACTER SET utf8_spanish_ci")) {
    echo "Error:  SET utf8_spanish_ci set.\n";
    exit;
}

if (!mysql_query("SET NAMES utf8_spanish_ci")) {
    echo "Error: SET NAMES utf8_spanish_ci.\n";
    exit;
}   
/***END ERRORS*****************************/

/*************WORKING*********************************/
 /*  
if (!mysql_set_charset('latin1',$con)) {
    echo "Error: Unable to set the character set.\n";
    exit;
}*/


/*PARECE QUE ESTE ES EL RESPONSABLE DE QUE NO SALGAN CARACTERES RAROS*/
/*
if (!mysql_query("SET NAMES utf8")) {
    echo "Error: SET NAMES utf8.\n";
    exit;
} 
*/
/*$charset = mysql_client_encoding($con);

echo $charset.'<br><br><br>';

$mail = strip_tags($_POST['mail']);
echo $mail;

$sql='INSERT INTO poorbuk_user_table (username) values ("'.$mail.'"),("chavo"),("cala"),("chilla"),("ÃƒÂ±em"),("nex")';
 if (!$meter = @mysql_query($sql)) {
    echo "Error INSERT.\n";
    exit;
};

/*SELECT *
     FROM t1
     WHERE _latin1 'MÃƒÂ¼ller' COLLATE latin1_german2_ci = k;
     SELECT *
     FROM t1
     WHERE k LIKE _latin1 'MÃƒÂ¼ller' COLLATE latin1_german2_ci;*/
	//$return_value="";
/*	$query = @mysql_query("SELECT * FROM poorbuk_user_table WHERE username COLLATE utf8_spanish2_ci LIKE '%ÃƒÂ±%' ORDER BY username COLLATE utf8_spanish2_ci");//COLLATE utf8_spanish_ci ASC utf8_spanish2_ci
	while ($row = mysql_fetch_array($query)) {
    echo $row['username'].'<br><br>';
	
}
/*$sql = ("SELECT * FROM poorbuk_user_table ORDER BY username COLLATE utf8_spanish_ci");
 if (!$meter = @mysql_query($sql)) {
 
	    echo "Error SELECT.\n";
}
else
{ 	while ($row = mysql_fetch_array($meter)) 
	{
		echo $row['username'].'<br><br>';
	};*/
/***********TEST DATABASE*****************************************************************/
/*	
$sql='INSERT INTO testtable (name) values ("culo"),("nÃƒÂ¦x"),("chavo"),("cala"),("chilla"),("ÃƒÂ±em"),("nex")';
 if (!$meter = @mysql_query($sql)) {
    echo "Error INSERT.\n";
    exit;
};

	//$return_value="";
	$query = @mysql_query("SELECT * FROM testtable ORDER BY name COLLATE utf8_spanish2_ci");//COLLATE utf8_spanish_ci ASC utf8_spanish2_ci
	while ($row = mysql_fetch_array($query)) {
    echo $row['name'].'<br><br>';
	
}
*/
/******************************************************************************************/
?>