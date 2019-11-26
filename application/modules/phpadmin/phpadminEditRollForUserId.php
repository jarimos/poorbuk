<?php
include ("../phpgeneral/headercheck.php");
require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
startConnectionDB();

if( 
sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) &&
sanityCheckScapeByReference($_POST['myUserRollId'], 'string', 20)        
)
{
    $myuserid2=$_POST["myusernow"];
    $myUserRollId = $_POST["myUserRollId"] ;
}
else
{
    exit();
}	        

$sql="SELECT *
FROM poorbuk_user_table 
WHERE userid='$myUserRollId' LIMIT 1";
$result = @mysql_query($sql);


$usercounter=0;
while($row = mysql_fetch_array($result))
{
    $userid=$row{'userid'};
    $userphoto=$row['userphoto'];
    $username=$row['username'];
    $userroll=$row{'userroll'};

    $usercounter=$usercounter+1;


    $myHtml="
    <table class='tableFriendRequestToFrontPage'>
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
                <div id='$userroll' class='divUserrollId'  value='$userid' >USER ROLL<br><br>$userroll</div>
            </td>
        </tr>
    </table>";

    echo $myHtml;
}//END WHILE USERS FOUNDED 


if ($usercounter==0)
{
    echo '<div id="labelTheUserNoExist">El usuario no existe<div>';
}




