$(document).ready(function ()
{
    //alert("LOGIN poorbuk_Path_Htttp_Global = "+ localStorage["poorbook.poorbuk_Path_Htttp_Global"]);
    var mail= localStorage["poorbook.mail"];
    var pass = localStorage["poorbook.otros"]; 	
    var myflag = typeof(mail);
    if (myflag!=='undefined' && mail!=="")
    {
            var myflag = typeof(localStorage["poorbook.mail"]);
            if (myflag!=='undefined' && pass!=="")
            {

                    $('#mail').val(mail);
                    $('#pass').val(pass);
                    //login();
            }

    }
});	//$(document).ready(function ()	

$( "body" ).on( "click", "#nuevousuario", function()
{
    
    window.location.assign("index.php?page=registrarse");
 
    
});

$( "body" ).on( "click", "#buttonIForgotMyPass", function()
{
    
    window.location.assign("index.php?page=iniciarsesionolvidepass");
    //alert("hola"); 
    
});


$( "body" ).on( "click", "#buttonlogin", function()
{	 		
		    //alert("hola");	
		    //REQUIERE VALID EMAIL
/*			var x=$('#mail').val();
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert("Por favor, introduce un email válido");
				return false;
			}
			else
			{
				localStorage["poorbook.mail"] = $('#mail').val();
				login();
			}*/
			localStorage["poorbook.mail"] = $('#mail').val();
			localStorage["poorbook.otros"] = $('#pass').val();
			login();

});
		
			
function login()
{
        //alert('eress gilipollas');

        /**********************************************************************************************/
    //GET INPUT BOX DATA
    var mail = $('#mail').val();
    var pass = $('#pass').val();




    if(mail=='' || pass=='')
    {

            //MULTILANGUAGE MESSAGE
            var myMessageSpanish='Los datos introducidos son incorrectos';
            var myMessageEnglish='The data are not valid';
            timeToShowSeconds = 4;
            multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
            //END MULTILANGUAGE MESSAGE	
            exit();

    }

/*      2018 JARIM 2018 ENABLE IN SERVER???
        localStorage["poorbook.poorbuk_Path_Htttp_Global"] +
        localStorage["poorbook.poorbuk_Path_Relativ_Global"]  +
    //POST ALL DATA IN FORM formlogin
    $.post(localStorage["poorbook.poorbuk_Path_Relativ_Global"]+"php/phplogin/login.php",
*/   

    //POST ALL DATA IN FORM formlogin
    $.post("http://www.poorbuk.com/php/phplogin/login.php",
    {

            mail: mail,
            pass: pass

    },

    //post back function
    function (data, status)
    {
        //alert( "Data Loaded login.js NOW JARIM: " + data);						
        //CONVERT STRING TO JSON OBJECT
        
                /*
        var txt = '{"employees":[' +
        '{"firstName":"John","lastName":"Doe" },' +
        '{"firstName":"Anna","lastName":"Smith" },' +
        '{"firstName":"Peter","lastName":"Jones" }]}';

        var obj = eval ("(" + txt + ")");

        alert (obj.employees[1].firstName + " " + obj.employees[1].lastName);
        */
        var obj = eval ("(" + data + ")");
        //var obj = JSON.parse(text);
        //alert(obj.mail );
        //alert(obj.mail + obj.passUserOriginalCoded + obj.status);
        if(obj.status=='success')
        {
                localStorage["poorbook.mynotificationspost"] = 0;//INITIALIZE	
                localStorage["poorbook.mynotificationsmessage"] = 0;//INITIALIZE	
                localStorage["poorbook.mynotificationsfriend"] = 0;//INITIALIZE	
                localStorage["poorbook.myuserpasscoded"] = obj.passUserOriginalCoded;
                localStorage["poorbook.myuserlanguage"] = obj.userlanguage;
                /*localStorage["poorbook.usercssbackgroundpicturesize"] = obj.usercssbackgroundpicturesize;
                localStorage["poorbook.usercssbackgroundcolor"] = obj.usercssbackgroundcolor;
                localStorage["poorbook.usercssbackgroundpicture"] = obj.usercssbackgroundpicture;*/
                localStorage["poorbook.myuserbirthday"] = obj.userbirthdate;
                localStorage["poorbook.myuserid"] = obj.userid;
                localStorage["poorbook.myusername"] = obj.username;
                localStorage["poorbook.myuserphoto"] = obj.userphoto;
                localStorage["poorbook.userfolder"] = obj.userfolder;
                localStorage["poorbook.ipadr"] = obj.ipadr;
                localStorage["poorbook.userroll"] = obj.userroll;
                //FOR ENSURE USER IS LOGGED IN FROM REGISTER OR LOG IN IN poorbuk
                localStorage["poorbook.flag"] = 'true';
                //var userroll = localStorage["poorbook.userroll"];
                //alert(userroll);

                //alert(localStorage["poorbook.myuserphoto"]);
                //alert(localStorage["poorbook.ipadr"]);
                /*var myuser = 'usermail\n'+localStorage["poorbook.mail"] +'\nuserpasscoded\n'+ localStorage["poorbook.passUserOriginalCoded"] +
                '\nmyusermail\n'+localStorage["poorbook.myusermail"] +'\nmyuserpass\n'+ localStorage["poorbook.myuserpasscoded"] +
                '\nmyuserlanguage\n'+localStorage["poorbook.myuserlanguage"] +'\nusercssbackgroundpicturesize\n'+ localStorage["poorbook.usercssbackgroundpicturesize"]+
                '\nusercssbackgroundcolor\n'+localStorage["poorbook.usercssbackgroundcolor"] +'\nusercssbackgroundpicture\n'+ localStorage["poorbook.usercssbackgroundpicture"] +
                '\nmyuserbirthday\n'+localStorage["poorbook.myuserbirthday"] +'\nmyuserid\n'+ localStorage["poorbook.myuserid"] +
                '\nmyusername\n'+localStorage["poorbook.myusername"] +'\nmyuserphoto\n'+ localStorage["poorbook.myuserphoto"];
                */
                //alert('obj.status = '+obj.status);
                //window.location.assign("/poorbuk.php");
                //alert("poorbuk.php");
                //
                //
                window.location.assign("index.php?page=poorbuk");
                //window.location.assign("http://www.poorbuk.com/php/phplogin/login.php");
                
        } 
        if(obj.status=='error')
        {

                localStorage["poorbook.otros"]=""; 
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Los datos introducidos son incorrectos';
                var myMessageEnglish='The data are not valid';
                timeToShowSeconds = 4;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE	
                exit();
        }

    });	


/***********************************************************************************************/


}//function login()



