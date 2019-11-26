<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();

    if( 
    sanityCheckScapeByReference($_POST['myuserid'], 'string', 20) &&
    sanityCheckScapeByReference($_POST['instaid'], 'string', 20)        
    )
    {
        $userid = $_POST['myuserid'];
        $instaid = $_POST['instaid'];
        $instacontactname = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instacontactname']));
        $instacontactphone = mysqli_real_escape_string_jarim_ByReference(trim($_POST['instacontactphone']));
    }
    else
    {
        exit();
    }	        



    $sql="INSERT INTO poorbuk_instacontact_table 
    (instacontactname,instacontactphone,instaid)
    values
    ('$instacontactname','$instacontactphone','$instaid')";

     if (!$meter = @mysql_query($sql)) {
            echo "Error INSERT.\n";
            echo $sql.'  RESULT = '.$meter;
            exit;
    };



    echo 'all done';

?>
<script>
    //alert('<?php echo $instaid;?>');
    window.top.setStatus("Finished", "divLoadingStatus");	
    var poorbuk_Path_Htttp_Global = localStorage["poorbook.poorbuk_Path_Htttp_Global"];
    window.top.location.assign( poorbuk_Path_Htttp_Global +"instalacionshowone.php");    

</script>  

