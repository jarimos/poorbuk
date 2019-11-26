<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();


    if( 
    sanityCheckScapeByReference($_POST['instaid'], 'string', 20)        
    )
    {
	$instaid=$_POST["instaid"];
    }
    else
    {
        exit();
    }	
    
    $counter=0;
    echo '			

    <div class="divInstalacion">';



    /*****INSTALATION TABLE*******************/	

    $query = @mysql_query("SELECT * FROM poorbuk_insta_table WHERE instaid='".$instaid."' LIMIT 1");
    while ($row = mysql_fetch_array($query))
    {

        $counter=$counter+1;

        $instaid= $row{'instaid'};
        $instatimestamp= $row{'instatimestamp'};			
        $instaname= $row{'instaname'};
        $instaaddress= $row{'instaaddress'};
        $instazip= $row{'instazip'};
        $instacity= $row{'instacity'};
        $instanotas= $row{'instanotas'};
        $instamaterial= $row{'instamaterial'};
        $userid = $row{'userid'};
    }


    /*****USER TABLE*******************/
    $sql="SELECT * FROM poorbuk_user_table WHERE userid= '".$userid."' LIMIT 1";
    $result = @mysql_query($sql);

    while($row2 = mysql_fetch_array($result))
    {
            $userphoto = $row2['userphoto'];
            $username = $row2['username'];			

    }

    if ($counter==1)
    {

        echo "
        <table class='tableInstalacion' >";



            echo '
            <tr>
                <td > 
                    <div  class="divUserPhotoandNameWrapper">
                        <div id="'.$userid.'">
                            <button class="mySubmitFriendProfile mySubmitFriendProfileFrontPage"  value="'.$userid.'" >
                                <div class="divImgPostUserPhotoInstallation">
                                    <img class="imgUserPhotoInstallation" src="'.$userphoto.'">
                                </div>
                                <div class="divUsername">'. $username.'</div>
                            </button>
                        </div>
                    </div >

                </td>


            </tr>';



            echo'
            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionNombre">Instalación</div>
                    <div class="divWordBreakerIntalacion" >' .$instaname.'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionDireccion">Calle</div>
                    <div class="divWordBreakerIntalacion" >' .$instaaddress.'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionDireccion">Ciudad</div>
                    <div class="divWordBreakerIntalacion" >' .$instacity.'</div>
                </td>
            </tr>
            <tr>					
                <td>
                    <div class="labelGeneral labelInstalacionDireccion">Código postal</div>
                    <div class="divWordBreakerIntalacion" >' .$instazip.'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionMaterial">Material</div>
                    <div class="divWordBreakerIntalacion" >' .$instamaterial.'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionNotas">Notas</div>
                    <div class="divWordBreakerIntalacion" >' .$instanotas.'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <fieldset>
                    <legend class="labelContactos" >Contactos</legend>
                ';

                /*****INSTALATION_CONTACTS TABLE*******************/
                $sql="SELECT * FROM poorbuk_instacontact_table WHERE instaid= '".$instaid."' ";
                $result = @mysql_query($sql);

                while($row2 = mysql_fetch_array($result))
                {
                    $instacontactname = $row2['instacontactname'];
                    $instacontactphone = $row2['instacontactphone'];
                    echo '
                    <div class="labelGeneral labelName">Nombre</div>
                    <div class="divWordBreakerIntalacion" >' .$instacontactname.'</div>
                    <div class="labelGeneral labelPhone">Teléfono</div>
                    <div class="divWordBreakerIntalacion" >' .$instacontactphone.'</div>
                    ';						
                }	


            echo '
                    </fieldset>
                </td>	
            </tr>

            <tr>
                <td >
                </td>
            </tr>

            <tr>
                <td>
                    <a class="myButtonAll buttonInstallation" id="buttonAddContactAddInstallation" href="instalacioncontactadd.php">+ contacto</a><br><br>
                    <a class="myButtonAll buttonInstallation" id="buttonAddContactDeleteInstallation" href="instalacioncontactdelete.php">- contacto</a><br><br>
                    <a class="myButtonAll buttonInstallation" id="buttonEditInstallationOne" href="instalacionedit.php">editar</a><br><br>
                    <a class="myButtonAll buttonInstallation" id="" href="instalacioncomment.php">+ día nuevo</a><br><br>
                </td>
            </tr>

            ';

        echo"
        </table>";
    }//END if ($counter==1)


echo '
</div>
<br><br><br>';		
	

	

    /**********COMMENTS*****************/

    echo 	
    '<div class="labelGeneral labelInstalacionComentarios">Días de trabajo</div><br><br><br>';

    $sql="SELECT * FROM poorbuk_instacomment_table i
    LEFT JOIN poorbuk_user_table u
    ON (u.userid=i.userid)					
    WHERE instaid= '$instaid' ORDER BY instacommentid DESC";
    $result = @mysql_query($sql);

    $counter=0;

    while($row2 = mysql_fetch_array($result))
    {
        $counter=$counter+1;
        echo '<div class="divInstalacionComment">';
        echo "
        <table class='tableInstalacion' >";
            echo '
            <tr>
                <td > 
                    <div  class="divUserPhotoandNameWrapper">
                        <div id="'.$row2{'userid'}.'">
                            <button class="mySubmitFriendProfile mySubmitFriendProfileFrontPage"  value="'.$row2{'userid'}.'" >
                                <div class="divImgPostUserPhotoInstallation">
                                        <img class="imgUserPhotoInstallation" src="'.$row2['userphoto'].'">
                                </div>
                                <div class="divUsername">'. $row2['username'].'</div>
                            </button>
                        </div>
                    </div >
                </td>
            </tr>';


            echo'
            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionNombre">Fecha</div>
                    <div class="divWordBreakerIntalacion" >' .$row2['instacommenttimestamp'].'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionDireccion">Currantes</div>
                    <div class="divWordBreakerIntalacion" >' .$row2['instacommentworkers'].'</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionNotas">Resumen</div>
                    <div class="divWordBreakerIntalacion" >' .$row2['instacommentresume'].'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionMaterial">Material</div>
                    <div class="divWordBreakerIntalacion" >' .$row2['instacommentmaterial'].'</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionContactos">Conclusion</div>
                    <div class="divWordBreakerIntalacion" >' .$row2['instacommentconclusion'].'</div>
                </td>
            </tr>
            <tr>
                    <td>
                    </td>
            </tr>';
        echo '
        </table>';	
        echo '
        </div><br><br>';	

    }//END while($row2 = mysql_fetch_array($result))
