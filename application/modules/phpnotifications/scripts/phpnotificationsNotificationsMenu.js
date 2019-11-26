
function phpgeneralnotificationsPostsMenu() //IF POST FUNCTION SUCCESS, SETS localStorage["poorbook.myuseronlineflag"] = 'success' 
{

		var myusernow = localStorage["poorbook.myuserid"];
		//alert(myusernow);
		var myuserlanguage = localStorage["poorbook.myuserlanguage"];
		//alert(myuserlanguage);
		$.post("application/modules/phpnotifications/phpnotificationsMenus.php",
			{
				myusernow: myusernow,
				myuserlanguage: myuserlanguage
			},            
		function (data, status) 
			{

				//alert('phpnotificationsNotificationsMenu.js = \n'+data);
				
				data=$.trim(data);
				
			
				

				if(data!='')	
				{	
						
					localStorage["poorbook.mynotificationspost"]=1;	
					//IF NOTIFICATIONS WRITE NEW MENU
					phpgeneralNotificationsChooseLanguageAndShow('YES');

				} 
				else
				{
					localStorage["poorbook.mynotificationspost"]=0;
					var mynotifications = 
					parseInt(localStorage["poorbook.mynotificationspost"]) +
					parseInt(localStorage["poorbook.mynotificationsmessage"]) +
					parseInt(localStorage["poorbook.mynotificationsfriend"]);
					
					//alert(mynotifications);
					//IF NO NOTIFICATIONS IN POST, MESSAGES OR FRIENDS WRITE NORMAL MENU
					if (mynotifications==0)
					{
						phpgeneralNotificationsChooseLanguageAndShow('NO');
					}
											
				}
				
				
				

								//	alert('mynotifications');

			});


}

//ONCE AT START			
phpgeneralnotificationsPostsMenu();
//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 10 SECONDS
var phpgeneralnotificationsPostsMenuStop=setInterval(function(){phpgeneralnotificationsPostsMenu()},100000);
