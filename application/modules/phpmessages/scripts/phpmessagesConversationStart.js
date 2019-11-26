
$(document).ready(function ()
{

//alert(localStorage["poorbook.conversationfrontpage"]);	

//IF BUTTON SEE CONVERSATION PRESSED IN FRONTPAGE
if (localStorage["poorbook.conversationfrontpage"]=='yes')
{
		//RESET FLAG FROM FRONTPAGE
		localStorage["poorbook.conversationfrontpage"]='no'
		//$('#divUserFinderAll').css('display','none');
		//$('#divConversationAll').css('display','block');
		//PASS THE VALUES STORED IN FRONTPAGE
		
		var conversationids= localStorage["poorbook.conversationids"];
		phpmessagesShowConversationNoStatus(conversationids);


}
else////IF NO FROM FRONTPAGE
{
		var conversationids= localStorage["poorbook.conversationids"];
		phpmessagesShowConversationNoStatus(conversationids);
}
	//phpmessagesShowAllMessages();
});
	
	
