<body >

  <header>
    <div id="headerJarim" class="navbar navbar-inverse "><!--navbar-fixed-top-->
      <div class="navbar-inner" style="padding-top:20px;padding-left:14px;">
        <div class="container">
          <button style="position:absolute;right:10px;top:4px;" type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="" href="index.php?page=pindex"><img style="position:absolute;left:8px;top:14px;"src="files/images/logo4242.png"><p class="brand" style="margin-left:40px;" >poorbuk</p></a>
          
     <!--     <a class="showFront" href="#"><img style="postion:absolute;margin-left:10px;margin-right:8px;margin-top:4px;"src="logo4242.png"><p class="brand" >jarimos</p></a>-->

		 <nav class="nav-collapse collapse">
            <ul class="nav pull-right">
			  <li class="menuMain"><a class="spanishFlag" href="#"><img style="width:30px;height:30px;margin-top:-10px;"src="files/flags/Spain.png"></a></li>
			  <li class="menuMain"><a class="englishFlag" href="#"><img style="width:30px;height:30px;margin-top:-10px;"src="files/flags/UnitedKingdom.png"></a></li>
			<!--  <li class="menuMain inicio"><a class="" href="inicio.php">INICIO</a></li>  --> 
			  <!--<li class="menujarim5"><a class="" href="app.php">APP</a></li>-->
              <li id="nuevoUsuarioContentSpanish" class="menuMain registrarse" ><a class="" href="index.php?page=registrarse">NUEVO USUARIO</a></li>
              <li id="iniciarSesionContentSpanish" class="menuMain pindex"><a class="" href="index.php?page=pindex">INICIAR SESION</a></li>
              <li id="acercadeContentSpanish" class="menuMain acercade"><a class="" href="index.php?page=acercade"acercade>ACERCA DE</a></li>
              <li id="contactoContentSpanish" class="menuMain contact"><a class="" href="index.php?page=contact">CONTACTO</a></li>
              
              <li id="newUserContentEnglish" class="menuMain registrarse" ><a class="" href="index.php?page=registrarse">NEW USER</a></li>
              <li id="startSessionContentEnglish" class="menuMain pindex"><a class="" href="index.php?page=pindex">START SESSION</a></li>
              <li id="aboutUsContentEnglish" class="menuMain acercade"><a class="" href="index.php?page=acercade"acercade>ABOUT US</a></li>
              <li id="contactContentEnglish" class="menuMain contact"><a class="" href="index.php?page=contact">CONTACT</a></li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!--</div>-->
  <div class="headerWrapperJarim">
  </div>

<?php
//ACTIVATE: REMOVE COMMENTS FROM ob_start()HERE AND FROM ob_end_clean(); in controller.class.php about line 438
//ob_start(); 
//echo 'Text that won\'t get displayed.'; START IN controller.class.php
//ob_end_clean(); //START IN controller.class.php
?>  
  
  
 <?php 
/*
include_once($_SERVER['DOCUMENT_ROOT'].'/functions/functions.php'); 

$myUserIdSession = getUserIdNow();
$myUserURLSession = getUserURLNow();
$myUserURLSessionWebId= getWebId($myUserURLSession);
$myUserURLFinalPath=getFinalPath($myUserURLSession);
  

echo "<br>HEADER ";
echo "<br>myUserIdSession = ".$myUserIdSession;
echo "<br>myUserURLSession = ".$myUserURLSession;
echo "<br>myUserURLSessionWebId = ".$myUserURLSessionWebId;
echo "<br>myUserURLFinalPath = ".$myUserURLFinalPath;
*/
 ?>
