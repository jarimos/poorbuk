<?php
include ("../phpgeneral/headercheck.php");
//include ("../phpgeneral/headercheck.php");
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
//startConnectionDB();


if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20)&&
    sanityCheckScapeByReference($_POST['myuserpass'], 'string', 150)&&
    sanityCheckScapeByReference($_POST['oldpass'], 'string', 150))
{
    $oldpass = $_POST['oldpass'];     
    $myuserid= $_POST["myuserid"];
    $myNewUserPass = $_POST["myuserpass"];
}
else
{
    exit();
}


$UserClass = new User;
$status = $UserClass->password_Update_by_UserId($myNewUserPass,$myuserid,$oldpass);

echo $status;





