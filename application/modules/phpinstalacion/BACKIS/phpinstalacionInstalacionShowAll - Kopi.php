<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();

    if( sanityCheckScapeByReference($_POST["myusernow"], 'string', 20) )
    {
        $myuserid2=mysqli_real_escape_string_jarim_ByReference($_POST["myusernow"]);
    }
    else
    {
        exit();
    }	
    
    $counter=0;
    echo '	
    <div  class="labelGeneral" id="" >Todas las instalaciones</div>
    <br><div class="divMyProfileAllWrapper">';
	
	
	
    $query = @mysql_query("SELECT * FROM poorbuk_insta_table ORDER BY instaname COLLATE utf8_spanish2_ci  ASC");

    while ($row = mysql_fetch_array($query))
    {
        $instaid= $row{'instaid'};
        $instatimestamp= $row{'instatimestamp'};			
        $instaname= $row{'instaname'};
        $instadireccion= $row{'instadireccion'};
        $instanotas= $row{'instanotas'};
        $instamaterial= $row{'instamaterial'};
        $instacontactos= $row{'instacontactos'};
        $userid=$row{'userid'};


        $sql="SELECT * FROM poorbuk_user_table WHERE userid= '".$userid."' LIMIT 1";
        $result = @mysql_query($sql);




        while($row2 = mysql_fetch_array($result))
        {

        $counter=$counter+1;
        if ($counter==1)
        {

            echo "
            <table class='tableInstalacion' >";
        }
                echo "	
                <tr>
                    <td > 
                        <img class='imgProfileUserPhoto' src='". $row2['userphoto']."'>
                        <div class='divInstaName' >" .$row2['username']."</div>
                    </td>
                </tr>";
        }

            echo'	
                <tr>
                    <td>
                        <div class="labelGeneral labelInstalacionNombre">Instalación</div>
                        <button class="buttonInstallationShow" value="'.$instaid.'">
                        ' .$instaname.'
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="labelGeneral labelInstalacionDireccion">Dirección</div>
                        <div class="divWordBreakerIntalacion" >' .$instadireccion.'</div>
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
                        <div class="labelGeneral labelInstalacionContactos">Contactos</div>
                        <div class="divWordBreakerIntalacion" >' .$instacontactos.'</div>
                    </td>
                </tr>
                <tr>
                    <td >
                        <br><hr><br>
                    </td>
                </tr>


            ';



    }


    if ($counter>1)
    {
        echo "</table>";
    }

    $counter=0;


echo '</div>';



