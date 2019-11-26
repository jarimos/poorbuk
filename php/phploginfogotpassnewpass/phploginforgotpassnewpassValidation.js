function iniciarsesionolvidepassnewpassValidation()
{
    if( $('#mail').val() == "" )
    {
        //MULTILANGUAGE MESSAGE
        var myMessageSpanish="Por favor, introduce un email";
        var myMessageEnglish='Insert an email';
        timeToShowSeconds = 5;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE
        $('#mail').focus();
        return false;
    }



    if( $('#pass').val() == "")
    {
        //MULTILANGUAGE MESSAGE
        var myMessageSpanish="Introduce una contraseña";
        var myMessageEnglish='Insert a password';
        timeToShowSeconds = 5;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE
        $('#pass').focus() ;
        return false;
    }

        //CHECK PASS IS OK WITH RELOADED PASS
    if( $('#pass2').val() != $('#pass').val())
    {
        //MULTILANGUAGE MESSAGE
        var myMessageSpanish="Has introducido dos contraseñas distintas";
        var myMessageEnglish='You have inserted two different passwords';
        timeToShowSeconds = 5;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE
        $('#pass2').focus() ;
        return false;
    }
    
    return true;


}