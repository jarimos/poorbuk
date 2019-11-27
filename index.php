<?php
/**********MAKING ALL PATHS (ABSOLUTE AND RELATIVES*********************************************************/

/**********ABSOLUTE PATHS*********************************************************/


/**********MAKE ROOT PATH START********************/
/*26-11-2019 JARIM
$poorbuk_Path_Absolute_Root = realpath(dirname(__FILE__));

//REPLACE SLASHES
$stringToBeReplaced = array("\\");
$stringToInsert= "/";
$myStringJar = $poorbuk_Path_Absolute_Root;
$poorbuk_Path_Absolute_Root =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);
echo "<br><br> poorbuk_Path_Absolute_Root = $poorbuk_Path_Absolute_Root";
 * 
 END /*26-11-2019 JARIM */
$poorbuk_Path_Absolute_Root = "C:/xampp/htdocs/poorbuk";

/*MAKE ABSOLUTE PATH MODULES*/
//CUT UNNECESSARY PATH FROM THE END
//$stringToInsert = "";
//$stringToBeReplaced= "/phpgeneral";
//$myStringJar = $poorbuk_Path_Absolute_Root;
//$poorbuk_Path_Absolute_Modules =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);
//echo "<br><br> ABSOLUTE MODULES poorbuk_Path_Absolute_Modules = $poorbuk_Path_Absolute_Modules";


/*MAKE ROOT PATH*/

//CUT UNNECESSARY PATH FROM THE END
//$stringToInsert = "";
//$stringToBeReplaced= "/application/modules/phpgeneral";
//$myStringJar = $poorbuk_Path_Absolute_Root;
//$poorbuk_Path_Absolute_Root =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);


/*MAKE ABSOLUTE ROOT MODULES*/

if (!(defined('POORBUK_PATH_ABSOLUTE_ROOT'))) 
{
    define("POORBUK_PATH_ABSOLUTE_ROOT",$poorbuk_Path_Absolute_Root);
} 
    
/*MAKE ABSOLUTE ROOT USERS*/

if (!(defined('POORBUK_PATH_ABSOLUTE_USERS'))) 
{
    define("POORBUK_PATH_ABSOLUTE_USERS",$poorbuk_Path_Absolute_Root.'/application/files/users');
} 

/*MAKE ABSOLUTE PATH MODULES*/

    if (!(defined('POORBUK_PATH_ABSOLUTE_MODULES'))) 
    {
        define("POORBUK_PATH_ABSOLUTE_MODULES",POORBUK_PATH_ABSOLUTE_ROOT."/application/modules");
    } 
/*MAKE ABSOLUTE PATH PHP - FOR OUTSIDE PAGES*/

    if (!(defined('POORBUK_PATH_ABSOLUTE_PHP'))) 
    {
        define("POORBUK_PATH_ABSOLUTE_PHP",POORBUK_PATH_ABSOLUTE_ROOT."/php");
    } 

/**********END ABSOLUTE PATHS1*********************************************************/







/**********RELATIVE PATHS*********************************************************/

/*MAKE RELATIVE ROOT PATH*/
//CUT UNNECESSARY PATH FROM THE BEGINNING
/*26-11-2019 JARIM
$stringToInsert = "";
$stringToBeReplaced= $_SERVER['DOCUMENT_ROOT'];
$myStringJar = POORBUK_PATH_ABSOLUTE_ROOT;
$poorbuk_Path_Relative_Root =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);
END /*26-11-2019 JARIM */
    
    
$poorbuk_Path_Relative_Root ="/poorbuk";


if (!(defined('POORBUK_PATH_RELATIVE_ROOT'))) 
{
    //define("POORBUK_PATH_RELATIVE_ROOT","localhost/poorbuk/");
    //JARIM 2019
    //define("POORBUK_PATH_RELATIVE_ROOT",$poorbuk_Path_Relative_Root);
    define("POORBUK_PATH_RELATIVE_ROOT","poorbuk");
} 
/**********MAKE ROOT PATH END********************/


