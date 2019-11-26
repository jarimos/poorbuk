<?php
    include ("../phpgeneral/headercheck.php");	

    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostClass.php');
    startConnectionDB();





if( sanityCheckScapeByReference($_POST['postmyusernow'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postmyLoveCounter'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postmyLovePostId'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['postLoveplusminus1'], 'string', 20))
{
    $userid =  $_POST['postmyusernow'];	
    $myLoveCounternow= $_POST['postmyLoveCounter'];
    $myLovePostId =  $_POST['postmyLovePostId'];
    $myLoveplusminus1 =  $_POST['postLoveplusminus1'];
}
else
{
    exit();
}


$newPost = new Post;
$loveInsert = $newPost->loveInsert($userid,$myLoveCounternow,$myLovePostId,$myLoveplusminus1) ;
$loveNotifications = $newPost->loveNotifications($userid,$myLovePostId,$myLoveplusminus1);	

echo '
loveInsert'.$loveInsert.'
loveNotifications'.$loveNotifications;	



