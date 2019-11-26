<?php
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	startConnectionDB();

	$myusernow=$_GET["myusernow"];
	$myuserlanguage=$_GET["myuserlanguage"];
	$allMyFriendIdsToSendTo=$_GET["friendids"];
	

	$sqlShowConversation="
	SELECT * FROM poorbuk_message_table 
	LEFT JOIN poorbuk_user_table 
	ON userid = fromid
	WHERE toid = '$allMyFriendIdsToSendTo' ORDER BY messageid ASC";
	//echo $sqlShowConversation;
	$resultusermyPrivateMessages = mysql_query($sqlShowConversation);

	echo '<br>';
	
	echo '<table id="tableShowConversation" >';

	$counterMessages=0;
	while ($rowPrivateMessages = mysql_fetch_array($resultusermyPrivateMessages))
	{
		//GET DATA INTO VARIABLES FROM DATABASE
		$messagefromname = $rowPrivateMessages{'username'};
		$messagefromphoto = $rowPrivateMessages{'userphoto'};
		$messagefromid = $rowPrivateMessages{'fromid'};
		$messaggetoid = $rowPrivateMessages{'toid'};
		$messagetoname = $rowPrivateMessages{'toname'};
		$message = $rowPrivateMessages{'messagetext'};	
		$messagedate = $rowPrivateMessages{'messagedate'};
		$messageid = $rowPrivateMessages{'messageid'};	

				
		$resultUpdateMessageIndex = mysql_query("UPDATE poorbuk_messageindex_table SET seencolor='white' 
		WHERE userid= $myusernow  AND messageid=$messageid ");	
		
		/*******MODULO TO REPLACE THE DATE WITH TODAY OR YESTERDAY IF IT MATCH***********/	
		POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/dateCheckerTodayYesterday.php';	

			
		$backcolorunread= "white";
		
		$counterMessages=$counterMessages+1;
		if($counterMessages==1)
		{
			echo "<tr>";
			echo "

			<td class='messageTdTableShowMessages' style='background-color:".$backcolorunread.";'>
				<div  id='labelNamesToAllMessage'>Messages to: ".$messagetoname."</div >

			</td>";
			echo "</tr>";
		}
		echo "<tr>";
			echo "
		<td class='userTdTableShowMessages' style='background-color:PaleGoldenRod;'>";
		
					echo '
					<button class="mySubmitFriendProfile mySubmitFriendProfileMessages"  value="'.$messagefromid.'" >
						<div  class="divUserNamePlusPhotoMessages" >
							<img src="'.$messagefromphoto.'" class="imgUserPhotoMessages" />
						</div >

						<div  class="labelUserNameConversation"  >
							'.$messagefromname.'
						</div >
					</button>

		<div class="divMessageContent" style="clear:both;">'.$message.'</div>
		<div class="labelDateMessages">'.$messagedate.'</div>
		</td>';
		echo "</tr>";
				
	}//END WHILE while ($rowPrivateMessages = mysql_fetch_array($resultusermyPrivateMessages))
	
	echo "</table>";
?>