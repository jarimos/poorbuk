
$( "body" ).on( "click", "#buttonContact", function()
{

			
	var mail = $('[name="mail"]').val();
	var message = $('[name="textAreaMailMessage"]').val();	


			
	var mail = $('[name="mail"]').val();
        var atpos = mail.indexOf("@");
        var dotpos = mail.lastIndexOf(".");
        if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=mail.length) 
        {
            
            //MULTILANGUAGE MESSAGE
            var myMessageSpanish='Tu correo electrónico no es válido';
            var myMessageEnglish="Not a valid e-mail address";
            timeToShowSeconds = 3;
            multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
            //END MULTILANGUAGE MESSAGE
            return false;

        }
	

	if (message=="")  
	{
            //MULTILANGUAGE MESSAGE
            var myMessageSpanish='El mensaje no es válido';
            var myMessageEnglish="Not a valid message";
            timeToShowSeconds = 3;
            multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
            //END MULTILANGUAGE MESSAGE
            return false;
 
        }
	
	
	

	//MULTILANGUAGE MESSAGE
	var myMessageSpanish='El mensaje ha sido enviado :)';
	var myMessageEnglish='The message has been sent :)';
	timeToShowSeconds = 4;
	multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
	//END MULTILANGUAGE MESSAGE	

	//RESET INPUT EMAIL TO NOTHING jarimos@yahoo.com
	$('[name="mail"]').val("");
	$('[name="textAreaMailMessage"]').val("");
	//alert(mail);
	//alert(message); 
	
	//***************POST FUNCTION 
        localStorage["poorbook.poorbuk_Path_Relativ_Global"]= "http://www.poorbuk.com/";
        //alert (localStorage["poorbook.poorbuk_Path_Relativ_Global"]);
	$.post(localStorage["poorbook.poorbuk_Path_Relativ_Global"]+"php/phpcontact/contactSendEmail.php",
	{
            mail: mail,
            message: message
			
	},//post back function IF SUCCESS
	function (data, status)
	{
            //IF SUCCESSS DO ANYTHING
            //alert(data);
	});
	//***************END POST FUNCTION 
	
});
	 
