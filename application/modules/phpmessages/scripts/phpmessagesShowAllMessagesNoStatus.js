function phpmessagesShowAllMessagesNoStatus(){		//START STATUS		//setStatus('Loading...','divLoadingStatus');		var myusernow = localStorage["poorbook.myuserid"];		var myuserlanguage = localStorage["poorbook.myuserlanguage"];		$.get("application/modules/phpmessages/phpmessagesShowAllMessages.php",			{				myusernow: myusernow,				myuserlanguage: myuserlanguage,			},             		function (data, status) 			{				//alert('phpmessagesShowAllMessages.js '+data);				$('#divShowAllMessages').html(data);				//STOP STATUS				//setStatus('Finished','divLoadingStatus');						});				}