/*MAKE PATH TO MODULES*/
$poorbuk_Path_Relative_Modules = $poorbuk_Path_Relative_Root."poorbuk/application/modules";
if (!(defined('POORBUK_PATH_RELATIVE_PHP'))) 
{
    //JARIM 2019
    //define("POORBUK_PATH_RELATIVE_MODULES",$poorbuk_Path_Relative_Modules);
    define("POORBUK_PATH_RELATIVE_MODULES","poorbuk/application/modules");
}


/*MAKE PATH TO PHP - FOR OUTSIDE PAGES*/
$poorbuk_Path_Relative_php = $poorbuk_Path_Relative_Root."poorbuk/php";
if (!(defined('POORBUK_PATH_RELATIVE_PHP'))) 
{
    //JARIM 2019
    //define("POORBUK_PATH_RELATIVE_PHP",$poorbuk_Path_Relative_php);
    define("POORBUK_PATH_RELATIVE_PHP","poorbuk/php");
} 

/**********END RELATIVE PATHS*********************************************************/


 /**********ABSOLUTE PATHS2 + HOST WWW*********************************************************/   
/*/*26-11-2019 JARIM
 $myProtocolAndServer = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'];
 END /*26-11-2019 JARIM */
$myProtocolAndServer = "http://";
        
if (!(defined('POORBUK_PATH_WWW_ABSOLUTE_ROOT'))) 
{
    define("POORBUK_PATH_WWW_ABSOLUTE_ROOT",$myProtocolAndServer.POORBUK_PATH_RELATIVE_ROOT);
} 

if (!(defined('POORBUK_PATH_WWW_ABSOLUTE_MODULES'))) 
{
    define("POORBUK_PATH_WWW_ABSOLUTE_MODULES",$myProtocolAndServer.POORBUK_PATH_RELATIVE_MODULES);
} 

if (!(defined('POORBUK_PATH_WWW_ABSOLUTE_PHP'))) 
{
    define("POORBUK_PATH_WWW_ABSOLUTE_PHP",$myProtocolAndServer.POORBUK_PATH_RELATIVE_PHP);
} 
if (!(defined(POORBUK_PATH_ABSOLUTE_ROOT))) 
{

    $myNewPathNow = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    if (!(defined('POORBUK_PATH_ABSOLUTE_MODULES'))) 
    {
       define("POORBUK_PATH_ABSOLUTE_MODULES",left_string_findStringIncluded_jar($myNewPathNow,"poorbuk/includes/poorbuk"));
    } 
//    echo "<br><br>NO SET SO I SET POORBUK_PATH_ABSOLUTE_MODULES POORBUK_PATH_ABSOLUTE_ROOT <br><br>";
    
}
 else 
{
    if (!(defined('POORBUK_PATH_ABSOLUTE_MODULES'))) 
    {
       define("POORBUK_PATH_ABSOLUTE_MODULES",POORBUK_PATH_ABSOLUTE_ROOT);
    } 
//    echo "<br><br>SET POORBUK_PATH_ABSOLUTE_MODULES POORBUK_PATH_ABSOLUTE_ROOT <br><br>";
}

/**********END ABSOLUTE PATHS2*********************************************************/





