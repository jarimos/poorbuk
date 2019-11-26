<?php
    include('../../application/modules/phpgeneral/headercheck.php'); 	
    
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
    startConnectionDB();


    if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20))
    {
    }
    else
    {
        //echo 'Username is not set';
        exit();
    }

    $newUser = new User;    
    $newUser->updateUserIpOfflineDetection($_POST['myuserid']);
    
    echo 'success';
