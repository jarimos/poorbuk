/****************************************************************/


/*****************************************************************/

	function checktherightday()
	{
	var day = $('select[name="day"]').val();
	//alert (day);
	var month = $('select[name="month"]').val();
	var year = $('select[name="year"]').val();
	//alert (year);
	var yearbisiesto = year%4;
	//alert (yearbisiesto);

	var allthebirthdate = day + month +year;
	//alert(allthebirthdate);

	if (month=="02") 
	{

	//BISIESTO YEAR FEBRUAR = 29 DAYS
			if (yearbisiesto == 0)
			{
				if (day>29)
				{
					alert ('The day cant be more than 29 in Februar this year');
					$('select[name="day"]').val("01");
				}
				
			}
		
	//NORMAL YEAR FEBRUAR = 28 DAYS
			else if (day>28)
			{
				alert ('The day cant be more than 28 in Februar this year');
				$('select[name="day"]').val("01");
			}

	}


	//FIND ALL 30 DAYS MONTHS. IF NOT FOUNDED, DEFAULT MONT = 31 DAYS
	switch (month)
	{
	   case "10": case "04": case "06": case "09": 
			if (day>30)
			{
				alert ('The day cant be more than 30 this month');
				$('select[name="day"]').val("01");
			}
	   break;

	  default: 
	  //alert('also cool');
	  break;
	}
		localStorage["poorbook.myuserbirthday"]=year+'-'+month+'-'+day;
		//alert(localStorage["poorbook.myuserbirthday"]);
	}
	


