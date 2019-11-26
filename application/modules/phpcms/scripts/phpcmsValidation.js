function validate()
{
		//alert("phpcmsValidation.js");
		var pWebsiteName =$('#pWebsiteName').val();
		var pTitle =$('#pTitle').val();
		var pUrl =$('#pUrl').val();
		var pTextEditorObjectNow = document.getElementById("textEditorJarim");
		var pTextEditorHTML = pTextEditorObjectNow.innerHTML;
		var pHeader = $('select[name="pHeader"]').val();
		var pMenu = $('select[name="pMenu"]').val();		
		var pContent = $('select[name="pContent"]').val();		
		var pFooter = $('select[name="pFooter"]').val();
		var pType = $('select[name="pType"]').val();		
		var pPublished = $('select[name="pPublished"]').val();		
		var pCommentAllowed = $('select[name="pCommentAllowed"]').val();
		var pLoveAllowed = $('select[name="pLoveAllowed"]').val();		
		var pPass =$('#pPass').val();		
		var pPass2 =$('#pPass2').val();	
		
		
		var mName =$('#mName').val();		
		var mParent = $('select[name="mParent"]').val();	
		
		//alert("mName "+mName+"mParent "+mParent);

		
		
		
	   if( mName == mParent )
	   {
			//alert(pWebsiteName);
			//MULTILANGUAGE MESSAGE
			var myMessageSpanish="Un post no puede ser submenú de su propio menú. Por favor, elige otro parent menu";
			var myMessageEnglish='Please, a menu can\'t be submenu as self-parent. Choose another parent menu';
			timeToShowSeconds = 5;
			multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
			//END MULTILANGUAGE MESSAGE
			$('select[name="mParent"]').val("NO");	
			$('select[name="mParent"]').focus();	
			setStatus("Finished", "divLoadingStatus");	
			return false;
	   }

		//CLEAN URL		
		pUrl = pUrl.replace(/\W/g, "_");
		$('#pUrl').val(pUrl);
					
		
			if (pWebsiteName=="")
			{
				pWebsiteName = $('select[name="websiteNamesForUser"]').val();	
				
			}
			
		

/*
		alert(
		"pTitle = "+pTitle+"\n" + 
		"pTitle = "+pUrl+"\n" + 
		"pTextEditorHTML = " + pTextEditorHTML + "\n" + 
		"pHeader = " + pHeader + "\n" +
		"pMenu = " + pMenu + "\n" +
		"pContent = " + pContent + "\n" +
		"pFooter = " + pFooter + "\n" +
		"pType = " + pType + "\n" +		
		"pPublished = " + pPublished + "\n" +
		"pCommentAllowed = " + pCommentAllowed + "\n" +
		"pLoveAllowed = " + pLoveAllowed + "\n" +
		"pPass = " + pPass + "\n" +
		"pPass2 = " + pPass2 + "\n" 
	
		);
*/		
	

 
	   if( pWebsiteName == -1 )
	   {
		//alert(pWebsiteName);
		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Por favor. Introduce o elige el nombre del website de ésta página";
		var myMessageEnglish='Please, write or select a websites name';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		$('#pWebsiteName').focus() ;
		setStatus("Finished", "divLoadingStatus");	
		return false;
	   }
		//CHECK IF TITEL IS NOT EMPTY	
	   if( pTitle == "" )
	   {
		//alert("lort");
		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Por favor. Introduce el título de ésta página";
		var myMessageEnglish='Please, write at least the titel';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		 $('#pTitle').focus() ;
		 setStatus("Finished", "divLoadingStatus");	
		 return false;
	   }



	   
	   if( pUrl == "" )
	   {
		//alert("lort");
		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Por favor. Introduce la url de éste archivo. Espacios entre palabras no son permitidos.";
		var myMessageEnglish='Please,insert a valid url. Spaces between words are not allowed';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		 $('#pUrl').focus() ;
		 setStatus("Finished", "divLoadingStatus");	
		 return false;
	   }



		//CHECK IF TITEL IS NOT EMPTY	
	   if(
		   pTitle == "" || pUrl == "" || pHeader == "" || pMenu == "" || pContent == "" || pFooter == "" || pType == "" || pPublished == "" || 
		   pCommentAllowed == "" || pLoveAllowed == ""  )
	   {
		//alert("lort");
		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Error. Algún campo requerido está vacío";
		var myMessageEnglish="Error. Some required field is empty";
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		 $('#pTitle').focus() ;
		 setStatus("Finished", "divLoadingStatus");	
		 return false;
	   }	
		//CHECK PASS IS OK WITH RELOADED PASS
		  if( $('#pPass2').val() != $('#pPass').val())
	   {
		//MULTILANGUAGE MESSAGE
		var myMessageSpanish="Has introducido dos contraseñas distintas";
		var myMessageEnglish='You have inserted two different passwords';
		timeToShowSeconds = 5;
		multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
		//END MULTILANGUAGE MESSAGE
		 $('#pPass2').focus() ;
		 setStatus("Finished", "divLoadingStatus");	
		 return false;
	   }
		
	
	   
 //alert("validation OK");



   return true ;
}