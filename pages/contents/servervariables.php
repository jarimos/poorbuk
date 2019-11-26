<?php

	//require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
	//$con = startConnectionDB();


/*************SERVER VARIABLES****************************************************/

echo '<br><br>VARIABLES DEL SERVIDOR QUE VOY A USAR<br><br>';
/***********VARIABLES DEL SERVIDOR QUE VOY A USAR*********************************/
echo "SCRIPT_NAME : " . $_SERVER['SCRIPT_NAME'] . "<br>"; // /poorbuk/testDB.php
echo "REQUEST_URI : " . $_SERVER['REQUEST_URI'] . "<br>"; // /poorbuk/testDB.php
echo "php_SELF : " . $_SERVER['PHP_SELF'] . "<br>"; //  /poorbuk/testDB.php
echo "SCRIPT_FILENAME : " . $_SERVER['SCRIPT_FILENAME'] . "<br>"; // C:/xampp/htdocs/poorbuk/testDB.php
echo "HTTP_REFERER : " . $_SERVER['HTTP_REFERER'] . "<br>"; // http://www.poorbuk.com/poorbuk/testDB.html
echo "DOCUMENT_ROOT : " . $_SERVER['DOCUMENT_ROOT'] . "<br>"; //PATH AUP TO PUBLIC ROOT LIKE C:/xampp/htdocs

echo '<br><br>';

echo "SERVER_ADDR : " . $_SERVER['SERVER_ADDR'] . "<br>"; // ::1
echo "SERVER_NAME : " . $_SERVER['SERVER_NAME'] . "<br>"; // localhost
echo "REQUEST_METHOD : " . $_SERVER['REQUEST_METHOD'] . "<br>"; // POST (CAN BE 'GET', 'HEAD', 'POST', 'PUT'.)
echo "REQUEST_TIME : " . $_SERVER['REQUEST_TIME'] . "<br>"; // (microtimeformat) 1393755193 (= creo a = 0,1393755193 SECONDS)
echo "HTTP_ACCEPT_LANGUAGE : " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>"; // es,en-US;q=0.8,en;q=0.6,da;q=0.4
echo "HTTP_CONNECTION : " . $_SERVER['HTTP_CONNECTION'] . "<br>"; //  keep-alive

/*************************************************************************************/
echo '<br><br>VARIABLES DEL SERVIDOR QUE NO USO NORMALMENTE EXTRA <br><br>';
echo "php_SELF : " . $_SERVER['PHP_SELF'] . "<br>"; 
echo "GATEWAY_INTERFACE : " . $_SERVER['GATEWAY_INTERFACE'] . "<br>"; 
echo "SERVER_ADDR : " . $_SERVER['SERVER_ADDR'] . "<br>"; 
echo "SERVER_NAME : " . $_SERVER['SERVER_NAME'] . "<br>"; 
echo "SERVER_SOFTWARE : " . $_SERVER['SERVER_SOFTWARE'] . "<br>"; 
echo "SERVER_PROTOCOL : " . $_SERVER['SERVER_PROTOCOL'] . "<br>"; 
echo "REQUEST_METHOD : " . $_SERVER['REQUEST_METHOD'] . "<br>"; 
echo "REQUEST_TIME : " . $_SERVER['REQUEST_TIME'] . "<br>"; 
echo "REQUEST_TIME_FLOAT : " . $_SERVER['REQUEST_TIME_FLOAT'] . "<br>"; 
echo "QUERY_STRING : " . $_SERVER['QUERY_STRING'] . "<br>"; 
echo "DOCUMENT_ROOT : " . $_SERVER['DOCUMENT_ROOT'] . "<br>"; 
echo "HTTP_ACCEPT : " . $_SERVER['HTTP_ACCEPT'] . "<br>"; 
echo "HTTP_ACCEPT_CHARSET : " . $_SERVER['HTTP_ACCEPT_CHARSET'] . "<br>"; 
echo "HTTP_ACCEPT_ENCODING : " . $_SERVER['HTTP_ACCEPT_ENCODING'] . "<br>"; 
echo "HTTP_ACCEPT_LANGUAGE : " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>"; 
echo "HTTP_CONNECTION : " . $_SERVER['HTTP_CONNECTION'] . "<br>"; 
echo "HTTP_HOST : " . $_SERVER['HTTP_HOST'] . "<br>"; 
echo "HTTP_REFERER : " . $_SERVER['HTTP_REFERER'] . "<br>"; 
echo "HTTP_USER_AGENT : " . $_SERVER['HTTP_USER_AGENT'] . "<br>"; 
echo "HTTPS : " . $_SERVER['HTTPS'] . "<br>"; 
echo "REMOTE_ADDR : " . $_SERVER['REMOTE_ADDR'] . "<br>"; 
echo "REMOTE_HOST : " . $_SERVER['REMOTE_HOST'] . "<br>"; 
echo "REMOTE_PORT : " . $_SERVER['REMOTE_PORT'] . "<br>"; 
echo "REMOTE_USER : " . $_SERVER['REMOTE_USER'] . "<br>"; 
echo "REDIRECT_REMOTE_USER : " . $_SERVER['REDIRECT_REMOTE_USER'] . "<br>"; 
echo "SCRIPT_FILENAME : " . $_SERVER['SCRIPT_FILENAME'] . "<br>"; 
echo "SERVER_ADMIN : " . $_SERVER['SERVER_ADMIN'] . "<br>"; 
echo "SERVER_PORT : " . $_SERVER['SERVER_PORT'] . "<br>"; 
echo "SERVER_SIGNATURE : " . $_SERVER['SERVER_SIGNATURE'] . "<br>"; 
echo "PATH_TRANSLATED : " . $_SERVER['PATH_TRANSLATED'] . "<br>"; 
echo "SCRIPT_NAME : " . $_SERVER['SCRIPT_NAME'] . "<br>"; 
echo "REQUEST_URI : " . $_SERVER['REQUEST_URI'] . "<br>"; 
echo "php_AUTH_DIGEST : " . $_SERVER['PHP_AUTH_DIGEST'] . "<br>"; 
echo "php_AUTH_USER : " . $_SERVER['PHP_AUTH_USER'] . "<br>"; 
echo "php_AUTH_PW : " . $_SERVER['PHP_AUTH_PW'] . "<br>"; 
echo "AUTH_TYPE : " . $_SERVER['AUTH_TYPE'] . "<br>"; 
echo "PATH_INFO : " . $_SERVER['PATH_INFO'] . "<br>"; 
echo "ORIG_PATH_INFO : " . $_SERVER['ORIG_PATH_INFO'] . "<br>"; 
?>