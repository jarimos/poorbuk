//START STATUS//setStatus('Loading...','divLoadingStatus');//STOP STATUS//setStatus('Finished','divLoadingStatus');//html//<div id="divLoadingStatus"  >Loading...<br><img src="files/images/loader.gif" ><br></div>//CSS #divLoadingStatus{padding:8px;background-color:black;font:italic 20px Georgia,serif;color:white;display:none;position:fixed;top:40%;left:40%;}function setStatus(theStatus, myDivId) {	var tag = document.getElementById(myDivId);	//alert(tag);	//alert(theStatus);	if (tag) 	{		$(tag).css("display","block");	}	if (theStatus=="Finished" )	  	{		setTimeout(function() 		{			$(tag).css("display","none");		}, 1000);	}}