<div class="content front" style="">

 
<div     class="allContentWrapper" style="">
<!--<div     class="allContentWrapper" style="">-->

		

		
            <div id="registrarseContentEnglish">
		<!--REGISTER------------------------------------------------------------------------------->
				<a class="" href="/registrarse.html"><img style="width:30px;height:30px;margin-bottom:30px;"src="/poorbuk/files/flags/Spain.png"></a>
				<a class="" href="registrarse.html"><img style="width:30px;height:30px;margin-bottom:30px;"src="/poorbuk/files/flags/UnitedKingdom.png"></a>
					<br>
	<!--			<div class="labelGeneral" style="padding-right:20px;padding-left:5px;">
					<a class="" href="app.html">Click for downloading<br> the mobile APP</a>
				</div>	-->
				<br>
				<div class="labelInput">Name or alias</div>
				<div>
				<input  maxlength="30" style="width:160px;" type="text" id="name" placeholder="/poorbuk.write her" name="name"  >
				</div>	
				<div class="labelInput">Email</div>
				
				<input  maxlength="50" style="width:160px;" type="text" id="mail" placeholder="/poorbuk.write her" name="mail"  >
				</br>
				<div class="labelInput">Repeat email</div>

				<input  maxlength="50" style="width:160px;" type="text" id="mail2" placeholder="/poorbuk.write her" name="mail2"  >
				</br>
				<div class="labelInput">Password</div>

				<input  maxlength="30" style="width:160px;" type="password" id="pass" placeholder="/poorbuk.write her" name="pass"  >
				</br>
				
				<div class="labelInput">Repeat password</div>
				
				<input  maxlength="30" style="width:160px;" type="password" id="pass2" placeholder="/poorbuk.write her" name="pass2"  >
				</br>
				

				
				<div id="" class="labelInput" style= "">When you click the button <br>send, you are accepting our 
				</br><a href="/files/termsofusepoorbook/TERMSOFUSEPOORBOK.rtf">Use conditions</a>
				</div>

				<br>
				<button  class="myButtonAll" id="buttonregister">Send</button>
				<br><br>

		

				<a class="linkGeneral" id="buttonIForgotMyPass" style="margin-left:0px;margin-bottom:0px;margin-top:10px;" href= "iniciarsesionolvidepass.html">I forgot my pass</a>
				</br>

		
                    </div><!--end div registrarseContentEnglish-->
				
		
		<div class="jarimFooterRellenoInvisible" style="height:100px;">
		</div>

</div>

</div>


  

  <footer class="jarimFooter">
      <div class="credit">
        <p id="templatemo_cr_bar">
          Webmaster <a class="showContact" href="contact.html">poorbook-team | 2014</a>
        </p>
      </div>
   
  </footer>


	<!--***GENERAL SCRIPTS********************************************-->
	
	<!--START MENU-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpmenu/scripts/phpmenuMenuStart.js"></script>
	<!--***SET STATUS phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/setStatus.js"></script>	
	<!--***MESSAGES phpgeneral********************************************-->
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/messagesWriteNewMessage.js"></script>	
	<!--***VALIDATION js/jsvalidation/********************************************-->	
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/myScriptValidation.js"></script>	
	<!-----USER OFFLINE DETECTION --------------------------------------------------------------->	
	<!--<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/userOfflineDetection.js"></script>-->	

	<!-----REGISTER php--------------------------------------------------------------->		
	<script src="/poorbuk/php/phpregister/register.js"></script>
	<script src="/poorbuk/php/phpregister/myRegisterValidation.js"></script>
	
		



		<!-----ALL MY MESSAGES ---->
		<div  class="divMessageAll" id="divAllMessages" ></div>	
		<!-----STATUS  ---->		
		<div id="divLoadingStatus"  >Loading...<br><img src="/poorbuk/files/images/loader.gif" ><br></div>

		
		<!---TESTING LORT HERE--->		
		<div id='testinglort'></div>
		<script>
			localStorage["poorbook.myuserlanguage"] = "English";
			$( "body" ).on( "click", ".lort", function()
			{
				//alert('test');
			});
		</script>

		<!--SET THIS SCRIPT THE LAST BECAUSE WE DONT KJNOW IF THEY ARE IDIOTS OR WHAT BUT NO SCRIPT AFTER SEEMS TO WORK-->
		<script src="/poorbuk/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
