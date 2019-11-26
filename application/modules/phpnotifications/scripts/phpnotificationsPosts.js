


function phpnotificationsPosts() //IF POST FUNCTION SUCCESS, SETS localStorage["poorbook.myuseronlineflag"] = 'success' 
{

		var myusernow = localStorage["poorbook.myuserid"];
		//alert(myusernow);
		var myuserlanguage = localStorage["poorbook.myuserlanguage"];

		$.post("application/modules/phpnotifications/phpnotificationsPosts.php",
			{
				myusernow: myusernow,
				myuserlanguage: myuserlanguage
			},            
		function (data, status) 
			{

				//alert('phpnotificationsPosts.js = \n'+data);
				
				data=$.trim(data);

				if(data!='')	
				{
					$('#divphpnotificationsPosts').html(data);
					$('#divNewFollowingAllWrapper').css('display','block');
					phpgeneralTranslatorChooseLanguage();
			
				} 
				else
				{

					$('#divNewFollowingAllWrapper').css('display','none');	
			
				}
				

			});


}

//ONCE AT START			
phpnotificationsPosts();
//INITIALIZE FUNCTION WHEN THE SCRIPT IS LOADED: AUTO-RUN EVERY 10 SECONDS
var phpnotificationsPostsStop=setInterval(function(){phpnotificationsPosts()},100000);
