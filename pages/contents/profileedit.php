
<div class="allContentWrapper">	



		<iframe style ="display:none;" id="uploadframe3" name="uploadframe3"    ></iframe>	
<!--**********************************************************************************************************-->
<!--<a class="myButtonAll"  href="profile.php">Home</a><br>style ="float:left;border:2px solid red;"<br>
<a class="myButtonAll"  href="profile.php">I</a>
<br><br><br><br>-->
<form id="myForm" name="myForm" target="uploadframe3" enctype="multipart/form-data"  action="application/modules/phpprofileyo/profileEditPostToDB.php" method="POST"  onsubmit="" > <!---->

<table class="tableCheckBox">


<tr>
	<td>
            <div style="width:220px;" id ="labelChangeProfileTip" class="labelInput" >Change anything you want and then press the button SAVE CHANGES</div>
                
                
                <br><br><br><br>
		<div class="labelInput labelChangeName">Name</div>
                <br>
		<input type="text" id="myusername" name="myusername"  />
	</td>
</tr>

<tr>
	<td>
                <br><br>
		<p class="labelInput labelChangePicture">Picture</p>
		<input type="file"  id="myfile" name="myfile">
		
	</td>
</tr>





<tr>
	<td>    
                <br><br>
		<p class="labelInput labelChangeBirthday">Change birthday</p>

		<div id="profilePrintDateSelectInput"></div>
		
		
		
	</td>
</tr>


<tr>
	<td>
                <br><br>
		<p class="labelInput labelChangetLanguage">Select language</p>
		<select id="language" name="language">
			<option value='Spanish'>Spanish</option>';
			<option value='English'>English</option>';		
		</select>
	</td>
</tr>

<tr>
	<td>
                <br><br>
		<p class="labelInput labelChangeDescription">Change description</p>
		<textarea  id="textAreaDescription" name="textAreaDescription" placeholder="Your description here..."></textarea>
		
	</td>
</tr>


<tr class="trPassword">
	<td>
                <br><br>
		<div class="labelInput divChangePassAdvice" id="divChangePassAdvice">Si NO quieres cambiar el password,<br>simplemente déjalo en blanco</div>
		
                
		<div class="labelInput labelChangeOldPassword">Old password</div>
		<input id="oldpass" type="password" name="oldpass" /></div>                
                
                <br>
		<div class="labelInput labelChangeToNewPassword">New password</div>
		<input id="pass" type="password" name="pass" /></div>

	</td>
</tr>

<tr  class="trPassword">
	<td>
		<div class="labelInput labelRepeatNewPass">Repeat new password</div>
		<input id="repeatpass" type="password" name="repeatpass">
		<input style="display:none;" id="myuserid" type="text" name="myuserid">
		<input style="display:none;" id="userfolder" type="text" name="userfolder">

	</td>
</tr>
<tr>
	<td>
		<br>

		


	</td>
</tr>




</table>

</form>		

<table class="tableCheckBox">


<tr>
	<td>
            	<button id="buttonSubmitProfile" class="buttonGeneralJarim myButtonsLoveClone"  value="Save changes">Save changes</button>
		<br><br>
		<button id ="buttonChangePassword" class="buttonGeneralJarim myButtonsLoveClone"  class="">Cambiar contraseña</button>
		
		<br><br><br><br><br><br>
	</td>
</tr>

</table>

<!--<a class="myButtonAll"  href="profile.php">Home</a><br><br>
<a class="myButtonAll"  href="profile.php">I</a>
<br><br><br><br>-->





		


</div> <!--<div class="allContentWrapper">-->

