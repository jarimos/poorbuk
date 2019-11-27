
<script>


	



</script>
        <!--START SECURITY -->		
 <!--	<script type="text/javascript" src="php/phpstart/newdoc.js"></script> 

	<!--***GENERAL SCRIPTS********************************************-->
        
	<!--***INITIALIZE JS PATHS IN LOCAL-STORAGE phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/startInitializeJSPaths.js"></script>        
	<!--***SET STATUS phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/setStatus.js"></script>	
	<!--***MESSAGES phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/messagesWriteNewMessage.js"></script>	
	<!--***VALIDATION phpgeneral********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/myScriptValidation.js"></script>	
	<!--***FUNCTIONS  phpgeneral********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralFunctions.js"></script>	
         
        <!-----TRANSLATOR LANGUAGE --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralTranslator.js"></script>	
        <!-----USER LOG-OUT --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpfrontButtonLogOut.js"></script>
             

        
        <!--START MENU-->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpmenuMenuStart.js"></script>
        <!-----MENU NOTIFICATIONS LANGUAGE --------------------------------------------------------------->	
 <!--   <script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpmenuMenuShowNotifications.js"></script>	
        <!-----MENU NOTIFICATIONS POST  --------------------------------------------------------------->	
  <!--  <script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsNotificationsMenu.js"></script>	

        <!-----MENU HIDE-SHOW --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpgeneralMenuHideShow.js"></script>	
        
        <!-----USER OFFLINE DETECTION --------------------------------------------------------------->	
	<!--<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/userOfflineDetection.js"></script>-->	

