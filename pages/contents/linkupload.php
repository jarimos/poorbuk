

<table class="tableCheckBox">


<tr>
    <td>

	<div  id="queries" ></div>	
		
    </td>
</tr>

<tr>
    <td>

        <!--*************UPLOAD FILES (OR PICS AS FILES) LIKE A TAG FORM ONCHANGE UPDATE MY TEXT EDITOR*********"***********style ="float:left;border:2px solid red;"onsubmit="return confirm('Do you really want to submit the form?');"-->
        <form   id="formUploadLink" action="" method="post" enctype="multipart/form-data" target="frameUploadTutorial" >			
            <br>
            <br>
            <div  id="userId" ></div><br>
            <br>
            <select id="tutorialsfolder" name="tutorialsfolder"  onchange="showSelectedItems(this.value);">
                <option value='jsjquery'>JS-JQuery</option>';
                <option value='1'>Select-category</option>';
                <option value='php'>php</option>';		
                <option value='css'>CSS</option>';
                <option value='mysql'>MYSQL</option>';		
                <option value='html'>HTML</option>';	
                <option value='modules'>Modules</option>';	
                <option value='nicesites'>Nice-Sites</option>';	
                <option value='nicetutorials'>Nice-Tutorials</option>';	
            </select>	
            <br><br>
            <br>
            <p >Only pdf allowed</p>

            <input  accept=".pdf*" style="width:auto; height:auto;vertical-align: baseline;font-weight: inherit;font-family:inherit;
            font-style: inherit;font-size:14px;border: 0 none;outline: 0;padding: 0;margin: 0;"
            name="upload[]" id="uploadMultiple" type="file" multiple="multiple" onchange='return fileInputMultipleMaxNrFilesValidation();'/>

            <input style="display:none;" id="linksUID" type="text" name="linksUID">				
            <input style="display:none;" id="myUserFolder" type="text" name="myUserFolder">	


        </form>		
        
        <iframe   style="display:none;" id="frameUploadTutorial" name="frameUploadTutorial" src="" width="700" height="200"  ></iframe>

        <!--****style="display:none;"*****SUBMIT BUTTON TEXT EDITOR (myDiv) TO DATABASE ********************style="display:none;"************** style ="float:left;border:2px solid red;"***************--> 

    </td>
</tr>

<tr>
	<td>
	
	
				<div  id="divShowLinksTableAll" >

				</div>	
			
				
	</td>
</tr>




</table>	


<div id="overlayStatus"  >
	<!--<div id="overlay_div_Status" " >-->
		<!--<img id="overlayImage" style="width:600px;" src="jarimImages/big.jpg" alt="A Random Image" />-->
			<div id="divLoadingStatus" >Loading...<br><img src="files/images/loader.gif" ><br></div>	
		<!--<div id="close_button" >X</div>-->
	<!--</div>-->
</div>

<div id="overlayMessages" >
	<!--<div id="overlay_div_Status" " >-->
		<!--<img id="overlayImage" style="width:600px;" src="jarimImages/big.jpg" alt="A Random Image" />-->
		<div id="divAllMessagesWrapper" >
			<div  id="divAllMessages" ></div>	
			<div class ="close_button" id="close_button_Messages" >X</div>
		</div>
	<!--</div>-->
</div>

				
<!--***GENERAL SCRIPTS********************************************-->

<!--***SET STATUS phpgeneral********************************************-->
<script type="text/javascript" src="/application/modules/phpgeneral/scripts/setStatus.js"></script>	
<!--***MESSAGES phpgeneral********************************************-->
<script type="text/javascript" src="/application/modules/phpgeneral/scripts/messagesWriteNewMessage.js"></script>	
<!--***VALIDATION js/jsvalidation/********************************************-->	
<script type="text/javascript" src="/application/modules/phpgeneral/scripts/myScriptValidation.js"></script>	


<!--phptutorials TUTORIALS 	<script type="text/javascript" src="/application/modules/phptutorials/scripts/phpTutorialsInsetItem.js"></script>-->	
<script type="text/javascript" src="/application/modules/phplinks/scripts/linkFileUpload.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/buttonLinkDelete.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/buttonLinkUpdate.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/deleteLinksFunction.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/showLinksFunction.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/updateLinksFunction.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/fileInputMultipleMaxNrFilesValidation.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/showSelectedItems.js"></script>
<script type="text/javascript" src="/application/modules/phplinks/scripts/showUserId.js"></script>	


<!-----FILE UPLOAD --------------------------------------------------------------->	
<!--<script type="text/javascript" src="/application/modules/phpfront/scripts/phpfrontFileUpload.js"></script>-->
<!-----FILE UPLOAD DELETE FILES --------------------------------------------------------------->	


	
	<div id="targetElement" ></div>
