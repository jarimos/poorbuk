/*DONT DISPLAY STATUS SO THE USER KNOWS THAT SOMETHING IS HAPPENING.OTHERWISE phpmessagesShowConversationNoStatus(friendids)= phpmessagesShowConversation(friendids)THIS FUNCTION REFRESH CONVERSATION AND ALSO THE ALL MESSAGES CALLING phpmessagesShowAllMessages(); AT THE END OF THE POSTIN THIS WAY THE REFRESH FUNCTION phpmessagesRefreshMessagesAuto() REFRESH ALSO NEW MESSAGES FROM OTHER USERSTHAN THEM IN THE CONVERSATION */function phpmessagesShowConversationNoStatus(friendids){if(friendids!=""){		//setStatus('Loading...','divLoadingStatus');		var myusernow = localStorage["poorbook.myuserid"];		var myuserlanguage = localStorage["poorbook.myuserlanguage"];		//alert(friendids);		$.get("application/modules/phpmessages/phpmessagesShowConversation.php",			{				//HER WE PASS THE CONTENT OF OUR TEXT EDITOR TO THE VARIABLE postcontentPosted				//THAT IS POSTED VIA HTTP REQUEST				myusernow: myusernow,				myuserlanguage: myuserlanguage,				friendids: friendids			},               //post back function		function (data, status) 			{				//alert('phpmessagesShowConversationNoStatus.js '+data);				$('#divShowConversation').html(data);				var scrollHeight = $("#divShowConversation")[0].scrollHeight;				$("#divShowConversation").scrollTop(scrollHeight);					//$("#divShowConversation").scrollTop($("#myDivAllComments")[0].scrollHeight);					phpmessagesShowAllMessagesNoStatus();				//STOP STATUS				//setStatus('Finished','divLoadingStatus');							});				}else{	$('#divShowConversation').html('');}}