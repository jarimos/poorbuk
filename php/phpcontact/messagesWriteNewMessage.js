			/*			var myMessage='El mensaje enviado es muy largo o muy corto';			var divAllMessages='divAllMessages';			messagesWriteNewMessage(myMessage,divAllMessages);							HTML						<div id="divAllMessages"></div>									CSS				#divAllMessages			{  				text-align:center;				display:none;				width:200px;  				padding:10px;  				border:1px solid;  				position:fixed;				top:10%;  				left:40%;  				z-index:9999;  				-webkit-border-radius: 6px; -moz-border-radius: 6px;				font:italic bold 24px Georgia,serif;				color:grey;				background:white;			}  			*/			//alert('dfgdg');function messagesWriteNewMessage(myMessage,divAllMessages,myTimeout){	/*	var myTimeout=8000;	var myMessage='El mensaje enviado es muy largo o muy corto';	var divAllMessages='divAllMessages';	messagesWriteNewMessage(myMessage,divAllMessages);		*/	$("#"+divAllMessages).html(myMessage);	$("#"+divAllMessages).css('display','block');					setTimeout(function()	{  		$("#"+divAllMessages).css('display','none');			}, myTimeout); // <-- time in milliseconds  }			function multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds){	/*CALL	//MULTILANGUAGE MESSAGE	var myMessageSpanish='Escribe al menos un nombre de usuario ';	var myMessageEnglish='Write at least one user name';	timeToShowSeconds = 3;	multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);	//END MULTILANGUAGE MESSAGE		*/	var myuserlanguage=localStorage["poorbook.myuserlanguage"];			if(myuserlanguage=="Spanish")	{		var myMessage=myMessageSpanish;	}	if(myuserlanguage=="English")	{		var myMessage=myMessageEnglish;	}		var divAllMessages='divAllMessages';	var myTimeout=timeToShowSeconds*1000;	messagesWriteNewMessage(myMessage,divAllMessages,myTimeout);	}//END multilanguageMessage