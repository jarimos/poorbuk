<?php
//header('Location: http://localhost/poorbuk/index.php?page=profile');
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FileUploadClass.php');
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/ProfileClass.php');


if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20)&&
    sanityCheckScapeByReference($_POST['userfolder'], 'string', 20))
{
    $userfolder = $_POST['userfolder'];	
    $userid= $_POST["myuserid"];
}
else
{
    exit();
}

$oldpass = mysqli_real_escape_string_jarim_ByReference($_POST['oldpass']);
$myuserpass = mysqli_real_escape_string_jarim_ByReference($_POST['pass']);
$user = mysqli_real_escape_string_jarim_ByReference($_POST['myusername']);
$language = mysqli_real_escape_string_jarim_ByReference($_POST['language']);
$day = mysqli_real_escape_string_jarim_ByReference($_POST['day']);
$month = mysqli_real_escape_string_jarim_ByReference($_POST['month']);
$year = mysqli_real_escape_string_jarim_ByReference($_POST['year']);
$mydescription = mysqli_real_escape_string_jarim_ByReference(trim($_POST['textAreaDescription']));
$myuserbirthday =$year."/".$month."/".$day;
$myusername = $user;


//UPLOAD PICTURE IF EXISTS FILE
if (isset ($_FILES['myfile'])) 
{
    $file=$_FILES['myfile'];
    $FileUploadClass = new FileUploadClass;
    $NewImageUploaded = $FileUploadClass->UploadImage($userfolder,$file);
}


//echo $rezultat;	
echo 'NewImageUploaded = '.$NewImageUploaded.'<br>';
$myuserphoto =$NewImageUploaded;//$NewImageUploaded;

$newProfile = new Profile;
$profileUpdate = $newProfile->profileUpdate($userid,$myusername,$myuserbirthday,$mydescription,$language,$myuserphoto);
//UPDATE ALL THE FIELDS



?>

<script>
    //alert ( localStorage["poorbook.myuserphoto"]);
    var myuserphoto = '<?php echo $myuserphoto;?>';
    
    var n = myuserphoto.length;
    //alert ( "lenght  myuserphoto= "+ n);  
    if (n!=0) 
    {
        localStorage["poorbook.myuserphoto"] = myuserphoto; 
    } 
    //alert ("After php " + localStorage["poorbook.myuserphoto"]);   
    window.top.setStatus("Finished", "divLoadingStatus");	
    //var poorbuk_Path_Htttp_Global = localStorage["poorbook.poorbuk_Path_Htttp_Global"];
    //var pathProfile = poorbuk_Path_Htttp_Global +"index?page=profile";
    //alert (pathProfile);
    //WORKS FINE
    window.top.location.assign( "http://localhost/poorbuk/index.php?page=profile");
    // DOES NOT WORK window.top.location.assign( pathProfile);
    //DOES NOT WORK location.replace("http://localhost/poorbuk/index.php?page=profile");
</script>  
