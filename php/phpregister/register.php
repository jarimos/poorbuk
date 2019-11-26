<?php 
    include('../../application/modules/phpgeneral/headercheck.php');  
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');			

    $con = startConnectionDB();

    $myStatus = JSON_ERROR_POORBUK;  
	
    //CHECK FOR TYPE,LENGHT AND EMPTY STRINGS	
    if( sanityCheckScapeByReference($_POST['mail'], 'string', 50) && 
        sanityCheckScapeByReference($_POST['pass'], 'string', 150) && 
        sanityCheckScapeByReference($_POST['name'], 'string', 30) && 
        sanityCheckScapeByReference($_POST['language'], 'string', 20))
    {
	$mail = $_POST['mail'];
	$passUserOriginalBeforeCoded = $_POST['pass'];
	$name = $_POST['name'];
	$language = $_POST['language'];
    }
    else
    {
        //echo 'Username is not set';
        exit();
    }	
    
    
    //CODE ORIGINAL USER PASS
    $passUserOriginalCoded = sha1($passUserOriginalBeforeCoded);	
    //2018
    $ip = $_SERVER['REMOTE_ADDR'];
    $ip = mysqli_real_escape_string_jarim_ByReference($ip);


    // USER CLASS Create an instance of the class
    $newUser = new User;
    //GENERATE SESSION PASS
    $passUserRandomNow = $newUser->genRandomStringLogin();


    //CHEK IF MAIL EXISTS
    $checkIfMailExists = $newUser->checkIfMailExists($mail);
    //echo '$checkIfMailExists ='.$checkIfMailExists.'<br>';

    if(!$checkIfMailExists)//THE MAIL EXIST / INSERT USER
    {

        $statusRegister = $newUser->register($mail, $passUserOriginalCoded,$ip,$passUserRandomNow,$name,$language);			
        //echo '$statusRegister ='.$statusRegister.'<br>';
        //echo $last_id;	

    }
    else//ERROR...THE USER EXISTS
    {
        echo $myStatus;
        exit;		
    }






    if($statusRegister==1)//SUCCESS REGISTERING USER
    {

        //LOGIN FOR INITIALIZE ALL USER VARIABLES and get 
        $statusLogin = $newUser->login($mail,$passUserOriginalCoded,$ip,$passUserRandomNow,$passUserOriginalBeforeCoded);	
        //echo '$statusLogin ='.$statusLogin.'<br>';	

        if($statusLogin)
        {
            $statusNewUserFolder = $newUser->registerCreateUpdateUserFolder();

            //echo '$statusNewUserFolder ='.$statusNewUserFolder.'<br>';

            if($statusNewUserFolder ==1)
            {	
                //SUCCESS
                $newUser->randomPassUpdateLogInRegister();
                $myUser = $newUser->makeUserJsonForLogIn();
                $newUser->updateUserIP();		
                //2018 ENABLE IN SERVER temporary disabled locally 
                $newUser->registerSendMail();	

            }			
            else // IF FOLDER CAN'T BE CREATED OR UPDATED
            {
                //ERROR
                echo $myStatus;
                exit;
            }

        }
        else // IF WRONG PASS OR EMAIL OR BOTH...
        {
            //ERROR
            echo $myStatus;
            exit;

        }

    }
    else
    {
        //ERROR
        echo $myStatus;
        exit;
    }
	

	
		
