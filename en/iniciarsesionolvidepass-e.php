<div class="content front" style=""> 
<div     class="allContentWrapper" style="">



<div  id="divallMessagePopupPassForgotten">One momment please...</div>

<div  id="divallMessagePopupPassForgottenMailNoExist">Your email is not registered!!!!</div>

<div  id="divallMessagePopupPassForgottenSucess">Your pass has been sent to your email</div>

	<div  id="divallIForgetMypass">
	

		


			<p class="labelinform" >If you forgot your password, write your email, 
			press send and a message will be sent to you</p>
			<br>
			<div class="labelinform">Email</div>
			<div  maxlength="50" id="inputitems"><input type="text" id="mail" name="mail" ></div>
			<br><br>
			<!--<input  class="login" id="buttonSubmitIForgotMyPass" type="submit" value="Enviar" >-->
			<button  id="buttonSubmitIForgotMyPass">Send</button> 



	</div>
		<br><br>
		<a class="newuser" style="margin-left:0px;margin-top:80px;" href= "registrarse.html">New user</a>
		<br>
		<a class="inicio" id="buttonInicio" style="margin-left:0px;margin-top:10px;" href= "index.html">Log in</a>




		
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



	<script src="/poorbuk/php/phploginfogotpass/loginForgotMyPass.js"></script>
	
		<!-----ALL MY MESSAGES ---->
		<div  class="divMessageAll" id="divAllMessages" ></div>	
		<!-----STATUS  ---->		
		<div id="divLoadingStatus"  >Loading...<br><img src="/poorbuk/files/images/loader.gif" ><br></div>

		
		<!---TESTING LORT HERE--->		
		<div id='testinglort'></div>
		<script>
			$( "body" ).on( "click", ".lort", function()
			{
				//alert('test');
			});
		</script>

		<!--SET THIS SCRIPT THE LAST BECAUSE WE DONT KJNOW IF THEY ARE IDIOTS OR WHAT BUT NO SCRIPT AFTER SEEMS TO WORK-->
		<script src="/poorbuk/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
