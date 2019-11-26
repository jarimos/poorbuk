<div class="content front" style=""> 
<div     class="allContentWrapper" style="">

		
		<!--THIS HIDDEN DIV IS BECAUSE OF FIREFOX (IDIOTS OR SOMETHING FUCKING IN MY COMPUTER)-->
		<div class="labelinform" style="visibility:hidden;">_</div>
		

	
				<input  maxlength="50" style="width:150px;" type="text" id="mail" placeholder="/poorbuk tu correo electrónico" name="mail"  >
				</br>
				<input  maxlength="30" style="width:150px;" type="password" id="pass" placeholder="/poorbuk nueva contraseña" name="pass"  >
				</br>
				<input  maxlength="30" style="width:150px;" type="password" id="pass2" placeholder="/poorbukrepite tu contraseña" name="pass2"  >
				</br>

				<br>

				<button  class="login" id="buttonpassforgotnewpass">Enviar</button>
				<br><br>

		
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


	<script src="/poorbuk/php/phploginfogotpassnewpass/loginForgotMyPassNewPass.js"></script>
	<!--<script src="/poorbuk/php/phpregister/register.js"></script>
	<script src="/poorbuk/js/jsvalidation/myScriptValidation.js"></script>	
	<script src="/poorbuk/js/jsvalidation/myRegisterValidation.js"></script>-->		



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
