
<script>


	



</script>
        <!--START SECURITY -->		
 <!--	<script type="text/javascript" src="/poorbuk/php/phpstart/newdoc.js?update='.time().'"></script> 

	<!--***GENERAL SCRIPTS********************************************-->
	<!--***SET STATUS phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/setStatus.js?update=<?php echo time();?>"></script>	
	<!--***MESSAGES phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/messagesWriteNewMessage.js?update=<?php echo time();?>"></script>	
	<!--***VALIDATION phpgeneral********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/myScriptValidation.js?update=<?php echo time();?>"></script>	
	<!--***FUNCTIONS  phpgeneral********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralFunctions.js?update=<?php echo time();?>"></script>	
         
        <!-----TRANSLATOR LANGUAGE --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralTranslator.js?update=<?php echo time();?>"></script>	
        <!-----USER LOG-OUT --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpfrontButtonLogOut.js?update=<?php echo time();?>"></script>
             

        
        <!--START MENU-->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpmenuMenuStart.js?update=<?php echo time();?>"></script>
        <!-----MENU NOTIFICATIONS LANGUAGE --------------------------------------------------------------->	
 <!--   <script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpmenuMenuShowNotifications.js?update=<?php echo time();?>"></script>	
        <!-----MENU NOTIFICATIONS POST  --------------------------------------------------------------->	
  <!--  <script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsNotificationsMenu.js?update=<?php echo time();?>"></script>	

        <!-----MENU HIDE-SHOW --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpgeneralMenuHideShow.js?update=<?php echo time();?>"></script>	
        
        <!-----USER OFFLINE DETECTION --------------------------------------------------------------->	
	<!--<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/userOfflineDetection.js?update=<?php echo time();?>"></script>-->	
 <?php	
