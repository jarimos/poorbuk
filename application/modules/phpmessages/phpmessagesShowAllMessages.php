<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	$myusernow=$_GET["myusernow"];
	$myuserlanguage=$_GET["myuserlanguage"];

	

	$myMessageToArrayAvoidRepeating="";
	echo '<table id="tableShowMessages" >';
	
	
	$sqlShowConversation="
	SELECT * FROM poorbuk_messageindex_table mi
	LEFT JOIN poorbuk_message_table m
	ON m.messageid = mi.messageid
	LEFT JOIN poorbuk_user_table u
	ON u.userid = m.fromid
	WHERE mi.userid = $myusernow ORDER BY mi.messageid DESC";
	//echo $sqlShowConversation;
	$resultusermyPrivateMessages = mysql_query($sqlShowConversation);
	while ($rowPrivateMessages = mysql_fetch_array($resultusermyPrivateMessages))
	{
		//GET DATA INTO VARIABLES FROM DATABASE
		$messagefromname = $rowPrivateMessages{'username'};
		$messagefromphoto = $rowPrivateMessages{'userphoto'};
		$messaggetoid = $rowPrivateMessages{'toid'};
		$messagetoname = $rowPrivateMessages{'toname'};
		$message = $rowPrivateMessages{'messagetext'};	
		$messagedate = $rowPrivateMessages{'messagedate'};
		$messageid = $rowPrivateMessages{'messageid'};		
		$seencolor = $rowPrivateMessages{'seencolor'};	

		
		//AVOID REPEATING
		$myMessageToArrayAvoidRepeating =$myMessageToArrayAvoidRepeating.'-'.$messaggetoid; 
		$myString = $myMessageToArrayAvoidRepeating;
		$myStringToSearch  = $messaggetoid; 
		if ($myString!="")
		{
			//IF substr_count > 1 THAT MEAND THAT THE ID IS MORE THAN ONCE, THEN AVOID REPEATING 
			if ((substr_count($myString, $myStringToSearch))>1)
			{
			}
			else
			{
			
			
				
				/*******MODULO TO REPLACE THE DATE WITH TODAY OR YESTERDAY IF IT MATCH***********/	
				POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/dateCheckerTodayYesterday.php';	

				$backcolorunread= $seencolor;

				
				
				/*****************************/

				echo "<tr >";
				echo "<td class='tdFirstNotificationsPost' style='background-color:".$backcolorunread.";'>";
				echo 
				'<button class="buttonSeeConversation" value="'.$messaggetoid.'">
				<div  class="divUserNamePlusPhotoMessages"><img src="'.$messagefromphoto.'" class="imgUserPhotoMessages" /></div >';
				
				 echo "<div  class='labelNotificationTeaser'>".$message."</div>
				 <div  class='labelNotificationFromName'>".$messagetoname."</div >

				
				<div class='labelDateMessages'>".$messagedate."</div>
				</button>
				";

					
				echo "</tr>";	

			}//if (in_array($messaggetoid, $myMessageToArrayAvoidRepeating)) 
		}
	}//END WHILE while ($rowPrivateMessages = mysql_fetch_array($resultusermyPrivateMessages))
	
	echo "</table>";



	
?>


