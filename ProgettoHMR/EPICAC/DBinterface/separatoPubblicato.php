<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../../HMR_Style.css">
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script type='text/javascript' src='../../Assets/JS/HMR_CreaHTML.js'></script>
	<script type='text/javascript' src='../JSwebsite/searchAndSharing.js'></script>
	<script type='text/javascript' src='../JSadmin/redirect.js'></script>
	
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
include ('dbLibrary.php');

//recupero id accadimento 
$id = $_POST['idModifica'];

//data attuale
$ultimaMod = date('Y/m/d H:i:s');

//variabili accadimento
$titoloAccadimento = $_POST ['titoloAccadimento'];

$sottotitoloAccadimento = $_POST ['sottotitoloAccadimento'];
$dataAccadimento = $_POST ['dataAccadimento'];
$ancora= $_POST ['ancora'];
if (empty($_POST['inputIdAutoriAccadimento'])){ 
	$autoriAccadimento = "";
} else $autoriAccadimento = $_POST['inputIdAutoriAccadimento'];

//variabili Pagina dedicata
//$paginaDaCreare = $_POST['PaginaDaCreare'];
if (empty($_POST['PaginaDaCreare'])){ 
	$paginaDaCreare = "";
} else $paginaDaCreare = $_POST['PaginaDaCreare'];

$nomeCartellaPagina = $_POST['nomeCartellaPagina'];
$linkIMG = $_POST['linkImg']; 
$linkIMG2 = $_POST['linkImg2']; 
$testoPgDedicata = $_POST['testoPgDedicata'];
$titoloPgDedicata = $_POST['titoloPgDedicata'];
$sottotitoloPgDedicata = $_POST['sottotitoloPgDedicata'];
if (empty($_POST['linkriferimento'])){ 
	$riferimentoPgEsistente = "";
} else $riferimentoPgEsistente = $_POST['linkriferimento'];
 
if (empty($_POST['inputIdAutoriPgDedicata'])){ 
	$autoriPgDedicata = "";
} else $autoriPgDedicata = $_POST['inputIdAutoriPgDedicata'];

//variabili In Evidenza
if (empty($_POST['posizioneBox'])){ 
	$posizione = "";
} else $posizione = $_POST['posizioneBox'];
$titoloEvidenza = $_POST ['titoloInEvidenza'];
$testoEvidenza = $_POST ['testoInEvidenza'];
$linkLogo =  $_POST ['linkIcona'];     
if (empty($_POST['linkInEvidenza'])){ 
	$RadioButtonLinkInEvidenza = "";
	$linkInEvidenza= "";
} else $RadioButtonLinkInEvidenza = $_POST['linkInEvidenza'];

if($RadioButtonLinkInEvidenza == "crono"){
	$linkInEvidenza= 'Cronologia/#'.$ancora;
}
if($RadioButtonLinkInEvidenza == "eventi"){
	$linkInEvidenza= 'Eventi/#'.$ancora;
}
if($RadioButtonLinkInEvidenza == "riferimenti"){
	$linkInEvidenza= 'Documentazione/#'.$ancora;
}
if($RadioButtonLinkInEvidenza == "dedicata"){
	if($paginaDaCreare == "si"){
	$linkInEvidenza = "$nomeCartellaPagina/";	
	} else if($paginaDaCreare == "no"){
	$linkInEvidenza = $_POST['linkriferimento'];
	}
}

//variabili In CRONOLOGIA
$titoloCrono = $_POST ['titoloInCronologia'];
$testoCrono = $_POST ['testoInCronologia'];
$dataCrono = $_POST ['dataInCronologia'];
$sottotitoloCrono = $_POST ['sottotitoloInCronologia'];

if (empty($_POST['inputIdAutoriCronologia'])){ 
	$autoriCrono = "";
} else $autoriCrono = $_POST['inputIdAutoriCronologia'];

//variabili in EVENTI
$titoloEvento = $_POST ['titoloInEventi'];
$testoEvento = $_POST ['testoInEventi'];
$dataEvento = $_POST ['dataInEventi'];
$sottotitoloEvento = $_POST ['sottotitoloInEventi']; 
if (empty($_POST['tipoEventi'])){
	$tipoEvento = "";
} else $tipoEvento = $_POST['tipoEventi'];
if (empty($_POST['inputIdAutoriEventi'])){ 
	$autoriEvento = "";
} else $autoriEvento = $_POST['inputIdAutoriEventi'];

//variabili in RIFERIMENTI
$titoloRiferimento = $_POST['titoloInRiferimenti'];
$dataRiferimento = $_POST['dataInRiferimenti'];
$ambito = $_POST['ambitoRiferimenti'];
$isbn = $_POST['isbn'];
$tipoRiferimento = $_POST['tipoRiferimento'];
$numeroVolume = $_POST['numeroVolume'];
$numeroPagine = $_POST['numeroPagine'];
if (empty($_POST['inputIdAutoriRiferimenti'])){ 
	$autoriRiferimenti = "";
} else $autoriRiferimenti = $_POST['inputIdAutoriRiferimenti'];

if (isset($_POST['titoloLinkato'])){
	$linkSuTitolo= $_POST['titoloLinkato'];
} else $linkSuTitolo = "";

if (empty($_FILES['pdf'])){
	$pdf = "";
} else $pdf = $_FILES['pdf'];

if(empty($_POST['linkSuTesto'])){
	$testoPdf = "";
} else $testoPdf = $_POST['linkSuTesto'];

if(empty($_POST['linkEsterno'])){
	$linkEsternoRif = "";
} else $linkEsternoRif = $_POST['linkEsterno'];

if(empty($_POST['linkPdf'])){
	$linkPdf = "";
} else $linkPdf = $_POST['linkPdf'];

if(empty($_POST['nomePdf'])){
	$nomePdf= "";
} else $nomePdf= $_POST['nomePdf'];
	
if (isset($_POST['pdfDaEliminare'])){
	$pdfDaEliminare= $_POST['pdfDaEliminare'];
} else $pdfDaEliminare= "";




if(empty($_POST['selezionato'])){
		$selezionato = [];
	} else $selezionato = $_POST['selezionato'];

/*-------------------------  PUBBLICA ----------------------------*/

