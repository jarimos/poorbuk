	
	<?php
	function genRandomStringLogin() {

    $characters = '0123456789QWERTYUIOPSDFGHHJKZXCVBNMqwertyuiopasdfghjklzxcvbnm';
    $passLength = 150;
    $passMoreThanLength = 160;
    $Mystring = '';
 
  //substr("abcdef", -1);  
    for ($p = 0;$p <= $passMoreThanLength;$p++) {
        $Mystring .= substr($characters,mt_rand(0, strlen($characters)),1);
		
    }
	
	$Mystring = substr($Mystring,0,$passLength);
 
 
    return $Mystring;
}
	?>