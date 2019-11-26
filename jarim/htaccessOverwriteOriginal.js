

		//alert('data');

$( "body" ).on( "click", "#buttonHtaccessRewrite", function()
	 {
	var myuserid = localStorage["poorbook.myuserid"];
	
	$.post("htaccessOverwriteOriginal.php",
	{
		myuserid: myuserid
		
	},

	function (data, status)
	{
		
		alert(data);
	


	});	

});