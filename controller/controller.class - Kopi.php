<?php
  
  // include logger class
  include_once("log/logger.class.php");
  
  // include cache class (contains template caching)
  //include_once("cache/cache.class.php");
  
  // include model class
  include_once("model/model.class.php");
  
  class controller {
    
    function __construct() {
        global $config;
        
        // generate requested template name and path
		
		
		//1-SET $config['template']['name'] = $config['host']['uri']
		//2-SET IF $config['template']['name'] == '/' THEN (THEN=?) $config['template']['name'] ='index.php' 
		//3-ELSE (ELSE=:) $config['template']['name'] = substr($config['host']['uri'], 1, strlen($config['host']['uri']))
        $config['template']['name'] = $config['host']['uri'] == '/' ? 'index.php' : substr($config['host']['uri'], 1, strlen($config['host']['uri']));
        
		//4-ADD "view/" TO THE FINAL PATH
		$config['template']['path'] = "pages/contents/".$config['template']['name'];
		//$config['template']['path'] = $config['template']['name'];
        	
        //5- IF VIEW-PATH DOES NOT EXISTS, SHOW 404.php (ERROR PAGE)
        if(!file_exists($config['template']['path'])) {
            $config['template']['name'] = "404.php";
            $config['template']['path'] = "404.php";
        }

		//6- WRITE SOME TEXT IN LOG FILE log/log.log( FUNCTION FROM CLASS logger)
        logger::log("Requested template name ".$config['template']['name'].", path ".$config['template']['path']);
        //7- include the template previously selected instep 4(an existing one) or step 5 (404.php if noone found ) 
 

        include_once('functions/functions.php'); 
        include_once('pages/headers/header.php');
        include_once('pages/menus/menu.php');		
		include_once($config['template']['path']);
        include_once('pages/footers/footer.php');
		
/*		echo 'Jarim host uri = '.$config['host']['uri'];	
		echo '<br>Jarim Template path = '.$config['template']['path'];
		echo '<br>Jarim Template name = '.$config['template']['name'];
		echo '<br>JarimSSSSSSS HEADER!!!!!!!<br>';		
	*/

		/*JARIM: CACHE PROCEDURES SEEMS TO BE UNNECCESARY FOR ME. I LEAVE IT AUTOMATIC*/
        // invoke template caching engine
        //$template_cache = new template_cache();
        
        // cache template
      //  $template_cache->setTemplate();
    }
    
  }
  
  //8-MAKE AN OBJECT TO START THE PROCESS
  $controller = new controller();
  
?>