<?php	
if ($TemplateName == "poorbuk.php" || $TemplateName == "profilefriends.php" 
     || $TemplateName == "friends.php" || $TemplateName == "profile.php" 
     || $TemplateName == "instalacionshowone.php" || $TemplateName == "admin.php") { echo '  
        <!-- phpprofilefriends -->
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsShowMyFriendsProfile.js"></script>
        
        <!--function for SCROLL ALL COMMENTS DOWN****************-->		
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralCommentsScrollAllDown.js"></script>
	<!--POSTS SEE MORE POSTS-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontButtonSeeMorePosts.js"></script>

'; } 

//echo "<br>myUserURLFinalPath = ".$TemplateName;
if ($TemplateName == "poorbuk.php" || $TemplateName == "profilefriends.php"
    || $TemplateName == "profile.php") { echo '  
			
        <!--CLONE LOVE AND COMMENTS-->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontCloneInsertDB.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontLoveInsertDB.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontCommentsInsertDB.js"></script>
      
        <!--POSTS REFRESH COMMENTS ALL-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontRefreshComments.js"></script>
        <!--SHOW MORE POST ON SCROLL-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralReloadPostsByScrollAuto.js"></script>	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralReloadPostsByScrollAutoShowPosts.js"></script>

'; }

if ($TemplateName == "poorbuk.php") { echo '  
    


        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontTextEditorInitialText.js"></script>
	
	
	
	<!--POSTS SHOW ALL-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontShowPostDB.js"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontStartAndShowAllPost.js"></script>

	
	<!--TEXT EDITOR-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontPostInsertDB.js"></script>	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontTextEditorInitialText.js"></script>	
	<!-----FILE UPLOAD --------------------------------------------------------------->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontImageUpload.js"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontFileUpload.js"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontFileImageUploadCSS.js"></script>

	<!-----FILE UPLOAD DELETE FILES --------------------------------------------------------------->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontButtonDeleteFiles.js"></script>
	<!--TEXT EDITOR UTUBE CONVERT URL TO VIDEO-IFRAME-->


'; }

        
	
if ($TemplateName == "admin.php") { echo '
        <!-- phpadmin -->
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminUserFinder.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminButtonEditRollForUserId.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminButtonSaveRollForUserId.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminEditRollForUserId.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminInitializeRoll.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminCheckRollAdmin.js"></script>

'; }


//<!-- SOBRA O HA DESAPARECIDO
// <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsTranslator.js"></script>    

 

 
if ($TemplateName == "poorbuk.php" || $TemplateName == "profilefriends.php" 
     ||  $TemplateName == "profile.php") { echo ' 
        <!--phpprofilefriends - profilefriends.php -->			
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsStart.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsFindAmigoInMyListByName.js"></script>	
            
	<script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsButtonShowMyFriendPosts.js"></script>	 	       
 
	<!--POSTS REFRESH COMMENTS ALL-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontRefreshComments.js"></script>
            

        <!-----NEW NOTIFICATION FOR USER POST (COMMENT-LOVE-CLONE) WARNING TO FRONT PAGE --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsPosts.js"></script>			
        <!-----SEE POST FOR NOTIFICATION(COMMENT-LOVE-CLONE) WHEN NOTIFICATIONS BUTTON PRESSED --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsShowPostfByPostId.js"></script>			

        <!-----TRANSLATOR NOTIFICATIONS + MESSAGES NOTIFICATIONS--------------------------------------------------------------->	
        <!--<script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsTranslateNotificationsPlusMessagesButtons.js"></script>	       
        -->
'; }
	
if ($TemplateName == "profile.php") { echo '
        <!--phpprofileyo - profile.php-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileShowMyPosts.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileShowYo.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileStart.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileImageUpload.js"></script>
'; }
	
if ($TemplateName == "profileedit.php") { echo '
        <!-----phpprofileyo-EDIT - profileedit.php --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditStart.js"></script>		
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditCheckDateIsRight.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditValidation.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditButtonChangePass.js"></script>
'; }

if ($TemplateName == "friends.php" || $TemplateName == "poorbuk.php") { echo ' 			
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestShowNewRequestAtPageTop.js"></script>  
                <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendFinder_showAllPeopleInPoorbuk.js"></script> 

'; }

 if ($TemplateName == "poorbuk.php" || $TemplateName == "profilefriends.php" 
     || $TemplateName == "friends.php" || $TemplateName == "profile.php") { echo '  
      
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsButtonShowAllFriendFriends.js"></script>
'; }

if ($TemplateName == "friends.php" || $TemplateName == "poorbuk.php"
        || $TemplateName == "profilefriends.php") { echo ' 			    
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestButton.js"></script>
'; }
	
if ($TemplateName == "friends.php") { echo '       
        <!-- phpfriends -->
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendFinder.js"></script>


        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendShowAll.js"></script>

        <!--<script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestAcceptAllButton.js"></script>-->
        <!--<script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestAcceptAllMakeTheButton.js"></script>-->
<!--O NO SE USA O HA DESAPARECIDO       <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/LanguageSpanishFriendButtonsTranslator.js"></script>
-->     
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendStart.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendFinderFindAmigoInMyFriends.js"></script>

'; }


	
				

if ($TemplateName == "guestbook.php") { echo '         
        <!--**********************phpguestbook START***************************************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpguestbook/scripts/phpguestbookPostInsertDB.js"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpguestbook/scripts/phpguestbookShowPostDB.js"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpguestbook/scripts/phpguestbookStartAndShowAllPost.js"></script>				
'; }

if ($TemplateName == "instalacion.php") { echo ' 
        <!--phpinstalacion-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionInstalacionShowAll.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionInstalacionStart.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionFinder.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionInstalacionButtonInstallationShow.js"></script>
'; }

if ($TemplateName == "instalacioncomment.php") { echo '  
        <!-----phpinstalacion-comment --------------------------------------------------------------->				
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionCommentValidate.js"></script>
'; }
	
if ($TemplateName == "instalacioncontactadd.php") { echo '        
<!-----phpinstalacion - add contact --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionAddContactStart.js"></script>

            '; }
	
if ($TemplateName == "instalacioncontactdelete.php") { echo '        
        <!--phpinstalacion - delete-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionContactDeleteStart.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionContactDeleteShow.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionContactDeleteButton.js"></script>
'; }

if ($TemplateName == "instalacionedit.php") { echo '        
        <!-----phpinstalacion - edit--------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionEditShow.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionEditValidate.js"></script>
'; }

if ($TemplateName == "instalacionnueva.php") { echo '        
<!-----phpinstalacion - instalación nueva --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionNewInstalationValidate.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionNewInstalationStart.js"></script>
'; }

if ($TemplateName == "instalacionshowone.php") { echo '        
        <!--phpinstalacion - show one-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionOneInstallationStart.js"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionOneInstallationShow.js"></script>
	
'; }
	
if ($TemplateName == "notifications.php") { echo '			
			
<!--*********************NOTIFICATIONS phpnotifications ***************************************************************-->	

<!-----NEW MESSAGE WARNING TO FRONT PAGE --------------------------------------------------------------->
<!-----ATTENTION: THE NEST TWO SCRIPTS ARE INSIDE phpmessages AND NOT IN NOTIFICATIONS --------------------------------------------------------------->		
 <!--<script type="text/javascript" src="/poorbuk/application/modules/phpmessages/scripts/phpmessagesShowNewMessagesToFrontPage.js"></script>-->			
<script type="text/javascript" src="/poorbuk/application/modules/phpmessages/scripts/phpmessagesShowConversationButtonFrontPage.js"></script>-->									
'; }



?>  



	
<script></script>
			

                       
                        
                        
                        
                        
                        
                        
                        
                        
<div id="overlayStatus"  >
    <div id="divLoadingStatus" >Loading...<br><img src="files/images/loader.gif" ><br></div>	
</div>
        
<div id="overlayMessages" >
    <div id="divAllMessagesWrapper" >
        <div  id="divAllMessages" >Må gud domme jer</div>	
        <div class ="close_button" id="close_button_Messages" >X</div>
    </div>
</div>

<!--
  <footer class="jarimFooter">
      <div class="credit">
        <p id="templatemo_cr_bar">
            Webmaster <a class="showContact" href="http://www.jarimos.dk/contact.html">jarimos | 2013</a>
        </p>
      </div>
   
  </footer>

-->
  


  
    <!--SET THIS SCRIPT THE LAST BECAUSE WE DONT KJNOW IF THEY ARE IDIOTS OR WHAT BUT NO SCRIPT AFTER SEEMS TO WORK-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

	<!-- LOAD JQuery jarims script-->
    <!--<script src="jsJarim/jarim.js"></script>-->
	<!-- <script src="jsJarim/ScreenDetector.js"></script>-->
	<!--<script src="contactJarim.js"></script>-->
		<!---TESTING LORT HERE--->		
    <div id='testinglort'></div>
    <script>
            $( "body" ).on( "click", ".lort", function()
            {
                    //alert('test');
            });
    </script>	

  </body>
</html>