$( "body" ).on( "click", "#mySubmitGuestBook", function(){		var myDivTextHtml=$("#myEditableDivGuestBook").text();			var myusername = $('#name').val();		//alert(myDivTextHtml + myusername);								if (myDivTextHtml !="" && myusername !="" )		{					setStatus("Loading...", "divLoadingStatus");					//var myusernow = localStorage["poorbook.myuserid"];					/*******POST POST **POST POST **POST POST **POST POST **POST POST **POST POST **POST POST *************/										$.post("application/modules/phpguestbook/phpguestbookPostInsertDB.php",			{				//HER WE PASS THE CONTENT OF OUR TEXT EDITOR TO THE VARIABLE postcontentPosted				//THAT IS POSTED VIA HTTP REQUEST				postcontentPosted: myDivTextHtml,				myusername: myusername				//myusernow: myusernow			},						/***********************************************************************/			//post back function			function (data, status)			{				//alert('data phpfrontPostInsertDB.js = '+data);								//CALL FUNCTION FOR FRONT PAGE UPDATE...				var mytime="";					phpfrontShowPostDB(mytime);				//RESET MAIN DIV TO WRITE POST				$("#myEditableDivGuestBook").html("");				myDivTextHtml = "";				$('#name').val("");				setStatus("Finished", "divLoadingStatus");				});					}		else		{					if (myusername =="" )			{				//MULTILANGUAGE MESSAGE				var myMessageSpanish='No has puesto el nombre';				var myMessageEnglish="You don't wrote your name";				timeToShowSeconds = 5;				multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);				//END MULTILANGUAGE MESSAGE						}			if (myDivTextHtml=="" )			{				//MULTILANGUAGE MESSAGE				var myMessageSpanish='El mensaje es muy largo o está en blanco';				var myMessageEnglish="The message is too short or too long";				timeToShowSeconds = 5;				multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);				//END MULTILANGUAGE MESSAGE						}													}		});