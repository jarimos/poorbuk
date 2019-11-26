<?php
    include ("../phpgeneral/headercheck.php");	
    require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
    	
    startConnectionDB();

    if( 
    sanityCheckScapeByReference($_POST['instaid'], 'string', 20)        
    )
    {
	$instaid= $_POST["instaid"];

    }
    else
    {
        exit();
    }			

		
    /*****INSTALATION_CONTACTS TABLE*******************/
    $sql="SELECT * FROM poorbuk_instacontact_table WHERE instaid= '".$instaid."' ";
    $result = @mysql_query($sql);
    $counter=0;
    while($row2 = mysql_fetch_array($result))
    {
        $counter=$counter+1;

        if ($counter==1)
        {
                echo '<table class="tableInstalacion" >';
        }
        $instacontactname = $row2['instacontactname'];
        $instacontactphone = $row2['instacontactphone'];
        $instacontactid = $row2['instacontactid'];
        echo '
        <tr>
            <td>
                <fieldset>
                <legend class="labelContactos" >Contacto '.$counter.'</legend>
                    <div class="labelGeneral labelName">Nombre</div>
                    <div class="divWordBreakerIntalacion" >' .$instacontactname.'</div>
                    <div class="labelGeneral labelPhone">Teléfono</div>
                    <div class="divWordBreakerIntalacion" >' .$instacontactphone.'</div>
                    <button class="myButtonAll buttonDeleteContactInstallation" id="" value="'.$instacontactid.'" >Eliminar</button><br><br>
                </fieldset>
            </td>	
        </tr>
        ';						

    }	

    if ($counter>0)
    {
        echo "</table>";
    }



