<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();


    if (!(isset( $_POST['myuserid'] )) || $_POST['myuserid']==""){exit;}
    if (!(isset( $_POST['instaname'] )) || $_POST['instaname']==""){exit;}
    
    if( sanityCheckScapeByReference($_POST['myuserid'], 'string', 20) &&  
        sanityCheckScapeByReference($_POST['instaname'], 'string', 500))
    {
        $myuserid = $_POST['myuserid'];

        //poorbuk_insta_table
        $instaname = $_POST['instaname'];
        $instaaddress = mysqli_real_escape_string_jarim_ByReference($_POST['instaaddress']);
        $instacity = mysqli_real_escape_string_jarim_ByReference($_POST['instacity']);
        $instazip = mysqli_real_escape_string_jarim_ByReference($_POST['instazip']);
        $instanotas = mysqli_real_escape_string_jarim_ByReference($_POST['instanotas']);
        $instamaterial = mysqli_real_escape_string_jarim_ByReference($_POST['instamaterial']);

        //poorbuk_instacontact_table
        $instacontactname = mysqli_real_escape_string_jarim_ByReference($_POST['instacontactname']);
        $instacontactphone = mysqli_real_escape_string_jarim_ByReference($_POST['instacontactphone']);
    }
    else
    {
            exit();
    }
	




$sql="INSERT INTO poorbuk_insta_table 
(userid,instaname,instaaddress,instacity,instazip,instanotas,instamaterial)
values
('".$myuserid."','$instaname','$instaaddress','$instacity','$instazip','$instanotas','$instamaterial')";

 if (!$meter = @mysql_query($sql)) {
    echo "Error INSERT.\n";
	echo $sql.'  RESULT = '.$meter;
    exit;
};

	$last_id = mysql_insert_id();
	//echo $last_id;

	
if ($instacontactname!="")
{
	$sql="INSERT INTO poorbuk_instacontact_table 
	(instacontactname,instacontactphone,instaid)
	values
	('$instacontactname','$instacontactphone','$last_id')";

	 if (!$meter = @mysql_query($sql)) {
            echo "Error INSERT.\n";
            echo $sql.'  RESULT = '.$meter;
            exit;
	};
}




	$query = @mysql_query("SELECT * FROM poorbuk_insta_table ORDER BY instaid DESC");
	while ($row = mysql_fetch_array($query))
	{
            $instaid= $row{'instaid'};
            $instatimestamp= $row{'instatimestamp'};			
            $instaname= $row{'instaname'};
            $instadireccion= $row{'instaaddress'};
            $instazip= $row{'instazip'};
            $instacity= $row{'instacity'};
            $instanotas= $row{'instanotas'};
            $instamaterial= $row{'instamaterial'};
            $userid = $row{'userid'};

            echo $instaid.'<br>'.$instatimestamp.'<br>'.$instaname.'<br>'.$instadireccion.'<br>'.$instanotas.'<br>'.$instamaterial.'<br>'.$instacontactos;
		
	}
	
        if (!$query ) {

           echo '  RESULT = ERROR';
           exit;
       };



?>
<script>
    //alert('<?php echo $last_id;?>');
    localStorage["poorbook.instaid"]=('<?php echo $last_id;?>');
    window.top.setStatus("Finished", "divLoadingStatus");	
    var poorbuk_Path_Htttp_Global = localStorage["poorbook.poorbuk_Path_Htttp_Global"];
    window.top.location.assign( poorbuk_Path_Htttp_Global +"instalacionshowone.php");
</script>  

