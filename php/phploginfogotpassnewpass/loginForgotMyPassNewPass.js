//alert('cerdisodf')
$(document).ready(function ()
{
//alert("lort");

$( "body" ).on( "click", "#buttonpassforgotnewpass", function()
{
    //alert("lort2");
 //2018   if(iniciarsesionolvidepassnewpassValidation())
 //2018   {
        //START STATUS
        setStatus('Loading...','divLoadingStatus');
        //alert("lortttttttttt");
        registerForgotPass();  
 //2018   }

});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
/*BE CAREFULL....YOU NEED A LINK FROM A URL TO TEST IT!!!!!!-OTHERWISE YOU GET ERROR!!!*/
function registerForgotPass()
{
    //alert("lort3");
    /*
     * 
     * USE THIS URL TO TEST
     * http://localhost/iniciarsesionolvidepassnewpass.php?a=N7TrbR1hThS1w5palO0KccHYQkScJqehUG764niqTWYd50wgtJfZvotkUTPO7gQU3KKVS4R7m9NymQwzy7W04PdTvXgKHWkpWCHdQoyIlqFvKnF4uDv4RE4ZSGbVQlQpFQ9zwc8OuumRNCaTY1hs2s
     * 
     * http://localhost/plugintest01/wp-content/plugins/poorbuk/includes/poorbuk/iniciarsesionolvidepassnewpass.php?a=N7TrbR1hThS1w5palO0KccHYQkScJqehUG764niqTWYd50wgtJfZvotkUTPO7gQU3KKVS4R7m9NymQwzy7W04PdTvXgKHWkpWCHdQoyIlqFvKnF4uDv4RE4ZSGbVQlQpFQ9zwc8OuumRNCaTY1hs2s

     * AND THIS PASS
     * N7TrbR1hThS1w5palO0KccHYQkScJqehUG764niqTWYd50wgtJfZvotkUTPO7gQU3KKVS4R7m9NymQwzy7W04PdTvXgKHWkpWCHdQoyIlqFvKnF4uDv4RE4ZSGbVQlQpFQ9zwc8OuumRNCaTY1hs2s
     */

    /*********GET PARAMETER (PASSWORD FOR NEW EMAIL)  FROM THE URL**********************/
    /* 2018 var params = decodeURIComponent(location.search).match(/[a-z_]\w*(?:=[^&]*)?/gi);
    if (!params)
    {
        //MULTILANGUAGE MESSAGE
        var myMessageSpanish="Error. La url no es válida. Prueba otra vez haciendo click en tu email";
        var myMessageEnglish='Error. The url is not valid. Try again clicking in your email';
        timeToShowSeconds = 5;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE
        return false;
    }
    //alert("params = "+params);
    //var params = location.search.match(/[a-z_]\w*(?:=[^&]*)?/gi);
    //alert(params[0]); //Muestra 'a=1'
    //alert(params[1]); //Muestra 'b=2'
    //VALIDATE FOR INJECTION
    var passforgotemporal = params[1];
    var toRemove = 'a=';
    */
    passforgotemporal = getParameterByName('a');
    //alert (passforgotemporal);
    passforgotemporal = passforgotemporal.replace(toRemove,'');
    /**********************************************************************************************/
    //var name = $('#name').val();
    //var passforgotemporal = "lorttttttttt";
    
    var mail = $('#mail').val();
    var pass = $('#pass').val();

    /***********AVOID INJECTION VALIDATION***************/		

    //REMOVE SPACES
    //name = name.replace(/\s/g, '');
    mail = mail.replace(/\s/g, '');
    pass = pass.replace(/\s/g, '');
    passforgotemporal = passforgotemporal.replace(/\s/g, '');

    //REMOVE EQUAL
    var toRemove = '=';	
    //name = name.replace(/=/g,'');
    mail = mail.replace(/=/g,'');	
    pass = pass.replace(/=/g,'');
    passforgotemporal = passforgotemporal.replace(/=/g,'');		
   //alert('pass = ' + pass + 'mail = '+mail+' '+pass + ' passforgotemporal = ' + passforgotemporal);
    /***********AVOID INJECTION***************/		

    //alert( localStorage["poorbook.poorbuk_Path_Relativ_Global"]);
    /***********POST ALL***************/	
    $.post(localStorage["poorbook.poorbuk_Path_Relativ_Global"]+"php/phploginfogotpassnewpass/loginForgotMyPassNewPassDB.php",
    {

            passforgotemporal:passforgotemporal,
            mail: mail,
            pass: pass

    },

    //post back function
    function (data, status)
    {

        //alert( "Data Loaded C:\xampp\htdocs\poorbuk\php\phploginfogotpassnewpass\loginForgotMyPassNewPass.js: " + data);	
        var obj = eval ("(" + data + ")");

        if(obj.status=='success')

        {
                //alert("status = " + obj.status);
                //sendregistermail(mail,pass);
                //loginFromRegister(mail,pass);
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
                //window.location.replace("poorbuk.php");
                //window.location.replace("poorbuk.php");
                window.location.replace("http://localhost/index.php?page=poorbuk");
        } 
        if(obj.status=='error')
        {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish="Error . Tal vez has introducido mal el correo electrónico o no estás registrado.Vuelve a intentarlo o contacta a nuestro equipo.";
                var myMessageEnglish="Tecnichal error. May be your email is wrong or you are not registered. Try again or contact our team for support.";
                timeToShowSeconds = 5;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                
 		setTimeout(function() 
		{
                    //window.location.replace("iniciarsesionolvidepass.php");
                    //window.location.replace("http://localhost/index.php?page=pindex");
		}, 5000);               
                

        }

    });	
    /***********END POST ALL***************/

			
			

}//function register()
/***********************************************************************************************/


    function loginFromRegister(mail, pass)
    {

        /***********POST ALL DATA TO login.php*************************************************/

        $.post("php/phplogin/login.php",
                {
                    mail: mail,
                    pass: pass

                },
        //post back function
        function (data, status)
        {

            //alert( "loginFromRegister.js Data Loaded: " + data);	
            var obj = eval("(" + data + ")");

            localStorage["poorbook.myuserpasscoded"] = obj.passUserOriginalCoded;
            localStorage["poorbook.myuserlanguage"] = obj.userlanguage;
            localStorage["poorbook.usercssbackgroundpicturesize"] = obj.usercssbackgroundpicturesize;
            localStorage["poorbook.usercssbackgroundcolor"] = obj.usercssbackgroundcolor;
            localStorage["poorbook.usercssbackgroundpicture"] = obj.usercssbackgroundpicture;
            localStorage["poorbook.myuserbirthday"] = obj.userbirthdate;
            localStorage["poorbook.userfolder"] = obj.userfolder;
            localStorage["poorbook.myuserid"] = obj.userid;
            localStorage["poorbook.myusername"] = obj.username;
            //localStorage["poorbook.myuserphoto"] = obj.userphoto;
            /*var myuser = 'usermail\n'+localStorage["poorbook.mail"] +'\nuserpasscoded\n'+ localStorage["poorbook.passUserOriginalCoded"] +
             '\nmyusermail\n'+localStorage["poorbook.myusermail"] +'\nmyuserpass\n'+ localStorage["poorbook.myuserpasscoded"] +
             '\nmyuserlanguage\n'+localStorage["poorbook.myuserlanguage"] +'\nusercssbackgroundpicturesize\n'+ localStorage["poorbook.usercssbackgroundpicturesize"]+
             '\nusercssbackgroundcolor\n'+localStorage["poorbook.usercssbackgroundcolor"] +'\nusercssbackgroundpicture\n'+ localStorage["poorbook.usercssbackgroundpicture"] +
             '\nmyuserbirthday\n'+localStorage["poorbook.myuserbirthday"] +'\nmyuserid\n'+ localStorage["poorbook.myuserid"] +
             '\nmyusername\n'+localStorage["poorbook.myusername"] +'\nmyuserphoto\n'+ localStorage["poorbook.myuserphoto"];
             */
            //alert('myuser name = '+ localStorage["poorbook.myusername"]);
            //alert(myuser);

            if (obj.status == 'success')

            {
                //STOP STATUS
                setStatus('Finished','divLoadingStatus');
                //window.location.replace("poorbuk.php");
                window.location.assign("poorbuk.php");
            }
            if (obj.status == 'error')
            {
                //STOP STATUS
                setStatus('Finished','divLoadingStatus');
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish="Error técnico. Vuelve a intentarlo o contacta a nuestro equipo.";
                var myMessageEnglish='Tecnichal error. Try again or contact our team for support.';
                timeToShowSeconds = 5;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE
            }


        });
        /***********END POST ALL DATA TO login.php*************************************************/

    }//function login()
    /***********************************************************************************************/



    function sendregistermail(mail, pass)
    {

        $.post("php/phpregister/sendmail.php",
        {
            mail: mail,
            passoriginal: pass

        },
        //post back function
        function (data, status)
        {
            //alert('mail/n'+data);
        });



    }//sendregistermail()

});	//$(document).ready(function ()	



