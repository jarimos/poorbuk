    /*RESUMEN: THIS SCRIPT POST THE INFORMATION TO ANOTHER PAGE (myTextEditorDBinsertPost.php) 	PASSING SOME VARIABLES (name) AND STORING THEM IN THE DATA BASE IN A BACKGROUND PROCESS	SO THE poorbook CAN'T FEEL THE SLOW PROCESS.    AT THE SAME TIME WE SET THE NEW CONTENT IN SOME EMPTY-PRE-WRITTED-DIVS SO THE FLOW IS FAST 	LIKE AN ARROW.*///POST TO myTextEditorDBinsertPost.php	$( "body" ).on( "click", "#mySubmitPost", function()	 {		//CALL FUNCTION		phpfrontTextEditorInitialText();				$('#buttonDeleteFiles').css('visibility','hidden');			//GET TEXT EDITOR CONTENT 		var myDivTextHtml = $(".myDiv").html() + $("#mydivNow").html();		//SO WE CHECK-VALIDATE FOR <script> = &lt;script&gt; 		//FIRST WE CONVERT HTML TO TEXT, THEN WE CHECK...		var mystringtovalidate=$(".myDiv").text();				//var mystringtovalidateLenght =  mystringtovalidate.length;		//alert(myDivTextHtml);								if (myDivTextHtml !="" )		{						setStatus("Loading...", "divLoadingStatus");		//alert('mystringtovalidate');			mystringtovalidate = myvalidationantiscript(mystringtovalidate);			if (mystringtovalidate=="success")			{				//IF IMAGE IS FOUNDED												var myimage = $('.myDiv').children('img').attr('src');				if (typeof myimage!=="undefined") 				{							//CONVERT IMAGE TO TEXT IN HIDDEN DIV ('#myimagetovalidate') IN myTextEditor.php 					$('#myimagetovalidate').text($('.myDiv').html());					//GET TEXT					$myimageHtmlTOSTRING = $('#myimagetovalidate').text();					//VALIDATE TEXT poorbuk\js\jsvalidation\myScriptValidation.js					mystringtovalidate = myvalidationantiscript($myimageHtmlTOSTRING);									}			}			if (mystringtovalidate=="error")			{							setStatus("Finished", "divLoadingStatus");			}			else//SUCCESS: SAVE ALL THE INFORMATION			{				var myDivposted = $(".myDiv").html()+ $("#mydivNow").html();				//alert('myDivposted '+myDivposted);				var myusernow = localStorage["poorbook.myuserid"];							/*******POST POST **POST POST **POST POST **POST POST **POST POST **POST POST **POST POST *************/																$.post("application/modules/phpfront/phpfrontPostInsertDB.php",				{					//HER WE PASS THE CONTENT OF OUR TEXT EDITOR TO THE VARIABLE postcontentPosted					//THAT IS POSTED VIA HTTP REQUEST					postcontentPosted: myDivposted,					myusernow: myusernow				},								/***********************************************************************/				//post back function				function (data, status)				{					//alert('data phpfrontPostInsertDB.js = '+data);						data=$.trim(data);					if (data!="")					{						//var returnIdForLastPostInserted = data;						//CALL FUNCTION FOR FRONT PAGE UPDATE...						//UpdateLastPostToFrontPage(returnIdForLastPostInserted);							$('#divHttpRequestPostFrontPage').prepend(data);							phpgeneralTranslatorChooseLanguage();					}					                                        //RESET INPUT FILES                                        					//RESET MAIN DIV TO WRITE POST					$(".myDiv").html("");					myDivTextHtml = "";					$("#mydivNow").html("");					setStatus("Finished", "divLoadingStatus");                                        //alert("lort trigeeeeeeerrrrrrrrr1");                                        setTimeout(function()                                         {                                            //alert("lort!!!")                                             //location.reload(true);                                                                                     }, 1000);                                        //alert("lort trigeeeeeeerrrrrrrrr2");				});						}		}		else		{			//MULTILANGUAGE MESSAGE			var myMessageSpanish='El mensaje es muy largo o muy corto';			var myMessageEnglish='The message is too short or too long';			timeToShowSeconds = 5;			multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);			//END MULTILANGUAGE MESSAGE											}			});