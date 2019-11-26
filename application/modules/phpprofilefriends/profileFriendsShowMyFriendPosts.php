<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
startConnectionDB();



if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['myfriendid'], 'string', 20) )
{
    $userid = $_POST['myuserid'];
    $myfriendid= $_POST["myfriendid"];
}
else
{
    exit();
}

if (!(isset( $_POST['mytime'] )) || $_POST['mytime']=="")
{
    $myTime = date("Y-m-d H:i:s");
}	
else
{
    $myTime = $_POST['mytime'];	
}	

$newPost = new Post;
$showAllPostsFriendOnly = $newPost->showAllPostsFriendOnly($userid,$myTime,$myfriendid);	


