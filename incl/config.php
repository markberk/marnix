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


/* 
database is daarna te gebruiken met:
$sQuery = "SELECT * FROM <tabelnaam> WHERE <iets met where> ORDER BY <iets met sorteren>";
$oStmt = $db->prepare($sQuery); 
$oStmt->execute();
while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)){
echo $aRow['<kolomnaam>'];
}


of bijvoorbeeld:


if(isset($_POST['<kolomnaam>'])){

			if($_POST['new']==0){
			$sQuery = "UPDATE `<tabelnaam>` SET 	
											<kolomnaam> = '".$_POST['<waarde uit een form>']."',
											<kolomnaam2> = '".$_POST['<waarde2 uit een form>']."'
										WHERE `<tabelnaam>`.`id` = '".$_GET['<id uit form>']."';"; 
			$oStmt = $db->prepare($sQuery); 
			$oStmt->execute();
			}
			else{
				$sQuery = "INSERT INTO `<tabelnaam>` 
											(`id`, 	
											`<kolomnaam>`,
											`<kolomnaam2>`
											) VALUES (
											NULL,
												'".$_POST['<waarde uit een form>']."',
												'".$_POST['<waarde2 uit een form>']."'
											);";
				$oStmt = $db->prepare($sQuery); 
				$oStmt->execute();

			}

			
			
			echo '<meta http-equiv="refresh" content="0;url=?p=<pagina waar je heen wil>" />';
			exit();
		}

if(isset($_GET['Lid'])){
	$sQuery = "SELECT * FROM leden WHERE id = '".$_GET['Lid']."'";
	$oStmt = $db->prepare($sQuery); 
	$oStmt->execute();
	$aRow = $oStmt->fetch(PDO::FETCH_ASSOC);
	echo "<h3>Lid aanpassen</h3>";
		}
		else{
			echo "<h3>Lid toevoegen</h3>";
		}
	?>

<form method=post>
			<div class="form-group">
				<label for="<kolomnaam>"><kolomnaam></label>
				<input name='voornaam' type="Name" value="<?php if(isset($aRow['voornaam'])){ echo $aRow['voornaam'];}?>" class="form-control" id="vnaam" placeholder="Voornaam">
				<label for="achternaam">Achternaam</label>
				<input name='achternaam' type="Name" value="<?php if(isset($aRow['achternaam'])){ echo $aRow['achternaam'];}?>" class="form-control" id="anaam" placeholder="Achternaam">
				<label for="geboortedatum">Geboortedatum</label>
				<input name='geboortedatum' type="Date" value="<?php if(isset($aRow['geboortedatum'])){ echo $aRow['geboortedatum'];}?>" class="form-control" id="date" placeholder="01-01-2022">				
				<!-- checken of het een nieuwe entry is of een entry aanpassen -->
				<input type=hidden name=new value=<?php if(isset($_GET['Lid'])){ echo "0";}else{ echo "1";}?>>
			</div>
			<button type="submit" class="btn btn-primary">Opslaan</button> <a href="javascript:history.back()" class="btn btn-danger">Niet opslaan & terug</a>
		
		</form>


 */

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