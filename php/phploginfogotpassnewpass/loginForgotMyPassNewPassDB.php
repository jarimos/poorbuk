<?php 
    include('../../application/modules/phpgeneral/headercheck.php'); 	
    	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
    //$con = startConnectionDB();


    //CHECK FOR TYPE,LENGHT AND EMPTY STRINGS	
    if( sanityCheckScapeByReference($_POST['mail'], 'string', 50) && 
        sanityCheckScapeByReference($_POST['passforgotemporal'], 'string', 150) && 
        sanityCheckScapeByReference($_POST['pass'], 'string', 150))
    {
        $mail = $_POST['mail'];
        $passUserOriginalBeforeCoded = $_POST['pass'];
        $passForgotTemporal = $_POST['passforgotemporal'];
    }
    else
    {
        //echo 'Username is not set';
        exit();
    }	
    $ip = $_SERVER['REMOTE_ADDR'];
    $ip = mysqli_real_escape_string_jarim_ByReference($ip);   
    
    
    //CLASS USER OBJECT
    $newUser = new User;
    

    $myStatus = JSON_ERROR_POORBUK;  
    
    //CODE THE PASS INSERTED BY USER
    $passUserOriginalCoded = sha1($passUserOriginalBeforeCoded);

    
    
/*TESTING PURPOSES
PATH=   http://www.poorbuk.com/plugintest01/wp-content/plugins/poorbuk/includes/poorbuk/iniciarsesionolvidepassnewpass.php?a=N7TrbR1hThS1w5palO0KccHYQkScJqehUG764niqTWYd50wgtJfZvotkUTPO7gQU3KKVS4R7m9NymQwzy7W04PdTvXgKHWkpWCHdQoyIlqFvKnF4uDv4RE4ZSGbVQlQpFQ9zwc8OuumRNCaTY1hs2s
*/
//   $passTesting = "N7TrbR1hThS1w5palO0KccHYQkScJqehUG764niqTWYd50wgtJfZvotkUTPO7gQU3KKVS4R7m9NymQwzy7W04PdTvXgKHWkpWCHdQoyIlqFvKnF4uDv4RE4ZSGbVQlQpFQ9zwc8OuumRNCaTY1hs2s";
//   $password_Update = $newUser->password_Update($passUserOriginalBeforeCoded,$passTesting,$mail);

 /*END TESTING PURPOSES*/
   
    
    
    
    //GENERATE NEW SESSION PASS
    $passUserRandomNow = $newUser->genRandomStringLogin();

    //CHECK IF USER WITH THIS TEMPORAL PASS EXISTS
    $checkIf_RandomSessionPass_for_Mail_Exists = $newUser->checkIf_RandomSessionPass_for_Mail_Exists($passForgotTemporal,$mail);
    if($checkIf_RandomSessionPass_for_Mail_Exists)
    {
        //UPDATE USER WITH THE NEW PASSWORD
        $password_Update_Temporal_Pass = $newUser->password_Update_Temporal_Pass($passUserOriginalCoded,$passUserRandomNow,$passForgotTemporal,$mail);

        //ECHO JSON
        if($password_Update_Temporal_Pass)
        {
            //LOG IN TO INITIALIZATE ALL USER PARAMETERS FOR JSON INSIDE USER_CLASS
            $login = $newUser->login($mail,$passUserOriginalCoded,$ip,$passUserRandomNow,$passUserOriginalBeforeCoded);
            
            if($login)
            {
                //ECHO OF JSON HAPPENS INSIDE THE USER_CLASS
                $myUser = $newUser->makeUserJsonForLogIn();
            }

        }

        

    }

	
