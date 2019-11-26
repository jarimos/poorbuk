
//alert('lortt');

$(window).scroll(function()
{


	//var percent = .80; // 80%
	//var position = window.scrollY;
	//var screenHeight = screen.height;
	//var screenWidth = screen.width;
	/*NOT USED NOW, BUT CAN BE USEFUL: DETECT MY ELEMENT POSITION 
	var myOffset = $('.lastPostScroll').offset().top;
	REMOVE CLASS FROM ELEMENT ECHOED VIA PHP AFTER ALL POSTS 
	$('.lastPostScroll').each(function(i, obj) 
	{
		$(this).removeClass('lastPostScroll');
	});	
	*/
	
	//MY SCREEN HEIGHT
	var screenHeight = screen.height;
	//MY SCROLL POSITION
	var position = $(document).scrollTop();
	//MY WINDOW SCROLL FULL HEIGHT  
	var myheight = $(document).height();
	
	var positionPlusScreen = position + (screenHeight*2);
	
	if ( positionPlusScreen>myheight) 
	{
	
	
			//alert(positionPlusScreen-myheight);
			//GET DATE VALUE FROM LAS POSTS SHOWN
			var mytime=$('.buttonSeeMorePosts').val();
			//REMOVE CLASS FROM ALL DATE BUTTONS FOR LAST POST
			$('.buttonSeeMorePosts').each(function(i, obj) 
			{
				$(this).removeClass('buttonSeeMorePosts');
			});	
			
			//CALL FUNCTION TO SHOW NEW POSTS WHERE DATE-TIME IS OLDER THAN mytime
			//if(mytime) CHECKS THAT MY TIME IS SET. IF NOT SET MEANS NO MORE POSTS TO SHOW
			if(mytime)
			{
				//alert(mytime);
				phpgeneralReloadPostsByScrollAutoShowPosts(mytime);
			}

			//console.log('\n positionPlusScreen = '+positionPlusScreen +'\n myOffset = '+myOffset +'\n position = '+position +'\n myheight = '+myheight+'\n screenHeight= '+screenHeight);
	}
	
});