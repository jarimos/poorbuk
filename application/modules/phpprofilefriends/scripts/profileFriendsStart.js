   $(document).ready(function (){ function profileShowFriend(){		var myfriendid = localStorage["poorbook.myfriendid"];		var myusernow = localStorage["poorbook.myuserid"];		//alert(myfriendid);		$.post("application/modules/phpprofilefriends/profileFriendsShowMyFriendsProfile.php",		{			myfriendid: myfriendid,			myusernow:myusernow		},              		function (data, status) {			//alert('profileFriendsStart.js:  profileShowFriend(myfriendid) \n'+data);			$("#divProfileFriendProfile").html(data);					profileShowMyFriendsPosts();			profileFriendsButtonShowAllFriendFriends();						phpgeneralTranslatorChooseLanguage();		});}/************CALL START FUNCTION***************************/profileShowFriend();});