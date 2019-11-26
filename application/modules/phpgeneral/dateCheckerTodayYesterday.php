<?php
include ("headercheck.php");	
/*******MODUL TO REPLACE THE DATE WITH TODAY OR YESTERDAY 
OR ONE DAY AGO...ETC...TO ONE WEEK AGO...**********/	
//TODAY AS STRING
$mydatetoday = date('Y-m-d');
//TODAY AS DATE TO COMPARE
$mydatetoday = strtotime($mydatetoday);
//YESTERDAY = TODAY MINUS EN DAY AS STRING
$yesterday =date('Y-m-d', strtotime('-1 day'));
//YESTERDAY AS DATE TO COMPARE
$yesterday = strtotime($yesterday);
//2 DAYS AGO
$twodaysago =date('Y-m-d', strtotime('-2 day'));
//2 DAYS AGO AS DATE TO COMPARE
$twodaysago = strtotime($twodaysago);
$threedaysago =date('Y-m-d', strtotime('-3 day'));
$threedaysago = strtotime($threedaysago);
$fourdaysago =date('Y-m-d', strtotime('-4 day'));
$fourdaysago = strtotime($fourdaysago);
$fivedaysago =date('Y-m-d', strtotime('-5 day'));
$fivedaysago = strtotime($fivedaysago);
$sixdaysago =date('Y-m-d', strtotime('-6 day'));
$sixdaysago = strtotime($sixdaysago);
$oneweekago =date('Y-m-d', strtotime('-7 day'));
$oneweekago = strtotime($oneweekago);

//EXPLODE MESSAGEDATE INTO ARRAY TO SEPARATE DATE FROM TIME
$date = explode(" ",$messagedate);
//MESSAGEDATE Y-m-d STRING ARRAY CONVERTED TO DATE TO COMPARE
$messagedateOnlyDay = strtotime($date[0]);
//MESSAGEDATE !! TIME !! NOT !! CONVERTED TO SHOW THE RIGHT TIME.
$messagedateOnlyTime = $date[1];

//REPLACE THE DATE WITH TODAY OR YESTERDAY IF MATCH
if ($messagedateOnlyDay == $mydatetoday)
{
     $messagedate = "Today ".$messagedateOnlyTime;
} 

if($messagedateOnlyDay == $yesterday)
{
     $messagedate = "Yesterday ".$messagedateOnlyTime;		
}
if($messagedateOnlyDay == $twodaysago)
{
     $messagedate = "Two days ago  ".$messagedateOnlyTime;		
}
if($messagedateOnlyDay == $threedaysago)
{
     $messagedate = "Three days ago ".$messagedateOnlyTime;		
}
if($messagedateOnlyDay == $fourdaysago)
{
     $messagedate = "Four days ago ".$messagedateOnlyTime;		
}
if($messagedateOnlyDay == $fivedaysago)
{
     $messagedate = "Five  days ago ".$messagedateOnlyTime;		
}
if($messagedateOnlyDay == $sixdaysago)
{
     $messagedate = "Six  days ago ".$messagedateOnlyTime;		
}
if($messagedateOnlyDay == $oneweekago)
{
     $messagedate = "One week ago ".$messagedateOnlyTime;		
}
