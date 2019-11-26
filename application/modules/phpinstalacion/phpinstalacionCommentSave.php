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
        $instacommentconclusion = mysqli_real_escape_string_jarim_ByReference($_POST['textAreaInstaComConclusion']);
        $instacommentmaterial = mysqli_real_escape_string_jarim_ByReference($_POST['textAreaInstaComMaterial']);
        $instacommentresume = mysqli_real_escape_string_jarim_ByReference($_POST['textAreaInstaComResumen']);
        $instacommentworkers = mysqli_real_escape_string_jarim_ByReference($_POST['inputInstaComCurrantes']);
    }
    else
    {
        exit();
    }	
    


    $sql="INSERT INTO poorbuk_instacomment_table 
    (instacommentconclusion,instacommentmaterial,instacommentresume,instacommentworkers,instaid,userid)
    values
    ('$instacommentconclusion','$instacommentmaterial','$instacommentresume','$instacommentworkers','$instaid','$userid')";

     if (!$meter = @mysql_query($sql)) {
        echo "Error INSERT.\n";
            echo $sql.'  RESULT = '.$meter;
        exit;
    };

?>

<script>
    window.top.setStatus("Finished", "divLoadingStatus");
    var poorbuk_Path_Htttp_Global = localStorage["poorbook.poorbuk_Path_Htttp_Global"];
    window.top.location.assign( poorbuk_Path_Htttp_Global +"instalacionshowone.php");       
</script> 


