//THIS FUNCTIONS INITIALIZE ALL INPUTS VALUES AT START//profileGetDescription() GET THE DESCRIPTION FROM THE DB // CALLED FROM THE VERY END OF THIS SCRIPT//profileEditInitializeAllInputsAtStart() CHECK THE DESCRIPTION VALUE // CALLED FROM profileGetDescription() IF POST DATA SUCCESS//profilePrintDateSelectInput() PRINT ALL THE SELECT DATE HTML IN profileedit.php // CALLED FROM THE VERY END OF THIS SCRIPT//myProfileEditDate() INITIALIZE DATE INPUT // CALLED FROM profilePrintDateSelectInput() IF POST DATA SUCCESSfunction profileGetDescription() {		var myusernow=localStorage["poorbook.myuserid"];		$.post("application/modules/phpprofileyo/profileGetDescription.php",		{			myusernow: myusernow		},              		function (data, status) {			//alert('profileGetDescription.js: \n'+data);			$("#textAreaDescription").val(data);			profileEditInitializeAllInputsAtStart();			//TranslateFriendButtonsAllLanguages();								});}function profileEditInitializeAllInputsAtStart(){		    var myusername= localStorage["poorbook.myusername"];    $("#myusername").val(myusername);    var divMyUserDescription= $("#textAreaDescription").val();    var divMyUserDescription= $("#textAreaDescription").val();    divMyUserDescription=$.trim(divMyUserDescription);    //alert(divMyUserDescription);		    if(divMyUserDescription=='For writing a description press the button Change profile')    {            divMyUserDescription= $("#textAreaDescription").val('');    }				}function profilePrintDateSelectInput(){    var myusernow=localStorage["poorbook.myuserid"];    $.post("application/modules/phpprofileyo/profilePrintDateSelectInput.php",    {            myusernow: myusernow    },                  function (data, status) {            //alert('profileGetDescription.js: \n'+data);            $("#profilePrintDateSelectInput").html(data);            myProfileEditDate();            phpgeneralTranslatorChooseLanguage();    });}function myProfileEditDate(){	//NOW WE SET THE DATE	var myuserbirthday= localStorage["poorbook.myuserbirthday"];	//alert ('myuserbirthday');	var toRemove = '-';	var myuserbirthday = myuserbirthday.replace(toRemove,'');	var myuserbirthday = myuserbirthday.replace(toRemove,'');	//string.substring(from, to);	var myyear = myuserbirthday.substring(0,4);	var mymonth = myuserbirthday.substring(4,6);	var myday = myuserbirthday.substring(6,8);	//alert (myuserbirthday+' day '+myday +' mymonth '+mymonth+' myyear '+myyear);	$('select[name="year"]').val(myyear);	$('select[name="month"]').val(mymonth);	$('select[name="day"]').val(myday);	/*$('select[name="day"]').change(function(){ 	checktherightday();	});	$('select[name="month"]').change(function(){ 	checktherightday();	});	$('select[name="year"]').change(function(){ 	checktherightday();	});*/}function myLanguage(){	var myuserlanguage = localStorage["poorbook.myuserlanguage"];	//alert(myuserlanguage);	$('select[name="language"]').val(myuserlanguage);}//CALL AT START$(document).ready(function (){	profileGetDescription();	profilePrintDateSelectInput();	myLanguage();});