if (isset($_POST['pubblica'])){
	
	if($selezionato == ""){
		die('Non hai selezionato le checkbox </br> <a href="javascript:history.back()">Indietro</a> ');
	}
	$statoAccadimento= "Pubblicato";
	
		
	$db = openDB();
	$query_controlloRighe = "SELECT COUNT(IdHa) as numeroRighe FROM happenings WHERE IdHa = $id "; 
	$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
	while($row = mysqli_fetch_array($risultato_controlloRighe)){
		if ($row['numeroRighe'] == 1){
			$query_updateAccadimento = "UPDATE happenings SET Date= '$dataAccadimento', Title= '".mysqli_real_escape_string($db, $titoloAccadimento)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloAccadimento)."', Anchor= '".mysqli_real_escape_string($db, $ancora)."', State= '$statoAccadimento'  WHERE IdHa = $id";
			$risultato_update = mysqli_query($db, $query_updateAccadimento);
			if (!$risultato_update) {
				die("Errore nella query $query_updateAccadimento: " . mysqli_error());
			}
		}
		if ($row['numeroRighe'] == 0){
			$query_insertAccadimento =  "INSERT INTO happenings (IdHa, Date, Title, Subtitle, Anchor, State) VALUES ('$id', '$dataAccadimento', '".mysqli_real_escape_string($db, $titoloAccadimento)."', '".mysqli_real_escape_string($db, $sottotitoloAccadimento)."', '".mysqli_real_escape_string($db, $ancora)."', '$statoAccadimento' )";
			$risultato_insert = mysqli_query($db, $query_insertAccadimento);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAccadimento: " . mysqli_error());
			}
		}	
	}
	if(!empty($autoriAccadimento)){
		$query_controlloRighe = "SELECT COUNT(IdHa) as numeroRighe FROM happeningpeople WHERE IdHa = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] > 0){
				$query_eliminaVecchiAutori= "DELETE FROM happeningpeople WHERE IdHa = '$id'";
				$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
				if (!$risultato_eliminaVecchiAutori) {
					die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
				}
			}
		}
		$query_insertAutoriAccadimento= "INSERT INTO happeningpeople (IdHa, IdPp) VALUES ";
		$valori= array();
		for($i= 0; $i < count($autoriAccadimento); $i++){
			$valori[] = "('$id', '".$autoriAccadimento[$i]."')";
		}
		$query_insertAutoriAccadimento .= join(', ', $valori);
		$risultato_insert = mysqli_query($db, $query_insertAutoriAccadimento);
		if (!$risultato_insert) {
			die("Errore nella query $query_insertAutoriAccadimento: " . mysqli_error());
		}
	}
	
    /*--- CHECKBOX SELEZIONATE ---*/			
		
	if (in_array("evidenza", $selezionato)){
		
		if (file_exists($_FILES['icona']['tmp_name']) || is_uploaded_file($_FILES['icona']['tmp_name'])){
			$target_dir = "../../Assets/Images/";
			$target_file = $target_dir . basename($_FILES["icona"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$check = getimagesize($_FILES["icona"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				echo 'Attenzione: il File non è un immagine</br>';
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" && $imageFileType != "ico") {
				echo 'Sono supportati solo JPG, JPEG, ICO, PNG & GIF.</br>';
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Spiacente, l'icona non è stata caricata.</br>";
			// if everything is ok, try to upload file
			} else {
				move_uploaded_file($_FILES["icona"]["tmp_name"], $target_file);
				$linkLogo = "Assets/Images/". basename( $_FILES["icona"]["name"]);
			}
		} 
		
		$db = openDB();
		//recupero la posizione precedente per confrintarla con quella passata dall'utente nella modifica
		$posizionePrecedente;
		$query = "SELECT Position FROM highlights WHERE IdHl = $id";
		$result = mysqli_query($db, $query);
		while($row = mysqli_fetch_array($result)){
			$posizionePrecedente= $row['Position'];
		}
		
		$query_controlloRighe = "SELECT COUNT(IdHl) as numeroRighe FROM highlights WHERE IdHl = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				if($posizionePrecedente != $posizione){
					$query_updatePosizione = "UPDATE highlights SET Position= Position + '1' WHERE Position >= '$posizione'";
					$risultato_updatePosizione = mysqli_query($db, $query_updatePosizione);
					if (!$risultato_updatePosizione) {
						die("Errore nella query $query_updatePosizione: " . mysqli_error());
					}
				}
				
				$query_updateEvidenza = "UPDATE highlights SET Position= '$posizione', Title= '".mysqli_real_escape_string($db, $titoloEvidenza)."', Text= '".mysqli_real_escape_string($db, $testoEvidenza)."', Icon= '$linkLogo', LinkTo= '$linkInEvidenza', Visible= 'si' WHERE IdHl = $id";
				$risultato_updateEvidenza = mysqli_query($db, $query_updateEvidenza);
				if (!$risultato_updateEvidenza) {
					die("Errore nella query $query_updateEvidenza: " . mysqli_error());
				}
				
				$query_aggiornaIdEvidenzaInAccadimenti = "UPDATE happenings SET IdHl= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdEvidenzaInAccadimenti = mysqli_query($db, $query_aggiornaIdEvidenzaInAccadimenti);
				if (!$risultato_aggiornaIdEvidenzaInAccadimenti) {
					die("Errore nella query $query_aggiornaIdEvidenzaInAccadimenti: " . mysqli_error());
				}
			}
			if ($row['numeroRighe'] == 0){
				$query_updatePosizione = "UPDATE highlights SET Position= Position + '1' WHERE Position >= '$posizione'";
				$risultato_updatePosizione = mysqli_query($db, $query_updatePosizione);
				if (!$risultato_updatePosizione) {
					die("Errore nella query $query_updatePosizione: " . mysqli_error());
				}
				$query_insertEvidenzaConID = "INSERT INTO highlights (IdHl, Position, Title, Text, Icon, LinkTo, Visible) VALUES ('$id', '$posizione', '".mysqli_real_escape_string($db, $titoloEvidenza)."', '".mysqli_real_escape_string($db, $testoEvidenza)."', '$linkLogo', '$linkInEvidenza', 'si')";
				$risultato_insertEvidenzaConID = mysqli_query($db, $query_insertEvidenzaConID);
				if (!$risultato_insertEvidenzaConID) {
					die("Errore nella query $query_insertEvidenzaConID: " . mysqli_error());
				}
				$query_aggiornaIdEvidenzaInAccadimenti = "UPDATE happenings SET IdHl= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdEvidenzaInAccadimenti = mysqli_query($db, $query_aggiornaIdEvidenzaInAccadimenti);
				if (!$risultato_aggiornaIdEvidenzaInAccadimenti) {
					die("Errore nella query $query_aggiornaIdEvidenzaInAccadimenti: " . mysqli_error());
				}
			}
		}
		//aggiorno data ultimamodifica
		$query_ultimaModEvidenza = "UPDATE lastmod SET Highlights= '$ultimaMod'";
		$risultato_ultimaModEvidenza = mysqli_query($db, $query_ultimaModEvidenza);
		if (!$risultato_ultimaModEvidenza) {
			die("Errore nella query $query_ultimaModEvidenza: " . mysqli_error());
		}
		
	} else {
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdHl) as numeroRighe FROM highlights WHERE IdHl = $id ";
		$risultato_queryControlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_queryControlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_eliminaevidenza = "UPDATE highlights SET Visible= 'no' WHERE IdHl = $id";
				$risultato_eliminaevidenza = mysqli_query($db, $query_eliminaevidenza);
				if (!$risultato_eliminaevidenza) {
					die("Errore nella query $query_eliminaevidenza: " . mysqli_error());
				}
				$query_aggiornaEvidenzaInAccadimenti = "UPDATE happenings SET IdHl= '0' WHERE IdHa = $id";
				$risultato_aggiornaEvidenzaInAccadimenti = mysqli_query($db, $query_aggiornaEvidenzaInAccadimenti);
				if (!$risultato_aggiornaEvidenzaInAccadimenti) {
					die("Errore nella query $query_aggiornaEvidenzaInAccadimenti: " . mysqli_error());
				}
			}
		}
	
	}
	
	
	if (in_array("cronologia", $selezionato)){
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdCr) as numeroRighe FROM cronos WHERE IdCr = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_updateCronologia = "UPDATE cronos SET Date= '$dataCrono', Title= '".mysqli_real_escape_string($db, $titoloCrono)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloCrono)."', Text= '".mysqli_real_escape_string($db, $testoCrono)."', Visible= 'si' WHERE IdCr = $id";
				$risultato_updateCronologia = mysqli_query($db, $query_updateCronologia);
				if (!$risultato_updateCronologia) {
					die("Errore nella query $query_updateCronologia: " . mysqli_error());
				}
				$query_aggiornaIdCronologiaInAccadimenti = "UPDATE happenings SET IdCr= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdCronologiaInAccadimenti = mysqli_query($db, $query_aggiornaIdCronologiaInAccadimenti);
				if (!$risultato_aggiornaIdCronologiaInAccadimenti) {
					die("Errore nella query $query_aggiornaIdCronologiaInAccadimenti: " . mysqli_error());
				}
			}
			if ($row['numeroRighe'] == 0){
				$query_insertCronologiaConID = "INSERT INTO cronos (IdCr, Date, Title, Subtitle, Text, Visible) VALUES ('$id', '$dataCrono', '".mysqli_real_escape_string($db, $titoloCrono)."', '".mysqli_real_escape_string($db, $sottotitoloCrono)."', '".mysqli_real_escape_string($db, $testoCrono)."', 'si')";
				$risultato_insert = mysqli_query($db, $query_insertCronologiaConID);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertCronologiaConID: " . mysqli_error());
				}
				$query_aggiornaIdCronologiaInAccadimenti = "UPDATE happenings SET IdCr= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdCronologiaInAccadimenti = mysqli_query($db, $query_aggiornaIdCronologiaInAccadimenti);
				if (!$risultato_aggiornaIdCronologiaInAccadimenti) {
					die("Errore nella query $query_aggiornaIdCronologiaInAccadimenti: " . mysqli_error());
				}
			}
		}
	
		if(!empty($autoriCrono)){
			$query_controlloRighe = "SELECT COUNT(IdCr) as numeroRighe FROM cronopeople WHERE IdCr = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					$query_eliminaVecchiAutori= "DELETE FROM cronopeople WHERE IdCr = '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
					}
				}
			}
			
			$query_insertAutoriCrono= "INSERT INTO cronopeople (IdCr, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriCrono); $i++){
				$valori[] = "('$id', '".$autoriCrono[$i]."')";
			}
			$query_insertAutoriCrono .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriCrono);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriCrono: " . mysqli_error());
			}
		}
		//aggiornamento ultimamodifica
		$query_ultimaModCrono = "UPDATE lastmod SET Cronos= '$ultimaMod'";
		$risultato_ultimaModCrono = mysqli_query($db, $query_ultimaModCrono);
		if (!$risultato_ultimaModCrono) {
			die("Errore nella query $query_ultimaModCrono: " . mysqli_error());
		}
	
	} else {
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdCr) as numeroRighe FROM cronos WHERE IdCr = $id ";
		$risultato_queryControlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_queryControlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_eliminaCrono = "UPDATE cronos SET Date= '$dataCrono', Title= '".mysqli_real_escape_string($db, $titoloCrono)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloCrono)."', Text= '".mysqli_real_escape_string($db, $testoCrono)."', Visible= 'no' WHERE IdCr = $id";
				$risultato_eliminaCrono = mysqli_query($db, $query_eliminaCrono);
				if (!$risultato_eliminaCrono) {
					die("Errore nella query $query_eliminaCrono: " . mysqli_error());
				}
				$query_aggiornaCronoInAccadimenti = "UPDATE happenings SET IdCr= '0' WHERE IdHa = $id";
				$risultato_aggiornaCronoInAccadimenti = mysqli_query($db, $query_aggiornaCronoInAccadimenti);
				if (!$risultato_aggiornaCronoInAccadimenti) {
					die("Errore nella query $query_aggiornaCronoInAccadimenti: " . mysqli_error());
				}
			}
		}
	}
	
	
	
	
	
	if (in_array("eventi", $selezionato)){
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdEv) as numeroRighe FROM events WHERE IdEv = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_updateEventi = "UPDATE events SET Type='$tipoEvento', Date= '$dataEvento' , Title= '".mysqli_real_escape_string($db, $titoloEvento)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloEvento)."', Text= '".mysqli_real_escape_string($db, $testoEvento)."', Visible= 'si'  WHERE IdEv = $id";
				$risultato_updateEventi = mysqli_query($db, $query_updateEventi);
				if (!$risultato_updateEventi) {
					die("Errore nella query $query_updateEventi: " . mysqli_error());
				}
				$query_aggiornaIdEventoInAccadimenti = "UPDATE happenings SET IdEv= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdEventoInAccadimenti = mysqli_query($db, $query_aggiornaIdEventoInAccadimenti);
				if (!$risultato_aggiornaIdEventoInAccadimenti) {
					die("Errore nella query $query_aggiornaIdEventoInAccadimenti: " . mysqli_error());
				}
			}
			if ($row['numeroRighe'] == 0){
				$query_insertEventiConID = "INSERT INTO events (IdEv, Type, Date, Title, Subtitle, Text, Visible) VALUES ('$id', '$tipoEvento', '$dataEvento', '".mysqli_real_escape_string($db, $titoloEvento)."', '".mysqli_real_escape_string($db, $sottotitoloEvento)."', '".mysqli_real_escape_string($db, $testoEvento)."', 'si')";
				$risultato_insert = mysqli_query($db, $query_insertEventiConID);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertEventiConID: " . mysqli_error());
				}
				$query_aggiornaIdEventoInAccadimenti = "UPDATE happenings SET IdEv= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdEventoInAccadimenti = mysqli_query($db, $query_aggiornaIdEventoInAccadimenti);
				if (!$risultato_aggiornaIdEventoInAccadimenti) {
					die("Errore nella query $query_aggiornaIdEventoInAccadimenti: " . mysqli_error());
				}
			}
		}
		
		if(!empty($autoriEvento)){
			$query_controlloRighe = "SELECT COUNT(IdEv) as numeroRighe FROM eventpeople WHERE IdEv = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					$query_eliminaVecchiAutori= "DELETE FROM eventpeople WHERE IdEv = '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
					}
				}
			}
			
			$query_insertAutoriEvento= "INSERT INTO eventpeople (IdEv, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriEvento); $i++){
				$valori[] = "('$id', '".$autoriEvento[$i]."')";
			}
			$query_insertAutoriEvento .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriEvento);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriEvento: " . mysqli_error());
			}
		}
		//aggiornamento ultimamodifica
		$query_ultimaModEventi = "UPDATE lastmod SET Events= '$ultimaMod'";
		$risultato_ultimaModEventi = mysqli_query($db, $query_ultimaModEventi);
		if (!$risultato_ultimaModEventi) {
			die("Errore nella query $query_ultimaModEventi: " . mysqli_error());
		}
		
	} else {
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdEv) as numeroRighe FROM events WHERE IdEv = $id ";
		$risultato_queryControlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_queryControlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_eliminaEvento = "UPDATE events SET Visible= 'no' WHERE IdEv = $id";
				$risultato_eliminaEvento = mysqli_query($db, $query_eliminaEvento);
				if (!$risultato_eliminaEvento) {
					die("Errore nella query $query_eliminaEvento: " . mysqli_error());
				}
				$query_aggiornaEventoInAccadimenti = "UPDATE happenings SET IdEv= '0' WHERE IdHa = $id";
				$risultato_aggiornaEventoInAccadimenti = mysqli_query($db, $query_aggiornaEventoInAccadimenti);
				if (!$risultato_aggiornaEventoInAccadimenti) {
					die("Errore nella query $query_aggiornaEventoInAccadimenti: " . mysqli_error());
				}
			}
		}
	}
	
	
	
	
	if (in_array("riferimenti", $selezionato)){
		//cancello i pdf tolti
		if(!empty($pdfDaEliminare)){
			for($i=0; $i < count($pdfDaEliminare); $i++){
				$path= '../../Documenti/'.$pdfDaEliminare[$i];
				unlink($path);
			}
		}
		
		//inserisco nuovi pdf
		if($pdf != "" ){
			for($i = 0; $i < count($pdf['tmp_name']); $i++){
				if ((file_exists($pdf['tmp_name'][$i])) || (is_uploaded_file($pdf['tmp_name'][$i]))){
					$cartella = '../../Documenti/';
					$linkPdf[$i] = "../Documenti/". basename($pdf['name'][$i]);
					
				}
				$percorso = $pdf['tmp_name'][$i];
				$nome = $pdf['name'][$i];
				move_uploaded_file($percorso, $cartella . $nome);
			}
		}
		
		if(!empty($autoriRiferimenti)){
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM biblioauthors WHERE IdBi = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					/*Elimino gli id dei vecchi autori */
					$query_eliminaVecchiAutoriRiferimenti= "DELETE FROM biblioauthors WHERE IdBi= '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutoriRiferimenti);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutoriRiferimenti: " . mysqli_error());
					}
				}
			}
					
			/*inserisco quelli nuovi */
			$query_insertAutoriRiferimenti= "INSERT INTO biblioauthors (IdBi, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriRiferimenti); $i++){
				$valori[] = "('$id', '".$autoriRiferimenti[$i]."')";
			}
			$query_insertAutoriRiferimenti .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriRiferimenti);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriRiferimenti: " . mysqli_error());
			}
			/*Recupero i nomi degli autori (E non GLi ID) */
			$query_recuperaNomiAutori = "SELECT Brief FROM  people  WHERE people.IdPp IN (".implode(',',$autoriRiferimenti).") ORDER BY FIELD(IdPp, ".implode(',',$autoriRiferimenti).")";
			$result = mysqli_query($db, $query_recuperaNomiAutori);
			if (!$result) {
				die("Errore nella query $query_recuperaNomiAutori: " . mysqli_error());
			}
			$nomiAtoriRiferimenti= [];
			while($row = mysqli_fetch_array($result)){
				$nomiAtoriRiferimenti[] = $row['Brief'];
			}
				
		}
			
		/*-- Variabili Pdf per campo "compilato"*/
		$pdfTraParentesi = array();
		$titoloLinkato = "";
		$compilato = "";	
		
		//se gli ho passato dei pdf nuovi o ne ho tolto qualcuno
		if((!empty($testoPdf)) || (!empty($pdf)) || (!empty($linkEsternoRif)) || (!empty($nomePdf)) || (!empty($pdfDaEliminare))){
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM bibliolinks WHERE IdBi = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					/*Elimino i vecchi biblioliks*/
					$query_eliminaVecchiBibliolinks= "DELETE FROM bibliolinks WHERE IdBi= '$id'";
					$risultato_eliminaVecchiBibliolinks = mysqli_query($db, $query_eliminaVecchiBibliolinks);
					if (!$risultato_eliminaVecchiBibliolinks) {
						die("Errore nella query $query_eliminaVecchiBibliolinks: " . mysqli_error());
					}
				}
			}
		}
		
		//se gli ho passato dei pdf nuovi, creo tutti i collegamenti nel db
		if((!empty($testoPdf)) || (!empty($pdf)) || (!empty($linkEsternoRif)) || (!empty($nomePdf))){
			for($i= 0; $i < count($testoPdf); $i++){ 
				/*-- doclinks (Pdf e link esterni)*/
				$query_insertDocumenti= "INSERT INTO doclinks (AnchorText, Pdf, ExtLink) VALUES ('".mysqli_real_escape_string($db, $testoPdf[$i])."', '".$nomePdf[$i]."', '".$linkEsternoRif[$i]."')";
				$risultato_insert = mysqli_query($db, $query_insertDocumenti);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertDocumenti: " . mysqli_error());
				}
				$ultimoIdPdf = mysqli_insert_id($db);
					
				/*-- Bibliolinks (IdBi, IdLk)*/
				$query_BiblioEdocLink= "INSERT INTO bibliolinks (IdBi, IdLk) VALUES ('$id', '$ultimoIdPdf')";
				$risultato_insert = mysqli_query($db, $query_BiblioEdocLink);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertDocumenti: " . mysqli_error());
				}
					
				/*-- Controllo i pdf e link esterni per il campo "compilato"*/
				if(($testoPdf[$i] != "") && ($nomePdf[$i] != "")){
					$pdfTraParentesi[] = "<a href='../Documenti/" . $nomePdf[$i] . "'>". $testoPdf[$i] . "</a>";
				}
				if(($testoPdf[$i] != "") && ($linkEsternoRif[$i] != "")){
					$pdfTraParentesi[] = "<a href='". $linkEsternoRif[$i] . "'>". $testoPdf[$i] . "</a>";
				}
				if(($testoPdf[$i] == "") && ($nomePdf[$i] != "")){
					$titoloLinkato = "<a href='../Documenti/". $nomePdf[$i] . "'>". $titoloRiferimento . "</a>";
				}
				if(($testoPdf[$i] == "") && ($linkEsternoRif[$i] != "")){
					$titoloLinkato = "<a href='". $linkEsternoRif[$i] . "'>". $titoloRiferimento . "</a>";
				}
			}
		}
		
		/*Creazione campo "compilato"*/
		if (!empty($nomiAtoriRiferimenti)){
			$compilato .= join(', ', $nomiAtoriRiferimenti) . ', ';
		}
			
		if (!empty($titoloLinkato)){
			$compilato .= '"' . $titoloLinkato . '"';
		} else $compilato .= '"' . $titoloRiferimento . '"';
				
		$compilato .= ', ' . $ambito;
			
		if (!empty($dataRiferimento)){
			$compilato .= ', ' . $dataRiferimento;
		}
			
		if(!empty($numeroVolume)){
			$compilato .= ', n. ' . $numeroVolume;
		}
			
		if(!empty($numeroPagine)){
			$compilato .= ', pp. ' . $numeroPagine;
		}
			
		if (!empty($isbn)){
			$compilato .= ', ' . $isbn;
		}
			
		if(!empty($pdfTraParentesi)) {
			$valori = [];
			$compilato .= ' (';
			for($i= 0; $i < count($pdfTraParentesi); $i++){
				$valori[] =  $pdfTraParentesi[$i] ;
			}
			$compilato .= join(', ', $valori) . ')';
		}
			
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM biblios WHERE IdBi = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_updateRiferimento= "UPDATE biblios SET Category= '$tipoRiferimento', Date= '$dataRiferimento', Title= '".mysqli_real_escape_string($db, $titoloRiferimento)."', PubReference= '".mysqli_real_escape_string($db, $ambito)."', VolNum= '$numeroVolume', Pages= '$numeroPagine', ISBN= '$isbn', HTMLSrc= '".mysqli_real_escape_string($db, $compilato)."', Visible= 'si' WHERE IdBi = '$id' ";
				$risultato_updateRiferimento = mysqli_query($db, $query_updateRiferimento);
				if (!$risultato_updateRiferimento) {
					die("Errore nella query $query_updateRiferimento: " . mysqli_error());
				}
				$query_aggiornaIdRiferimentiInAccadimenti = "UPDATE happenings SET IdBi= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdRiferimentiInAccadimenti = mysqli_query($db, $query_aggiornaIdRiferimentiInAccadimenti);
				if (!$risultato_aggiornaIdRiferimentiInAccadimenti) {
					die("Errore nella query $query_aggiornaIdRiferimentiInAccadimenti: " . mysqli_error());
				}
			}
		
			if ($row['numeroRighe'] == 0){
				$query_insertRiferimento = "INSERT INTO biblios (IdBi, Category, Date, Title, PubReference, VolNum, Pages, ISBN, HTMLSrc, Visible) VALUES ('$id', '$tipoRiferimento', '$dataRiferimento', '".mysqli_real_escape_string($db, $titoloRiferimento)."', '".mysqli_real_escape_string($db, $ambito)."', '$numeroVolume', '$numeroPagine', '$isbn', '".mysqli_real_escape_string($db, $compilato)."', 'si')";
				$risultato_insertRiferimento = mysqli_query($db, $query_insertRiferimento);
				if (!$risultato_insertRiferimento) {
					die("Errore nella query $query_insertRiferimento: " . mysqli_error());
				}
				
				$query_aggiornaIdRiferimentiInAccadimenti = "UPDATE happenings SET IdBi= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdRiferimentiInAccadimenti = mysqli_query($db, $query_aggiornaIdRiferimentiInAccadimenti);
				if (!$risultato_aggiornaIdRiferimentiInAccadimenti) {
					die("Errore nella query $query_aggiornaIdRiferimentiInAccadimenti: " . mysqli_error());
				}
			}
		}
		//aggiornamento ultimamodifica
		$query_ultimaModRiferimenti = "UPDATE lastmod SET Biblios= '$ultimaMod'";
		$risultato_ultimaModRiferimenti = mysqli_query($db, $query_ultimaModRiferimenti);
		if (!$risultato_ultimaModRiferimenti) {
			die("Errore nella query $query_ultimaModRiferimenti: " . mysqli_error());
		}
		
	} else {
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM biblios WHERE IdBi = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_eliminaRiferimenti = "UPDATE biblios SET Visible= 'no' WHERE IdBi = $id";
				$risultato_eliminaRiferimenti = mysqli_query($db, $query_eliminaRiferimenti);
				if (!$risultato_eliminaRiferimenti) {
					die("Errore nella query $query_eliminaRiferimenti: " . mysqli_error());
				}
				$query_aggiornaRiferimentiInAccadimenti = "UPDATE happenings SET IdBi= '0' WHERE IdHa = $id";
				$risultato_aggiornaRiferimentiInAccadimenti = mysqli_query($db, $query_aggiornaRiferimentiInAccadimenti);
				if (!$risultato_aggiornaRiferimentiInAccadimenti) {
					die("Errore nella query $query_aggiornaRiferimentiInAccadimenti: " . mysqli_error());
				}
			}
		}
	}
	
	
	if (in_array("dedicata", $selezionato)){
	/*-- se clicco si, crea la pagina; se clicco no, svuota le variabili e tiene il link di riferimento */
		if ($paginaDaCreare == "si"){
			$path= "../../$nomeCartellaPagina/index.html";
		
			if (file_exists($path)){ 
				$files = glob("../../$nomeCartellaPagina/*.*");
				$sommaFiles = count($files);
				rename("../../$nomeCartellaPagina/index.html", "../../$nomeCartellaPagina/index.back".$sommaFiles);
				$file = "../../$nomeCartellaPagina/index.html";
			} else{
				mkdir("../../$nomeCartellaPagina", 0777); 
				$file = "../../$nomeCartellaPagina/index.html";
			}
	
			if (file_exists($_FILES['immagine']['tmp_name']) || is_uploaded_file($_FILES['immagine']['tmp_name'])){
				$target_dir = "../../$nomeCartellaPagina/";
				$target_file = $target_dir . basename($_FILES["immagine"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$check = getimagesize($_FILES["immagine"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					echo 'Attenzione: il File non è un immagine</br>';
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif") {
					echo 'Sono supportati solo JPG, JPEG, ICO, PNG & GIF.</br>';
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Spiacente, l'immagine non è stata caricata.</br>";
				// if everything is ok, try to upload file
				} else {
					move_uploaded_file($_FILES["immagine"]["tmp_name"], $target_file);
					$linkIMG =  basename( $_FILES["immagine"]["name"]);
				}
			}
			
			if (file_exists($_FILES['immagine2']['tmp_name']) || is_uploaded_file($_FILES['immagine2']['tmp_name'])){
				$target_dir = "../../$nomeCartellaPagina/";
				$target_file = $target_dir . basename($_FILES["immagine2"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$check = getimagesize($_FILES["immagine2"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					echo 'Attenzione: il File non è un immagine</br>';
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif") {
					echo 'Sono supportati solo JPG, JPEG, ICO, PNG & GIF.</br>';
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Spiacente, l'immagine non è stata caricata.</br>";
				// if everything is ok, try to upload file
				} else {
					move_uploaded_file($_FILES["immagine2"]["tmp_name"], $target_file);
					$linkIMG2 =  basename( $_FILES["immagine2"]["name"]);
				}
			}
			
			//recupero i nomi degli autori e non gli id
			$nomiAtoriPgDedicata= "";
			if(!empty($autoriPgDedicata)){
				$query_recuperaNomiAutori = "SELECT Brief FROM  people  WHERE people.IdPp IN (".implode(',',$autoriPgDedicata).")";
				$result = mysqli_query($db, $query_recuperaNomiAutori);
				if (!$result) {
					die("Errore nella query $query_recuperaNomiAutori: " . mysqli_error());
				}
				$nomiAtoriPgDedicata= [];
				while($row = mysqli_fetch_array($result)){
					$nomiAtoriPgDedicata[] = $row['Brief'];
				}
				$nomiAtoriPgDedicata= implode(', ',$nomiAtoriPgDedicata);
			}
	
			if (!empty($linkIMG2)){
				$stampLink= "<a href='" . $linkIMG2 . "'><img src='" . $linkIMG . "' alt='img'></a>";
			} else {
				$stampLink= "<img src='" . $linkIMG . "' alt='img'>";
			}
			if(!empty($sottotitoloPgDedicata)){
				$stampPuntVirg= "; ";
			} else {
				$stampPuntVirg= "";
			}
			
			$annoCorrente= date('Y');
	
	
			$codice = " 
<!DOCTYPE html><html lang='it'><head><meta charset='utf-8'>
<!--///////////////////////////////////////////////////////////////////////////
//
// Project:   HMRWeb - HMR project new website, powered by EPICACalpha
// Package:   Static, handwritten HTML pages
// Title:     $titoloPgDedicata
// File:      index.html
// Path:      $nomeCartellaPagina/index.html
// Type:      HTML
// Started:   
// Author(s): $nomiAtoriPgDedicata
// State:     online
//
// Version history.
// 
//   
//
// ////////////////////////////////////////////////////////////////////////////
//
// This file is part of software developed by the HMR Project
// Further information at: http://progettohmr.it
// Copyright (C) 2017 HMR Project, Giovanni A. Cignoni
//
// This is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published
// by the Free Software Foundation; either version 3.0 of the License,
// or (at your option) any later version.
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty
// of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU General Public License for more details.
// You should have received a copy of the GNU General Public License
// along with this program; if not, see <http://www.gnu.org/licenses/>.
//
// /////////////////////////////////////////////////////////////////////////-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-111997111-1'></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-111997111-1');
</script>
	
<title>$titoloPgDedicata</title>

<link rel='stylesheet' type='text/css' href='../HMR_Style.css'>

<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet'>

<link rel='icon' type='image/png' href='../Assets/Images/HMR_2017g_GC-WebFavIcon16x16.png' />

<script  src='https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script> 

<script type='text/javascript' src='../EPICAC/JSwebsite/searchAndSharing.js'></script>

<script type='text/javascript' src='../Assets/JS/HMR_CreaHTML.js'></script>

<meta name='description' content='' />
	
</head>

<body>

<!-- Standard HMRWeb header ///////////////////////////////////////////////////
// For banner:
// - set level, 1 = '../', 2 = '../../' and so on;
// - set image, file name and extension, no path, has to be in /Assets/Images.
// For menu:
// - set level, same as banner;
// - set active menu entry, 1=Cronologia, 2=Eventi and so on.  -->
	
<div class='HMR_Banner'>
	<script> creaHeader(1, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png') </script>
</div>
	
<div class='HMR_Menu'>
	<script> creaMenu(1, 0) </script>
</div>

<div class='HMR_Content'><div class= 'HMR_Text'>

<!-- Actual page content starts here ///////////////////////////////////////-->
			
<table class='TableDedicatedPage'>
<tr>
<td>$stampLink</td>

<td class='tdText'>
<h1>$titoloPgDedicata</h1>
<i>$sottotitoloPgDedicata$stampPuntVirg$nomiAtoriPgDedicata</i>
<br/>
<p>$testoPgDedicata</p>
</td>

</tr>

</table>
		
	<!-- CONTINUE HERE  -->
			
	
	<!-- Actual page content ends here /////////////////////////////////////////-->	
		
</div></div>

<!-- Standard HMRWeb footer////////////////////////////////////////////////////
// Set:
// - level, 1 = '../', 2 = '../../' and so on;
// - set copyright start year, YYYY
// - set copyright end year, YYYY;
// - set copyright owner, default 'Progetto HMR';
// - set date of page creation, YYYY/MM/DD.  -->
		
<div class='HMR_Footer'>
	<script> creaFooter(1, '$annoCorrente', '', '$nomiAtoriPgDedicata', '$dataAccadimento') </script>
</div>

</body>


</html>
"; 
			
			
	
			$fo = fopen($file, "w"); 
			fwrite($fo, $codice); 
			fclose($fo);
		}
		
		if($paginaDaCreare == "no"){
			$nomeCartellaPagina = "";
			
		}
	
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdPg) as numeroRighe FROM dedicatedpages WHERE IdPg = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_updatePgDedicata = "UPDATE dedicatedpages SET NewPage= '$paginaDaCreare', Folder= '$nomeCartellaPagina', Title= '".mysqli_real_escape_string($db, $titoloPgDedicata)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloPgDedicata)."', Text= '".mysqli_real_escape_string($db, $testoPgDedicata)."', TmbLink= '$linkIMG', ImgLink= '$linkIMG2', LinkRifPage= '$riferimentoPgEsistente' WHERE IdPg = $id";
				$risultato_update = mysqli_query($db, $query_updatePgDedicata);
				if (!$risultato_update) {
					die("Errore nella query $query_updatePgDedicata: " . mysqli_error());
				}
				$query_aggiornaIdPgDedicataInAccadimenti = "UPDATE happenings SET IdPg= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdPgDedicataInAccadimenti = mysqli_query($db, $query_aggiornaIdPgDedicataInAccadimenti);
				if (!$risultato_aggiornaIdPgDedicataInAccadimenti) {
					die("Errore nella query $query_aggiornaIdPgDedicataInAccadimenti: " . mysqli_error());
				}
			}
			if ($row['numeroRighe'] == 0){
				$query_insertPgDedicataConID = "INSERT INTO dedicatedpages (IdPg, NewPage, Folder, Title, Subtitle, Text, TmbLink, ImgLink, LinkRifPage) VALUES ('$id', '$paginaDaCreare', '$nomeCartellaPagina', '".mysqli_real_escape_string($db, $titoloPgDedicata)."', '".mysqli_real_escape_string($db, $sottotitoloPgDedicata)."', '".mysqli_real_escape_string($db, $testoPgDedicata)."', '$linkIMG', '$linkIMG2', '$riferimentoPgEsistente')";
				$risultato_insert = mysqli_query($db, $query_insertPgDedicataConID);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertPgDedicataConID: " . mysqli_error());
				}
				$query_aggiornaIdPgDedicataInAccadimenti = "UPDATE happenings SET IdPg= '$id' WHERE IdHa = $id";
				$risultato_aggiornaIdPgDedicataInAccadimenti = mysqli_query($db, $query_aggiornaIdPgDedicataInAccadimenti);
				if (!$risultato_aggiornaIdPgDedicataInAccadimenti) {
					die("Errore nella query $query_aggiornaIdPgDedicataInAccadimenti: " . mysqli_error());
				}
			}
		}
		
		if(!empty($autoriPgDedicata)){
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdPg) as numeroRighe FROM dedicatedpagepeople WHERE IdPg = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					/*Elimino gli id dei vecchi autori */
					$query_eliminaVecchiAutori= "DELETE FROM dedicatedpagepeople WHERE IdPg= '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
					}
				}
			}
			
			$query_insertAutoriPgDedicata= "INSERT INTO dedicatedpagepeople (IdPg, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriPgDedicata); $i++){
				$valori[] = "('$id', '".$autoriPgDedicata[$i]."')";
			}
			$query_insertAutoriPgDedicata .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriPgDedicata);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriPgDedicata: " . mysqli_error());
			}
		}
	} else {
		$db = openDB();
		$query_controlloRighe = "SELECT COUNT(IdPg) as numeroRighe FROM dedicatedpages WHERE IdPg = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] == 1){
				$query_aggiornaIdPgDedicataInAccadimenti = "UPDATE happenings SET IdPg= '0' WHERE IdHa = $id";
				$risultato_aggiornaIdPgDedicataInAccadimenti = mysqli_query($db, $query_aggiornaIdPgDedicataInAccadimenti);
				if (!$risultato_aggiornaIdPgDedicataInAccadimenti) {
					die("Errore nella query $query_aggiornaIdPgDedicataInAccadimenti: " . mysqli_error());
				}
			}
		}
	}

	
	/*--Tolgo accadimenti in edinting se ci sono*/
	$db = openDB();
	$query_controlloRighe = "SELECT COUNT(IdHl) as numeroRighe FROM highlightsediting WHERE IdHl = $id "; 
	$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
	while($row = mysqli_fetch_array($risultato_controlloRighe)){
		if($row['numeroRighe'] == 1){
			$query_eliminaEvidenzaEditing = "DELETE FROM highlightsediting WHERE IdHl = $id";
			$risultato_eliminaEvidenzaEditing = mysqli_query($db, $query_eliminaEvidenzaEditing);
			if (!$risultato_eliminaEvidenzaEditing) {
				die("Errore nella query $query_eliminaEvidenzaEditing: " . mysqli_error());
			}
		}
	}
	
	$db = openDB();
	$query_controlloRighe = "SELECT COUNT(IdPg) as numeroRighe FROM dedicatedpagesediting WHERE IdPg = $id "; 
	$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
	while($row = mysqli_fetch_array($risultato_controlloRighe)){
		if($row['numeroRighe'] == 1){
			$query_eliminaPgDedicataEditing = "DELETE FROM dedicatedpagesediting WHERE IdPg = $id";
			$risultato_eliminaEvidenzaEditing = mysqli_query($db, $query_eliminaPgDedicataEditing);
			if (!$risultato_eliminaEvidenzaEditing) {
				die("Errore nella query $query_eliminaPgDedicataEditing: " . mysqli_error());
			}
		}
	}
	
	$db = openDB();
	$query_controlloRighe = "SELECT COUNT(IdCr) as numeroRighe FROM cronosediting WHERE IdCr = $id "; 
	$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
	while($row = mysqli_fetch_array($risultato_controlloRighe)){
		if($row['numeroRighe'] == 1){
			$query_eliminaCronoEditing = "DELETE FROM cronosediting WHERE IdCr = $id";
			$risultato_eliminaCronoEditing = mysqli_query($db, $query_eliminaCronoEditing);
			if (!$risultato_eliminaCronoEditing) {
				die("Errore nella query $query_eliminaCronoEditing: " . mysqli_error());
			}
		}
	}
	
	$db = openDB();
	$query_controlloRighe = "SELECT COUNT(IdEv) as numeroRighe FROM eventsediting WHERE IdEv = $id "; 
	$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
	while($row = mysqli_fetch_array($risultato_controlloRighe)){
		if($row['numeroRighe'] == 1){
			$query_eliminaEventiEditing = "DELETE FROM eventsediting WHERE IdEv = $id";
			$risultato_eliminaEventiEditing = mysqli_query($db, $query_eliminaEventiEditing);
			if (!$risultato_eliminaEventiEditing) {
				die("Errore nella query $query_eliminaEventiEditing: " . mysqli_error());
			}
		}
	}
	
	$db = openDB();
	$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM bibliosediting WHERE IdBi = $id "; 
	$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
	while($row = mysqli_fetch_array($risultato_controlloRighe)){
		if($row['numeroRighe'] == 1){
			$query_eliminaRiferimentiEditing = "DELETE FROM bibliosediting WHERE IdBi = $id";
			$risultato_eliminaRiferimentiEditing = mysqli_query($db, $query_eliminaRiferimentiEditing);
			if (!$risultato_eliminaRiferimentiEditing) {
				die("Errore nella query $query_eliminaRiferimentiEditing: " . mysqli_error());
			}
		}
	}

	
	echo '<p>Accadimento pubblicato correttamente.</br> Fra poco verrai reinderizzato alla pagina degli accadimenti. Clicca <a href="../../Administration/Assets/PHP/ammEPICAC.php">qui</a> se non vuoi attendere</p>';
}






