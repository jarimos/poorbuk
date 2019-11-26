

function phpgeneralPassword_verification_by_UserId()
{


    if( document.myForm.oldpass.value !== "" )
    {
       


        var oldpass = document.myForm.oldpass.value;
        var myuserid=localStorage["poorbook.myuserid"];
        //alert("oldpass = "+ oldpass);
        //var myusername=localStorage["poorbook.myusername"]

        $.post("application/modules/phpgeneral/phpgeneralPassword_verification_by_UserId.php",
        {
                oldpass: oldpass,
                myuserid: myuserid
        },              
        function (data, status) 
        {

            alert('phpgeneralPassword_verification_by_UserId.js: \n'+data);
            if (data=="1")
            {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Felicidades: tu vieja contraseña es correcta';
                var myMessageEnglish='Congratullations: your old password is valid';
                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE
                
            }
            else
            {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Tu vieja contraseña NO es correcta';
                var myMessageEnglish='Your old password is NOT valid';
                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE	
            }


        });
    
    }
    else
    {
        //MULTILANGUAGE MESSAGE
        var myMessageSpanish='Tu vieja contraseña NO es correcta';
        var myMessageEnglish='Your old password is NOT valid';
        timeToShowSeconds = 3;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE	
    }

}



