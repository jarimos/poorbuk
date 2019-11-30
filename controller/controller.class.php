<?php
/**************JARIM CLASES**********************/

        include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/headercheck.php'); 
        
	//include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
        include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');	
		
	include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/PostsClass.php');
	include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/MenusClass.php');
	include(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/UserClass.php');	

     
       

	startConnectionDB();
	
//echo "CONTROLLER".constant("GREETING")."<br>";	
//echo "CONTROLLER poorbuk_Path_Absolute_Global = POORBUK_PATH_ABSOLUTE_ROOT <br>";
	
/**************END JARIM CLASES**********************/	
	
  // include logger class
  include_once(POORBUK_PATH_ABSOLUTE_ROOT."/log/logger.class.php");
  
  // include cache class (contains template caching)
  //include_once("cache/cache.class.php");
  
  // include model class
  //include_once(MY_SERVER_ROOT."/poorbuk/model/model.class.php");
  
	

/*JARIM 2019
  class controller {
    
    function __construct() {
JARIM 2019 */
        global $config;

        // generate requested template name and path
		
		
		//1-SET $config['template']['name'] = $config['host']['uri']
		//2-SET IF $config['template']['name'] == '/' THEN (THEN=?) $config['template']['name'] ='index.php' 
		//3-ELSE (ELSE=:) $config['template']['name'] = substr($config['host']['uri'], 1, strlen($config['host']['uri']))
$config['template']['name'] = $config['host']['uri'] == '/' ? 'index.php' : substr($config['host']['uri'], 1, strlen($config['host']['uri']));

//CHECK REQUEST .... index?page=amigos
$my_PAGE_REQUEST_URI="";

if( sanityCheckScapeByReference($_GET["page"], 'string', 50))
{
    $my_PAGE_REQUEST_URI = $_GET["page"];//$_SERVER[REQUEST_URI];
}
else
{
    //CONTINUE exit();
}


$myUserIdSession = getUserIdNow();
$myUserURLSession = getUserURLNow();
$myUserURLSessionWebId= getWebId($myUserURLSession);
$myUserURLFinalPath=getFinalPath($myUserURLSession);
  
/*FOR TESTING PURPOSES
echo "<br>CONTROLLER ";
echo "<br>myUserIdSession = ".$myUserIdSession;
echo "<br>myUserURLSession = ".$myUserURLSession;
echo "<br>myUserURLSessionWebId = ".$myUserURLSessionWebId;
echo "<br>myUserURLFinalPath = ".$myUserURLFinalPath;

/**/
//exit;
//118
//$config['template']['name']= $myUserURLSession;
//
$config['template']['name']= basename($myUserURLSession);//basename(__FILE__);
//echo "<br><br>config['template']['name'] = ".$config['template']['name']."<br><br>";
 
                //echo "<br><br>TemplateName = ".$TemplateName."<br><br>";   
/*REPLACE AND GET VALUES FOR THE TEMPLATE NAME FROM DATABASE WHEN TABLE MADEN*/ 
		$header_include ='none';	
		$footer_include ='none';	
		$menu_include ='none';		
/*END REPLACE AND GET VALUES FOR THE TEMPLATE NAME FROM DATABASE WHEN TABLE MADEN*/ 
            if ($my_PAGE_REQUEST_URI!="")
            {
                $TemplateName = $my_PAGE_REQUEST_URI.".php";
		                  
            }
            else{
                $TemplateName = $config['template']['name'] ;
            }


                //2018 pindex registrarse poorbuk
                //$TemplateName = "poorbuk.php";
                $fileFounded = false;

            //echo "<br><br><br><br><br><br>TemplateName = ".$TemplateName."<br><br>";

                
//2018 GO TO POORBUK LOGIN IF index.php
if($TemplateName == "index.php" || $TemplateName == "" ) 
{
    $TemplateName="pindex.php";
}
/*******DEFAULT START TEMPLATE SET IN pages/start/scripts/startMVC.js*********************************************/		
/*2018 ANULLERET FOR POORBUK ONLY - 2018 ENABLE IN SERVER ??? OR IN THE FUTURE	
if($TemplateName == "index.php") 
{
//	echo "<div id='testinglortlort' >$TemplateName</div>";
	
	$config['template']['path'] = "pages/start/".$config['template']['name'];   
			//IF poorbuk-template EXISTS SET THE APPROPIATE HEADER FOR EVERY PAGE
			if(file_exists($config['template']['path'])) 
			{		
					$fileFounded =true;

					$header_include ='none';
					$footer_include ='none';
					$menu_include ='none';
			}
			else
			{
				$fileFounded =false;
				//echo '<div id="testinglortlort" style="">NO POORBUK SPANISH</div>';
			}
			
	//exit;
}
//2018
//$fileFounded = false;
*/

/**********POORBUK SPANISH*******************************************/
//echo "<br>POORBUK SPANISH<br>";
    if(file_exists("css/jarim.css")) 
    {	
        //echo "<br>HELLOOOOOOOOO3333<br>";
    }
if($fileFounded == false)
{
    //2018
    //$TemplateName="inicio.php";
    //
    //CHECK FOR PAGE in poorbuk-template SPANISH
    $config['template']['path'] = "pages/contents/".$TemplateName;   
    //IF poorbuk-template EXISTS SET THE APPROPIATE HEADER FOR EVERY PAGE
    if(file_exists($config['template']['path'])) 
    {		

        //echo '<div id="testinglortlort" style="">FILE FOUNDED POORBOOK</div>';
        $fileFounded =true;

        //echo "<br> TemplateName = $TemplateName <br>" ;

        if( $TemplateName == "cmspage.php" )
        {
        }
        else
        {
            if( 
                $TemplateName == "acercade.php" || $TemplateName == "contact.php" || $TemplateName == "iniciarsesionolvidepass.php" ||
                $TemplateName == "iniciarsesionolvidepassmessage.php" || $TemplateName == "iniciarsesionolvidepassnewpass.php" || 
                $TemplateName == "inicio.php" || $TemplateName == "registrarse.php" || $TemplateName == "pindex.php" || $TemplateName == "app.php" 
            )
            {		

                $header_include ='headerPoorbuk.php';
                $menu_include ='menuPoorbukOutside.php';
                $footer_include ='footerPoorbukOutside.php';
            }
            else
            {
                $header_include ='headerPoorbukInside.php';
                $menu_include ='menuPoorbukInside.php';
                $footer_include ='footerPoorbuk.php';
            }
        }


    }
    else
    {
            $fileFounded =false;
            echo "NO TEMPLATE IN POORBUK = ".$TemplateName."<br>";
    }
			
}
/**END poorbuk-SPANISH****************************************************************************/	

	
/**********DEFAULT-CONTENT*******************************************/
if($fileFounded == false)
{			
    echo "<br>ERROR: NO DEFAULT-CONTENT ";
//    //ERROR - THE FILE IS NOT IN OUR ALLOWED FILES FOLDER
//    $config['template']['name'] = "404.php";
//    $config['template']['path'] = "404.php";
//    echo "WRONG URL ";
//    echo 'Jarim host uri = '.$config['host']['uri'];	
//    echo '<br>Jarim Template path = '.$config['template']['path'];
//    echo '<br>Jarim Template name = '.$config['template']['name'];
//    echo '<br>JarimSSSSSSS HEADER!!!!!!!<br>';	
    exit;
									
}		


/**END DEFAULT-CONTENT****************************************************************************/	
					
//}				
					

		//WRITE SOME TEXT IN LOG FILE log/log.log( FUNCTION FROM CLASS logger)
        logger::log("Requested template name ".$config['template']['name'].", path ".$config['template']['path']);
		
		
        //include the RIGHTS templateS previously selected in the previous steps (an existing one or 404.php if noone found ) 

/*CODE FOR DELETING ALL PREVIOS INFO FROM OUTPUT TO HTML DOC*/
//ob_start();// START IN index.php
//echo 'Text that won\'t get displayed.';
//
//2018
//ob_end_clean();
/*END-CODE FOR DELETING ALL PREVIOS INFO FROM OUTPUT TO HTML DOC*/

/**HEADER_INCLUDE***/		
		if ($header_include!= 'none')
		{       
			include_once(POORBUK_PATH_ABSOLUTE_ROOT."/pages/headers/$header_include");
		}
		
/**MENU_INCLUDE***/	
		if ($menu_include!= 'none')
		{       
			include_once(POORBUK_PATH_ABSOLUTE_ROOT."/pages/menus/$menu_include");	
		}		
	
/**CONTENT_INCLUDE***/			
		if ($config['template']['path'] != '')
		{
		    //jarim2019
			include_once($config['template']['path']);
            //include_once(POORBUK_PATH_ABSOLUTE_ROOT.'/pages/contents/pindex.php');

		}	
	//echo POORBUK_PATH_ABSOLUTE_ROOT."/pages/footers/$footer_include";
/**FOOTER_INCLUDE***/			
		if ($footer_include != 'none')
		{
			include_once(POORBUK_PATH_ABSOLUTE_ROOT."/pages/footers/$footer_include");
		}
 /*       
  		echo 'Jarim host uri = '.$config['host']['uri'];	
		echo '<br>Jarim Template path = '.$config['template']['path'];
		echo '<br>Jarim Template name = '.$config['template']['name'];
		echo '<br>JarimSSSSSSS HEADER!!!!!!!<br>';			
*/
		
		

/*
SHOW ALL FOLDER FILES 

$dirname = "files/images";
$images = scandir($dirname);
$ignore = arrPostsAllParametersay(".", "..", "otherfiletoignore");

foreach($images as $curimg){
    if (!in_arrPostsAllParametersay($curimg, $ignore)) {
        echo "<img src='files/images/$curimg'  /><br />$curimg<br />\n";
    }
} 

*/

		/*JARIM: CACHE PROCEDURES SEEMS TO BE UNNECCESARY FOR ME. I LEAVE IT AUTOMATIC*/
        // invoke template caching engine
        //$template_cache = new template_cache();
        
        // cache template
      //  $template_cache->setTemplate();
//    }
//    
//  }
  
  //8-MAKE AN OBJECT TO START THE PROCESS
//  $controller = new controller();

