// !!!!WARNING  value is given in userfinder.php // in onkeyup="findUser(this.value)function friendRequestAcceptAllMakeTheButton(){			var myusernow=localStorage["poorbook.myuserid"];		document.getElementById("txtHint").innerHTML="";	  		$.post("application/modules/phpfriends/friendRequestAcceptAllMakeTheButton.php",		{			myusernow: myusernow		},              		function (data, status) 		{					//alert('friendRequestAcceptAllMakeTheButton.js '+data);			document.getElementById("divbuttonFriendRequestAcceptAllButton").innerHTML=data;			TranslateFriendButtonsAllLanguages();					});	}			friendRequestAcceptAllMakeTheButton();