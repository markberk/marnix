<?php

//Include Configuration File(database instellingen / eigen functies die je op meerdere paginas wil kunnen gebruiken kunnen hierin
include('config.php');
?>

<html>
 <head>
 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Marnix</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
<!-- CSS van bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper van bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 </head>
 <body class='bg-light container-fluid' height=100% width=100%>
 <div class=container>
 <?php
 // menu includen (hier een require gebruikt, als deze niet bestaat gaat de pagina stuk)
 	require("menu-top.php");
// als er een ?p=123 achter de url staat, dan gaat hij die pagina met 123.php ophalen en laten zien
	if(isset($_GET['p']))
		{
			$page = $_GET['p'];
		}
		else{
			//als er geen ?p= achter de url staat, dan pakt hij de home pagina
			$page='home';
		}
	
	if(file_exists('pages/'.$page.'.php'))
		{
			include('pages/'.$page.'.php');
		}
		else
		{
			include('pages/home.php');
		}
	?>
	</div>
  </body>
</html>