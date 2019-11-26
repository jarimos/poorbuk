<?php
include ("../phpgeneral/headercheck.php");
//CALLED FROM FUNCTION IN profileEditStart.js
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/ProfileClass.php');

//if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20))
if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20))
{
    $userid=$_POST["myusernow"];
}
else
{
    exit();
}	

$newProfile = new Profile;
$profileGetDescription = $newProfile->profileGetDescription($userid);
echo $profileGetDescription;




