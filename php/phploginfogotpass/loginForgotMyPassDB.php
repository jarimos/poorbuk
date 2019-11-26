<?php 

    include('../../application/modules/phpgeneral/headercheck.php'); 		
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
    startConnectionDB();
    
    //CHECK FOR TYPE,LENGHT AND EMPTY STRINGS	
    if( sanityCheckScapeByReference($_POST['mail'], 'string', 50))
    {
        $mail = $_POST['mail'];
    }
    else
    {
        //echo 'Username is not set';
        exit();
    }	

    $myStatus = JSON_ERROR_POORBUK;

    $newUser = new User;
    $passUserRandomNow = $newUser->genRandomStringLogin();
	

    //CHEK IF MAIL EXISTS
    $checkIfMailExists = $newUser->checkIfMailExists($mail);
    //echo '$checkIfMailExists ='.$checkIfMailExists.'<br>';

    if($checkIfMailExists)
    {
        //SEND MAIL WITH NEW PASS LINK
        $randomPassUpdate = $newUser->randomPassUpdate($mail,$passUserRandomNow);
        //echo '$randomPassUpdate ='. $randomPassUpdate;
        if ($randomPassUpdate)
        {
            $mailToForgotMyPass = $newUser->mailToForgotMyPass($passUserRandomNow);
            //echo '$mailToForgotMyPass ='. $mailToForgotMyPass;            
            if($mailToForgotMyPass)
            {
                //MAKE JSON SUCCESS
                $myStatus = JSON_SUCCESS_POORBUK;
            }
                
        }


    }//END if(!$checkIfMailExists)

    
    
    
    
    echo $myStatus;   




 