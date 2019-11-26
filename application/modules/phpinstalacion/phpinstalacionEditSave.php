<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	


    startConnectionDB();

    if( 
    sanityCheckScapeByReference($_POST['myuserid'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['instaid'], 'string', 20)        
    )
    {
        $myuserid = $_POST['myuserid'];
        $instaid= $_POST["instaid"];
        $instaname = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instaname']));
        $instaaddress = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instaaddress']));
        $instacity = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instacity']));
        $instazip = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instazip']));
        $instanotas = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instanotas']));
        $instamaterial = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instamaterial']));

    }
    else
    {
        exit();
    }	
    
    
    

    echo 'instaid= '.$instaid.'<br>';

    $sql="UPDATE poorbuk_insta_table SET userid='".$myuserid."',
    instaname='".$instaname."',instaaddress='".$instaaddress."',instacity='".$instacity."',instazip='".$instazip."',instanotas='".$instanotas."',
    instamaterial='".$instamaterial."' WHERE instaid='".$instaid."' LIMIT 1";	

    if (!$meter = @mysql_query($sql)) 
    {
        echo "Error UPDATE.\n";
            echo $sql.'  RESULT = '.$meter;
        exit;
    }


?>

<script>
    window.top.setStatus("Finished", "divLoadingStatus");	
    var poorbuk_Path_Htttp_Global = localStorage["poorbook.poorbuk_Path_Htttp_Global"];
    window.top.location.assign( poorbuk_Path_Htttp_Global +"instalacionshowone.php");
</script> 


