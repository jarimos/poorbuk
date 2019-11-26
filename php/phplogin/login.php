<?php
    include('../../application/modules/phpgeneral/headercheck.php'); 
   
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');		

    startConnectionDB();

    
    //CHECK FOR TYPE,LENGHT AND EMPTY STRINGS	
    if( sanityCheckScapeByReference($_POST['mail'], 'string', 50) &&
        sanityCheckScapeByReference($_POST['pass'], 'string', 150))
    {
        $mail = $_POST['mail'];
        $passUserOriginalBeforeCoded = $_POST['pass'];

    }
    else
    {
        exit();
    }

    //CODE THE USER PASSWORD SÅ IT CANT BE SEEN IN THE DB AND SO ON
    $passUserOriginalCoded = sha1($passUserOriginalBeforeCoded);
    //2018
    $ip = $_SERVER['REMOTE_ADDR'];
    $ip = mysqli_real_escape_string_jarim_ByReference($ip);
    //$ip = mysqli_real_escape_string_jarim_ByReference($_SERVER['REMOTE_ADDR']);


    // Next, create an instance of the class
    $newUser = new User;
    $passUserRandomNow = $newUser->genRandomStringLogin();
    $statusLogin = $newUser->login($mail, $passUserOriginalCoded,$ip,$passUserRandomNow,$passUserOriginalBeforeCoded);	


    if($statusLogin)
    {

        $newUser->randomPassUpdateLogInRegister();
        //ECHO AF JSON HAPPENS INSIDE CLASS
        $myUser = $newUser->makeUserJsonForLogIn();
        $newUser->updateUserIP();					
        //echo $myUser;

    }
    else // IF WRONG PASS OR EMAIL OR BOTH...
    {
        //echo 'existe = '.$existe.'<br>'.'/passUserOriginalCoded = '.$passUserRandomNow;	
        $myUser = $newUser->makeUserJsonForLogInError();
        //echo $myUser;

    }

