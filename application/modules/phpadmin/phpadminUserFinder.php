<?php
include ("../phpgeneral/headercheck.php");	
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
startConnectionDB();

if( 
sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
sanityCheckScapeByReference($_POST['q'], 'string', 60)        
)
{
    $myuserid2=$_POST["myusernow"];
    $myusername = $_POST["q"] ;
}
else
{
    exit();
}	

$usercounter=0;
echo '<div class="divFindFriendResultsFor">Resultados para</div>'.$myusername.'<hr>';

$sql="SELECT *
FROM poorbuk_user_table 
WHERE username LIKE '".$myusername."%'  ORDER BY username COLLATE utf8_spanish2_ci ASC";
$result = @mysql_query($sql);


while($row = mysql_fetch_array($result))
{
    $userid=$row{'userid'};
    $userphoto=$row['userphoto'];
    $username=$row['username'];
    $userroll=$row{'userroll'};
    
    $usercounter=$usercounter+1;
    if ($usercounter==1)
    {
    echo 
    "<table class='tableFriendRequestToFrontPage'>";
        }
        $myHtml="

        <tr>

            <td >
                <div id='$userid'>
                    <button class='mySubmitFriendProfile'  value='$userid' >
                        <img class='imgUserPhotoUserFinder' src='$userphoto'>
                        <div class='divUserNameFriend'>$username</div>
                    </button>
                </div>
            </td>

            <td>
                <div >$userroll<br><br>
                    <button class='phpadminButtonEditRollForUserId' id='$userroll' value='$userid' >EDITAR ROLL</button>
                </div>
            </td>


        </tr>";

        echo $myHtml;

}//END WHILE USERS FOUNDED 


if ($usercounter==0)
{
    echo '<div id="labelTheUserNoExist">El usuario no existe<div>';
}
else
{
    echo "</table>";
}




