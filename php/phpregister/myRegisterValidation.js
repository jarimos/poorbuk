function validate()
{
		//TAKE A LOOK FOR THE WORD SCRIPT USING THE FUNCTION myvalidationantiscript(mystring);
		var mystring=$('#name').val()+$('#mail').val()+$('#pass').val();
		//alert (mystring);
		myvalidationantiscript(mystring);
	
		if ((myvalidationantiscript(mystring))=="success")
		{

	   //REQUIERE VALID EMAIL
/*		var x=$('#mail').val();
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert("Por favor, introduce un email válido");
			return false;
		}*/
		
		//CHECK NO EMPTY
	   if( mystring == "" )
	   {  
		 return false;
	   }
	   if( $('#name').val() == "" )
	   {

		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Por favor. Introduce el nombre o alias que vas a usar en poorbuk";
		var myMessageEnglish='Write at least one user name';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		 $('#name').focus() ;
		 return false;
	   }

		
	   if( $('#mail').val() == "" )
	   {

		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Por favor, introduce un email";
		var myMessageEnglish='Insert an email';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		$('#mail').focus() ;
		return false;
	   }
	   /*
	   if( $('#mail').val() != $('#mail2').val())
	   {

		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Has introducido dos correos electrónicos distintos";
		var myMessageEnglish='You have inserted two diferents emails';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		 $('#mail2').focus() ;
		 return false;
	   }
         * 
            */
	   
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

}

   return( true );
}
