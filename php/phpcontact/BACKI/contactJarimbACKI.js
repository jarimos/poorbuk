


		//find my button and add click event
		$('#buttonContact').click(function () 
		{

			/********************MESSAGE**************************************************************/
			$("#contentContact").append("<div class='messageBoxForgetPass' >Pass sent to your email</div>")
			setTimeout(function()
			{  
				$('.messageBoxForgetPass').fadeOut('fast');  
			}, 3000); // <-- time in milliseconds		
			/********************END MESSAGE**************************************************************/
			
			//GET MAIL FROM INPUT BOX
			var mail = $('[name="mail"]').val();
			var message = $('[name="textAreaMailMessage"]').val();
			//RESET INPUT EMAIL TO NOTHING
			$('[name="mail"]').val("");
			$('[name="textAreaMailMessage"]').val("");
			//alert(mail);
			//alert(message); 
			
			//***************POST FUNCTION 
            $.post("php/phpcontact/contactSendEmail.php",
            {
                    //HER WE PASS OUR  VARIABLES
                mail: mail,
				message: message
					
            },//post back function IF SUCCESS
            function (data, status)
			{
				//IF SUCCESSS DO ANYTHING
				//alert('love done');
            });
			//***************END POST FUNCTION 
			
		});
	 
	 


/******************END CONTACT***********************************************************/