<?php
/***********CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/
$myString = strtolower($_SERVER['HTTP_REFERER']);
$myStringToSearch  = strtolower($_SERVER['HTTP_HOST'].'/poorbuk/');
if (!(substr_count($myString, $myStringToSearch))){exit;}
/***********END CHECK HTTP_REFERER COMES FROM YOUR SITE $_SERVER['HTTP_HOST'].'/poorbuk/'*************************/





	require_once(POORBUK_PATH_ABSOLUTE_PHP.'/phpopendbMYSQLI/loginregisteropendb.php');
	//The require_once statement is identical to require except PHP will check if the 
	//file has already been included, and if so, not include (require) it again.
	startConnectionDB();

	/**********************************************************************************/
	//mysql_query ("SET NAMES 'utf8_spanish_ci'");
/*if (!mysql_set_charset('latin1',$con)) {
    echo "Error: Unable to set the character set.\n";
    exit;
}
$charset = mysql_client_encoding($con);

echo $charset.'<br><br><br>';

$sql='INSERT INTO poorbuk_user_table (username) values ("cola"),("chavo"),("cala"),("chilla"),("cella"),("nem")';
 if (!$meter = @mysql_query($sql)) {
    echo "Error INSERT.\n";
    exit;
};

	//$return_value="";
	$query = @mysql_query("SELECT * FROM poorbuk_user_table ORDER BY username");
	while ($row = mysql_fetch_array($query)) {
    echo $row['username'].'<br><br>';

}*/
	/**********************************************************************************/
	/*$mail = strip_tags($_POST['mail']);
	$passUserOriginalCoded = strip_tags($_POST['pass']);
	$userid = strip_tags($_POST['userid']);
	$other = strip_tags($_POST['other']);
	$passUserRandomNow = sha1($passUserOriginalCoded);*/
/* Print current character set */
//$charset = mysqli_character_set_name($mysqli);

if (!$mysqli->query("SET NAMES 'utf8'")) {
    printf("Error SET NAMES utf8: %s\n", $mysqli->error);
} else {
    printf("Current character set: %s\n", $mysqli->character_set_name());
}


   
//SET CHARSET
if (!$mysqli->set_charset("utf8")) {
    printf("Error set_charset utf8: %s\n", $mysqli->error);
} else {
    printf("Current character set: %s\n", $mysqli->character_set_name());
}

//GET CHARSET
/*
$charset = $mysqli->character_set_name();
echo '<br><br>CURRENT CHAR SET: <BR><br>'.$charset.'<br><br>';
*/
/********************************************************************************************/
















ECHO '<br><br>*********************************ACCESSING METADATA...WE GIV THEM AN ALIAS*******************************************************<BR>';
	$stmt = $mysqli->prepare("SELECT 1 AS _one, 'Hello' AS _two FROM DUAL");
	$stmt->execute();
	/*$res = $stmt->result_metadata();
	/*var_dump($res->fetch_fields());*/
if (!($res = $stmt->get_result())) {
    //echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
}
else
{	
	while($row = mysqli_fetch_array($res))
  {
  echo '_one= '.$row['_one'] . "<BR>_two= " . $row['_two'];
  echo "<br>";
  }	
 }
	$res->free();
	$stmt->close();
       //$stmt->free();	
/*****TIME TESTER*******************/
$start=microtime('get_as_float');
/*****SOMETHING TO TEST HERE*******************/


/*****END SOMETHING TO TEST HERE*******************/
$end=microtime('get_as_float');
$total=$end-$start;
echo 'end-start = '.$total.'<br>';
/*****END TIME TESTER*******************/
/************************************************************************************/
//order by
//$result = mysqli_query($con,"SELECT * FROM Persons ORDER BY age");
//UPDATE
//mysqli_query($con,"UPDATE Persons SET Age=36 WHERE FirstName='Peter' AND LastName='Griffin'");
//DELETE
//mysqli_query($con,"DELETE FROM Persons WHERE LastName='Griffin'");
/************************************************************************************/	
/*****TIME TESTER*******************/
$start=microtime('get_as_float');
/*****SOMETHING TO TEST HERE*******************/
//NON PREPARED STATEMENTS: ATTENTION: WE USE $mysqli FROM THE CONECTION mysqli_query($mysqli,"SELECT * FROM poorbuk_user_table")
echo 'NON PREPARED STATEMENTS';
//$mySQLvariable1="SELECT * FROM poorbuk_user_table";
$result = mysqli_query($mysqli,"SELECT * FROM poorbuk_user_table");
echo '<br>***NON PREPARED STATMENTS SELECT ROWS BY COLUMN NAME mysqli_fetch_array($res) **************************************************************************<br>';

