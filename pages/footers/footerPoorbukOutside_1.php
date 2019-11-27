
	<!--***GENERAL SCRIPTS********************************************-->
	<!--***SET STATUS phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/setStatus.js"></script>	
	<!--***MESSAGES phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/messagesWriteNewMessage.js"></script>	
	<!--***VALIDATION phpgeneral********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/myScriptValidation.js"></script>	
	<!--***FUNCTIONS  phpgeneral********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralFunctions.js"></script>	
       
        <!--START LANGUAGE-->	
       <script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/phpgeneralTranslateOutsidePages.js"></script>

<?php	
if ($myUserURLFinalPath == "contact.php") { echo '
        <!-- contact.php -->
	<script src="/poorbuk/php/phpcontact/contactJarim.js"></script>
'; }
?> 

<?php	
if ($myUserURLFinalPath == "iniciarsesionolvidepass.php") { echo '
        <!-- iniciarsesionolvidepass.php -->
    <script src="/poorbuk/php/phploginfogotpass/loginForgotMyPass.js"></script>
'; }
?> 
       
<?php	
if ($myUserURLFinalPath == "iniciarsesionolvidepassnewpass.php") { echo '
        <!-- iniciarsesionolvidepassnewpass -->
<script src="/poorbuk/php/phploginfogotpassnewpass/phploginforgotpassnewpassValidation.js"></script>
<script src="/poorbuk/php/phploginfogotpassnewpass/loginForgotMyPassNewPass.js"></script>
'; }
?> 
       <?php	
if ($myUserURLFinalPath == "pindex.php") { echo '
        <!-- pindex.php -->
	<script src="/poorbuk/php/phplogin/login.js"></script>
	<script src="/poorbuk/php/phplogin/startLogin.js"></script>
'; }
?> 
       <?php	
if ($myUserURLFinalPath == "registrarse.php") { echo '
        <!-- registrarse.php -->
    <script src="/poorbuk/php/phpregister/register.js"></script>
    <script src="/poorbuk/php/phpregister/myRegisterValidation.js"></script>
'; }
?> 
    
       
                       
                        
<div id="overlayStatus"  >
    <div id="divLoadingStatus" >Loading...<br><img src="/poorbuk/files/images/loader.gif" ><br></div>	
</div>
        
<div id="overlayMessages" >
    <div id="divAllMessagesWrapper" >
        <div  id="divAllMessages" >Må gud domme jer</div>	
        <div class ="close_button" id="close_button_Messages" >X</div>
    </div>
</div>


  <footer class="jarimFooter">
      <div class="credit">
        <p id="templatemo_cr_bar">
            Webmaster <a class="showContact" href="http://www.jarimos.dk/contact.html">jarimos | 2013</a>
        </p>
      </div>
   
  </footer>


  


  
    <!--SET THIS SCRIPT THE LAST BECAUSE WE DONT KJNOW IF THEY ARE IDIOTS OR WHAT BUT NO SCRIPT AFTER SEEMS TO WORK-->
    <script src="/poorbuk/js/bootstrap/bootstrap.min.js"></script>

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
