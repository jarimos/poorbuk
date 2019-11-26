
<div class="allContentWrapper">


	<!--<iframe  id="" name="" src="/application/modules/phpfront/phpfrontLoveInsertDB.php" style ="border:4px solid red;" width="200" height="200" frameborder="0">lort</iframe>-->	



	<!--HIDDEN DIV TO VALIDATE IMAGE FROM POSTS-->
	<div id="myimagetovalidate" style="display:none;border:solid 2px red;" >My image to validate</div>
	
	

	<table class="tableNotificationsFrontPage">
		<tr >

                    
                    <td>
                        
                    



			<!--USERNAME AND DATE-->
			<div class="nicefontjarim1" id="myDivStartUsernamePlusDate"> <span id="haveaniceday"></span><span id="startUserName"></span><br><br>
			<span id="startDate" style="display:none;"></span>
			</div><br>
			
	
			<div id="divNewFriendRequestsFrontPage">

				<div id="divShowNewFriendRequests" class="" ></div>		
			</div>
			
			
			<div id="divNewMessagesAllWrapper">
				<br><br>
				<div class="labelGeneral" id="labelNewMessages" style="text-align:left;">Nuevos mensajes</div>	
				<div id="divNotificationsShowNewMessages" class="divNotificationsScrolledGeneral"></div>		
			</div>
				

				
			<!--NOTIFICATIONS / NOTIFICATIONS POSTS / MESSAGES / -->
			<!--SHOW NOTIFICATIONS-->
			<div id="divNewFollowingAllWrapper">
				<br><br>
				<div class="labelGeneral" id="labelFollowing" style="text-align:left;">Seguimiento</div>	
				<div id="divphpnotificationsPosts" class="divNotificationsScrolledGeneral"></div>
			</div>				

				

			</td>

		</tr>
	</table>
	
	
	
	
	<table class="tableNotificationsShowPostFrontPage">
		<tr >
			<td>
				
				<!--SHOW POSTS FOR NOTIFICATIONS IF PRESS BUTTON-->
				<div id="divphpnotificationsShowPostfByPostId" ></div>

			</td>

		</tr>
	</table>
	

<!--[if IE]>
	<style type="text/css">
	input.hidefileinput
		{
			position:absolute;
			left:0px;
			top:2px;
			-moz-opacity:0;
			filter:alpha(opacity: 0);
			/*opacity: 0;*/
			z-index: 2;
			width:0px;
			border-width:0px;
		}
	</style>
<![endif]-->

	<!--TABLE POST ALL-->
	<table class="tablePostAll" style="table-layout: fixed;">




		<tr >
                    <td>
                        <div style="display:none;" id="divHelpTextForTextEditor"></div>
                        <!--*********MAIN TEXT EDITOR (myDiv) *************************************************--> 
                        <div  name ="myDiv" id="myDiv" class="myDiv nicefont"  contenteditable="true" onfocus="phpfrontTextEditorInitialText();" >
                          <div id="writeSomethingHere" style="color:lightslategrey;">Escribe aquí, añade fotos con el botón y presiona enviar :)</div>
                        </div>

                        <button  id="mySubmitPost" class="mySubmitButton green" style="float:left;margin-top:10px;">Enviar</button>
                    </td>
			
		</tr>
		
		<tr >
                    <td>

<style>
    
#myfile {
    background-color: #4CAF50;
    border: none;
    color: white;
    /*padding: 15px 32px;*/
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
                        <!--*********UPLOAD PICTURE IN IMG TAG FORM ONCHANGE UPDATE MY TEXT EDITOR  *************************************************--> 

                        <div id="uploadImagePlusFileWrapper" >
                        <form id="uploadform"   style="float:left;" method="post" accept=".bmp,.gif,.jpg,.jpeg,.png" enctype="multipart/form-data" target="uploadframe" >
                            <div id="divFileImageAllWrapper" style="height:24px;" >	 
                                <!--<img class="imgInputFileImage" src="files/icons/camera4242icon.png" style="">  -->

                                <div style="position:relative;">
                                    <button>+FOTO</button> <!-- type="button"  id="pseudobutton" class="buttonInput buttonGeneralJarim" styl value="-->
                                    <input type="file"  id="myfile" class="hidefileinput" name="myfile"    
                                           onchange="getElementById('FileField').value = getElementById('myfile').value;mysubmit();" 
                                           onmousedown="buttonPush('depressed');" onmouseup="buttonPush('normal');" > <!--onmouseout="buttonPush('phased');"-->
                                    <div  style="display:none;" id="BrowserVisible"><input type="text" id="FileField" /></div>
                                </div>

                                <input style="display:none;" id="myuseridimage" type="text" name="myuseridimage">
                                <input style="display:none;" id="userfolderimage" value="lort" type="text" name="userfolderimage">


                            </div>
                        </form>		
                        <iframe  style="display:none;"  id="uploadframe" name="uploadframe" src=""   width="700" height="200" ></iframe>	


                        <!--**** style="display:none;"*********UPLOAD FILES (OR PICS AS FILES) LIKE A TAG FORM ONCHANGE UPDATE MY TEXT EDITOR*********"***onsubmit="return confirm('Do you really want to submit the form?');"********style ="float:left;border:2px solid red;"-->
                        <form   id="uploadform2" name="uploadform2" action="" method="post" enctype="multipart/form-data" target="uploadframe2" >			
                            <div id="divFileIFileAllWrapper" style="margin-bottom:20px;margin-top:20px;" >
                                <div style="position:relative;">
                                     <button>+DOCS</button> <!--<input type="button" id="pseudobutton2" class="buttonGeneralJarim" value="+DOCS">-->
                                    <input type="file" class="hidefileinput" id="myfile2" name="myfile2"    onchange="getElementById('FileField2').value = getElementById('myfile').value;mysubmit2();" onmousedown="buttonPush2('depressed');" onmouseup="buttonPush2('normal');" > <!--onmouseout="buttonPush2('phased');"-->
                                    <div style="display:none;"  id="BrowserVisible"><input type="text" id="FileField2" /></div>
                                </div>

                                <input style="display:none;" id="myuseridfile" type="text" name="myuseridfile">
                                <input style="display:none;" id="userfolderfile" type="text" name="userfolderfile">	
                                <!--<img class="imgInputFileImage" src="files/icons/file4242icon.png">-->
                            </div>
                        </form>		
                        <iframe  style="display:none;"  id="uploadframe2" name="uploadframe2" src="" width="700" height="200"  ></iframe>

                        <!--*********SUBMIT BUTTON TEXT EDITOR (myDiv) TO DATABASE ********************style="display:none;"************** style ="float:left;border:2px solid red;"***************--> 


                        </div>



                        <!--*********UPLOADED FILES, PICS IN NORMAL DIV UNTIL SUBMITTED *************************************************--> 
                        <div  id="myDivFileUploadedImageFileWrapAll" >

                            <button  id="buttonDeleteFiles"  class="red">Borrar</button>
                            <div id="mydivNow" style=""></div>
                        </div>


                    </td>
			
		</tr>

		<tr >
			<td >
				<!--*****************************SHOW NEW POSTS ADDED*******************************************************-->	
				<div id = "divHttpRequestPostFrontPage"></div>
				<!--*****************************SHOW ALL DATABASE POST***************************************************-->
				<div id="httpShowPostFromStartjsAndmyTextEditorDBShowPostphp"></div>
                                <div id="loadMorePosts"></div>

			</td>

		</tr>

	</table>
		
		

		 

	 	

</div> <!--<div class="allContentWrapper">-->






