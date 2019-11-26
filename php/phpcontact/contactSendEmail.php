<?php
    include('../../application/modules/phpgeneral/headercheck.php'); 
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    
    
    //CHECK FOR TYPE,LENGHT AND EMPTY STRINGS	
    if( sanityCheckScapeByReference($_POST['mail'], 'string', 50) && sanityCheckScapeByReference($_POST['message'], 'string', 3000))
    {
    }
    else
    {
        //echo 'Username is not set';
        exit();
    }
    
    $mailfrom = $_POST['mail'];
    $message='message from: '.$mailfrom.'
    '. $_POST['message'];
    /************MAIL PASSWORD TO USER********************************************************************/
    $adminmail= 'admin@poorbuk.com';
    $subject = 'Poorbuk.com' ;
    $mailStatus = mail($adminmail, $subject, $message, "From: " .$adminmail);
    echo ' - $mailStatus ='.$mailStatus;