//echo "<br>myUserURLFinalPath = ".$myUserURLFinalPath;
if ($myUserURLFinalPath == "poorbuk.php" || $myUserURLFinalPath == "profilefriends.php"
    || $myUserURLFinalPath == "profile.php") { echo '  
        <!--*********************PHPFRONT MODUL ***************************************************************-->				
        <!--CLONE LOVE AND COMMENTS-->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontCloneInsertDB.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontLoveInsertDB.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontCommentsInsertDB.js?update='.time().'"></script>
        
	
'; }
?>
            
            
<?php	
if ($myUserURLFinalPath == "poorbuk.php") { echo '    
        <script type="text/javascript" src="/application/modules/phpgeneral/scripts/phpgeneralReloadPostsByScrollAuto.js?update='.time().'"></script>	
	<script type="text/javascript" src="/application/modules/phpgeneral/scripts/phpgeneralReloadPostsByScrollAutoShowPosts.js?update='.time().'"></script>	
	
	
	<!--POSTS SHOW ALL-->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontShowPostDB.js?update='.time().'"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontStartAndShowAllPost.js?update='.time().'"></script>


	<!--TEXT EDITOR-->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontPostInsertDB.js?update='.time().'"></script>	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontTextEditorInitialText.js?update='.time().'"></script>	
	<!-----FILE UPLOAD --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontImageUpload.js?update='.time().'"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontFileUpload.js?update='.time().'"></script>
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontFileImageUploadCSS.js?update='.time().'"></script>

	<!-----FILE UPLOAD DELETE FILES --------------------------------------------------------------->	
	<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontButtonDeleteFiles.js?update='.time().'"></script>
	<!--TEXT EDITOR UTUBE CONVERT URL TO VIDEO-IFRAME-->


'; }
?>  
        
<?php	
if ($myUserURLFinalPath == "admin.php") { echo '
        <!-- phpadmin -->
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminUserFinder.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminButtonEditRollForUserId.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminButtonSaveRollForUserId.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminEditRollForUserId.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminInitializeRoll.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpadmin/scripts/phpadminCheckRollAdmin.js?update='.time().'"></script>

'; }
?> 
<?php	
if ($myUserURLFinalPath == "poorbuk.php" || $myUserURLFinalPath == "profilefriends.php" 
     || $myUserURLFinalPath == "friends.php" || $myUserURLFinalPath == "profile.php" 
     || $myUserURLFinalPath == "instalacionshowone.php" || $myUserURLFinalPath == "admin.php") { echo '  
        <!-- phpprofilefriends -->
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsShowMyFriendsProfile.js?update='.time().'"></script>
        
        <!--function for SCROLL ALL COMMENTS DOWN****************-->		
        <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralCommentsScrollAllDown.js?update='.time().'"></script>
	<!--POSTS SEE MORE POSTS-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpfront/scripts/phpfrontButtonSeeMorePosts.js?update='.time().'"></script>

'; } 
?>
<!-- SOBRA O HA DESAPARECIDO
 <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsTranslator.js?update='.time().'"></script>    
 -->  
 <?php
if ($myUserURLFinalPath == "poorbuk.php" || $myUserURLFinalPath == "profilefriends.php" 
     || $myUserURLFinalPath == "friends.php" || $myUserURLFinalPath == "profile.php") { echo '  
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsButtonShowMyFriendPosts.js?update='.time().'"></script>	       
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsButtonShowAllFriendFriends.js?update='.time().'"></script>
        
        <!--phpprofilefriends - profilefriends.php -->			
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsStart.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofilefriends/scripts/profileFriendsFindAmigoInMyListByName.js?update='.time().'"></script>			
		       
 
        <!-----NEW NOTIFICATION FOR USER POST (COMMENT-LOVE-CLONE) WARNING TO FRONT PAGE --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsPosts.js?update='.time().'"></script>			
        <!-----SEE POST FOR NOTIFICATION(COMMENT-LOVE-CLONE) WHEN NOTIFICATIONS BUTTON PRESSED --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsShowPostfByPostId.js?update='.time().'"></script>			

        <!-----TRANSLATOR NOTIFICATIONS + MESSAGES NOTIFICATIONS--------------------------------------------------------------->	
        <!--<script type="text/javascript" src="/poorbuk/application/modules/phpnotifications/scripts/phpnotificationsTranslateNotificationsPlusMessagesButtons.js?update='.time().'"></script>	       
        -->
'; }
?>
<?php	
if ($myUserURLFinalPath == "profile.php") { echo '
        <!--phpprofileyo - profile.php-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileShowMyPosts.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileShowYo.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileStart.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileImageUpload.js?update='.time().'"></script>
'; }
?>
<?php	
if ($myUserURLFinalPath == "profileedit.php") { echo '
        <!-----phpprofileyo-EDIT - profileedit.php --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditStart.js?update='.time().'"></script>		
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditCheckDateIsRight.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditValidation.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpprofileyo/scripts/profileEditButtonChangePass.js?update='.time().'"></script>
'; }
?>

 <?php	
if ($myUserURLFinalPath == "friends.php" || $myUserURLFinalPath == "poorbuk.php") { echo ' 			
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestShowNewRequestAtPageTop.js?update='.time().'"></script>       
'; }
?> 
<?php	
if ($myUserURLFinalPath == "friends.php" || $myUserURLFinalPath == "poorbuk.php"
        || $myUserURLFinalPath == "profilefriends.php") { echo ' 			    
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestButton.js?update='.time().'"></script>
'; }
?> 
<?php	
if ($myUserURLFinalPath == "friends.php") { echo '       
        <!-- phpfriends -->
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendFinder.js?update='.time().'"></script>


        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendShowAll.js?update='.time().'"></script>

        <!--<script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestAcceptAllButton.js?update='.time().'"></script>-->
        <!--<script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendRequestAcceptAllMakeTheButton.js?update='.time().'"></script>-->
<!--O NO SE USA O HA DESAPARECIDO       <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/LanguageSpanishFriendButtonsTranslator.js?update='.time().'"></script>
-->     
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendStart.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpfriends/scripts/friendFinderFindAmigoInMyFriends.js?update='.time().'"></script>

'; }
?>

		


				
<?php	
if ($myUserURLFinalPath == "guestbook.php") { echo '         
        <!--**********************phpguestbook START***************************************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpguestbook/scripts/phpguestbookPostInsertDB.js?update='.time().'"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpguestbook/scripts/phpguestbookShowPostDB.js?update='.time().'"></script>
	<script type="text/javascript" src="/poorbuk/application/modules/phpguestbook/scripts/phpguestbookStartAndShowAllPost.js?update='.time().'"></script>				
'; }
?>
 
<?php	
if ($myUserURLFinalPath == "instalacion.php") { echo ' 
        <!--phpinstalacion-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionInstalacionShowAll.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionInstalacionStart.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionFinder.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionInstalacionButtonInstallationShow.js?update='.time().'"></script>
'; }
?>  
 

  

<?php	
if ($myUserURLFinalPath == "instalacioncomment.php") { echo '  
        <!-----phpinstalacion-comment --------------------------------------------------------------->				
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionCommentValidate.js?update='.time().'"></script>
'; }
?>  
<?php	
if ($myUserURLFinalPath == "instalacioncontactadd.php") { echo '        
<!-----phpinstalacion - add contact --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionAddContactStart.js?update='.time().'"></script>

            '; }
?>  
    <?php	
if ($myUserURLFinalPath == "instalacioncontactdelete.php") { echo '        
        <!--phpinstalacion - delete-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionContactDeleteStart.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionContactDeleteShow.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionContactDeleteButton.js?update='.time().'"></script>
'; }
?>  
<?php	
if ($myUserURLFinalPath == "instalacionedit.php") { echo '        
        <!-----phpinstalacion - edit--------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionEditShow.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionEditValidate.js?update='.time().'"></script>
'; }
?>  
<?php	
if ($myUserURLFinalPath == "instalacionnueva.php") { echo '        
<!-----phpinstalacion - instalación nueva --------------------------------------------------------------->	
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionNewInstalationValidate.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionNewInstalationStart.js?update='.time().'"></script>
'; }
?>  
<?php	
if ($myUserURLFinalPath == "instalacionshowone.php") { echo '        
        <!--phpinstalacion - show one-->
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionOneInstallationStart.js?update='.time().'"></script>
        <script type="text/javascript" src="/poorbuk/application/modules/phpinstalacion/scripts/phpinstalacionOneInstallationShow.js?update='.time().'"></script>
	
'; }
?>  
<?php	
if ($myUserURLFinalPath == "notifications.php") { echo '			
			
<!--*********************NOTIFICATIONS phpnotifications ***************************************************************-->	

<!-----NEW MESSAGE WARNING TO FRONT PAGE --------------------------------------------------------------->
<!-----ATTENTION: THE NEST TWO SCRIPTS ARE INSIDE phpmessages AND NOT IN NOTIFICATIONS --------------------------------------------------------------->		
 <!--<script type="text/javascript" src="/poorbuk/application/modules/phpmessages/scripts/phpmessagesShowNewMessagesToFrontPage.js?update='.time().'"></script>-->			
<script type="text/javascript" src="/poorbuk/application/modules/phpmessages/scripts/phpmessagesShowConversationButtonFrontPage.js?update='.time().'"></script>-->									
'; }
?>  



	
<script></script>
			

                       
                        
                        
                        
                        
                        
                        
                        
                        
<div id="overlayStatus"  >
    <div id="divLoadingStatus" >Loading...<br><img src="/poorbuk/files/images/loader.gif" ><br></div>	
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
    <script src="/poorbuk/js/bootstrap/bootstrap.min.js?update='.time().'"></script>

	<!-- LOAD JQuery jarims script-->
    <!--<script src="jsJarim/jarim.js?update='.time().'"></script>-->
	<!-- <script src="jsJarim/ScreenDetector.js?update='.time().'"></script>-->
	<!--<script src="contactJarim.js?update='.time().'"></script>-->
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