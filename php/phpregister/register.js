//alert('BUTTON PRESSED');
	
$( "body" ).on( "click", "#buttonregister", function()
{
        //alert('BUTTON PRESSED');
	if (validate())
	{
                //alert('VALIDATING TRUE-CALL REGISTER');
		//START STATUS
		//setStatus('Loading...','divLoadingStatus');
		register();
	}

});
	 
//**********FUNCTION register******************************************************************	 
function register()
{

	//alert('REGISTER STARTED');
	/********************************************/
	var name = $('#name').val();		
	var mail = $('#mail').val();
	var pass = $('#pass').val();	
	var language = localStorage["poorbook.myuserlanguage"];	
	
	localStorage["poorbook.mail"] = mail;
	localStorage["poorbook.otros"] = pass;
	  
        //alert('LOCAL STORAGE AND VARIABLES INITIALIZED');
	
	/***********POST register.php***************/	
	$.post("http://localhost/poorbuk/php/phpregister/register.php",
	//$.post(localStorage["poorbook.poorbuk_Path_Relativ_Global"]+"php/phpregister/register.php",
	{
		name: name,
		mail: mail,
		pass: pass,
		language:language

	},

		   //post back function
	function (data, status)
	{
		//alert('register.js'+data);
		var obj = eval ("(" + data + ")");
		
		
		if(obj.status=='success')
		
		{
                        //sendregistermailRegister(mail, pass);
			localStorage["poorbook.mynotificationspost"] = 0;//INITIALIZE	
			localStorage["poorbook.mynotificationsmessage"] = 0;//INITIALIZE	
			localStorage["poorbook.mynotificationsfriend"] = 0;//INITIALIZE	
			localStorage["poorbook.myuserpasscoded"] = obj.passUserOriginalCoded;
			localStorage["poorbook.myuserlanguage"] = obj.userlanguage;
			/*localStorage["poorbook.usercssbackgroundpicturesize"] = obj.usercssbackgroundpicturesize;
			localStorage["poorbook.usercssbackgroundcolor"] = obj.usercssbackgroundcolor;
			localStorage["poorbook.usercssbackgroundpicture"] = obj.usercssbackgroundpicture;*/
			localStorage["poorbook.myuserbirthday"] = obj.userbirthdate;
			localStorage["poorbook.myuserid"] = obj.userid;
			localStorage["poorbook.myusername"] = obj.username;
			localStorage["poorbook.myuserphoto"] = obj.userphoto;
			localStorage["poorbook.userfolder"] = obj.userfolder;
			localStorage["poorbook.ipadr"] = obj.ipadr;
			//FOR ENSURE USER IS LOGGED IN FROM REGISTER OR LOG IN IN poorbuk
			localStorage["poorbook.flag"] = 'true';
			
									//alert(localStorage["poorbook.ipadr"]);
		/*
		var myuser = 'userfolder\n'+localStorage["poorbook.userfolder"] +
		'usermail\n'+localStorage["poorbook.mail"] +'\nuserpasscoded\n'+ localStorage["poorbook.passUserOriginalCoded"] +
		'\nmyusermail\n'+localStorage["poorbook.myusermail"] +'\nmyuserpass\n'+ localStorage["poorbook.myuserpasscoded"] +
		'\nmyuserlanguage\n'+localStorage["poorbook.myuserlanguage"] +'\nusercssbackgroundpicturesize\n'+ localStorage["poorbook.usercssbackgroundpicturesize"]+
		'\nusercssbackgroundcolor\n'+localStorage["poorbook.usercssbackgroundcolor"] +'\nusercssbackgroundpicture\n'+ localStorage["poorbook.usercssbackgroundpicture"] +
		'\nmyuserbirthday\n'+localStorage["poorbook.myuserbirthday"] +'\nmyuserid\n'+ localStorage["poorbook.myuserid"] +
		'\nmyusername\n'+localStorage["poorbook.myusername"] +'\nmyuserphoto\n'+ localStorage["poorbook.myuserphoto"];
		alert(myuser);
		
		alert('obj.status = '+obj.status);
                */
                window.location.assign("http://localhost/poorbuk/index.php?page=poorbuk");
		} 
		if(obj.status=='error')
		{
		
			var myTimeout=8000;
			var myMessage='El usuario ya existe. Si has olvidado tu contraseña haz click en el link "Olvidé mi contraseña", debajo del botón enviar';
			var divAllMessages='divAllMessages';
			messagesWriteNewMessage(myMessage,divAllMessages,myTimeout);	
			//MULTILANGUAGE MESSAGE
			var myMessageSpanish='El usuario ya existe. Si has olvidado tu contraseña haz click en el link "Olvidé mi contraseña"';
			var myMessageEnglish='The user exist allready. If you forgot your pass, click on the link "I forgot my pass"';
			timeToShowSeconds = 4;
			multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
			//END MULTILANGUAGE MESSAGE					
			
			
			//setStatus('Finished','divLoadingStatus');		
			
		}
	});	
	/***********END POST register.php***************/	
	
	


}//END function register()

	
/*2018 JARIM DEPRECATED WE SEND INSIDE THE UserClass.PHP
function sendregistermailRegister(mail, pass)
{

    $.post("php/phpregister/sendmail.php",
    {
        mail: mail,
        passoriginal: pass

    },
    //post back function
    function (data, status)
    {
        //alert('mail/n'+data);
    });



}//sendregistermail()
*/