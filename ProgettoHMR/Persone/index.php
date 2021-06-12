
<!DOCTYPE html>
<html>
<head>
	<title>Persone</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../HMR_Style.css">
	<script type='text/javascript' src='../Assets/JS/HMR_CreaHTML.js'></script>
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
</head>
<body>

	<div class="HMR_Banner">
		<script> creaHeader(1, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png') </script>
	</div>

	<div id="HMR_Menu" class="HMR_Menu" >
		<script> creaMenu(1, 0) </script>
	</div>

	<div class="HMR_Content">
		<div class="HMR_Text">
		

		<?PHP
			$discorso=file_get_contents('../Assets/HTML/HMR_Persone.html');
			echo $discorso;
			

			include ('../EPICAC/DBinterface/dbLibrary.php');
			$db=openDB();
			$profili=[];
			$query="SELECT Type, HTML_Intro FROM profiles";
			$result = mysqli_query($db, $query);
			while($row = mysqli_fetch_array($result)){
				$profilo= array("Tipo"=>$row['Type'], "Descrizione"=>$row['HTML_Intro']);
				array_push($profili, $profilo);


			}

			foreach ($profili as $p) {
				$tipo=$p["Tipo"];
				$descrizione=$p["Descrizione"];
				$content=file_get_contents('../Assets/HTML/'.$descrizione);
				echo $content;

				//echo '<br/>';

				$query="SELECT Name, Surname, Description FROM people WHERE Profile='$tipo' ORDER BY Ordering asc";
				$result = mysqli_query($db, $query);
				echo '<ul>';
				while($row = mysqli_fetch_array($result)){
					echo '<li>';
					echo $row['Name']." ".$row['Surname'].", ".$row['Description']."<br/>";
					echo '</li>';			

				}
				echo '</ul>';
				//echo "<br/>";

			}
		?>
		</div>
	</div>
	<div class="HMR_Footer">
		<script type="text/javascript"> creaFooter(1, '2009', '2018', 'G. A. Cignoni', '03/21/2009') </script>
	</div>	
</body>
</html>










