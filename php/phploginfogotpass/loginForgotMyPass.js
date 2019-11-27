
		
$( document ).ready(function() {



$( "#buttonSubmitIForgotMyPass" ).click(function() 
{
    
        var mail = $('#mail').val();
        localStorage["poorbook.mail"] = mail;
        //alert(mail);
        if (mail ==="")
        {
            //MULTILANGUAGE MESSAGE
            var myMessageSpanish='Introduce un correo electrónico';
            var myMessageEnglish="Enter an email";
            timeToShowSeconds = 3;
            multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
            //END MULTILANGUAGE MESSAGE
            exit(); 
        }
        else
        {
            //MULTILANGUAGE MESSAGE
            var myMessageSpanish='Un momento por favor...';
            var myMessageEnglish='Wait a momment please...';
            timeToShowSeconds = 3;
            multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
            //END MULTILANGUAGE MESSAGE
        }



        $.post(localStorage["poorbook.poorbuk_Path_Relativ_Global"]+"php/phploginfogotpass/loginForgotMyPassDB.php",
        {

                mail: mail

        },
        //post back function
        function (data, status)
        {
            alert('loginForgotMyPass.js'+data);
            var obj = eval ("(" + data + ")");
            var myStatus = obj.status;	

            if (myStatus=="error")
            {

                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Correo electrónico no registrado!!!!';
                var myMessageEnglish='This email is not registered!!!!';
                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE

            }
            if (myStatus=="success")
            {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Tu contraseña ha sido enviada a tu correo electrónico';
                var myMessageEnglish='Your pass has been sent to your email';

                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE

                setTimeout(function()
                {  

                    window.location.replace("http://localhost/index.php?page=pindex");
                //window.location.replace("index.html");
                }, 3000); // <-- time in milliseconds  

            }


        });	
			


});
				
});//$( document ).ready(function() {


