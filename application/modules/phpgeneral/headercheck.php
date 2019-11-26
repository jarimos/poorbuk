<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
/*$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/

//include_once($_SERVER['DOCUMENT_ROOT'].'/poorbuk/poorbuk-settings.php');
/*include_once($_SERVER['DOCUMENT_ROOT'].'/poorbuk/functions/functions.php');
//echo "DOCUMENT_ROOT : " . $_SERVER['DOCUMENT_ROOT'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
$myUri = $_SERVER['REQUEST_URI'];
//echo "<br>myUri = ".$myUri."<br>";
$myUserIdSession = getUserIdNow();
$myUserURLNow = getUserURLNow();
//echo "<br>myUserIdSession = ".$myUserIdSession;
//echo "<br>myUserURLNow = ".$myUserURLNow;
*/
//$_SERVER['DOCUMENT_ROOT'] .
//$_SESSION["poorbuk_Path_Absolute_Modules"]  = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF'])."/application/modules/";
/* if (session_status() == PHP_SESSION_NONE)
{
    //session_start();
    //$_SESSION["poorbuk_Path_Absolute_Modules"] = $_SERVER['DOCUMENT_ROOT']."/poorbuk/application/modules/";
    //echo "poorbuk-settings.php _SESSION-poorbuk_Path_Absolute_Modules ".$_SESSION["poorbuk_Path_Absolute_Modules"];
} */

//
//
//if (function_exists('left_string_findStringIncluded_jar'))
//{
//    //echo "function available.<br />\n";
//} else
//{
//function left_string_findStringIncluded_jar($myStringJar,$findStringJar)
//{
///*GIVES YOU THE LEFT STRING FROM 0 TO findStringJar INCLUDED*/
//	$myNewStringStringJar = strstr($myStringJar,$findStringJar,true) . $findStringJar;
//        return $myNewStringStringJar;
//	//echo "<br><br> left_string_findStringIncluded_jar = $myNewStringStringJar";
//}
//}
//
//
//if (function_exists('right_string_findStringExcluded_jar'))
//{
//    //echo "function available.<br />\n";
//} else
//{
//    function right_string_findStringExcluded_jar($myStringJar,$findStringJar)
//    {
//    //        echo "<br><br> myStringJar = $myStringJar";
//    //        echo "<br><br> findStringJar = $findStringJar";
//            $myNewStringStringJar = strstr($myStringJar,$findStringJar,false)  ;
//            $findStringLenJar = strlen($findStringJar);
//            $newStringLenJar = strlen($myNewStringStringJar);
//            $newStringLenJar = $newStringLenJar -  $findStringLenJar;
//            $myNewStringStringJar = substr($myNewStringStringJar,-($newStringLenJar));
//    //        echo "<br><br> right_string_findStringExcluded_jar = $myNewStringStringJar";
//            return $myNewStringStringJar;
//
//    }
//}


//echo "PHP_SELF : " . $_SERVER['PHP_SELF'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
//echo "SCRIPT_FILENAME : " . $_SERVER['SCRIPT_FILENAME'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
//echo "DOCUMENT_ROOT : " . $_SERVER['DOCUMENT_ROOT'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
//echo "SERVER_NAME : " . $_SERVER['SERVER_NAME'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php



/**********MAKING ALL PATHS (ABSOLUTE AND RELATIVES*********************************************************/

/**********ABSOLUTE PATHS*********************************************************/


/**********MAKE ROOT PATH START********************/
$poorbuk_Path_Absolute_Root = realpath(dirname(__FILE__));

//REPLACE SLASHES
$stringToBeReplaced = array("\\");
$stringToInsert= "/";
$myStringJar = $poorbuk_Path_Absolute_Root;
$poorbuk_Path_Absolute_Root =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);



/*MAKE ROOT PATH*/

//CUT UNNECESSARY PATH FROM THE END
$stringToInsert = "";
$stringToBeReplaced= "/application/modules/phpgeneral";
$myStringJar = $poorbuk_Path_Absolute_Root;
$poorbuk_Path_Absolute_Root =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);

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



/**********RELATIVE PATHS*********************************************************/

/*MAKE RELATIVE ROOT PATH*/
//CUT UNNECESSARY PATH FROM THE BEGINNING
$stringToInsert = "";
$stringToBeReplaced= $_SERVER['DOCUMENT_ROOT'];
$myStringJar = POORBUK_PATH_ABSOLUTE_ROOT;
$poorbuk_Path_Relative_Root =  str_replace($stringToBeReplaced, $stringToInsert, $myStringJar);
if (!(defined('POORBUK_PATH_RELATIVE_ROOT')))
{
    define("POORBUK_PATH_RELATIVE_ROOT",$poorbuk_Path_Relative_Root);
}
/**********MAKE ROOT PATH END********************/


/*MAKE PATH TO MODULES*/
$poorbuk_Path_Relative_Modules = $poorbuk_Path_Relative_Root."/application/modules";
if (!(defined('POORBUK_PATH_RELATIVE_PHP')))
{
    define("POORBUK_PATH_RELATIVE_MODULES",$poorbuk_Path_Relative_Modules);
}

/*MAKE PATH TO PHP - FOR OUTSIDE PAGES*/
$poorbuk_Path_Relative_php = $poorbuk_Path_Relative_Root."/php";
if (!(defined('POORBUK_PATH_RELATIVE_PHP')))
{
    define("POORBUK_PATH_RELATIVE_PHP",$poorbuk_Path_Relative_php);
}

/**********END RELATIVE PATHS*********************************************************/


 /**********ABSOLUTE PATHS2 + HOST WWW*********************************************************/

 $myProtocolAndServer = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'];

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


//echo "<br><br> ABSOLUTE MODULES  poorbuk_Path_Absolute_Modules = POORBUK_PATH_ABSOLUTE_MODULES<br>";
//echo "<br><br> ABSOLUTE PHP  poorbuk_Path_Absolute_php = POORBUK_PATH_ABSOLUTE_PHP<br>";
//echo "<br><br> RELATIVE ROOT  poorbuk_Path_Relative_Root = $poorbuk_Path_Relative_Root";
//echo "<br><br> RELATIVE MODULES  poorbuk_Path_Relative_Modules = $poorbuk_Path_Relative_Modules";
//echo "<br><br> RELATIVE PHP  poorbuk_Path_Relative_php = $poorbuk_Path_Relative_php<br>";

/******JSON JSON JSON *********************/

//DEFINE JSON FOR ERRORS
if (!(defined('JSON_ERROR_POORBUK')))
{
    $myStatus = '{'.
    '"status":"error"'.
    '}';
    define("JSON_ERROR_POORBUK",$myStatus);
}
//DEFINE JSON FOR SUCCESS
if (!(defined('JSON_SUCCESS_POORBUK')))
{
    $myStatus = '{'.
    '"status":"success"'.
    '}';
    define("JSON_SUCCESS_POORBUK",$myStatus);
}
