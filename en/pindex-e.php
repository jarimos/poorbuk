<div class="content front" style=""> 
<div     class="allContentWrapper" style="">


		
			
			<!--LOGIN------------------------------------------------------------------------------->
				<div style="width:200px;padding-left:5px;">
					<a class="" href="/index.html"><img style="width:30px;height:30px;margin-bottom:30px;"src="poorbuk/files/flags/Spain.png"></a>
					<a class="" href="index.html"><img style="width:30px;height:30px;margin-bottom:30px;"src="poorbuk/files/flags/UnitedKingdom.png"></a>
				</div>	
	<!--			<div class="labelGeneral" style="padding-right:20px;padding-left:5px;">
					<a class="" href="app.html">Click for downloading<br> the mobile APP</a>
				</div>	-->
				</br>	
				<a class="linkGeneral" id="nuevousuario" style="margin-left:0px;margin-bottom:0px;margin-top:10px;" href= "registrarse.html">New user</a>				
				</br></br>
				<a class="linkGeneral" id="buttonIForgotMyPass" style="margin-left:0px;margin-bottom:0px;margin-top:10px;" href= "iniciarsesionolvidepass.html">I forgot my pass</a>
				<br></br>		
				<!--<div class="labelGeneral"style="margin-top:10px;">Start session</div>-->
				<div class="labelInput"style="margin-top:10px;">Email</div>
				<input  maxlength="50" style="width:150px;" type="text" id="mail" name="mail" placeholder=""  >
				</br>
				<div class="labelInput">Password</div>
				<input maxlength="30" style="width:150px;" type="password" id="pass"  placeholder=""  name="pass"  >

				</br></br>
				<button  class="myButtonAll" id="buttonlogin">Log in</button>
				</br></br></br>


		
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
	<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/jsvalidation/myScriptValidation.js"></script>	
	<!-----USER OFFLINE DETECTION --------------------------------------------------------------->	
	<!--<script type="text/javascript" src="/poorbuk/application/modules/phpgeneral/scripts/userOfflineDetection.js"></script>-->	
  

	
	
	<!-----PHP LOG IN --------------------------------------------------------------->		
	<script src="/poorbuk/php/phplogin/login.js"></script>
	<script src="/poorbuk/php/phplogin/startLogin.js"></script>
	
	
	
		<!-----ALL MY MESSAGES ---->
		<div  class="divMessageAll" id="divAllMessages" ></div>	
		<!-----STATUS  ---->		
		<div id="divLoadingStatus"  >Loading...<br><img src="/poorbuk/files/images/loader.gif" ><br></div>

		
		<!---TESTING LORT HERE--->		
		<div id='testinglort'></div>
		<script>
			localStorage["poorbook.myuserlanguage"] = "English";
			var myuserlanguage=localStorage["poorbook.myuserlanguage"];
			//alert(myuserlanguage);
			$( "body" ).on( "click", ".lort", function()
			{
				//alert('test');
			});
		</script>

		<!--SET THIS SCRIPT THE LAST BECAUSE WE DONT KJNOW IF THEY ARE IDIOTS OR WHAT BUT NO SCRIPT AFTER SEEMS TO WORK-->
		<script src="/poorbuk/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