/*-----------------  SALVA ---------------------*/


if(isset($_POST['salva'])){
	if(($_POST['statoAccadimento'] == "Pubblicato") || ($_POST['statoAccadimento'] == "In revisione")){
		$statoAccadimento= "In revisione";
	} else $statoAccadimento= "In redazione";
	
	if($id != ""){
		$db = openDB();
		$query_updateAccadimento = "UPDATE happenings SET Date= '$dataAccadimento', Title= '".mysqli_real_escape_string($db, $titoloAccadimento)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloAccadimento)."', Anchor= '".mysqli_real_escape_string($db, $ancora)."', State= '$statoAccadimento'  WHERE IdHa = $id";
		$risultato_update = mysqli_query($db, $query_updateAccadimento);
		if (!$risultato_update) {
			die("Errore nella query $query_updateAccadimento: " . mysqli_error());
		}
	} else {
		$db = openDB();
		$query_insertAccadimento =  "INSERT INTO happenings (Date, Title, Subtitle, Anchor, State) VALUES ('$dataAccadimento', '".mysqli_real_escape_string($db, $titoloAccadimento)."', '".mysqli_real_escape_string($db, $sottotitoloAccadimento)."', '".mysqli_real_escape_string($db, $ancora)."', '$statoAccadimento' )";
		$risultato_insert = mysqli_query($db, $query_insertAccadimento);
		if (!$risultato_insert) {
			die("Errore nella query $query_insertAccadimento: " . mysqli_error());
		}
		$ultimo_id = mysqli_insert_id($db);		
	}		
	
	/*--Autori accadimento*/
	if(!empty($autoriAccadimento)){
		$query_controlloRighe = "SELECT COUNT(IdHa) as numeroRighe FROM happeningpeople WHERE IdHa = $id "; 
		$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
		while($row = mysqli_fetch_array($risultato_controlloRighe)){
			if ($row['numeroRighe'] > 0){
				$query_eliminaVecchiAutori= "DELETE FROM happeningpeople WHERE IdHa = '$id'";
				$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
				if (!$risultato_eliminaVecchiAutori) {
					die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
				}
			}
		}
		$query_insertAutoriAccadimento= "INSERT INTO happeningpeople (IdHa, IdPp) VALUES ";
		$valori= array();
		for($i= 0; $i < count($autoriAccadimento); $i++){
			$valori[] = "('$id', '".$autoriAccadimento[$i]."')";
		}
		$query_insertAutoriAccadimento .= join(', ', $valori);
		$risultato_insert = mysqli_query($db, $query_insertAutoriAccadimento);
		if (!$risultato_insert) {
			die("Errore nella query $query_insertAutoriAccadimento: " . mysqli_error());
		}
	}
	
	/*--In Evidenza*/
	if (in_array("evidenza", $selezionato)){
		if($id != ""){
			/*--Aggiorna accadimento in evidenza salvato (inserendolo o modificandolo)*/
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdHl) as numeroRighe FROM highlightsediting WHERE IdHl = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] == 1){
					$query_updateEvidenza = "UPDATE highlightsediting SET Position= '$posizione', Title= '".mysqli_real_escape_string($db, $titoloEvidenza)."', Text= '".mysqli_real_escape_string($db, $testoEvidenza)."', Icon= '$linkLogo', LinkTo= '$RadioButtonLinkInEvidenza', Visible= 'si' WHERE IdHl = $id";
					$risultato_updateEvidenza = mysqli_query($db, $query_updateEvidenza);
					if (!$risultato_updateEvidenza) {
						die("Errore nella query $query_updateEvidenza: " . mysqli_error());
					}
				}
				if ($row['numeroRighe'] == 0){
					$query_insertEvidenzaConID = "INSERT INTO highlightsediting (IdHl, Position, Title, Text, Icon, LinkTo, Visible) VALUES ('$id', '$posizione', '".mysqli_real_escape_string($db, $titoloEvidenza)."', '".mysqli_real_escape_string($db, $testoEvidenza)."', '$linkLogo', '$RadioButtonLinkInEvidenza', 'si')";
					$risultato_insertEvidenzaConID = mysqli_query($db, $query_insertEvidenzaConID);
					if (!$risultato_insertEvidenzaConID) {
						die("Errore nella query $query_insertEvidenzaConID: " . mysqli_error());
					}
				}
			}
		} else {
			/*--Inserisce nuovo accadimento in evidenza salvato*/
			$db = openDB();
			$query_insertEvidenza = "INSERT INTO highlightsediting (IdHl, Position, Title, Text, Icon, LinkTo, Visible) VALUES ('$ultimo_id', '$posizione', '".mysqli_real_escape_string($db, $titoloEvidenza)."', '".mysqli_real_escape_string($db, $testoEvidenza)."', '$linkLogo', '$RadioButtonLinkInEvidenza', 'si')";
			$risultato_insert = mysqli_query($db, $query_insertEvidenza);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertEvidenza: " . mysqli_error());
			}
		}
	}
	
	
	/*--In cronologia*/
	if (in_array("cronologia", $selezionato)){
		if($id != ""){
			/*--Aggiorna accadimento in cronologia salvato (inserendolo o modificandolo)*/
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdCr) as numeroRighe FROM cronosediting WHERE IdCr = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] == 1){
					$query_updateCronologia = "UPDATE cronosediting SET Date= '$dataCrono', Title= '".mysqli_real_escape_string($db, $titoloCrono)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloCrono)."', Text= '".mysqli_real_escape_string($db, $testoCrono)."', Visible= 'si' WHERE IdCr = $id";
					$risultato_updateCronologia = mysqli_query($db, $query_updateCronologia);
					if (!$risultato_updateCronologia) {
						die("Errore nella query $query_updateCronologia: " . mysqli_error());
					}
				}
				if ($row['numeroRighe'] == 0){
					$query_insertCronologiaConID = "INSERT INTO cronosediting (IdCr, Date, Title, Subtitle, Text, Visible) VALUES ('$id', '$dataCrono', '".mysqli_real_escape_string($db, $titoloCrono)."', '".mysqli_real_escape_string($db, $sottotitoloCrono)."', '".mysqli_real_escape_string($db, $testoCrono)."', 'si')";
					$risultato_insert = mysqli_query($db, $query_insertCronologiaConID);
					if (!$risultato_insert) {
						die("Errore nella query $query_insertCronologiaConID: " . mysqli_error());
					}
				}
			}		
		} else {
			/*--Inserisce nuovo accadimento in cronologia salvato*/	
			$db = openDB();
			$query_insertCrono = "INSERT INTO cronosediting (IdCr, Date, Title, Subtitle, Text, Visible) VALUES ('$ultimo_id', '$dataCrono', '".mysqli_real_escape_string($db, $titoloCrono)."', '".mysqli_real_escape_string($db, $sottotitoloCrono)."', '".mysqli_real_escape_string($db, $testoCrono)."', 'si')";
			$risultato_insert = mysqli_query($db, $query_insertCrono);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertCrono: " . mysqli_error());
			}
		}
		
		/*--Autori Cronologia*/
		if(!empty($autoriCrono)){
			$query_controlloRighe = "SELECT COUNT(IdCr) as numeroRighe FROM cronopeople WHERE IdCr = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					$query_eliminaVecchiAutori= "DELETE FROM cronopeople WHERE IdCr = '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
					}
				}
			}
			
			$query_insertAutoriCrono= "INSERT INTO cronopeople (IdCr, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriCrono); $i++){
				$valori[] = "('$id', '".$autoriCrono[$i]."')";
			}
			$query_insertAutoriCrono .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriCrono);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriCrono: " . mysqli_error());
			}
		}
	}
	
	/*--In eventi*/
	if (in_array("eventi", $selezionato)){
		if($id != ""){
			/*--Aggiorna accadimento in eventi salvato (inserendolo o modificandolo)*/
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdEv) as numeroRighe FROM eventsediting WHERE IdEv = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] == 1){
					$query_updateEventi = "UPDATE eventsediting SET Type='$tipoEvento', Date= '$dataEvento' , Title= '".mysqli_real_escape_string($db, $titoloEvento)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloEvento)."', Text= '".mysqli_real_escape_string($db, $testoEvento)."', Visible= 'si'  WHERE IdEv = $id";
					$risultato_updateEventi = mysqli_query($db, $query_updateEventi);
					if (!$risultato_updateEventi) {
						die("Errore nella query $query_updateEventi: " . mysqli_error());
					}
				}
				if ($row['numeroRighe'] == 0){
					$query_insertEventiConID = "INSERT INTO eventsediting (IdEv, Type, Date, Title, Subtitle, Text, Visible) VALUES ('$id', '$tipoEvento', '$dataEvento', '".mysqli_real_escape_string($db, $titoloEvento)."', '".mysqli_real_escape_string($db, $sottotitoloEvento)."', '".mysqli_real_escape_string($db, $testoEvento)."', 'si')";
					$risultato_insert = mysqli_query($db, $query_insertEventiConID);
					if (!$risultato_insert) {
						die("Errore nella query $query_insertEventiConID: " . mysqli_error());
					}
				}
			}
		} else {
			/*--Inserisce nuovo accadimento in eventi salvato*/	
			$db = openDB();
			$query_insertEvento = "INSERT INTO eventsediting (IdEv, Type, Date, Title, Subtitle, Text, Visible) VALUES ('$ultimo_id', '$tipoEvento', '$dataEvento', '".mysqli_real_escape_string($db, $titoloEvento)."', '".mysqli_real_escape_string($db, $sottotitoloEvento)."', '".mysqli_real_escape_string($db, $testoEvento)."', 'si')";
			$risultato_insert = mysqli_query($db, $query_insertEvento);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertEvento: " . mysqli_error());
			}
		}
		/*--Autori Evento*/	
		if(!empty($autoriEvento)){
			$query_controlloRighe = "SELECT COUNT(IdEv) as numeroRighe FROM eventpeople WHERE IdEv = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					$query_eliminaVecchiAutori= "DELETE FROM eventpeople WHERE IdEv = '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
					}
				}
			}
			
			$query_insertAutoriEvento= "INSERT INTO eventpeople (IdEv, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriEvento); $i++){
				$valori[] = "('$id', '".$autoriEvento[$i]."')";
			}
			$query_insertAutoriEvento .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriEvento);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriEvento: " . mysqli_error());
			}
		}
	}
	
	/*--In riferimenti*/
	if (in_array("riferimenti", $selezionato)){
		if($id != ""){
			/*--Aggiorna accadimento in riferimenti salvato (inserendolo o modificandolo)*/
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM bibliosediting WHERE IdBi = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] == 1){
					$query_updateRiferimento= "UPDATE bibliosediting SET Category= '$tipoRiferimento', Date= '$dataRiferimento', Title= '".mysqli_real_escape_string($db, $titoloRiferimento)."', PubReference= '".mysqli_real_escape_string($db, $ambito)."', VolNum= '$numeroVolume', Pages= '$numeroPagine', ISBN= '$isbn', Visible= 'si' WHERE IdBi = '$id' ";
					$risultato_updateRiferimento = mysqli_query($db, $query_updateRiferimento);
					if (!$risultato_updateRiferimento) {
						die("Errore nella query $query_updateRiferimento: " . mysqli_error());
					}
				}
				if ($row['numeroRighe'] == 0){
					$query_insertRiferimento = "INSERT INTO bibliosediting (IdBi, Category, Date, Title, PubReference, VolNum, Pages, ISBN, Visible) VALUES ('$id', '$tipoRiferimento', '$dataRiferimento', '".mysqli_real_escape_string($db, $titoloRiferimento)."', '".mysqli_real_escape_string($db, $ambito)."', '$numeroVolume', '$numeroPagine', '$isbn', 'si')";
					$risultato_insertRiferimento = mysqli_query($db, $query_insertRiferimento);
					if (!$risultato_insertRiferimento) {
						die("Errore nella query $query_insertRiferimento: " . mysqli_error());
					}
				}
			}
		} else {
			/*--Inserisce nuovo accadimento in riferimenti salvato*/	
			$db = openDB();
			$query_insertRiferimento = "INSERT INTO bibliosediting (IdBi, Category, Date, Title, PubReference, VolNum, Pages, ISBN, HTMLSrc, Visible) VALUES ('$ultimo_id', '$tipoRiferimento', '$dataRiferimento', '".mysqli_real_escape_string($db, $titoloRiferimento)."', '".mysqli_real_escape_string($db, $ambito)."', '$numeroVolume', '$numeroPagine', '$isbn', '".mysqli_real_escape_string($db, $compilato)."', 'si')";
			$risultato_insertRiferimento = mysqli_query($db, $query_insertRiferimento);
			if (!$risultato_insertRiferimento) {
				die("Errore nella query $query_insertRiferimento: " . mysqli_error());
			}
		}
		/*--Autori riferimenti*/
		if(!empty($autoriRiferimenti)){
			$db = openDB();
			$query_controlloRighe = "SELECT COUNT(IdBi) as numeroRighe FROM biblioauthors WHERE IdBi = $id "; 
			$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
			while($row = mysqli_fetch_array($risultato_controlloRighe)){
				if ($row['numeroRighe'] > 0){
					$query_eliminaVecchiAutoriRiferimenti= "DELETE FROM biblioauthors WHERE IdBi= '$id'";
					$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutoriRiferimenti);
					if (!$risultato_eliminaVecchiAutori) {
						die("Errore nella query $query_eliminaVecchiAutoriRiferimenti: " . mysqli_error());
					}
				}
			}
					
			$query_insertAutoriRiferimenti= "INSERT INTO biblioauthors (IdBi, IdPp) VALUES ";
			$valori= array();
			for($i= 0; $i < count($autoriRiferimenti); $i++){
				$valori[] = "('$id', '".$autoriRiferimenti[$i]."')";
			}
			$query_insertAutoriRiferimenti .= join(', ', $valori);
			$risultato_insert = mysqli_query($db, $query_insertAutoriRiferimenti);
			if (!$risultato_insert) {
				die("Errore nella query $query_insertAutoriRiferimenti: " . mysqli_error());
			}
		}
		
		/*--In pagina dedicata*/
		if (in_array("dedicata", $selezionato)){
			if($id != ""){
				/*--Aggiorna accadimento in pag dedicata salvato (inserendolo o modificandolo)*/
				$db = openDB();
				$query_controlloRighe = "SELECT COUNT(IdPg) as numeroRighe FROM dedicatedpagesediting WHERE IdPg = $id "; 
				$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
				while($row = mysqli_fetch_array($risultato_controlloRighe)){
					if ($row['numeroRighe'] == 1){
						$query_updatePgDedicata = "UPDATE dedicatedpagesediting SET NewPage= '$paginaDaCreare', Folder= '$nomeCartellaPagina', Title= '".mysqli_real_escape_string($db, $titoloPgDedicata)."', Subtitle= '".mysqli_real_escape_string($db, $sottotitoloPgDedicata)."', TmbLink= '$linkIMG', ImgLink= '$linkIMG2', LinkRifPage= '$riferimentoPgEsistente' WHERE IdPg = $id";
						$risultato_update = mysqli_query($db, $query_updatePgDedicata);
						if (!$risultato_update) {
							die("Errore nella query $query_updatePgDedicata: " . mysqli_error());
						}
					}
					if ($row['numeroRighe'] == 0){
						$query_insertPgDedicataConID = "INSERT INTO dedicatedpagesediting (IdPg, NewPage, Folder, Title, Subtitle, TmbLink, ImgLink, LinkRifPage) VALUES ('$id', '$paginaDaCreare', '$nomeCartellaPagina', '".mysqli_real_escape_string($db, $titoloPgDedicata)."', '".mysqli_real_escape_string($db, $sottotitoloPgDedicata)."', '$linkIMG', '$linkIMG2', '$riferimentoPgEsistente')";
						$risultato_insert = mysqli_query($db, $query_insertPgDedicataConID);
						if (!$risultato_insert) {
							die("Errore nella query $query_insertPgDedicataConID: " . mysqli_error());
						}
					}
				}
			} else {
				/*--Inserisce nuovo accadimento in pag dedicata salvato*/	
				$db = openDB();
				$query_insertPgDedicata = "INSERT INTO dedicatedpagesediting (IdPg, NewPage, Folder, Title, Subtitle, TmbLink, ImgLink, LinkRifPage) VALUES ('$ultimo_id', '$paginaDaCreare', '$nomeCartellaPagina', '".mysqli_real_escape_string($db, $titoloPgDedicata)."', '".mysqli_real_escape_string($db, $sottotitoloPgDedicata)."', '$linkIMG', '$linkIMG2', '$riferimentoPgEsistente')";
				$risultato_insert = mysqli_query($db, $query_insertPgDedicata);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertPgDedicata: " . mysqli_error());
				}
			}
			
			/*--Autori pagina dedicata*/
			if(!empty($autoriPgDedicata)){
				$db = openDB();
				$query_controlloRighe = "SELECT COUNT(IdPg) as numeroRighe FROM dedicatedpagepeople WHERE IdPg = $id "; 
				$risultato_controlloRighe = mysqli_query($db, $query_controlloRighe);
				while($row = mysqli_fetch_array($risultato_controlloRighe)){
					if ($row['numeroRighe'] > 0){
						/*Elimino gli id dei vecchi autori */
						$query_eliminaVecchiAutori= "DELETE FROM dedicatedpagepeople WHERE IdPg= '$id'";
						$risultato_eliminaVecchiAutori = mysqli_query($db, $query_eliminaVecchiAutori);
						if (!$risultato_eliminaVecchiAutori) {
							die("Errore nella query $query_eliminaVecchiAutori: " . mysqli_error());
						}
					}
				}
			
				$query_insertAutoriPgDedicata= "INSERT INTO dedicatedpagepeople (IdPg, IdPp) VALUES ";
				$valori= array();
				for($i= 0; $i < count($autoriPgDedicata); $i++){
					$valori[] = "('$id', '".$autoriPgDedicata[$i]."')";
				}
				$query_insertAutoriPgDedicata .= join(', ', $valori);
				$risultato_insert = mysqli_query($db, $query_insertAutoriPgDedicata);
				if (!$risultato_insert) {
					die("Errore nella query $query_insertAutoriPgDedicata: " . mysqli_error());
				}
			}
		}
	}
	
	
	echo '<p>Accadimento salvato correttamente.</br> Fra poco verrai reinderizzato alla pagina degli accadimenti. Clicca <a href="../../Administration/Assets/PHP/ammEPICAC.php">qui</a> se non vuoi attendere</p>';
	
}
?>	
		
		
		
		
		
		</div>
	</div>



	</body>
</html>

