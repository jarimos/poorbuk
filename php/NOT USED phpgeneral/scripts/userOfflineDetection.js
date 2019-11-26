localStorage["poorbook.myuseronlineflag"]='success';

function myip() //IF POST FUNCTION SUCCESS, SETS localStorage["poorbook.myuseronlineflag"] = 'success' 
{
	myipcheck();
	//1. TIME myipcheck() IS CALLED, DELETE localStorage["poorbook.myuseronlineflag"];
	//2. TIME myipcheck() IS CALLED, IF localStorage["poorbook.myuseronlineflag"] IS NOTHING,
	//THAT MEANS THAT THE LAST POST FAILED, AND THEN DISPLAY USER OFFLINE MESSAGE
	//DISPLAY USER OFFLINE MESSAGE;	
	
	var myuserid = localStorage["poorbook.myuserid"];
	$.post("application/modules/phpfront/ipUserOfflineDetection.php",
	{
	
		myuserid: myuserid
		
	},

	function (data)
	{

		localStorage["poorbook.myuseronlineflag"] = 'success';

	});	
	

}
			
function myipcheck()
{	
					
	if ((localStorage["poorbook.myuseronlineflag"])!="success")
	{
		$("#divAllMessages").html('Ha fallado tu conexión a internet o a nuestro servidor');
		$("#divAllMessages").css('display','block');	
		
		setTimeout(function()
		{  
			$("#divAllMessages").css('display','none');
			
		}, 1000); // <-- time in milliseconds  		
		
	}
	//alert(localStorage["poorbook.myuseronlineflag"]);
	localStorage["poorbook.myuseronlineflag"]='';
}			

//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 7 SECONDS
var myVar1=setInterval(function()
{
    myip();
},7000);
