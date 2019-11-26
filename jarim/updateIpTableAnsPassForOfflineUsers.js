
//THIS IS IN THE USER SIDE
//var myVar1=setInterval(function(){myip()},7000);
//IF IT RUNS EVERY 7 SECONDS, WE SET IT ONCE TO 12 SECONDS

$( "body" ).on( "click", "#deleteAllOfflineUsers", function()
{
	var myuserid = localStorage["poorbook.myuserid"];
/**********SET ALL IPS TO NOTHING************************/	
	
	$.post("updateIpTableAllIpsToNothing.php",
	{
		myuserid: myuserid
		
	},

	function (data, status)
	{
		
		alert(data);
	
	});	
	
	/******IF IPS ARE STILL NOTHING AFTER 20 SECS, CHANGE PASS FOR USERS AND DELETE FROM IP TABLE. 
	*********************AFTER THIS YOU CAN OVERWRITE HTACCESS USING BUTTON 2********************/
	
	setTimeout(function()
	{  
		$.post("updateIpTableAnsPassForOfflineUsers.php",
		{
			myuserid: myuserid
			
		},

		function (data, status)
		{
			
			alert(data);
		
		});	
		
	}, 20000);


});