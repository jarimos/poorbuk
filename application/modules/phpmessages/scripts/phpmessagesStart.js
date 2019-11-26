
$(document).ready(function ()
{

//alert(localStorage["poorbook.conversationfrontpage"]);	

//IF BUTTON SEE CONVERSATION PRESSED IN FRONTPAGE
if (localStorage["poorbook.conversationfrontpage"]=='yes')
{
		//RESET FLAG FROM FRONTPAGE
		localStorage["poorbook.conversationfrontpage"]='no'
		$('#divUserFinderAll').css('display','none');
		$('#divConversationAll').css('display','block');
		//PASS THE VALUES STORED IN FRONTPAGE
		phpmessagesShowConversation(localStorage["poorbook.conversationids"]);

}
else////IF NO FROM FRONTPAGE
{
	//RESET CONVERSATION VALUES AND START
	localStorage["poorbook.conversationids"]="";
}
	phpmessagesShowAllMessages();
});
	
	
