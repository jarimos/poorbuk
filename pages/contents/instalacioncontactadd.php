
<div class="allContentWrapper">

	<iframe class="invisible" id="uploadframeInstalacion" name="uploadframeInstalacion"    ></iframe>	




	<form id="myForm" action="application/modules/phpinstalacion/phpinstalacionAddContact.php" name="myForm" target="uploadframeInstalacion" enctype="multipart/form-data"  action="" method="POST" onsubmit="return(phpinstalacionAddContactValidate());" > <!-- -->

		<table class="tableCheckBox">



			<tr>
				<td>
				  <fieldset>
					<legend  >Persona de contacto</legend>
	
						<div class="labelGeneral labelInstaContactName">Nombre</div>
						<input maxlength="40" type="text" id="inputInstaContactName"  class="inputGeneralSmall" name="instacontactname"  />
						<div class="labelGeneral labelInstaContactPhone">Móbil</div>
						<input maxlength="20" type="text"  id="inputInstaContactPhone"  class="inputGeneralSmall" name="instacontactphone"  />

					</fieldset>


				</td>
			</tr>	
			<tr>
				<td  class="invisible">
					<input maxlength="20" class="invisible"  id="myuserid" type="text" name="myuserid">
					<input maxlength="20" class="invisible"  id="instaid" type="text" name="instaid">
				</td>
			</tr>	
			<tr>
				<td>
					<input id="buttonInstalacionNewSubmit" class="myButtonAll" type="submit" value="Guardar contacto">
					<br><br><br><br><br><br>
				</td>
				</td>
			</tr>


		</table>

	</form>		


</div> <!--<div class="allContentWrapper">-->






