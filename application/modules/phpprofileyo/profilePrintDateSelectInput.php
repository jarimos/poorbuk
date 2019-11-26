<?php
include ("../phpgeneral/headercheck.php");
//CALLED FROM FUNCTION IN profileEditStart.js
echo '<select name="day" style="display:inline;width:60px;" onchange="checktherightday();">';


for($i=1;$i<=31;$i++)
{
    if ($i<10)
    {
        echo '<option value=0'.$i.'>0'.$i.'</option>';		
    }
    else
    {
        echo '<option value='.$i.'>'.$i.'</option>';
    }
}



echo '</select>


        <select name="month" style="display:inline;width:80px;" onchange="checktherightday();">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">Mars</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
        </select>

        <select name="year" style="display:inline;width:80px;" onchange="checktherightday();" >';
for($i=1900;$i<=2020;$i++)
{
    echo '<option value='.$i.'>'.$i.'</option>';
}

echo '</select>';



