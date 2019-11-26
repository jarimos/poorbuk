<?php
include ("headercheck.php");	

function startConnectionDB()
{
    
    $username = "jarimos";
    $password = "sarah";
    $mydatabase= "poorbuk";
    $hostname = "localhost";
     
    //echo "POORBUK_PATH_ABSOLUTE_MODULES = ".POORBUK_PATH_ABSOLUTE_MODULES.$username.$password.$mydatabase.$hostname;

    //include('myDBini.php');
    // Create connection
    $connection_DB = new mysqli("$hostname", "$username", "$password", "$mydatabase");

    // Check connection
    if ($connection_DB->connect_error) {
        die("Connection failed: " . $con->connect_error);

    } 

    return $connection_DB;	
    //echo "Connected successfully";

/*		
                //ESTA LINE PERMITE QUE LOS CARACTERES COMO Ñ SEAN ALMACENADOS 
                //EN LA BASE DE DATOS SIN PROBLEMAS
                if (!mysql_query("SET NAMES utf8")) 
                {
                        echo "Error: SET NAMES utf8.\n";
                        exit;
                } 
                return $con;

*/

}	


function executeSQL($sql)
{
	$status=true;
        
        
        if (!(isset($connection_DB)))
        {
            $connection_DB =  startConnectionDB();           
        }


	if (!$result = mysqli_query($connection_DB,$sql)) 
                            
	{
                echo("Error description: " . mysqli_error($connection_DB));
		//echo "Error query or NULL RESULTS<br>";
		$result = ($result) ? 'true' : 'false';
		//echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		//echo $result;
		$status=false;
	}
	
	return $result;
        
        
}



  /**

    * This function can be used to check the sanity of variables
    *
    * @access private
    *
    * @param string $type  The type of variable can be bool, float, numeric, string, array, or object
    * @param string $string The variable name you would like to check
    * @param string $length The maximum length of the variable
    *
    * return bool
    */

function sanityCheckScapeByReference(&$string, $type, $length)
{
	
    /*TESTING
            echo '
            real type = '.gettype($string);
            echo '
            Real-length = '.strlen($string);
            echo '
            Real string= "'.$string;

    END TESTING*/

    if (!(isset( $string )) || $string==""){return FALSE;}      
      
    // assign the type
    $type = 'is_'.$type;

    if(!$type($string))
    {
        return FALSE;
        //echo 'type';

    }
      // now we see if there is anything in the string
    if(empty($string))
    {
        return FALSE;
        //echo 'empty';
    }
    // then we check how long the string is
    if(strlen($string) > $length)
    {
        return FALSE;
        //echo 'len';
    }

    $string = mysqli_real_escape_string_jarim_ByReference($string);
    
    // if all is well, we return TRUE
    //$string=mysqli_real_escape_string_jarim_ByReference($string);

    //$string=12;
    return TRUE;
    
}



function mysqli_real_escape_string_jarim_ByReference($string)
{
    
    //2018
    include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/myDBini.php'); 
    $mysqli_REAL_SCAPE_JARIM = new mysqli($hostname, $username, $password);

    // Check connection
    if ($mysqli_REAL_SCAPE_JARIM->connect_error) 
    {
        die("Connection failed: " . $mysqli_REAL_SCAPE_JARIM->connect_error);
    } 
    //echo "Connected successfully";
    $string = mysqli_real_escape_string($mysqli_REAL_SCAPE_JARIM,$string);
    mysqli_close($mysqli_REAL_SCAPE_JARIM);
    return $string;


}


if (function_exists('left_string_findStringIncluded_jar')) 
{
    //echo "function available.<br />\n";
} else 
{
function left_string_findStringIncluded_jar($myStringJar,$findStringJar)
{
/*GIVES YOU THE LEFT STRING FROM 0 TO findStringJar INCLUDED*/
	$myNewStringStringJar = strstr($myStringJar,$findStringJar,true) . $findStringJar;
        return $myNewStringStringJar;
	//echo "<br><br> left_string_findStringIncluded_jar = $myNewStringStringJar";
}
}


function left_string_findStringExcluded_jar($myStringJar,$findStringJar)
{
/*GIVES YOU THE LEFT STRING FROM 0 TO findStringJar INCLUDED*/
	$myNewStringStringJar = strstr($myStringJar,$findStringJar,true);
        return $myNewStringStringJar;
	//echo "<br><br> left_string_findStringExcluded_jar = $myNewStringStringJar";
}
function right_string_findStringIncluded_jar($myStringJar,$findStringJar)
{
	$myNewStringStringJar = strstr($myStringJar,$findStringJar,false)  ;
        return $myNewStringStringJar;
	//echo "<br><br> right_string_findStringIncluded_jar = $myNewStringStringJar";
}
function right_string_findStringExcluded_jar($myStringJar,$findStringJar)
{
	$myNewStringStringJar = strstr($myStringJar,$findStringJar,false)  ;
	$findStringLenJar = strlen($findStringJar);
	$newStringLenJar = strlen($myNewStringStringJar);
	$newStringLenJar = $newStringLenJar -  $findStringLenJar;
	$myNewStringStringJar = substr($myNewStringStringJar,-($newStringLenJar));
        return $myNewStringStringJar;
	//echo "<br><br> right_string_findStringExcluded_jar = $myNewStringStringJar";
}
	
	
	
//SCAPE FUNCTIONS FOR MYSQL INSERTS-UPDATES
function mysql_escape_mimic($inp) {
   /* if(is_array($inp))
        return array_map(__METHOD__, $inp);
	*/

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }

    return $inp;
} 





function mysql_escape_simple_quote_with_double_quote_Jarim($inp) {
   /* if(is_array($inp))
        return array_map(__METHOD__, $inp);
	*/

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array("'"),array('"'), $inp);
    }

    return $inp;
}



