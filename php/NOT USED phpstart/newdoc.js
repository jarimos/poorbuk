/*RESUMEN: localStorage["poorbook.flag"] SHOULD BE ACTIVATED IN LOG IN AND REGISTER AND FORGOT PASS LOG IN
IF THE USER TRY TO ACCESS DIRECTLY WITOUT LOG-IN OR REGISTER IT WILL FAIL.
PASSWORD CHANGED TO SECURE ACCESS FROM THE SAME COMPUTER AFTER LOG-IN/REGISTER*/

$(document).ready(function ()
{

	var myuserpasscoded = localStorage["poorbook.myuserpasscoded"];
	var myuserid = localStorage["poorbook.myuserid"];
	var myusername = localStorage["poorbook.myusername"];
	var usercssbackgroundpicture = localStorage["poorbook.usercssbackgroundpicture"];
	
	//alert(localStorage["poorbook.flag"]);
	if (localStorage["poorbook.flag"] == 'true') 
	{
		$.post("php/phpstart/newdoc.php",
		{
			myusername: myusername,
			myuserpasscoded: myuserpasscoded,
			myuserid: myuserid,
			usercssbackgroundpicture: usercssbackgroundpicture

		},
		function (data, status)
		{

			//alert( "newdoc.js Data Loaded: " + data);	
			var obj = eval ("(" + data + ")");
			if(obj.status=='success')
			{

				localStorage["poorbook.myuserpasscoded"] = "";
				localStorage["poorbook.myuserpasscoded2"] = obj.passUserOriginalCoded;
				localStorage["poorbook.flag"] = 'false';
				//DONT NEED TO GO TO POORBOOK.HTML. BECAUSE WE ARE THERE ALLREADY// ONLY GOES OUT IF NOT TRUE
			
			} 
			if(obj.status=='error')
			{
				localStorage["poorbook.flag"] = 'false';
				window.location.replace("");
				
			}
		

		});	//END POST newdoc.php
	}
	 else
	{
//uncomment after testing				window.location.replace("");
			
	} //END IF localStorage["poorbook.flag"]==TRUE 

	//$("#myloadstart").load("php/phpstart/startscriptsjarimos.php");

});	// END $(document).ready(function ()