/****TEST ALL PATHS (RELATIVES AND ABSOLUTES**/
//echo "<br><br>INDEX   POORBUK_PATH_ABSOLUTE_ROOT    = ".POORBUK_PATH_ABSOLUTE_ROOT;
//echo "<br><br>INDEX   POORBUK_PATH_ABSOLUTE_MODULES = ".POORBUK_PATH_ABSOLUTE_MODULES;
//echo "<br><br>INDEX   POORBUK_PATH_ABSOLUTE_PHP     = ".POORBUK_PATH_ABSOLUTE_PHP;
//echo "<br><br><br><br>";
//echo "<br><br>INDEX   POORBUK_PATH_WWW_ABSOLUTE_ROOT    = ".POORBUK_PATH_WWW_ABSOLUTE_ROOT;
//echo "<br><br>INDEX   POORBUK_PATH_WWW_ABSOLUTE_MODULES    = ".POORBUK_PATH_WWW_ABSOLUTE_MODULES;
//echo "<br><br>INDEX   POORBUK_PATH_WWW_ABSOLUTE_PHP    = ".POORBUK_PATH_WWW_ABSOLUTE_PHP;
//echo "<br><br><br><br>";
//echo "<br><br>INDEX   POORBUK_PATH_RELATIVE_ROOT = ".POORBUK_PATH_RELATIVE_ROOT;
//echo "<br><br>INDEX   POORBUK_PATH_RELATIVE_MODULES     = ".POORBUK_PATH_RELATIVE_MODULES;
//echo "<br><br>INDEX   POORBUK_PATH_RELATIVE_PHP     = ".POORBUK_PATH_RELATIVE_PHP."<br><br>";
//

//echo "<br><br> ABSOLUTE MODULES  poorbuk_Path_Absolute_Modules = POORBUK_PATH_ABSOLUTE_MODULES<br>";
//echo "<br><br> ABSOLUTE PHP  poorbuk_Path_Absolute_php = POORBUK_PATH_ABSOLUTE_PHP<br>";
//echo "<br><br> RELATIVE ROOT  poorbuk_Path_Relative_Root = $poorbuk_Path_Relative_Root";
//echo "<br><br> RELATIVE MODULES  poorbuk_Path_Relative_Modules = $poorbuk_Path_Relative_Modules";
//echo "<br><br> RELATIVE PHP  poorbuk_Path_Relative_php = $poorbuk_Path_Relative_php<br>";
//
//
//
//
//
//
//
//mb_internal_encoding('UTF-8');
//mb_internal_encoding("UTF8-SPANISH-CI"); ERROR
//mb_internal_encoding("ISO-8859-2");
//print_r(mb_list_encodings());
//echo mb_check_encoding($var)
//$GLOBALS['POORBUK_PATH_ABSOLUTE_MODULES'] = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/";
// to change a session variable, just overwrite it 
/*session_start();
$_SESSION["poorbuk_Path_Absolute_Modules"] = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/";
echo "_SESSION-POORBUK_PATH_ABSOLUTE_MODULES ".$_SESSION["poorbuk_Path_Absolute_Modules"];
$_SESSION["poorbuk_Path_Absolute_Modules"] = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/application/modules/";
echo "_SESSION-poorbuk_Path_Absolute_Modules ".$_SESSION["poorbuk_Path_Absolute_Modules"];
//print_r($_SESSION);
//echo "poorbuk_Path_Absolute_Global = POORBUK_PATH_ABSOLUTE_ROOT <br>";
//define("GREETING","Hello you! How are you today?");
//echo constant("GREETING")."<br>";
//$_SESSION["poorbuk_Path_Absolute_Modules"]  = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/application/modules/";
//echo "poorbuk_Path_Absolute_Modules = $_SESSION["poorbuk_Path_Absolute_Modules"] <br>";
//$GLOBALS['poorbuk_Path_Absolute_Users'] =   $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/application/files/users/";
//echo "poorbuk_Path_Absolute_Users = $poorbuk_Path_Absolute_Users <br>";


echo "PHP_SELF : " . $_SERVER['PHP_SELF'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
echo "SCRIPT_FILENAME : " . $_SERVER['SCRIPT_FILENAME'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
echo "DOCUMENT_ROOT : " . $_SERVER['DOCUMENT_ROOT'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
echo "SERVER_NAME : " . $_SERVER['SERVER_NAME'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php

echo "<br>path = http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
echo('<br>dir pindex = '.basename (dirname($_SERVER['PHP_SELF']),"/")); 
*/
//  /poorbuk/
// http://localhost/poorbuk/
/*
$file = $_SERVER['DOCUMENT_ROOT'].'/poorbuk/php/phpopendb/myDBini.php';
// Open the file to get existing content
//$current = file_get_contents($file);
// Append a new person to the file
//$current .= "John Smith\n";


	
$current ='<?php
$username = "napoleon";
$password = "sarah7!!";
$hostname = "localhost";
$mydatabase="poorbuk";
?>';
// Write the contents back to the file
file_put_contents($file, $current);

/*
<!--<script src="initialize/initializeAll.js"></script>
<script> redirectToIndex();</script>-->
 * CODE FOR DELETING ALL PREVIOS INFO FROM OUTPUT TO HTML DOC*/
