<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();


    $counter=0;

    if( sanityCheckScapeByReference($_POST['myusernow'], 'string', 20) && 
        sanityCheckScapeByReference($_POST['instaid'], 'string', 20) )
    {
        $instaid= $_POST["instaid"];
        $userid=$_POST['myusernow'];	
    }
    else
    {
        exit();
    }





    $query = @mysql_query("SELECT * FROM poorbuk_insta_table WHERE instaid='".$instaid."'ORDER BY instaid DESC ");
    while ($row = mysql_fetch_array($query))
    {

        $counter= $counter+1;
        //$instaid= $row{'instaid'};
        $instatimestamp= $row{'instatimestamp'};			
        $instaname= trim($row{'instaname'});
        $instaaddress= trim($row{'instaaddress'});
        $instacity= trim($row{'instacity'});
        $instazip= trim($row{'instazip'});
        $instanotas=  trim($row{'instanotas'});
        $instamaterial= trim($row{'instamaterial'});

        $mypath = 'application/modules/phpinstalacion/phpinstalacionEditSave.php';
        echo '
        <form id="myForm" action="'.$mypath.'" name="myForm" target="uploadframeInstalacion" enctype="multipart/form-data"  action="" method="POST" onsubmit="return(phpinstalacionEditValidate());" > <!-- -->

            <table class="tableCheckBox">
            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionNombre">Nombre de la instalación</div>
                    <input maxlength="500" type="text" id="inputInstalacionNombre" class="inputGeneral" name="instaname" value="'.$instaname.'" />
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelinstaaddress">Calle</div>
                    <input maxlength="500" type="text" id="instaaddress" class="inputGeneral" name="instaaddress" value="'.$instaaddress.'"/>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelGeneral labelinstacity">Ciudad</div>
                    <input maxlength="30" type="text" id="instacity" class="inputGeneral" name="instacity" value="'.$instacity.'"/>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelGeneral labelinstazip">Código postal</div>
                    <input maxlength="15" type="text" id="instazip" class="inputGeneral" name="instazip" value="'.$instazip.'"/>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionMaterial">Material</div>
                    <textarea maxlength="3000" id="textAreaMaterial" name="instamaterial" >'.$instacity.'
                    </textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="labelGeneral labelInstalacionNotas">Notas</div>
                    <textarea maxlength="3000" id="textAreaNotas" name="instanotas">'.$instanotas.'
                    </textarea>
                </td>
            </tr>

            <tr>
                <td class="invisible">
                    <input maxlength="20" class="invisible"  id="myuserid" type="text" name="myuserid" value="'.$userid.'" >
                    <input maxlength="20" class="invisible"  id="instaid" type="text" name="instaid" value="'.$instaid.'">
                </td>
            </tr>
            <tr>
                <td>
                    <input id="buttonInstalacionEditSave" class="myButtonAll" type="submit" value="Guardar cambios">
                    <br><br>
                </td>
            </tr>

            ';
																	
    }


    if ($counter>0)
    {
            echo "
        </table>
    </form>	";
    }

    $counter=0;

echo '</div>';



