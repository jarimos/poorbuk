$( "body" ).on( "click", "#buttonSubmitMessage", function()
{
		//START STATUS

		var allMyFriendIdsToSendTo="";
		var counterFriendsInList= 0;
		//var allMyFriendNamesToSendTo;
		
		//LOOP TROUGH ALL USERNAME-SENDTO-BUTTONS BY CLASS AND 
		//COPY ALL MY FRIENDS ID'S AND NAMES TO A SINGLE STRING EACH.
		//(these buttons are showed inside a div id = "divPrivateMessageUsersSendTo")
		//alert('localStorage["poorbook.conversationids"] = '+localStorage["poorbook.conversationids"]);
		if(localStorage["poorbook.conversationids"]!="")
		{
			allMyFriendIdsToSendTo=localStorage["poorbook.conversationids"];
		}
		else
		{
			$('.buttonFriendIdMessage').each(function(i, obj) {
			
				counterFriendsInList = counterFriendsInList +1;
			
				if (allMyFriendIdsToSendTo=="")
				{
					allMyFriendIdsToSendTo = $(this).attr('value').toString();	
					//allMyFriendNamesToSendTo = $(this).text();					
				}
				else
				{
					allMyFriendIdsToSendTo = allMyFriendIdsToSendTo +";"+ $(this).attr('value').toString();
					//allMyFriendNamesToSendTo = allMyFriendNamesToSendTo +";"+ $(this).text();
				}
			});
			
			allMyFriendIdsToSendTo=allMyFriendIdsToSendTo +";"+ localStorage["poorbook.myuserid"];
		}
		//END LOOP TROUGH ALL USERNAME-SENDTO-BUTTONS BY CLASS
		//alert(allMyFriendIdsToSendTo);
		

		//alert(localStorage["poorbook.conversationids"]);
		//GET MY MESSAGE
		var myPrivateMessage = $('#textareaMessage').val();
		

		//alert('Send to '+allMyFriendIdsToSendTo+' Message :'+myPrivateMessage)
		if (counterFriendsInList>0)
		{
			if (allMyFriendIdsToSendTo!="" && myPrivateMessage!="" && localStorage["poorbook.myuserid"]!="")
			{
				//HIDE USER FINDER ALL DIV AND FOR STARTING MODE CONVERSATION
				$('#divUserFinderAll').css('display','none');
				$('#divConversationAll').css('display','block');			
				
				setStatus('Loading...','divLoadingStatus');
				var myusernow = localStorage["poorbook.myuserid"];
				
				$.post("application/modules/phpmessages/phpmessagesSubmitMessage.php",
				{
					myPrivateMessage: myPrivateMessage,
					allMyFriendIdsToSendTo: allMyFriendIdsToSendTo,
					myusernow:myusernow,

				},    
				function (data, status) 
				{
				
				
					//alert('localStorage["poorbook.conversationids"] = '+localStorage["poorbook.conversationids"]);
					//alert('phpmessagesSubmitMessage.js'+data);
					//STOP STATUS 
					setStatus('Finished','divLoadingStatus');			
					//CONVERT STRING TO JSON OBJECT
					var obj = eval ("(" + data + ")");
					//GET USERS IDS ORDERED LIST
					if(obj.status=='success')	
					{
						localStorage["poorbook.conversationids"] = obj.allMyFriendIdsToOrdered;
						window.location.assign("mensajesconversacion.php");					
						
						//var conversationids= localStorage["poorbook.conversationids"];
						//phpmessagesShowConversationNoStatus(conversationids);
					} 


					$('#textareaMessage').val("");
					$('#divUsersListToSendToMesssages').html("");
					



					

				
				});
			}//if (allMyFriendIdsToSendTo!="" && myPrivateMessage!="" && localStorage["poorbook.myuserid"]!="")
			else
			{
				
				//MULTILANGUAGE MESSAGE
				var myMessageEnglish ='Write a message';
				var myMessageSpanish ='Escribe un mensaje';
				timeToShowSeconds = 3;
				multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
			}			
		
		}//if (counterFriendsInList>0)
		else
		{

			
			
			//MULTILANGUAGE MESSAGE
			var myMessageSpanish='Escribe al menos un nombre de usuario ';
			var myMessageEnglish='Write at least one user name';
			timeToShowSeconds = 3;
			multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);

			
			
		}
		
		
 });

