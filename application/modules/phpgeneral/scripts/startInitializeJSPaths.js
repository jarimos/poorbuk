// alert('lort outisde');

function redirectToIndex()
{
	//localStorage["poorbook.myuserlogged"] = 0 ;
	//alert('lort inside '+myRequest);
	//var myuserid = localStorage["poorbook.myuserid"] ;

	//alert("location.protocol = "+location.protocol);
        //alert("location.host = "+ location.host);
        var myPathName = window.location.pathname;

        var poorbukPage= location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
        //pass = pass.replace(/\s/g, '');
        //STRING REPLACE
        var poorbuk_Path_Relativ_Root = myPathName.replace(poorbukPage,'');
    
        //alert("poorbukPage = "+poorbukPage);
        //var myRequest= location.search; //AFTER QUESTION SIGN
	//alert("myRequest = "+myRequest);
        var poorbuk_Path_Htttp_Global = location.protocol + "//" + location.host+poorbuk_Path_Relativ_Root;

        //REMEMBER THAT  SLASH IS INCLUDED AT THE END 
        localStorage["poorbook.poorbuk_Path_Htttp_Global"] = poorbuk_Path_Htttp_Global ;
        localStorage["poorbook.poorbuk_Path_Relativ_Global"] = poorbuk_Path_Relativ_Root ;  
        
        /*TESTING*/
      //alert("poorbuk_Path_Htttp_Global = "+poorbuk_Path_Htttp_Global);
      //alert("poorbuk_Path_Relativ_Root = "+ poorbuk_Path_Relativ_Root);  


	

}
	
	
redirectToIndex();	
	



