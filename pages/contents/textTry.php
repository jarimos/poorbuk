<!doctype html>
<html>
<head>
  <!--NO cahing!!!!!!!!!!-->
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<!--END NO cahing!!!!!!!!!!-->

 <meta http-equiv="Content-type" content="text/html; charset=utf-8">
<LINK REL="SHORTCUT ICON" HREF="files/icononavegador/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  
  
  <title>poorbuk</title>
  <meta name="keywords" content="social network, share, social club,poorbuk" >
  <meta name="description" content="/poorbuk: is a program for sharing all (pictures, files, texts) with your friends. Its totally free. The concept is help others having fun, and all the profit (100%) will be used to help children in needs." >
  <meta name="robots" content="index, follow">
  <meta name="author" content="jarimos">
<!--  <meta name="revisit-after" content="3 days">-->
<!--<meta http-equiv="refresh" content="6000">-->
<link rel="image_src" href="screenshot/screenshot.jpg">
<!--GOOGLE-->
<link rel="author" href="https://plus.google.com/u/0/116674073346843091532">
<link rel="publisher" href="https://plus.google.com/u/0/116674073346843091532">
<!--FACEBOOK-->
<meta property="og:title" content="/poorbuk">
<meta property="og:type" content="websider">
<!--Be sure to specify a square image to ensure the best visibility in a user’s timeline.-->
<meta property="og:image" content="http://www.poorbuk.com/files/images/Logo250175BLACKlille.png">
<meta property="og:url" content="http://www.poorbuk.com/">
<meta property="og:description" content="/poorbuk: is a program for sharing all (pictures, files, texts) with your friends. Its totally free. The concept is help others having fun, and all the profit (100%) will be used to help children in needs.">
<meta property="fb:admins" content="jarim.fernandez">


 <!--<link rel="stylesheet" media="screen and (min-width:1000px) and (max-height:400px)" href="css/xtrasmall.css" >-->

  <!--END STANDADRD CSS FOR MENUS-->
  <!--DIASHOW CSS--> 
		<link rel="stylesheet" href="css/xtrasmall.css" >
		<link rel="stylesheet" type="text/css" href="css/jarim.css">
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="application/css/mystylejarim01.css">
  <!--END DIASHOW CSS-->
	  <script src="js/jquery-1.10.1.js"></script>

</head>



<body >
			


   <script type="text/javascript">
        $(document).ready(function(){

            //Check if the current URL contains '#' 
            if(document.URL.indexOf("#")==-1)
            {

                // Set the URL to whatever it was plus "#".
                url = document.URL+"#";
				//alert(url);
                location = "#";

                //Reload the page
                location.reload(true);
				
            }
			//var page= location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
			//alert(page);
			//THE PAGE STILL REMAINS poorbuk.php
        });
    </script> 




<div     class="allContentWrapperpoorbuk">



<!--------MENU------------------------------------------->
	<div  class="menuRellenoBackground" >

	<table class="tableMenuIcons" >
		<tr >




				<td  >
					<a id="menuHome" class="menuMain" href="/poorbuk.php"><img  src="files/icons/home4242icon.png"></a>

				</td>
				<td  >
					<a id="menuFriends" class="menuMain" href="friends.html"><img id="friends4242icon" src="files/icons/friends4242icon.png" ></a>

				</td>
				<td  >
					
					<a id="menuYo" class="menuMain" href="profile.php"><img src="files/icons/profileme4242icon.png"></a>

				</td>
				
				<td  >
					<a id="menuMessages" class="menuMain" href="mensajes.php"><img id="messages4242icon" src="files/icons/messages4242icon.png" ></a>

				</td>

				
		</tr>		
		<tr>
		
				<td  >
					<a id="menuNotifications" class="menuMain" href="notifications.php"><img id="notificationsblack4242icon" src=""></a>

				</td>					
				
				<td  >
					<a id="menuHelp" class="menuMain" href="help.html"><img src="files/icons/help4242icon.png"></a>

				</td>
						
				
				<td id="tdMenuInstalacion">
				</td>
				
				<td id="tdMenuAdmin">
				</td>	
				<td  >
			
					<a id="buttonLogOut" href="#"><img src="files/icons/salir4242.png"></a>
				</td>

				<td>
					<a id="menuOcultarMenu" href="#"><img src="files/icons/menuOcultarMenu.png"></a>	
				</td>
				
				
		</tr>
		
	</table>
