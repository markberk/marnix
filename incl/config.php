<?php

// database
$now = date('Y-m-d H:i:s');
$db = array ( 
    'host' => 'localhost', 
    'dbname' => '<db naam>', 
    'user' => '<db user>', 
    'pass' => '<db password>' 
);  

try 
{ 
    $db = new PDO('mysql:host='.$db['host'].';dbname='.$db['dbname'], $db['user'], $db['pass']); 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->query("SET SESSION sql_mode = 'ANSI,ONLY_FULL_GROUP_BY'"); 
} 
catch(PDOException $e) 
{ 
    echo $sMsg = '<p> 
            Regelnummer: '.$e->getLine().'<br /> 
            Bestand: '.$e->getFile().'<br /> 
            Foutmelding: '.$e->getMessage().' 
        </p>'; 
     
   trigger_error($sMsg); 
	
}
// end database
// functions

function nldatum($date,$reverse=0){
	if($reverse==0){
		$y = substr($date,0,4);
		$m = substr($date,5,2);
		$d = substr($date,8,2);
		$date = $d."-".$m."-".$y;
	}
	else{
		$d = substr($date,0,2);
		$m = substr($date,3,2);
		$y = substr($date,6,4);
		$date = $y."-".$m."-".$d;
	}
	return $date;
}
// end functions

//start session on web page
session_start();

?>