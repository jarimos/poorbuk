
//alert('lortt');

$(window).scroll(function()
{

	//alert('wwww');
	var percent = .80; // 80%
	//var position = window.scrollY;
	var screenHeight = screen.height;
	var screenWidth = screen.width;
	var myheight = $(document).height();
	
	//MY SCREEN HEIGHT
	var screenHeight = screen.height;
	//MY SCROLL POSITION
	var position = $(document).scrollTop();
	//MY DIV HEIGHT POSITION 
	var myOffset = $('.lastPostScroll').offset().top;
	var positionPlusScreen = position + (screenHeight*2);
	
//alert(myOffset +' '+myheight);
	//var position = $(window).offset().top;
//	if ($('#lortScroll').offset().top > ($(document).height() * percent)) 
	if ( positionPlusScreen>myOffset) 
	{
	
	

		//alert(positionPlusScreen-myOffset);
		
			//REMOVE CLASS FROM DIV ECHOED VIA PHP AFTER ALL POSTS 
			$('.lastPostScroll').each(function(i, obj) 
			{
				$(this).removeClass('lastPostScroll');
			});	
			//GET DATE VALUE FROM LAS POSTS SHOWN
			var mytime=$('.buttonSeeMorePosts').val();
			//REMOVE CLASS FROM ALL DATE BUTTONS FOR LAST POST
			$('.buttonSeeMorePosts').each(function(i, obj) 
			{
				$(this).removeClass('buttonSeeMorePosts');
			});	
			
			//CALL FUNCTION TO SHOW NEW POSTS WHERE DATE-TIME IS OLDER THAN mytime
			if(mytime)
			{
				//alert(mytime);
				phpgeneralReloadPostsByScrollAutoShowPosts(mytime);
			}
		//window.location.reload();
	//alert('\n positionPlusScreen = '+positionPlusScreen +'\n myOffset = '+myOffset +'\n position = '+position +'\n myheight = '+myheight+'\n screenHeight= '+screenHeight);
	}
	
});