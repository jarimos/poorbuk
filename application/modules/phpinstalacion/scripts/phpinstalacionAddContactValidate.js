
function phpinstalacionAddContactValidate()
{

	//$("#myForm").attr("action", "application/modules/phpprofileyo/profileEditPostToDB.php");
	var userid=localStorage["poorbook.myuserid"];
	$("#myuserid").val(userid);

	if( document.myForm.instacontactname.value == "" )
	{
		alert( "Por favor, inserta el nombre de tu contacto" );
		document.myForm.instacontactname.focus() ;

		return false;
	}
	
	if( document.myForm.instacontactphone.value == "" )
	{
		alert( "Por favor, inserta el teléfono de tu contacto" );
		document.myForm.instacontactphone.focus() ;

		return false;
	}

		setStatus("Loading...", "divLoadingStatus");
		return true ;




}
