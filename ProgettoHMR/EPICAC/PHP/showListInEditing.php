<!-- lista accadimenti in redazione-->
<?php
require("../../../Config/OggiSTI_config_adm.php");
require("../../OggiSTI/Assets/PHP/OggiSTI_sessionSet.php");
require("../../OggiSTI/Assets/PHP/OggiSTI_controlLogged.php");
?>

<html>

<head>
	<title>ProgettoHRM</title>
	<link rel="stylesheet" type="text/css" href="../../HMR_Style.css">
	<script type='text/javascript' src='../../Assets/JS/HMR_CreaHTML.js'></script>
	<script type='text/javascript' src='../JSwebsite/searchAndSharing.js'></script>
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
	<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">
	<script type="text/javascript">
    $(document).ready(function () {
        $('body table#table_id').dataTable();
    });
	</script>
	<meta charset="utf-8">
	
</head>

<body>
	
	<div class="HMR_Banner">
		<script> creaHeader(2, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png') </script>
	</div>
	
	<div id="HMR_Menu" class="HMR_Menu" >
		<script> creaMenu(2, 0) </script>
	</div>
	
	<div class="HMR_Content">
		<div class="HMR_Text">
	
			<div id="listaEventi">
				</br>
				
				
				<h1>Avvenimenti In redazione</h1> </br>
				<table id="table_id" class="display" cellspacing="0" width="100%">
					<thead>
						<th>ID</th>
						<th>Nome</th>
						<th>Data</th>
						<th>Autori</th>
						<th>Ancora</th>
						<th>Stato</th>
						<th></th>
					</thead>
					<tbody>
					<?php
						include('../APIdb/HMR_EpicacDB.php');
						$query = "SELECT h.IdHa, h.Date, h.Title, h.Subtitle, h.Anchor, h.State, GROUP_CONCAT(DISTINCT(p1.Brief)) as autori FROM happenings as h LEFT JOIN happeningpeople as hp ON h.IdHa = hp.IdHa left join people as p1 ON p1.IdPp = hp.IdPp WHERE State= 'In redazione' GROUP By h.IdHa ORDER BY h.IdHa desc";
						$result = mysqli_query($db, $query);
					
						while($row = mysqli_fetch_array($result)){
							$id= $row['IdHa'];
							echo "<tr>";
							echo "<td >".$row['IdHa']."</td>";
							echo "<td >".$row['Title']."</td>";
							echo "<td>".$row['Date']."</td>";
							echo "<td>".$row['autori']."</td>";
							echo "<td>".$row['Anchor']."</td>";
							echo "<td>".$row['State']."</td>";
							//echo "<td align='center'><form method='get' action='RecuperoRigaAccadRedazione.php'><input type='submit' name='modifica' value='".$id."'></form></td>";
							echo "<td align='center'><form method='get' action='formHappeningss.php'> <input type='hidden' name='modifica' value='".$id."'> <input type='hidden' name='tipo' value='inRedazione'> <input type='submit' name='input' value='Modifica'> </form></td>";
							echo "</tr>";
						}
					?>
					</tbody>
					</table>
				
			</div>
			
			
		</div>
	</div>
	
	
	
</body>


</html>