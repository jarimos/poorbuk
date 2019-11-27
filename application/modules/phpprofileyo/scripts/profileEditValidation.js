
// Form validation code will come here.

$( "body" ).on( "click", "#buttonSubmitProfile", function()
{
    phpprofileyoPasswordVerificationAndUpdate();
    //phpgeneralPasswordVerification();


});//END ONCLICK


function phpprofileyoPasswordVerificationAndUpdate()
{


   if( document.myForm.oldpass.value !== "" && document.myForm.pass.value !== "")
   {
       
        //START STATUS
        setStatus('Loading...','divLoadingStatus');
        //GET OLD PASS
        var oldpass = document.myForm.oldpass.value;
        //SAVE NEW PASS
        localStorage["poorbook.otros"]= document.myForm.pass.value;
        //GET PASS FROM LOCAL STORAGE
        var myuserpass = localStorage["poorbook.otros"];
        var myuserid=localStorage["poorbook.myuserid"];
/*
        var oldpass = document.myForm.oldpass.value;
        var myuserpass = document.myForm.pass.value;
        //alert('friendShowAll');
        var myuserid=localStorage["poorbook.myuserid"];
        //var myusername=localStorage["poorbook.myusername"]
*/
        $.post("http://localhost/application/modules/phpprofileyo/phpprofileyoPasswordVerificationAndUpdate.php",
        {
                oldpass: oldpass,
                myuserpass: myuserpass,
                myuserid: myuserid
        },              
        function (data, status) 
        {

            //alert('phpprofileyoPasswordVerification.js IF DATA =1 THEN COOL : \n'+data);
            if (data=="1")
            {
                //VALIDATE THE REST OF THE FIELDS
                validateProfileEditFields();
                setStatus('Finished','divLoadingStatus'); 
                
            }
            else
            {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Tu vieja contraseña no es correcta';
                var myMessageEnglish='Your old password is not valid';
                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE	
            }


        });
    
   }
   else
   {
       validateProfileEditFields();
       //return true;
   }
}



function validateProfileEditFields()
{
    var myuserlanguage = $('select[name="language"]').val();
    localStorage["poorbook.myuserlanguage"]=myuserlanguage;


    //SECURITY DISABLED 2018 - $("#myForm").attr("action", "application/modules/phpprofileyo/profileEditPostToDB.php");
    setStatus("Loading...", "divLoadingStatus");
    var myuserid= localStorage["poorbook.myuserid"];
    var userfolder= localStorage["poorbook.userfolder"];
    $("#myuserid").val(myuserid);
    $("#userfolder").val(userfolder);	

//  alert(myuserlanguage +" "+myuserid+" "+ userfolder);

	
   if( document.myForm.myusername.value != "" )
   {
        localStorage["poorbook.myusername"]=$("#myusername").val();
   }

   if( document.myForm.pass.value != document.myForm.repeatpass.value)
   {

        //MULTILANGUAGE MESSAGE
        var myMessageSpanish='Has introducido dos contraseñas distintas. Por favor, introduce la misma contraseña en las dos cajas';
        var myMessageEnglish='Please, you writed two different passwords. Write the same password in the two boxes.';
        timeToShowSeconds = 3;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE	
        document.myForm.pass.focus() ;
        return false;
   }
   

    //MULTILANGUAGE MESSAGE
    var myMessageSpanish='Perfil guardado';
    var myMessageEnglish='Profile saved';
    timeToShowSeconds = 3;
    multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
    //END MULTILANGUAGE MESSAGE	
 
    setTimeout(function() 
    {
        //SUBMIT THE FORM
        $("#myForm").submit();
    }, 1500);

    //return true;
}





/*
function phpgeneralPasswordVerification()
{


    if( document.myForm.oldpass.value !== "" )
    {
       


        var oldpass = document.myForm.oldpass.value;
        var myuserid=localStorage["poorbook.myuserid"];
        //alert("oldpass = "+ oldpass);
        //var myusername=localStorage["poorbook.myusername"]

        $.post("application/modules/phpgeneral/phpgeneralPasswordVerification.php",
        {
                oldpass: oldpass,
                myuserid: myuserid
        },              
        function (data, status) 
        {

            alert('phpprofileyoPasswordVerification.js: \n'+data);
            if (data=="1")
            {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Felicidades: tu vieja contraseña es correcta';
                var myMessageEnglish='Congratullations: your old password is valid';
                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE
                
            }
            else
            {
                //MULTILANGUAGE MESSAGE
                var myMessageSpanish='Tu vieja contraseña NO es correcta';
                var myMessageEnglish='Your old password is NOT valid';
                timeToShowSeconds = 3;
                multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
                //END MULTILANGUAGE MESSAGE	
            }


        });
    
    }
    else
    {
        //MULTILANGUAGE MESSAGE
        var myMessageSpanish='Tu vieja contraseña NO es correcta';
        var myMessageEnglish='Your old password is NOT valid';
        timeToShowSeconds = 3;
        multilanguageMessage(myMessageSpanish,myMessageEnglish,timeToShowSeconds);
        //END MULTILANGUAGE MESSAGE	
    }

}

*/