


function phpmessagesRefreshMessagesAuto() //IF POST FUNCTION SUCCESS, SETS localStorage["poorbook.myuseronlineflag"] = 'success' 
{
	if (localStorage["poorbook.conversationids"]!="")
	{
	
		//alert('refreshing...');
		var conversationIds=localStorage["poorbook.conversationids"];
		phpmessagesShowConversationNoStatus(conversationIds);
	}

}
				

//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 7 SECONDS
var phpmessagesRefreshMessagesAutoStop=setInterval(function(){phpmessagesRefreshMessagesAuto()},10000);
