<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
startConnectionDB();

if( 
sanityCheckScapeByReference($_POST['selectUserRoll'], 'string', 20) &&
sanityCheckScapeByReference($_POST['myUserRollId'], 'string', 20)        
)
{
    $selectUserRoll=$_POST["selectUserRoll"];
    $myUserRollId = $_POST["myUserRollId"] ;
}
else
{
    exit();
}	


$usercounter=0;


$sql="UPDATE poorbuk_user_table SET userroll='".$selectUserRoll."' WHERE userid='$myUserRollId' LIMIT 1";

if (!$result = mysql_query($sql)) 
{
    echo "Error UPDATE.\n";
    echo $sql.'  RESULT = '.$result;
    exit;
};




