	/*DISPLAY DATE AND NAME*/	var myDate = new Date();	var displayDate = myDate.getDate() + '/' + (myDate.getMonth()+1) +  '/' + myDate.getFullYear();	//alert(myDate);	$('#startUserName').html(localStorage["poorbook.myusername"]);	$('#startDate').html(" "+displayDate);	/*END DISPLAY DATE AND NAME*/	//HIDE NOTIFICATIONS TABLE	$('.tableNotificationsShowPostFrontPage').css('display','none');	$('.tablePostAll').css('display','block');	var mytime="";		phpfrontShowPostDB(mytime);