$( "body" ).on( "click", ".phpadminButtonEditRollForUserId", function(){		$('.phpadminButtonEditRollForUserId').css('display','none');		var myUserRollId = $(this).attr('value');		var myUserRoll = $(this).attr('id');				//alert(myUserRollId);		localStorage["poorbook.userroll"] = myUserRoll;		localStorage["poorbook.userrollid"] = myUserRollId;			$('#txtHintAdmin').html('');		$("#inputUserFinderbyname").val("");				phpadminEditRollForUserId(myUserRollId);});//END $( "body" ).on( "click", ".mySubmitAmigo", function()