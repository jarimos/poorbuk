
localStorage["poorbook.myuseronlineflag"]='success';

function myip() //RUN AUTO EVERY 7 SECONDS. IF POST FUNCTION SUCCESS, SETS localStorage["poorbook.myuseronlineflag"] = 'success' 
{


	//myipcheck(); RUN AUTO EVERY 23 SECONDS
	//1. TIME myipcheck() IS CALLED, DELETE localStorage["poorbook.myuseronlineflag"];
	//2. TIME myipcheck() IS CALLED, IF localStorage["poorbook.myuseronlineflag"] IS NOTHING,
	//THAT MEANS THAT THE LAST POST FAILED, AND THEN DISPLAY USER OFFLINE MESSAGE

	
	var myuserid = localStorage["poorbook.myuserid"];
	$.post("application/modules/phpgeneral/userOfflineDetection.php",
	{
	
		myuserid: myuserid
		
	},

	function (data)
	{
		//alert('userOfflineDetection.js '+data);
		localStorage["poorbook.myuseronlineflag"] = 'success';

	});	
	

}
			
function myipcheck()
{	
					
	if ((localStorage["poorbook.myuseronlineflag"])!="success")
	{
		/*MESSAGE DESACTIVATED BECAUSE SOME TIMES IS NOT NECCESSARY. FOR EXAMPLE IF A MOBIL STABLISH RECONNECTION AUTOMATICALLY
			var myMessage='Ha fallado tu conexión a internet o a nuestro servidor';
			var divAllMessages='divAllMessages';
			var myTimeout=3000;messagesWriteNewMessage(myMessage,divAllMessages,myTimeout);	
		*/
		
	}
	//alert(localStorage["poorbook.myuseronlineflag"]);
	localStorage["poorbook.myuseronlineflag"]='';
}			

//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 7 SECONDS
var myVarMyip=setInterval(function(){myip()},7000);
//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 7 SECONDS
var myVarMyipcheck=setInterval(function(){myipcheck()},23000);
