<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}

require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
startConnectionDB();

$instaname = strip_tags($_POST['instaname']);
$instadireccion = strip_tags($_POST['instadireccion']);
$instanotas = strip_tags($_POST['instanotas']);
$instamaterial = strip_tags($_POST['instamaterial']);
$instacontactos = strip_tags($_POST['instacontactos']);
/*

$instaname="instalacion 1";
$instadireccion="calle pollas 1";
$instanotas="notas tu";
$instamaterial="pivón";
$instacontactos="tiabuena1 2223423442 tiabuena2 35345435345345";
*/

$sql="INSERT INTO poorbuk_insta_table 
(instaname,instadireccion,instanotas,instamaterial,instacontactos)
values
('$instaname','$instadireccion','$instanotas','$instamaterial','$instacontactos')";

 if (!$meter = @mysql_query($sql)) {
    echo "Error INSERT.\n";
	echo $sql.'  RESULT = '.$meter;
    exit;
};
/*$meter = ($meter) ? 'true' : 'false';
echo $sql.'  RESULT = '.$meter;*/



	$query = @mysql_query("SELECT * FROM poorbuk_insta_table");
	while ($row = mysql_fetch_array($query))
	{
			$instaid= $row{'instaid'};
			$instatimestamp= $row{'instatimestamp'};			
			$instaname= $row{'instaname'};
			$instadireccion= $row{'instadireccion'};
			$instanotas= $row{'instanotas'};
			$instamaterial= $row{'instamaterial'};
			$instacontactos= $row{'instacontactos'};
			
			echo $instaid.'<br>'.$instatimestamp.'<br>'.$instaname.'<br>'.$instadireccion.'<br>'.$instanotas.'<br>'.$instamaterial.'<br>'.$instacontactos;
			
			

																								
			
	}
	

$query = ($query) ? 'true' : 'false';
echo '  RESULT = '.$query;

?>