<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../../HMR_Style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
	<script type='text/javascript' src='../../Assets/JS/HMR_CreaHTML.js'></script>
	<script type='text/javascript' src='../JSwebsite/searchAndSharing.js'></script>
	<script type='text/javascript'> 
	
	$(document).ready(function(){
	setTimeout(function () {
		window.location.href= 'https://www.progettohmr.it/EPICAC/PHP/newAuthorForm.php'; // the redirect goes here
	},5000);
	}); 

	</script>
	
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


<?php
include ('dbLibrary.php');

$nome = $_POST ['nome'];
$cognome = $_POST ['cognome'];
$email = $_POST ['email'];
$formaBreve = $_POST ['formabreve'];
$descr= mysqli_real_escape_string($db, $_POST ['descr']);
$ordApp= $_POST ['ordapp'];
$profilo= $_POST ['profilo'];


if (isset($_POST['aggiungi'])){

	$db = openDB();
	$query_insert = "INSERT INTO people (Name, Surname, Email, Brief, Description, Ordering, Profile) VALUES ('".$nome."', '".$cognome."', '".$email."', '".$formaBreve."', '".$descr."', '".$ordApp."', '".$profilo."')";
	$risultato_insert = mysqli_query($db, $query_insert);
	if (!$risultato_insert) {
		die("Errore nella query $query_insert: " . mysqli_error());
	}
	
	echo 'Autore salvato correttamente</br>';
	echo 'Trà poco sarai reindirizzato alla pagina principale. Clicca <a href="../../EPICAC/PHP/newAuthorForm.php">quì</a> se non vuoi attendere';
	
}

	
if (isset($_GET['eliminaAutore'])){
	$id= $_GET['EliminaAutoreID'];
	$db = openDB();
	$query_delete = "DELETE FROM people WHERE IdPp = '$id'";
	$risultato = mysqli_query($db, $query_delete);
	if (!$risultato) {
		die("Errore nella query $query_delete: " . mysqli_error());
	}
	
	echo 'Autore eliminato correttamente</br>';
	echo 'Trà poco sarai reindirizzato alla pagina principale. Clicca <a href="../../EPICAC/PHP/formHappeningss.php">quì</a> se non vuoi attendere';
	
}

if (isset($_POST['modifica'])){
	$id= $_POST['idMod'];
	$db = openDB();
	$query_select = "UPDATE people SET Name= '$nome', Surname= '$cognome', Email= '$email', Brief= '$formaBreve', Description= '$descr', Ordering= '$ordApp', Profile= '$profilo'  WHERE IdPp = '$id'";
	$risultato = mysqli_query($db, $query_select);
	if (!$risultato) {
		die("Errore nella query $query_select: " . mysqli_error());
	}
	
	echo 'Autore modificato correttamente</br>';
	echo 'Trà poco sarai reindirizzato alla pagina principale. Clicca <a href="../../EPICAC/PHP/newAuthorForm.php">quì</a> se non vuoi attendere';
	
	
}



?>

		</div>
	</div>

</body>
</html>