</div>	


<div id="divMenuMostrarMenu"  >
				<a id="menuMostrarMenu" href="#"><img src="files/icons/menuMostrarMenu.png"></a>
</div >

<div class="menuHiddenRelleno" ></div>
	<script>
		$( "body" ).on( "click", ".lort", function()
		{
			var myImage='<a href="http://www.w3schools.com">Visit W3Schools.com!</a><img src="files/icons/menuMostrarMenu.png">';
			var myText=$("#myDiv").html();
			
			alert(myText);
			//mYhtml = $.parseHTML( myText);
			//alert(mYhtml);
			$("#myDiv").html(myImage+myText);
			//alert('test');
		});
	</script>
<a class="lort">Click</a>
<!--------MENU END------------------------------------------->

	<!--HIDDEN DIV TO VALIDATE IMAGE FROM POSTS-->
	<div id="myimagetovalidate" style="display:none;border:solid 2px red;" >My image to validate</div>
	
	

	<table class="tableNotificationsFrontPage">
		<tr >
			<td>
			<!--USERNAME AND DATE-->
			<!--<div class="nicefontjarim1" id="myDivStartUsernamePlusDate"> <span id="startUserName"></span><br><br>
			<span id="startDate"></span>
			</div><br>-->
			
	
			<div id="divNewFriendRequestsFrontPage">
				<div class="labelGeneral" id="labelNewMessages" style="text-align:left;">Proposiciones de amistad</div>
				<div id="divShowNewFriendRequests" class="divNotificationsScrolledGeneral" ></div>		
			</div>

			
			
			
			
			
			
			
			
			
			
			
			
			<div id="divNewMessagesAllWrapper">
				<br><br>
				<div class="labelGeneral" id="labelNewMessages" style="text-align:left;">Nuevos mensajes</div>	
				<div id="divNotificationsShowNewMessages" class="divNotificationsScrolledGeneral"></div>		
			</div>
				

				
				
				
				
				
				
				
				
				
				
				
				
				
			<!--NOTIFICATIONS / NOTIFICATIONS POSTS / MESSAGES / -->
			<!--SHOW NOTIFICATIONS-->
			<div id="divNewFollowingAllWrapper">
				<br><br>
				<div class="labelGeneral" id="labelFollowing" style="text-align:left;">Seguimiento</div>	
				<div id="divphpnotificationsPosts" class="divNotificationsScrolledGeneral"></div>
			</div>				

				

			</td>

		</tr>
	</table>
	
	
	
	
	<table class="tableNotificationsShowPostFrontPage">
		<tr >
			<td>
				
				<!--SHOW POSTS FOR NOTIFICATIONS IF PRESS BUTTON-->
				<div id="divphpnotificationsShowPostfByPostId" ></div>

			</td>

		</tr>
	</table>
	


	


	
	
	<!--TABLE POST ALL-->
	<table class="tablePostAll">




		<tr >
			<td>
				<div id="divHelpTextForTextEditor">Escribe en esta caja, sube tus fotos,documentos o <br>vídeos usando los botones y presiona "Enviar" :)</div>
				
				
				<!--*********MAIN TEXT EDITOR (myDiv) *************************************************--> 
				<div  name ="myDiv" id="myDiv" class="myDiv nicefont" contenteditable="true" style=""></div>
				<!--<div id="writeSomethingHere" style="color:grey;">Escribe aqui y presiona el botón enviar. Este texto desaparece al hacer click</div>-->
			</td>
			
		</tr>
				<tr >
			<td>
				<!--*********UPLOAD PICTURE IN IMG TAG FORM ONCHANGE UPDATE MY TEXT EDITOR  *************************************************--> 
				<div id="divLoadingStatus" >Loading...<br><img src="files/images/loader.gif" ><br></div>
				<form  id="uploadform" action="" method="post" enctype="multipart/form-data" target="uploadframe" onsubmit="">
					<div id="divFileImageAllWrapper" >
						<div class="uploadImageFileText" style=""></div><br>		 
						<img class="imgInputFileImage" src="files/icons/camera4242icon.png">Fotos
						<input style="color:white;float:left;clear:both;" type="file"  id="myfile" name="myfile" accept=".bmp,.gif,.jpg,.jpeg,.gif,.png"  onchange='mysubmit();'>
					</div>
				</form>		
				<iframe style="display:none;" id="uploadframe" name="uploadframe" src="" style ="border:2px solid red;" width="200" height="200" frameborder="0"></iframe>	
			
	
				<!--****style="display:none;"************UPLOAD FILES (OR PICS AS FILES) LIKE A TAG FORM ONCHANGE UPDATE MY TEXT EDITOR********************-->
				<form   id="uploadform2" action="" method="post" enctype="multipart/form-data" target="uploadframe2" onsubmit="">			
					<div id="divFileIFileAllWrapper" >
						<div class="uploadImageFileText"></div><br>	
						<img class="imgInputFileImage" src="files/icons/file4242icon.png">Documentos<input style="color:white;float:left;clear:both;" type="file" name="myfile2" id="myfile2"  id="myFileFileMain"   onchange='mysubmit2()'>	
					</div>
				</form>		
				<iframe  style="display:none;" id="uploadframe2" name="uploadframe2" src="" width="200" height="200" frameborder="0" ></iframe>
			</td>	
		</tr>
		<tr >
			<td>
				<!--*********SUBMIT BUTTON TEXT EDITOR (myDiv) TO DATABASE *************************************************--> 
				<button  id="mySubmitPost" class="mySubmitButton myButtonAll">Enviar</button>
			</td>

		</tr>
		<tr >
			<td>
			<!--*********UPLOADED FILES, PICS IN NORMAL DIV UNTIL SUBMITTED *************************************************--> 
				<br>
				<button  id="buttonDeleteFiles"  class="">Borrar archivos</button>
				<div id="mydivNow" style=""></div>
			</td>

		</tr>
		<tr >
			<td>
				<!--*****************************SHOW NEW POSTS ADDED*******************************************************-->	
				<div id = "divHttpRequestPostFrontPage"></div>
				<!--*****************************SHOW ALL DATABASE POST***************************************************-->
				<div id="httpShowPostFromStartjsAndmyTextEditorDBShowPostphp"></div>
			</td>

		</tr>

	</table>
		
		

		 

	 	

