<?php
    include('../../application/modules/phpgeneral/headercheck.php'); 	
    	
	


    //CHECK FOR TYPE,LENGHT AND EMPTY STRINGS	
    if( sanityCheckScapeByReference($_POST['mail'], 'string', 50) && 
        sanityCheckScapeByReference($_POST['passoriginal'], 'string', 150))
    {
        $mail = $_POST['mail'];
        $passUserOriginalBeforeCoded = $_POST['passoriginal'];

    }
    else
    {
        //echo 'Username is not set';
        exit();
    }	
        

	
    //send email
    $adminmail= 'admin@poorbuk.com';
    $subject = 'poorbuk: your username and pass' ;
    $message ="Wellcome to poorbuk \n\r
    Username =".$mail."\n\r
    Pass = ".$passUserOriginalBeforeCoded;


    //the first adress is the adress the mail will be sent. The question is: who is sent to? user or admin?
    $testmail = mail($mail, $subject,$message, "From:" .$adminmail);
    echo "testmail = $testmail";


