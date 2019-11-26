	//alert('lort outisde');

function redirectToIndex()
{
	localStorage["poorbook.myuserlogged"] = 0 ;
	//alert('lort inside '+myRequest);
	var myuserid = localStorage["poorbook.myuserid"] ;

	//alert(location.protocol + "/" + location.host+"/"+myRequest+"?"+myuserid+"AAbbAA");
	//alert('location.protocol  = '+ location.protocol +'location.host = '+location.host  + 'myRequest = '+myRequest)
	//window.location.assign(location.protocol + "/" + location.host+myRequest+"?myuserid="+myuserid);

	//var page= location.pathname.substring(location.pathname.lastIndexOf("myuserid") + 1);
	var myRequest= location.search;
	//alert("myRequest = "+myRequest);
	var substringToMatch = myRequest.match(/myuserid/);
	
	//alert(substringToMatch );
	if(substringToMatch!="myuserid")
	{
	
		//from ? to = there are 10 chars (? and = included)
		window.location.assign(myRequest+"?myuserid="+myuserid);
		//window.location.assign(myRequest+"?myuserid=23278");
		localStorage["poorbook.myuserlogged"] = 1 ;
	}

	


}
	
	
	
	
	
	