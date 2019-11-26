//alert('lort');
//IF showNewIcon=YES SHOW ICON-NEW...IF showNewIcon=NO SHOW NORMAL ICON 

function phpgeneralNotificationsChooseLanguageAndShow(showNewIcon) 
{

	var myuserlanguage = localStorage["poorbook.myuserlanguage"];

	if (showNewIcon=="YES")
	{
		if (myuserlanguage=="Spanish")
		{
			$('#notificationsblack4242icon').attr("src","files/icons/notificationsblack4242NEWicon.png");
			$('#menuMostrarMenu').html('<img src="files/icons/menuMostrarMenuNEW.png">');
		}
		if (myuserlanguage=="English")
		{
			$('#notificationsblack4242icon').attr("src","files/icons/AVISOS420ENGLISHNEW.png");
			
			$('#menuMostrarMenu').html('<img src="files/icons/menuMostrarMenuNEW.png">');



		}


	}
	else
	{

		if (myuserlanguage=="Spanish")
		{
			$('#notificationsblack4242icon').attr("src","files/icons/notificationsblack4242icon.png");
			$('#menuMostrarMenu').html('<img src="files/icons/menuMostrarMenu.png">');
			//$('#friends4242icon').attr("src","files/icons/friends4242icon.png");
		}
		if (myuserlanguage=="English")
		{
			$('#notificationsblack4242icon').attr("src","files/icons/AVISOS420ENGLISH.png");
			$('#menuMostrarMenu').html('<img src="files/icons/menuMostrarMenu.png">');
		}	
}



}