//phpinfo();
//echo "HELLOOOOOOOOO11111";
$mipolla = "lorttttttttttttttt";





/*
$header_include = "header.php";
include_once($_SERVER['DOCUMENT_ROOT']."/pages/headers/$header_include");
*/
//JARIM:

//FOR WORKING WITHOUT MODIFICATIONS, THIS PROJECT MUST BE AT THE ROOT FOLDER IN XAMP OR SERVER

//.htaccess SENDS ALL THE REQUEST TO FILES THAT NOT EXISTS THROUGH index.php 

//SO WE MAKE ALL THE CALLS TO NON EXISTING FILES TO REDIRECT ALL THE CALLS THROUGH index.php, AND THEN THE
//CONTROLLER (controller.class.php) CONVERTS THE NON-EXISTING-FILENAME OF THE REQUESTS TO THE REAL EXISTING FILE
//JUST ADDING 'view/'TO THE PATH (ALL OUR TEMPLATES ARE IN THE FOLDER "view/")

//IF YOU TRY TO ACCESS ANY NO EXISTING TEMPLATE , YOU WILL BE REDIRECTED by the CONTROLLER (controller.class.php) TO THE PAGE  404.php
//IF YOU TRY TO ACCESS index.php , YOU WILL BE REDIRECTED by the CONTROLLER (controller.class.php) TO THE PAGE 404.php

//IN THE FILE controller.class.php I HAVE ADDED A LOT OF COMMENTS TO EXPLAIN THE PROCESS.

//EXAMPLES
//CALL TO http://localhost/ 
//controller transform it into  view/index.php and shows error (PAGE  404.php)

//CALL TO http://localhost/index.php
//controller transform it into  view/index.php and shows error (PAGE  404.php)


//CALL TO http://localhost/view/test1.php (REAL EXISTING PATH - JUMPS OVER THE CONTROLLER)
//BECAUSSE THIS IS THE REAL PATH TO AN EXISTING FILE, HTACCESS DOES NOT REDIRECT AND SHOW THE 
//FILE WITHOUT GOING THROUGH THE CONTROLLER (AND THEREFOR PROBABLY SHOWS ERRORS OF NOT INCLUDED FILES OR CLASSES)

//CALL TO http://localhost/test1.php (UNREAL PATH THAT WORKS AFTER THE CONTROLLER)
//controller transform it into view/test1.php, AND BECAUSE IT EXIST, THE CONTROLLER SHOWS THE APPROPIATE TEMPLATE
//THE POINT IS THAT THE PATH ON THE BROWSER IS STILL http://localhost/test1.php. IT REMAINS UNCHANGED, BECAUSE THE
//CONTROLLER FILTER THE NON-EXISTING-PATH TO THE EXISTING PATH

//echo "chupamela";

include_once('functions/functions.php'); 

//echo "cmspage.php = 12 chars / from ? to = there are 10 chars (? and = included)" ;




/*
$myUri = $_SERVER['REQUEST_URI'];
echo "<br>myUri = ".$myUri."<br>";
$myUserIdSession = getUserIdNow();
$myUserURLNow = getUserURLNow();
echo "<br>myUserIdSession = ".$myUserIdSession;
echo "<br>myUserURLNow = ".$myUserURLNow;
*/



  // include configuration file
 include_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/"."config.ini.php");
  
 // include controller files
 include_once($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/"."controller/controller.class.php");



?>


		 


