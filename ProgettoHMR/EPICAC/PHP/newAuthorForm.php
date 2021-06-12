<?php

   require("../../../Config/OggiSTI_config_adm.php");
   require("../../OggiSTI/Assets/PHP/OggiSTI_sessionSet.php");
require("../../OggiSTI/Assets/PHP/OggiSTI_controlLogged.php");
?>

<html>

<head>
	<title>Gestisci persone e autori</title>
	<link rel="stylesheet" type="text/css" href="../../HMR_Style.css">
	<script type='text/javascript' src='../../Assets/JS/HMR_CreaHTML.js'></script>
	<script type='text/javascript' src='../JSwebsite/searchAndSharing.js'></script>
	
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
	<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">
	<script type="text/javascript">
    $(document).ready(function () {
        $('body table#table_id').dataTable(
		{
		"pageLength": 25,
		"order": [[ 5, "asc" ], [4, "asc"]]
		});
    });
	</script>
	
	
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
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

<?PHP
	include ('../DBinterface/dbLibrary.php');
							
	$db=openDB();
	$profili=[];
	$query="SELECT Type FROM profiles";
	$result = mysqli_query($db, $query);
	while($row = mysqli_fetch_array($result)){
		array_push($profili, $row['Type']);
	}

	if (isset($_GET['modificaAutore'])){
		$id= $_GET['ModificaAutoreID'];
	
		$db = openDB();
		$query_select = "SELECT IdPp, Name, Surname, Email, Brief, Description, Ordering, Profile FROM people WHERE IdPp = '$id'";
		$risultato = mysqli_query($db, $query_select);
		if (!$risultato) {
			die("Errore nella query $query_select: " . mysqli_error());
		}
		while($row = mysqli_fetch_array($risultato)){
			$nome= htmlspecialchars($row['Name'], ENT_QUOTES);
			$cognome= htmlspecialchars($row['Surname'], ENT_QUOTES);
			$email= htmlspecialchars($row['Email'], ENT_QUOTES);
			$formaBreve= $row['Brief'];
			$descrizione= htmlspecialchars($row['Description'], ENT_QUOTES); 
			$numAppariz= $row['Ordering'];
			$profilo= $row['Profile'];
		}
		echo '<h1>Modifica autore</h1>';
		
		
	} else {
		$email= $nome= $cognome= $formaBreve= $descrizione= $numAppariz= $profilo= "";
		echo '<h1>Nuovo autore</h1>';
	}
?>
	
<form action="../DBinterface/newAuthor.php" method="POST" enctype="multipart/form-data">
	<p>Nome</p>
	<input type="text" size="40" name="nome" value="<?PHP echo $nome; ?>" />
	<p>Cognome</p>
	<input type="text" size="40" name="cognome" value="<?PHP echo $cognome; ?>" />
	<p>Email</p>
	<input type="text" size="40" name="email" value="<?PHP echo $email; ?>" />
	<p>Forma Breve</p>
	<input type="text" size="40" name="formabreve" value="<?PHP echo $formaBreve; ?>"/>	
	<p>Descrizione</p>
	<input type="text" size="40" name="descr" value="<?PHP echo $descrizione; ?>"/>
	<p>Numero apparizione</p>
	<input type="text" size="40" name="ordapp" value="<?PHP echo $numAppariz; ?>"/>
	<p>Profilo</p>
	<select name="profilo">
<?PHP
	for($i=0; $i<count($profili); $i++) {
		if ($profili[$i]== $profilo) {
			echo '<option value="'.$profili[$i].'" selected="selected">';
			echo $profili[$i];
			echo '</option>';
		} else {
        	echo '<option value="'.$profili[$i].'">';
			echo $profili[$i];
			echo '</option>'; 
		}
    }
?>
	</select>
	<br/><br/>
	
<?PHP
	if (isset($_GET['modificaAutore'])){
		echo '<input type="submit" name="modifica" value="Modifica autore">';	
		echo '<input type="hidden" name="idMod" value="'.$id.'">';	
	} else{
		echo '<input type="submit" name="aggiungi" value="Aggiungi autore">';
	}
?>

</form>

<br/><br/>

<table id="table_id" class="display" cellspacing="0" width="100%">
	<thead>
		<th>ID</th>
		<th>Nome</th>
		<th>Cognome</th>
		<th>Email</th>
		<th>Forma breve</th>
		<th>Ordine Apparizione</th>
		<th>Profilo</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
	<?php
		include('../APIdb/HMR_EpicacDB.php');
		$query = "SELECT IdPp, Name, Surname, Email, Brief, Description, Ordering, Profile FROM people ORDER BY Ordering";
		$result = mysqli_query($db, $query);
					
		while($row = mysqli_fetch_array($result)){
			$idSingoloAut= $row['IdPp'];
			echo "<tr>";
			echo "<td >".$row['IdPp']."</td>";
			echo "<td >".$row['Name']."</td>";
			echo "<td>".$row['Surname']."</td>";
			echo "<td>".$row['Email']."</td>";
			echo "<td>".$row['Brief']."</td>";
			echo "<td>".$row['Ordering']."</td>";
			echo "<td>".$row['Profile']."</td>";
			echo "<td align='center'> <form action='../DBinterface/newAuthor.php' method='GET' enctype='multipart/form-data'> <input type='hidden' name='EliminaAutoreID' value='".$idSingoloAut."'> <input type='submit' name='eliminaAutore' value='Elimina'> </form></td>";
			echo "<td align='center'> <form action='newAuthorForm.php' method='GET' enctype='multipart/form-data'> <input type='hidden' name='ModificaAutoreID' value='".$idSingoloAut."'> <input type='submit' name='modificaAutore' value='Modifica'> </form></td>";
			echo "</tr>";
		}
	?>
	</tbody>
</table>

	</div>
</div>
</body>
</html>


			
		