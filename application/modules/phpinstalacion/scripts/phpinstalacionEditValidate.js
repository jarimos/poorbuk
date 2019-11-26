

function phpinstalacionEditValidate()
{

	
	if( document.myForm.instaname.value == "" )
	{
		alert( "Por favor, inserta un nombre para la instalación" );
		document.myForm.instaname.focus() ;

		return false;
	}
	else
	{
		setStatus("Loading...", "divLoadingStatus");
                //alert("trueee");
		return true ;

	}


}
