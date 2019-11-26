



	<iframe class="invisible" id="uploadframeInstalacion" name="uploadframeInstalacion"    ></iframe>	

	<form id="myForm" action="application/modules/phpinstalacion/phpinstalacionCommentSave.php" name="myForm" target="uploadframeInstalacion" enctype="multipart/form-data"  action="" method="POST" onsubmit="return(phpinstalacionCommentValidate());" > <!-- -->

		<table class="tableCheckBox">



			<tr>
				<td>
					<br><br><br>
					<div class="labelGeneral labelInstaComCurrantes">Currantes</div>
					<input maxlength="300" type="text" id="inputInstaComCurrantes" class="inputGeneral" name="inputInstaComCurrantes"  />
				</td>
			</tr>


			<tr>
				<td>
					<div class="labelGeneral labelInstaComResumen">Resumen del trabajo</div>
					<textarea maxlength="3000" id="textAreaInstaComResumen" name="textAreaInstaComResumen" rows="4" cols="25">
					</textarea>

				</td>
			</tr>

			<tr>
				<td>
					<div class="labelGeneral labelInstaComMaterial">Material</div>
					<textarea maxlength="3000" id="textAreaInstaComMaterial" name="textAreaInstaComMaterial" rows="4" cols="25">
					</textarea>

				</td>
			</tr>
			<tr>
				<td>
					<div class="labelGeneral labelInstaComConclusion">Conclusión</div>
					<textarea maxlength="3000" id="textAreaInstaComConclusion" name="textAreaInstaComConclusion" rows="4" cols="25">
					</textarea>

				</td>
			</tr>

			<tr>
				<td class="invisible" >

					<input maxlength="20" class="invisible"  id="myuserid" type="text" name="myuserid">
					<input maxlength="20" class="invisible"  id="instaid" type="text" name="instaid">
					<br><br><br><br><br><br>
				</td>
			</tr>
			<tr>
				<td>
					<input id="buttonICommentNewSubmit" class="myButtonAll" type="submit" value="Guardar">

				</td>
			</tr>


		</table>

	</form>		


</div> <!--<div class="allContentWrapper">-->






