<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
startConnectionDB();

if( 
sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
sanityCheckScapeByReference($_POST['myUserRollId'], 'string', 20)        
)
{
    $myuserid2=$_POST["myusernow"];
    $myUserRollId = $_POST["myUserRollId"] ;
}
else
{
    exit();
}	

$usercounter=0;


$sql="SELECT *
FROM poorbuk_user_table 
WHERE userid='$myUserRollId' LIMIT 1";
$result = @mysql_query($sql);


while($row = mysql_fetch_array($result))
{
    $userRoll=$row{'userroll'};			
}//END WHILE USERS FOUNDED 

$myUser = '{'.

'"userroll":"'.$userRoll.'" ,'.	

'}';

echo $myUser;


