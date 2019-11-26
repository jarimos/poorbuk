<?php
  
  $config = array(
                  'host'=>array(
                                'name' => "http://".$_SERVER['HTTP_HOST'].'/',
                                'uri' => $_SERVER['REQUEST_URI'],
                                //'url' => parse_url($_SERVER['REQUEST_URI']), // note it contains the parsed url contents
							   'url' => $_SERVER['REQUEST_URI'],
                               ),
                  'mysql'=>array(
                                 'host' => 'poorbuk.com.mysql',
                                 'name'=> 'poorbuk_com',
                                 'user' => 'poorbuk_com',
                                 'pass' => 'Sarah777',
                                ),
                  'cache'=>array(
                                 'template' => 'On', // template caching switched on by default 
                                 'memcached' => 'Off', // switch off memcached caching
                                ),
                 );
				 
		//echo "MY_SERVER_ROOT = ";
		//$MY_SERVER_ROOT = $_SERVER['DOCUMENT_ROOT'];
		//echo "$MY_SERVER_ROOT = ".$MY_SERVER_ROOT;
		define("MY_SERVER_ROOT", $_SERVER['DOCUMENT_ROOT']);

		//define("CONSTANT", "Hello world.");

		//echo  $config['host']['name'].$config['host']['uri'].' / URL = '.$config['host']['url'];
		/*print_r( $config );
  
		  foreach ( $config as $config1 ) 
		  {

		  echo '<dl style="margin-bottom: 1em;">';

		  foreach ( $config1 as $key => $value ) {
			echo "<dt>$key</dt><dd>$value</dd>";
		  }

		  echo '</dl>';
		}
		*/
  
?>
