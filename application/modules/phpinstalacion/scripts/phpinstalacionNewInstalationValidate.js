
function phpinstalacionNewInstalationValidate()
{

	//$("#myForm").attr("action", "application/modules/phpprofileyo/profileEditPostToDB.php");


	if( document.myForm.instaname.value == "" )
	{
		alert( "Por favor, inserta un nombre para la instalación" );
		document.myForm.instaname.focus() ;

		return false;
	}
	else
	{
		setStatus("Loading...", "divLoadingStatus");
		return true ;

	}


}
