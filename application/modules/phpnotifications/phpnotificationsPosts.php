<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();

if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20)&&
    sanityCheckScapeByReference($_POST['myuserlanguage'], 'string', 20))
{
    $userid = $_POST['myusernow'];	
    $myuserlanguage = $_POST['myuserlanguage'];
}
else
{
    exit();
}


$newPost = new Post;
$notificationPostShowAll = $newPost->notificationPostShowAll($userid,$myuserlanguage);