while($row = mysqli_fetch_array($result))
  {
  echo $row['userid'] . " " . $row['username'];
  echo "<br>";
  }	
/**********************************************************************************/	
	/*****END SOMETHING TO TEST HERE*******************/
$end=microtime('get_as_float');
$total=$end-$start;
echo 'end-start = '.$total.'<br>';
/*****END TIME TESTER*******************/


/*****TIME TESTER*******************/
$start=microtime('get_as_float');
/*****SOMETHING TO TEST HERE*******************/

//PREPARED STATMENTS
//1 PREPARE $stmt = $mysqli->prepare("SELECT * FROM poorbuk_user_table ")
//2 EXECUTE stmt->execute()
//3 STORE $res = $stmt->get_result()
//4 DISPLAY while($row = mysqli_fetch_array($res))
// {
// echo 'USER-ID= '.$row['userid'] . "<BR>USER-NAME= " . $row['username'];
// echo "<br>";
// }	
//5 FOR REUSE GO BACK TO STEP 2 EXECUTE stmt->execute() AND SO ON....  
//6 CLOSE WHEN YOU ARE FINISHED IS A GOOD PRACTICE  $res->close();
if (!($stmt = $mysqli->prepare("SELECT * FROM poorbuk_user_table "))) {//WHERE userid=$userid
    //echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!$stmt->execute()) {
     //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!($res = $stmt->get_result())) {
    //echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
}
else
{
//SHOW SELECTED ROWS

//PREPARED STATMENTS SELECT ROWS BY COLUMN NAME mysqli_fetch_array($res) 
echo '<br>***PREPARED STATMENTS SELECT ROWS BY COLUMN NAME mysqli_fetch_array($res) **************************************************************************<br>';
while($row = mysqli_fetch_array($res))
  {
  echo 'USER-ID= '.$row['userid'] . "<BR>USER-NAME= " . $row['username'];
  echo "<br>";
  }	
echo '<br>****PREPARED STATMENTS SELECT ROWS BY ROW INDEX (NUMBER) mysqli_fetch_array($res) *****************************************<br>';
/*****END SOMETHING TO TEST HERE*******************/
$end=microtime('get_as_float');
$total=$end-$start;
echo 'end-start = '.$total.'<br>';


if (!$stmt->execute()) {
     //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!($res = $stmt->get_result())) {
    //echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
}
//PREPARED STATMENTS SELECT ROWS BY ROW INDEX (NUMBER) mysqli_fetch_array($res) 
while ($row=mysqli_fetch_row($res))
    {
		//printf ("%s (%s)\n",$row[0],$row[1]);
		echo $row[0].'<br>';
    }
	//show all DATA + TYPE
	//var_dump($res->fetch_all());
	//NUMBER OF ROWS RETURNED
	printf("Select returned %d rows.\n", $res->num_rows);


}

echo '<br>***PREPARED STATMENTS SELECT ROWS BY COLUMN NAME $res->fetch_assoc(); **************************************************************************<br>';
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

printf("id = %s (%s)\n", $row['userid'], gettype($row['userid']));
printf("label = %s (%s)\n", $row['userfolder'], gettype($row['userfolder']));

echo '<br>***PREPARED STATMENTS SELECT ALL fetch_all() **************************************************************************<br>';


if (!$stmt->execute()) {
     echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!($res = $stmt->get_result())) {
    echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
}

var_dump($res->fetch_all());

echo '<br>***PREPARED STATMENTS SELECT BY ROW ALL ROWS LOOPPED ALL fetch_all() $res->data_seek($row_no);
    var_dump($res->fetch_assoc());**************************************************************************<br>';


