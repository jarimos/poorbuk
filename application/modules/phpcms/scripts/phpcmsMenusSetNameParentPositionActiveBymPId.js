//alert("phpcmsMenusSetNameParentPositionActiveBymPId.js");function phpcmsMenusSetNameParentPositionActiveBymPId(){//	var myuserid = localStorage["poorbook.myuserid"];	var mPId=$('#pId').val();	//alert("mPId = "+mPId+"\n myuserid = "+ myuserid +"\n pWebId = "+ pWebId);		setStatus("Loading...", "divLoadingStatus");			var success=0;	$.post("application/modules/phpcms/phpcmsMenusSetNameParentPositionActiveBymPId.php",	{		 mPId:mPId	},		//post back function	function (data, status)	{		//alert('data phpcmsMenusSetNameParentPositionActiveBymPId.js'+ data);			//$('#testingNow').html(data);				var obj = eval ("(" + data + ")");		//alert(obj.mail + obj.pass + obj.status);		if(obj.status=='success')		{			//EDIT---------------------------------------			$('#mName').val(obj.mName);					$('select[name="mParent"]').val(obj.mParent);						$('select[name="mActive"]').val(obj.mActive);			$('select[name="mType"]').val(obj.mType);					$('select[name="mPosition"]').val(obj.mPosition);									setTimeout(function()			{  					var mParent =  $("#mParent option:selected").text();									//alert(mParent);					//SHOW-------------------------------------					$('#showmName').html(obj.mName);						$('#showmParent').html(mParent);								$("#showmActive").html(obj.mActive);					$("#showmType").html(obj.mType);							$("#showmPosition").html(obj.mPosition);								}, 200); // <-- time in milliseconds  																										}		else		{				alert('error in phpcmsMenusSetNameParentPositionActiveBymPId.js'+ data);					}	});		setStatus("Finished", "divLoadingStatus");	}//END ONCLICK