<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	$myusernow=$_GET["myusernow"];
	$myuserlanguage=$_GET["myuserlanguage"];

	

	$myMessageToArrayAvoidRepeating="";

	$counterNewMessages=0;
	
	$sqlShowConversation="
	SELECT * FROM poorbuk_messageindex_table mi
	LEFT JOIN poorbuk_message_table m
	ON m.messageid = mi.messageid
	LEFT JOIN poorbuk_user_table u
	ON u.userid = m.fromid
	WHERE mi.userid = $myusernow AND seencolor='yellow' ORDER BY mi.messageid DESC";
	//echo $sqlShowConversation;
	$resultusermyPrivateMessages = mysql_query($sqlShowConversation);
	while ($rowPrivateMessages = mysql_fetch_array($resultusermyPrivateMessages))
	{
		$counterNewMessages=$counterNewMessages+1;
		if ($counterNewMessages==1)
		{
			echo '<table id="tableShowMessages" >';
		}
		//GET DATA INTO VARIABLES FROM DATABASE
		$messagefromname = $rowPrivateMessages{'username'};
		$messagefromphoto = $rowPrivateMessages{'userphoto'};
		$messaggetoid = $rowPrivateMessages{'toid'};
		$messagetoname = $rowPrivateMessages{'toname'};
		$message = $rowPrivateMessages{'messagetext'};	
		$messagedate = $rowPrivateMessages{'messagedate'};
		$messageid = $rowPrivateMessages{'messageid'};		
		$seencolor = $rowPrivateMessages{'seencolor'};	

		$myMessageToArrayAvoidRepeating =$myMessageToArrayAvoidRepeating.'-'.$messaggetoid; 
		

		$myString = $myMessageToArrayAvoidRepeating;
		$myStringToSearch  = $messaggetoid; 
		//echo '<br> string = '.$myString.' substring = '.$myStringToSearch;
		if ($myString!="")
		{
			if ((substr_count($myString, $myStringToSearch))>1)
			{
			}
			else
			{
			
			
				
				/*******MODULO TO REPLACE THE DATE WITH TODAY OR YESTERDAY IF IT MATCH***********/	
				POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/dateCheckerTodayYesterday.php';	

				$backcolorunread= $seencolor;

				
				
	


		echo "<tr >";
		echo "<td class='tdFirstNotificationsPost' >";//style='background-color:'".$backcolorunread."';
		echo 
		'<button class="buttonSeeConversation" value="'.$messaggetoid.'">
		<div  class="divUserNamePlusPhotoMessages"><img src="'.$messagefromphoto.'" class="imgUserPhotoMessages" /></div >';
		
		 echo "<div  class='labelNotificationTeaser'>".$message."</div>
		 <div  class='labelNotificationFromName'>".$messagefromname."</div >

		
		<div class='labelDateMessages'>".$messagedate."</div>
		</button>
		";

			
		echo "</tr>";				
				
	
			}//if (in_array($messaggetoid, $myMessageToArrayAvoidRepeating)) 
		}
	}//END WHILE while ($rowPrivateMessages = mysql_fetch_array($resultusermyPrivateMessages))
	


	if ($counterNewMessages==0)
	{
		/*$hello='hello';
		$myObjectNewMessages = '{'.
		'"hello":"'.$hello.'" ,'.	
		'"status":"nonewmessages"'.
		'}';
		
		echo $myObjectNewMessages;*/
	
	
	}
	else
	{
		echo "</table>";
	}

	
?>