if (!$stmt->execute()) {
     echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!($res = $stmt->get_result())) {
    echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
}

for ($row_no = ($res->num_rows - 1); $row_no >= 0; $row_no--) {
    $res->data_seek($row_no);
    var_dump($res->fetch_assoc());
	echo '<br><br>';
}
	echo '<br><br>';	echo '<br><br>';
		echo '***************************************************************************************************************<br>';
/******************************************************************************************************************/

//CREATE PROCEDURE InsertUser4(username varchar(50),passUserOriginalCoded varchar(50),passUserOriginalCoded varchar(50),usermail varchar(50), OUT Ident INT )
echo '<BR>*****************STORED PROCEDURE INSERT AND GET ID*************************<BR>';
if (!$mysqli->query("SET @Ident = ''") || !$mysqli->query("CALL InsertUser4('u','u','u','u',@Ident)")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if (!($res = $mysqli->query("SELECT @Ident as _p_out"))) {
    echo "Fetch failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$row = $res->fetch_assoc();
echo $row['_p_out'];


/**********************************************************/
echo '<BR>*****************STORED PROCEDURE MULTIPLE SELECT: <BR>
SELECT1= ID; <BR>
SELECT2= ID+1 (IT GIVES THE ID+1: THIS IS IF ID=1, THEN GIVES 2, IF ID=45, GIVES 46, ETC.)*************************<BR>';

//CREATE MULTISELECT PROCEDURE(DELETE IF ALLREADY EXIST)
if (!$mysqli->query("DROP PROCEDURE IF EXISTS selectMultiplepoorbuk") ||
    !$mysqli->query('CREATE PROCEDURE selectMultiplepoorbuk() READS SQL DATA BEGIN SELECT userid FROM poorbuk_user_table; SELECT userid + 1 FROM poorbuk_user_table; END;')) {
    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

//CALL USING multi_query
if (!$mysqli->multi_query("CALL selectMultiplepoorbuk()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

//LOOP ALL THE QUERIES ONE BY ONE AND PRINT SEPARATOR printf("<BR><BR>---\n"); BETWEEN THEM
echo '<BR>****STORED PROCEDURE MULTIPLE SELECT: LOOP ALL THE QUERIES ONE BY ONE var_dump($res->fetch_all()); <BR>';
do {
    if ($res = $mysqli->store_result()) {
        printf("<BR><BR>---<BR><BR>");
        var_dump($res->fetch_all());

        $res->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());


echo '<BR>****STORED PROCEDURE MULTIPLE SELECT: LOOP ALL THE QUERIES ROW BY ROW var_dump($res->fetch_assoc());';

//CALL USING multi_query
if (!$mysqli->multi_query("CALL selectMultiplepoorbuk()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
//LOOP ALL THE QUERIES ONE BY ONE AND PRINT ROWS printf("<BR><BR>---\n"); BETWEEN THEM
do {
    if ($res = $mysqli->store_result()) {
        printf("<BR><BR>---<BR><BR>");
	/*while($row = mysqli_fetch_array($res))
		  {
		  echo 'USER-ID= '.$row['userid'];
		  echo "<br>";
		  }	
*/

	for ($row_no = ($res->num_rows - 1); $row_no >= 0; $row_no--)
	{
		$res->data_seek($row_no);
		var_dump($res->fetch_assoc());
		echo '<br><br>';
	}
        $res->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());


echo '<BR>****STORED PROCEDURE MULTIPLE SELECT: LOOP ALL THE QUERIES ROW BY ROW BY ROW THE FIRST COLUMN $row[0] mysqli_fetch_row; CLEAN RESULT';

//CALL USING multi_query
if (!$mysqli->multi_query("CALL selectMultiplepoorbuk()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
//LOOP ALL THE QUERIES ONE BY ONE AND PRINT ROWS printf("<BR><BR>---\n"); BETWEEN THEM
do {
    if ($res = $mysqli->store_result()) {
        printf("<BR><BR>---<BR><BR>");

	while ($row=mysqli_fetch_row($res))
		{
			echo $row[0].'<br>';
		}
        $res->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());


echo '<BR>*****************STORED PROCEDURE MULTIPLE SELECT AND ALIAS mysqli_fetch_array($res); echo "USER-ID= ".$row["userid"];<BR>
NOTE: WHEN YOU HAVE AND OUTPUT RESULT AS ID+1 YOU HAVE TO GIVE THE RESULT AN ALIAS.
OTHERWISE YOU HAVE TO CHOOSE IT BY ROW NUMBER. IN THIS EXAMPLE WE GAVE
AN ALIAS TO userid + 1 HERE<BR>
userid + 1 as userid <BR>
THATS WHY IT IS SHOWED WHEN WE ECHO $row["userid"]...<BR>
SELECT1= ID; <BR>
SELECT2= ID+1 (IT GIVES THE ID+1: THIS IS IF ID=1, THEN GIVES 2, IF ID=45, GIVES 46, ETC.)*************************<BR>';

//CREATE MULTISELECT PROCEDURE(DELETE IF ALLREADY EXIST)
if (!$mysqli->query("DROP PROCEDURE IF EXISTS selectMultiplepoorbukwithResultAsAlias") ||
    !$mysqli->query('CREATE PROCEDURE selectMultiplepoorbukwithResultAsAlias() READS SQL DATA BEGIN SELECT userid FROM poorbuk_user_table; SELECT userid + 1 as userid FROM poorbuk_user_table; END;')) {
    echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

//CALL USING multi_query
if (!$mysqli->multi_query("CALL selectMultiplepoorbukwithResultAsAlias()")) {
    echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

//LOOP ALL THE QUERIES ONE BY ONE AND PRINT ROWS printf("<BR><BR>---\n"); BETWEEN THEM
do {
    if ($res = $mysqli->store_result()) {
        printf("<BR><BR>---<BR><BR>");
	while($row = mysqli_fetch_array($res))
		  {
		  echo 'USER-ID= '.$row['userid'];
		  echo "<br>";
		  }	


        $res->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());



echo '<BR>****MULTIPLE QUERY: LOOP ALL THE QUERIES ROW BY ROW BY ROW THE FIRST COLUMN $row[0] $row=mysqli_fetch_row($res); CLEAN RESULT
<BR><BR>SHOWS QUERY1 = USER ID, QUERY2 = USERNAME, QUERY3 = USERFOLDER
<BR><BR>ALL THREE QUERIES EXECUTED FROM A SINGLE CALL TO MULTIQUERY ';

$sql = "SELECT userid FROM poorbuk_user_table; ";
$sql.= "SELECT username FROM poorbuk_user_table; ";
$sql.= "SELECT userfolder FROM poorbuk_user_table; ";

if (!$mysqli->multi_query($sql)) {
    echo "Multi query failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

do {
	printf("<BR><BR>---<BR><BR>");
  if ($res = $mysqli->store_result()) {
/*	SHOW CLEAN ROWS */
	while ($row=mysqli_fetch_row($res))
		{
			echo $row[0].'<br>';
		}
        $res->free();
    }
/*	SHOW ROWS BUT NOT CLEAN

for ($row_no = ($res->num_rows - 1); $row_no >= 0; $row_no--)
	{
		$res->data_seek($row_no);
		var_dump($res->fetch_assoc());
		echo '<br><br>';
	}
*/
/*  SHOW THE WHOLE
  if ($res = $mysqli->store_result()) {
        var_dump($res->fetch_all(MYSQLI_ASSOC));
        $res->free();
    }
*/
    } while ($mysqli->more_results() && $mysqli->next_result());
//END LOOP ALL THE QUERIES ONE BY ONE AND PRINT SEPARATOR BETWEEN THEM


/* show all DATA + TYPE as ROWS results
for ($row_no = ($res->num_rows - 1); $row_no >= 0; $row_no--) {
    $res->data_seek($row_no);
    var_dump($res->fetch_assoc());
}
// Free result FROM MEMORY
//mysqli_free_result($res);
//OR MAY BE INVESTIGATE ALSO
//$res->close();

*/

/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 10 is a good baseline, and more is good if your servers
 * are fast enough.
 */
//CLOSE RESPONSE TO REUSE (AND MAYBE FREE MEMORY...)
    //$res->close();
    //$mysqli->next_result();
?>