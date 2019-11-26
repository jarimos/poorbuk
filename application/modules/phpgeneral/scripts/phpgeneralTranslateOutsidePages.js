
function traductorStart()
{
//poner en el footer para que se pueda usar para todas las páginas   
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function menuActivePoorbukOutside()
{
    $('.menuMain').each(function(i, obj) {
        $(this).removeClass('active');
    });
    var myPageName= location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    //var myPageName= location.pathname.substring(location.pathname.lastIndexOf("?") + 5);
    //alert(myPageName);
    
    


myPageName = getParameterByName('page'); //"param1Value"
//alert(myPageName);
//Url.get.param2 //"param2Value"
    switch (myPageName) 
    {
		
        case 'registrarse':
                $('.registrarse').addClass('active');
                //alert(myPageName);
                break;
        case 'pindex' || 'index.php' ||'':
                $('.pindex').addClass('active'); 
                break;
        case 'acercade':
                $('.acercade').addClass('active'); 
                break;
        case 'contact':
                $('.contact').addClass('active'); 
                break;		

        default:
                //$('.index').addClass('active');
                break;		
    
    }
}




function translatePoorbukOutside()
{
   var myUserLanguage =  localStorage["poorbook.myuserlanguage"];
   if(myUserLanguage ==undefined)
   {
       myUserLanguage ="English";
   }
   //alert("myUserLanguage = " + myUserLanguage);
   
 /*ENGLISH*/
   if(myUserLanguage =="English")
   {
       //alert("myUserLanguage =English");
       //
       //CONTENT
       $('#acercadeTextContentEnglish').css("display","block");   
       $('#acercadeTextContentSpanish').css("display","none");  
       
       //CONTENT CONTACT FORMS
       $('#contactFormContentEnglish').css("display","block");   
       $('#contactFormContentSpanish').css("display","none"); 
       
       //MENUS
       $('#acercadeContentSpanish').css("display","none");      
       $('#aboutUsContentEnglish').css("display","block");
       $('#contactoContentSpanish').css("display","none");      
       $('#contactContentEnglish').css("display","block");      
       $('#iniciarSesionContentSpanish').css("display","none");      
       $('#startSessionContentEnglish').css("display","block");   
       $('#nuevoUsuarioContentSpanish').css("display","none");      
       $('#newUserContentEnglish').css("display","block"); 
 
/*APP*/
       	$('.appInfo').each(function(i, obj) 
        {
            //$(this).text('MUHAHAHAHA');
        });

 
/*REGISTER FORM LABELS*/
       	$('.nameOrAlias').each(function(i, obj) 
        {
            $(this).text('Name or alias');
        });
                
       	$('.email').each(function(i, obj) 
        {
            $(this).text('Email');
        });
               
       	$('.repeatEmail').each(function(i, obj) 
        {
            $(this).text('Repeat your email');
        });
        
       	$('.createPassword').each(function(i, obj) 
        {
            $(this).text('Create a password');
        });
        
       	$('.repeatYourPassword').each(function(i, obj) 
        {
            $(this).text('Repeat your password');
        });
                
        $('.userConditions').each(function(i, obj) 
        {
            $(this).html("When you click the button <br>send, you are accepting our \n\
            </br><a href='files/termsofusepoorbook/TERMSOFUSEPOORBOK.rtf'>Use conditions</a>");
        });
               
       	$('.sendButton').each(function(i, obj) 
        {
            $(this).text('Send');
        });
        
        $('.forgotMyPass').each(function(i, obj) 
        {
            $(this).text('I forgot my pass');
        });
/*LOGIN FORM LABELS*/  
        $('.nuevoUsuario').each(function(i, obj) 
        {
            $(this).text('New user');
        });  
        
        $('.yourPassword').each(function(i, obj) 
        {
            $(this).text('Password');
        });      
/*FORGOT MY PASWORD*/  
        $('.logIn').each(function(i, obj) 
        {
            $(this).text('Log in');
        });      
        
        $('.forgotYourPassInfo').each(function(i, obj) 
        {
            $(this).text(' If you forgot your password, write your email, \n\
            press send and a message will be sent to you');
        });          
        
        
        
       
   }
   
   
   
   
   
 /*SPANISH*/
   
   
   
   
   
   
   
   else if(myUserLanguage =="Spanish")
   {
        //alert("myUserLanguage =Spanish");
        //location.reload(true);
        
       //CONTENT ABOUT
       $('#acercadeTextContentEnglish').css("display","none");   
       $('#acercadeTextContentSpanish').css("display","block");  
       //CONTENT CONTACT FORMS
       $('#contactFormContentEnglish').css("display","none");   
       $('#contactFormContentSpanish').css("display","block"); 

       
       //MENUS
       $('#acercadeContentSpanish').css("display","block");      
       $('#aboutUsContentEnglish').css("display","none");
       $('#contactoContentSpanish').css("display","block");      
       $('#contactContentEnglish').css("display","none");      
       $('#iniciarSesionContentSpanish').css("display","block");      
       $('#startSessionContentEnglish').css("display","none");   
       $('#nuevoUsuarioContentSpanish').css("display","block");      
       $('#newUserContentEnglish').css("display","none"); 
        
        
        
/*APP*/
       	$('.appInfo').each(function(i, obj) 
        {
            //$(this).text('TTTTTTTT');
        });
/*REGISTER FORM LABELS*/
       	$('.nameOrAlias').each(function(i, obj) 
        {
            $(this).text('Nombre o alias');
        });
                
       	$('.email').each(function(i, obj) 
        {
            $(this).text('Correo electrónico');
        });
               
       	$('.repeatEmail').each(function(i, obj) 
        {
            $(this).text('Repite tu correo ');
        });
        
       	$('.createPassword').each(function(i, obj) 
        {
            $(this).text('Inventa una contraseña');
        });
        
       	$('.repeatYourPassword').each(function(i, obj) 
        {
            $(this).text('Repite tu contraseña');
        });
                
        $('.userConditions').each(function(i, obj) 
        {
            $(this).html('Al hacer click en el botón<br>enviar estas aceptando \n\
            las </br><a href="files/termsofusepoorbook/POORBOOKCONDICIONESDEUSO.rtf">Condiciones de uso</a>');
        });
               
       	$('.sendButton').each(function(i, obj) 
        {
            $(this).text('Enviar');
        });
        
        $('.forgotMyPass').each(function(i, obj) 
        {
            $(this).text('Olvidé mi contraseña');
        });
        
  
        
/*LOGIN FORM LABELS*/  
        $('.nuevoUsuario').each(function(i, obj) 
        {
            $(this).text('Nuevo usuario');
        });  
        $('.yourPassword').each(function(i, obj) 
        {
            $(this).text('Contraseña');
        });
/*FORGOT MY PASWORD*/  
        $('.logIn').each(function(i, obj) 
        {
            $(this).text('Iniciar sesión');
        });   
        
        $('.forgotYourPassInfo').each(function(i, obj) 
        {
            $(this).text(' Si has olvidado tu contraseña, escribe tu correo \n\
            electrónico y un mensaje con tu contraseña será enviado a tu correo electrónico');
        });          
        
        
        
        
        
   }


  

/*SHOW LOGIN AND REGISTER FOR AVOIDING TRANSITIONS*/
    setTimeout(function() 
    {
        $('#registrarseContent').css("display","block");   
        $('#loginContent').css("display","block"); 	
    }, 200);
  
    
}

$( "body" ).on( "click", ".englishFlag", function()
{
    //alert("English");

    localStorage["poorbook.myuserlanguage"]="English";
    translatePoorbukOutside();
    //pageNameToURL();
    
    
});//END ONCLICK
$( "body" ).on( "click", ".spanishFlag", function()
{
    
    //alert("Spanish");
    localStorage["poorbook.myuserlanguage"]="Spanish";
    translatePoorbukOutside();
    //pageNameToURL();

});//END ONCLICK

//alert("lort");
traductorStart();
menuActivePoorbukOutside();
translatePoorbukOutside();


/* WORKING BUT NOT USED
function pageNameToURL()
{
    var myPageName= location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    //alert(myPageName);
    switch (myPageName) 
    {
		
        case 'registrarse.php':
                //alert(myPageName);
                window.location.assign("registrarse.php");
                break;
        case 'pindex':
                window.location.assign("pindex.php");           
                break;
        case 'acercade':
                window.location.assign("acercade.php");   
                break;
        case 'contact':
                window.location.assign("contact.php");   
                break;		

        default:
                //$('.index').addClass('active');
                break;		
    
    }
}
*/




