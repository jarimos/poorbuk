function phpinstalacionOneInstallationShow(instaid){		//START STATUS		setStatus('Loading...','divLoadingStatus');		$.post("application/modules/phpinstalacion/phpinstalacionOneInstallationShow.php",		{			instaid: instaid		},              		function (data, status) 		{			//alert('phpinstalacionOneInstallationShow.js: \n'+data);                        $('#divInstalacionShowOne').html(data);			setStatus('Finished','divLoadingStatus');		});}