</div> <!--<div class="allContentWrapper">-->





<!--***********************END FRONT CONTENT*******************************************-->  




<!--***********************SCRIPTS*******************************************-->  

	<!--***GENERAL SCRIPTS********************************************-->
	

	<!--***SET STATUS phpgeneral********************************************-->
	<script type="text/javascript" src="/application/modules/phpgeneral/scripts/setStatus.js"></script>	
	<!--***MESSAGES phpgeneral********************************************-->
	<script type="text/javascript" src="/application/modules/phpgeneral/scripts/messagesWriteNewMessage.js"></script>	
	<!--***VALIDATION js/jsvalidation/********************************************-->	
	<script type="text/javascript" src="/application/modules/phpgeneral/scripts/myScriptValidation.js"></script>	
	<!-----USER OFFLINE DETECTION --------------------------------------------------------------->	
	<!--<script type="text/javascript" src="/application/modules/phpgeneral/scripts/userOfflineDetection.js"></script>-->	
	<!-----USER LOG-OUT --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpgeneral/scripts/phpfrontButtonLogOut.js"></script>	
	

	<!--START MENU-->	
	<script type="text/javascript" src="/application/modules/phpmenu/scripts/phpmenuMenuStart.js"></script>
	<!-----MENU NOTIFICATIONS POST  --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpnotifications/scripts/phpnotificationsNotificationsMenu.js"></script>	
	<!-----MENU NOTIFICATIONS MESSAGE --------------------------------------------------------------->	
		
	<!-----MENU NOTIFICATIONS FRIEND --------------------------------------------------------------->	
		
	<!-----MENU HIDE-SHOW --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpmenu/scripts/phpgeneralMenuHideShow.js"></script>	


	<!--START-->		
	<script type="text/javascript" src="php/phpstart/newdoc.js"></script> 



	<!--**********************phpfront START***************************************************************-->	
	

	
	<!--POSTS SHOW ALL-->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontShowPostDB.js"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontStartAndShowAllPost.js"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontTranslator.js"></script>	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontLastPostToFrontPage.js"></script>	
	
	
	
	
	<!--POSTS SEE MORE POSTS-->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontButtonSeeMorePosts.js"></script>	

	<!--CLONE LOVE AND COMMENTS-->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontCloneInsertDB.js"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontLoveInsertDB.js"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontCommentsInsertDB.js"></script>
	<!--TEXT EDITOR-->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontPostInsertDB.js"></script>	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontTextEditorInitialText.js"></script>	
	<!-----FILE UPLOAD --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontImageUpload.js"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontFileUpload.js"></script>

	<!-----FILE UPLOAD DELETE FILES --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontButtonDeleteFiles.js"></script>
	<!--TEXT EDITOR UTUBE CONVERT URL TO VIDEO-IFRAME-->


	
	<!--*********************END phpfront ***************************************************************-->		


	<!--*********************FRIENDS MODUL ***************************************************************-->	
	<!-----FRIENDS REQUESTS NOTIFICATION TO FRONT PAGE --------------------------------------------------------------->	
	
	<!-----FRIENDS REQUESTS BUTTON --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpfriends/scripts/friendRequestButton.js"></script>
	<!-----FRIENDS TRANSLATOR --------------------------------------------------------------->		
	<script type="text/javascript" src="/application/modules/phpfriends/scripts/LanguageSpanishFriendButtonsTranslator.js"></script>
	
	
	
	
	<!--*********************phpprofilefriends FRIENDS PROFILE ***************************************************************-->	
	<!-----SHOW PROFILE FOR USER CLICKING IN POST PICTURE-NAME --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpprofilefriends/scripts/profileFriendsShowMyFriendsProfile.js"></script>


	<!--*********************NOTIFICATIONS phpnotifications ***************************************************************-->	
		
	<!-----NEW MESSAGE WARNING TO FRONT PAGE --------------------------------------------------------------->
	<!-----ATTENTION: THE NEST TWO SCRIPTS ARE INSIDE phpmessages AND NOT IN NOTIFICATIONS --------------------------------------------------------------->		
	<script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowNewMessagesToFrontPage.js"></script>			
	<script type="text/javascript" src="/application/modules/phpmessages/scripts/phpmessagesShowConversationButtonFrontPage.js"></script>			
	
	<!-----NEW NOTIFICATION FOR USER POST (COMMENT-LOVE-CLONE) WARNING TO FRONT PAGE --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpnotifications/scripts/phpnotificationsPosts.js"></script>			
	<!-----SEE POST FOR NOTIFICATION(COMMENT-LOVE-CLONE) WHEN NOTIFICATIONS BUTTON PRESSED --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpnotifications/scripts/phpnotificationsShowPostfByPostId.js"></script>			

	
	
	<!-----TRANSLATOR NOTIFICATIONS + MESSAGES NOTIFICATIONS--------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpnotifications/scripts/phpnotificationsTranslateNotificationsPlusMessagesButtons.js"></script>			
	

	
<!--***********************END SCRIPTS*******************************************-->  	
	
	
	
	<!-----ALL MY MESSAGES ---->
	<div  class="divMessageAll" id="divAllMessages" ></div>	

	
	<!---TESTING LORT HERE--->		
	<div id='testinglort'></div>
	<script>
		$( "body" ).on( "click", ".lort", function()
		{
		//$("#myDiv").html('');
			//alert('test');
		});
	</script>

	
	
	
</body>
</html>
