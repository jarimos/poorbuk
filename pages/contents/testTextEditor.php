<?php


	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');

	$con = startConnectionDB();

	if (!(isset( $_POST['textEditorJarimTEST'] )) || $_POST['textEditorJarimTEST']==""){echo "JARIM NO POST textEditorJarimTEST"; exit;}	
	
	$textEditorJarimTEST = $_POST['textEditorJarimTEST'] ;
	
function executeSQL($sql)
{
	//echo '<br>'.$userid.'<br>';
	$status=true;

	if (!$result = mysql_query($sql)) 
	{
		echo "Error query showAllPostsHTML<br>";
		$result = ($result) ? 'true' : 'false';
		echo $sql.'<br>  RESULT = '.$result.'<br><br>';
		echo $result;
		$status=false;
		echo "<br>FUNCTION = ". __FUNCTION__;
		echo "<br>CLASS+METHOD = ".__METHOD__;
	}
	
	return $result;
	
	//CALL $result = $this->executeSQL($sql);
}

$sql="DELETE FROM texteditortest "; 

executeSQL($sql);


//$sql='INSERT INTO poorbuk_event_table (userid,eventfor,titel,description,eventdate,eventtime)values($userid,$eventfor,$titel,$description,$eventdate,$eventtime)';
$sql="INSERT INTO texteditortest 
(mytext)
values
('$textEditorJarimTEST')";

executeSQL($sql);



	$sql = "SELECT * FROM texteditortest";
	
	$result = executeSQL($sql);

	while ($row = mysql_fetch_array($result))
	{
		

		$mytext= $row{'mytext'};	
		echo $mytext;
	
	}	

	

		



?>