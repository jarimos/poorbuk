<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
    startConnectionDB();


    if(
    sanityCheckScapeByReference($_POST['oldpass'], 'string', 150) && 
    sanityCheckScapeByReference($_POST['myuserid'], 'string', 20) 
    )
    {
        $oldpass = $_POST['oldpass'];     
        $myuserid= $_POST["myuserid"];       
    }
    else
    {
        exit();
    } 



     


    $UserClass = new User;
    $status = $UserClass->password_verification_by_UserId($myuserid,$oldpass);

   
    echo $status;

