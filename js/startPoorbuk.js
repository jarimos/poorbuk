
//window.location.assign("/maintenance.html");

if (localStorage["poorbook.myuserlanguage"])
{
	//alert(localStorage["poorbook.myuserlanguage"]);
	if (localStorage["poorbook.myuserlanguage"]=="English")
	{
	
		if (localStorage["poorbook.mail"])
		{
			window.location.assign("pindex.php");
		}
		else
		{
			window.location.assign("inicio.php");		
		
		}
	}
	if (localStorage["poorbook.myuserlanguage"]=="Spanish")
	{
		
		
		if (localStorage["poorbook.mail"])
		{
			window.location.assign("pindex.php");
		}
		else
		{
			window.location.assign("inicio.php");		
		
		}
	}


}
else
{
	//alert('Choose language html');
	window.location.assign("/language.html");
	
}
