$( "body" ).on( "click", ".mySubmitAmigo", function(){    		$(this).css('display','none');		var myuserlanguage = localStorage["poorbook.myuserlanguage"];		var myAmigoId = $(this).attr('id');		var  myAmigoStatus = $(this).attr('value');		//alert('myAmigoId = '+myAmigoId+'\n myAmigoStatus = '+myAmigoStatus);		//alert(myAmigoStatus);		//$('#txtHint').html('');NEED AFTER WE READ THE BUTTONS VALUES...		$('#txtHint').html('');		$('#txtHintFindAmigoInMyListByName').html('');				$("#inputFindAmigoInMyListByName").val("");				$("#inputUserFinderbyname").val("");					var deleteFriend="";		if(myAmigoStatus=='REMOVE FRIEND' )		{									//"You pressed Cancel TO DELETE YOUR FRIEND!";									if(myuserlanguage=='Spanish' )			{								var r=confirm("CONFIRMA PARA BORRAR A TU AMIGO?");			}			if(myuserlanguage=='English' )			{								var r=confirm("CONFIRM TO DELETE YOUR FRIEND?");			}			if (r==true)			{				//"You pressed OK TO DELETE YOUR FRIEND!";				deleteFriend="yes";			} 			else			{				deleteFriend="no";			}					}//END if(myAmigoStatus=='BORRAR AMIGO')				if(myAmigoStatus!='REQUEST SENDED' && myAmigoStatus!='PETICION ENVIADA' && deleteFriend!="no" )				{					//START STATUS					setStatus('Loading...','divLoadingStatus');					var myusernow = localStorage["poorbook.myuserid"];					//alert(myAmigoStatus);					$.post("application/modules/phpfriends/friendRequestButton.php",					{						myAmigoId: myAmigoId,						myAmigoStatus: myAmigoStatus,						myusernow: myusernow						//myuserpassnow: myuserpassnow					},					function (data, status)					{						//alert('friendRequestButton.js : \n'+data);												var obj = eval ("(" + data + ")");										var myStatusDB= obj.status;						//alert(myStatusDB);						//STOP STATUS						setStatus('Finished','divLoadingStatus'); 						location.reload(true);											});	//END $.post("application/modules/phpfriends/friendRequestButton.php",									}				else//NO RELOAD NEEDED				{					location.reload(true);									}//END if(myAmigoStatus!='REQUEST SENDED')							});//END $( "body" ).on( "click", ".mySubmitAmigo", function()