
<div class="allContentWrapper">

	<!--<iframe  id="" name="" src="/application/modules/phpfront/phpfrontLoveInsertDB.php" style ="border:4px solid red;" width="200" height="200" frameborder="0">lort</iframe>-->	



	<!--TABLE POST ALL-->
	<table class="tablePostAll" style="table-layout: fixed;">




		<tr >
			<td>
				<h1>Libro de visitas</h1><br>
				
				<div class="labelInput">* Nombre o alias</div>
				<div>
				<input  maxlength="30" style="width:160px;" type="text" id="name" placeholder="..escribe aquí" name="name"  >
				</div>	
				<br>
				<div class="labelInput">* Mensaje</div>
				<!--*********MAIN TEXT EDITOR (myDiv) *************************************************--> 
				<div  name ="myDiv" id="myDiv" class="myDiv nicefont" contenteditable="true" style=""></div>
				<!--<div id="writeSomethingHere" style="color:grey;">Escribe aqui y presiona el botón enviar. Este texto desaparece al hacer click</div>-->
				<button  id="mySubmitGuestBook" class="mySubmitButton myButtonAll">Enviar</button>
			</td>
			
		</tr>
		
	

		<tr >
			<td >
				<!--*****************************SHOW NEW POSTS ADDED*******************************************************-->	
				<div id = "divHttpRequestPostFrontPage"></div>
				<!--*****************************SHOW ALL DATABASE POST***************************************************-->
				<div id="httpShowPostFromStartjsAndmyTextEditorDBShowPostphp"></div>

			</td>

		</tr>

	</table>
		
			 

	 	

</div> <!--<div class="allContentWrapper">-->





<!--***********************END FRONT CONTENT*******************************************-->  
