<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();

    if( 
    sanityCheckScapeByReference($_POST['instacontactid'], 'string', 20)        
    )
    {
        $instacontactid= $_POST["instacontactid"];
    }
    else
    {
        exit();
    }	       
       
    $result = @mysql_query('DELETE FROM poorbuk_instacontact_table WHERE instacontactid="'.$instacontactid.'"');	

    if (!$result = mysql_query($sql)) 
    {
        echo "Error query<br>";
        $result = ($result) ? 'true' : 'false';
        echo $sql.'<br>  RESULT = '.$result.'<br><br>';
    }		



