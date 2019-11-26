<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		

	startConnectionDB();


	if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) && 
            sanityCheckScapeByReference($_POST['q'], 'string', 100) )
	{
            $myuserid2=$_POST["myusernow"];
            $instalacionGuess = $_POST["q"] ;
	}
        else
	{
            exit();
	}	

	
	$usercounter=0;

	
	$sql="SELECT *
	FROM poorbuk_insta_table 
	WHERE instaname LIKE '".$instalacionGuess."%'  COLLATE utf8_spanish2_ci ORDER BY instaname ASC";
	$result = @mysql_query($sql);


	while($row = mysql_fetch_array($result))
	{
		
            $usercounter=$usercounter+1;
            if ($usercounter==1)
            {

            }

            echo 
            '
            <div class="divFinderInstallation" >
                <button class="buttonInstallationShow buttonFinderInstallation"  value="'.$row{'instaid'}.'" >
                    <div class="divUserNameFriend">'. $row['instaname'].'</div>
                </button>
            </div>';

	}//END WHILE USERS FOUNDED 
	
	
	
	
	if ($usercounter==0)
	{
            echo '<div id="labelTheUserNoExist">Esta instalación no existe<div>';
	}
	else
	{
            echo "</table>";
	}


