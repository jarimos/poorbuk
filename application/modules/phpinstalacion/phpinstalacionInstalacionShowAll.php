<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();

    if( sanityCheckScapeByReference($_POST["myusernow"], 'string', 20) )
    {
        $myuserid2=mysqli_real_escape_string_jarim_ByReference($_POST["myusernow"]);
    }
    else
    {
        exit();
    }	


    $counter=0;
    echo '	
    <div  class="labelGeneral" id="" >Todas las instalaciones</div>
    <br>
    <div class="divMyProfileAllWrapper">';

    $query = mysql_query("SELECT instaid,instaname FROM poorbuk_insta_table ORDER BY instaname COLLATE utf8_spanish2_ci  ASC");

    while ($row = mysql_fetch_array($query))
    {
        $instaid= $row{'instaid'};		
        $instaname= $row{'instaname'};
        echo 
        '
        <button class="buttonInstallationShow buttonFinderInstallation"  value="'.$row{'instaid'}.'" >
            <div class="">'. $row['instaname'].'</div>
        </button>
        ';

    }

    echo '
    </div>';




