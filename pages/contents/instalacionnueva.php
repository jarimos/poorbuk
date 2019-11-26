

<div class="allContentWrapper">
	<iframe class="invisible" id="uploadframeInstalacion" name="uploadframeInstalacion"    ></iframe>	




	<form id="myForm" action="application/modules/phpinstalacion/phpinstalacionNewInstalacionSave.php" name="myForm" target="uploadframeInstalacion" enctype="multipart/form-data"  action="" method="POST" onsubmit="return(phpinstalacionNewInstalationValidate());" > <!-- -->

		<table class="tableCheckBox">


			<tr>
				<td>
					<div class="labelGeneral labelInstalacionNombre">Instalación</div>
					<input maxlength="500" type="text" id="inputInstalacionNombre" class="inputGeneral" name="instaname"  />
				</td>
			</tr>

			<tr>
				<td>
					<div class="labelGeneral labelInstalacionAddress">Calle</div>
					<input maxlength="500" type="text" id="inputInstalacionAddress" class="inputGeneral" name="instaaddress"  />
				</td>
			</tr>
			<tr>
				<td>
					<div class="labelGeneral labelInstalacionCity">Ciudad</div>
					<input maxlength="30" type="text" id="inputInstalacionCity" class="inputGeneral" name="instacity"  />
				</td>
			</tr>				
			<tr>
				<td>
					<div class="labelGeneral labelInstalacionZIP">Código postal</div>
					<input maxlength="15" type="text" id="inputInstalacionZIP" class="inputGeneral" name="instazip"  />
				</td>
			</tr>			

			<tr>
				<td>
					<div class="labelGeneral labelInstalacionMaterial">Material</div>
					<textarea maxlength="3000" id="textAreaMaterial" name="instamaterial" placeholder="escribe aquí" ></textarea>
					

				</td>
			</tr>

			<tr>
				<td>
					<div class="labelGeneral labelInstalacionNotas">Notas</div>
					<textarea maxlength="3000" id="textAreaNotas" name="instanotas" placeholder="escribe aquí" ></textarea>
					

				</td>
			</tr>

			
			<tr>
				<td>
					<input maxlength="20" style="display:none;"  id="myuserid" type="text" name="myuserid">
				</td>
			</tr>	
			<tr>
				<td>
				  <fieldset>
					<legend  >Persona de contacto</legend>
	
						<div class="labelGeneral labelInstaContactName">Nombre</div>
						<input maxlength="40" type="text" id="inputInstaContactName"  class="inputGeneralSmall" name="instacontactname"  />
						<div class="labelGeneral labelInstaContactPhone">Móbil</div>
						<input maxlength="20" type="text" size="30" id="inputInstaContactPhone"  class="inputGeneralSmall" name="instacontactphone"  />

					</fieldset>


				</td>
			</tr>	

			<tr>
				<td>
					<input id="buttonInstalacionNewSubmit" class="myButtonAll" type="submit" value="Guardar">
					<br><br><br><br><br><br>
				</td>
				</td>
			</tr>


		</table>

	</form>		


</div> <!--<div class="allContentWrapper">-->






