<?php

   require("../../../Config/OggiSTI_config_adm.php");
   require("../../OggiSTI/Assets/PHP/OggiSTI_sessionSet.php");
   require("../../OggiSTI/Assets/PHP/OggiSTI_controlLogged.php");
   
    
   
   
?>

<?PHP
if (isset($_GET['modifica'])){
	$id = $_GET['modifica'];
	include('../APIdb/HMR_EpicacDB.php');
	
	
	if($_GET['tipo'] == 'pubblicato'){
		$query = "SELECT h.IdHa, h.State, h.date as HaDate, h.Title as HaTitle, h.Subtitle as HaSubtitle, h.Anchor, h.IdCr as HaCr, h.IdPg as HaPg, h.IdEv as HaEv, h.IdBi as HaBi, h.IdHl as HaHl, GROUP_CONCAT(DISTINCT(p1.Brief)) as HaAutori, GROUP_CONCAT(DISTINCT(hp.IdPp)) as idHaAutori, dp.IdPg, dp.NewPage, dp.Folder, dp.Title as DpTitle, dp.Subtitle as DpSubtitle, dp.Text as PgText, dp.TmbLink, dp.ImgLink, dp.LinkRifPage,GROUP_CONCAT(DISTINCT(p5.Brief)) as PgAutori, GROUP_CONCAT(DISTINCT(dpp.IdPp)) as idPgAutori, c.IdCr, c.Date as CrDate, c.Title as CrTitle, c.Subtitle as CrSubtitle, c.text as CrText, c.Visible as CrVisible, GROUP_CONCAT(DISTINCT(p2.Brief)) as CrAutori, GROUP_CONCAT(DISTINCT(cp.IdPp)) as idCrAutori, hi.IdHl, hi.Position, hi.Title as HiTitle, hi.Text as HiText, hi.Icon, hi.LinkTo, hi.Visible as HiVisible, e.IdEv, e.Type as EvType, e.Date as EvDate, e.title as EvTitle, e.Subtitle as EvSubtitle, e.Text as EvText, e.Visible as EvVisible, GROUP_CONCAT(DISTINCT(p4.Brief)) as EvAutori, GROUP_CONCAT(DISTINCT(ep.IdPp)) as idEvAutori, b.IdBi, b.Category, b.Date as BiDate, b.Title as BiTitle, b.PubReference, b.VolNum, b.Pages, b.ISBN, b.Visible as BiVisible, GROUP_CONCAT(DISTINCT(p3.Brief)) as BiAutori, GROUP_CONCAT(DISTINCT(ba.IdPp)) as idBiAutori, doc.Pdf as pdf, bil.IdLk as idPDF, doc.AnchorText as AnchorText, doc.ExtLink as extLink FROM happenings as h LEFT JOIN happeningpeople as hp ON h.IdHa = hp.IdHa left join people as p1 ON p1.IdPp = hp.IdPp LEFT JOIN cronos as c ON c.IdCr = h.IdHa LEFT JOIN cronopeople as cp ON cp.IdCr = c.IdCr LEFT JOIN people as p2 ON p2.IdPp = cp.IdPp LEFT JOIN highlights as hi ON hi.IdHl = h.IdHa LEFT JOIN events as e ON e.IdEv = h.IdHa LEFT JOIN eventpeople as ep ON ep.IdEv = e.IdEv LEFT JOIN people as p4 ON p4.IdPp = ep.IdPp LEFT JOIN biblios as b ON b.IdBi = h.IdHa LEFT JOIN biblioauthors as ba ON ba.IdBi = b.IdBi LEFT JOIN people as p3 ON p3.IdPp = ba.IdPp LEFT JOIN bibliolinks as bil ON bil.IdBi = b.IdBi LEFT JOIN doclinks as doc ON doc.IdLk = bil.IdLk LEFT JOIN dedicatedpages as dp ON dp.IdPg = h.IdHa LEFT JOIN dedicatedpagepeople as dpp ON dpp.IdPg = dp.IdPg LEFT JOIN people as p5 ON p5.IdPp = dpp.IdPp WHERE h.IdHa = $id GROUP By h.IdHa, pdf, AnchorText, extLink ORDER BY idPDF"; 
	} else if (($_GET['tipo'] == 'inRevisione') || ($_GET['tipo'] == 'inRedazione')){
		$query = "SELECT h.IdHa, h.State, h.date as HaDate, h.Title as HaTitle, h.Subtitle as HaSubtitle, h.Anchor, h.IdCr as HaCr, h.IdPg as HaPg, h.IdEv as HaEv, h.IdBi as HaBi, h.IdHl as HaHl, GROUP_CONCAT(DISTINCT(p1.Brief)) as HaAutori, GROUP_CONCAT(DISTINCT(hp.IdPp)) as idHaAutori, dp.IdPg, dp.NewPage, dp.Folder, dp.Title as DpTitle, dp.Subtitle as DpSubtitle, dp.Text as PgText, dp.TmbLink, dp.ImgLink, dp.LinkRifPage,GROUP_CONCAT(DISTINCT(p5.Brief)) as PgAutori, GROUP_CONCAT(DISTINCT(dpp.IdPp)) as idPgAutori, c.IdCr, c.Date as CrDate, c.Title as CrTitle, c.Subtitle as CrSubtitle, c.text as CrText, c.Visible as CrVisible, GROUP_CONCAT(DISTINCT(p2.Brief)) as CrAutori, GROUP_CONCAT(DISTINCT(cp.IdPp)) as idCrAutori, hi.IdHl, hi.Position, hi.Title as HiTitle, hi.Text as HiText, hi.Icon, hi.LinkTo, hi.Visible as HiVisible, e.IdEv, e.Type as EvType, e.Date as EvDate, e.title as EvTitle, e.Subtitle as EvSubtitle, e.Text as EvText, e.Visible as EvVisible, GROUP_CONCAT(DISTINCT(p4.Brief)) as EvAutori, GROUP_CONCAT(DISTINCT(ep.IdPp)) as idEvAutori, b.IdBi, b.Category, b.Date as BiDate, b.Title as BiTitle, b.PubReference, b.VolNum, b.Pages, b.ISBN, b.Visible as BiVisible, GROUP_CONCAT(DISTINCT(p3.Brief)) as BiAutori, GROUP_CONCAT(DISTINCT(ba.IdPp)) as idBiAutori, doc.Pdf as pdf, bil.IdLk as idPDF, doc.AnchorText as AnchorText, doc.ExtLink as extLink FROM happenings as h LEFT JOIN happeningpeople as hp ON h.IdHa = hp.IdHa left join people as p1 ON p1.IdPp = hp.IdPp LEFT JOIN cronosediting as c ON c.IdCr = h.IdHa LEFT JOIN cronopeople as cp ON cp.IdCr = c.IdCr LEFT JOIN people as p2 ON p2.IdPp = cp.IdPp LEFT JOIN highlightsediting as hi ON hi.IdHl = h.IdHa LEFT JOIN eventsediting as e ON e.IdEv = h.IdHa LEFT JOIN eventpeople as ep ON ep.IdEv = e.IdEv LEFT JOIN people as p4 ON p4.IdPp = ep.IdPp LEFT JOIN bibliosediting as b ON b.IdBi = h.IdHa LEFT JOIN biblioauthors as ba ON ba.IdBi = b.IdBi LEFT JOIN people as p3 ON p3.IdPp = ba.IdPp LEFT JOIN bibliolinks as bil ON bil.IdBi = b.IdBi LEFT JOIN doclinks as doc ON doc.IdLk = bil.IdLk LEFT JOIN dedicatedpagesediting as dp ON dp.IdPg = h.IdHa LEFT JOIN dedicatedpagepeople as dpp ON dpp.IdPg = dp.IdPg LEFT JOIN people as p5 ON p5.IdPp = dpp.IdPp WHERE h.IdHa = $id GROUP By h.IdHa, pdf, AnchorText, extLink ORDER BY idPDF"; 
	}		
	$result = mysqli_query($db, $query);
	
	/* array per raccogliere le colonne dei documenti*/
	$pdf= array();
	$testoPdf= array();
	$linkEsterni= array();
	
	while($row = mysqli_fetch_array($result)){
		/* recupero dati happenings*/
		$dataAccadimento= $row['HaDate'];
		$statoAccadimento= $row['State'];
		$titoloAccadimento= htmlspecialchars($row['HaTitle'], ENT_QUOTES);
		$sottotitoloAccadimento= htmlspecialchars($row['HaSubtitle'], ENT_QUOTES);
		$ancoraAccadimento= $row['Anchor'];
		$idCrInHappenings= $row['HaCr'];
		$idPgInHappenings= $row['HaPg'];
		$idEvInHappenings= $row['HaEv'];
		$idBiInHappenings= $row['HaBi'];
		$idHlInHappenings= $row['HaHl'];
		
		$autoriAccadimento= $row['HaAutori'];
		if ((!empty($autoriAccadimento)) || ($autoriAccadimento != null)){
			$autoriAccadimento= explode(',', $autoriAccadimento);
		}
		$idAutoriAccadimento= $row['idHaAutori'];
		if ((!empty($idAutoriAccadimento)) || ($idAutoriAccadimento != null)){
			$idAutoriAccadimento= explode(',', $idAutoriAccadimento);
		}
		
		/* recupero dati dedicatedPage*/
		$idPaginaDedicata= $row['IdPg']; 
		$nuovaPagina= $row['NewPage'];
		$riferimentoPgEsistente= $row['LinkRifPage'];
		$nomeCartella= $row['Folder']; 
		$titoloPaginaDedicata= htmlspecialchars($row['DpTitle'], ENT_QUOTES);
		$sottotitoloPaginaDedicata= htmlspecialchars($row['DpSubtitle'], ENT_QUOTES);
		$testoPaginaDedicata= $row['PgText'];
		$linkImgGrande= $row['ImgLink']; 
		$linkImmaginePiccola= $row['TmbLink'];
		
		
		$autoriPaginaDedicata= $row['PgAutori'];
		if ((!empty($autoriPaginaDedicata)) || ($autoriPaginaDedicata != null)){
			$autoriPaginaDedicata= explode(',', $autoriPaginaDedicata);
		}
		
		$idAutoriPaginaDedicata= $row['idPgAutori'];
		if ((!empty($idAutoriPaginaDedicata)) || ($idAutoriPaginaDedicata != null)){
			$idAutoriPaginaDedicata= explode(',', $idAutoriPaginaDedicata);
		}
		
		/* recupero dati cronos*/
		$idCronologia= $row['IdCr'];
		$titoloCronologia= htmlspecialchars($row['CrTitle'], ENT_QUOTES);
		$sottotitoloCronologia= htmlspecialchars($row['CrSubtitle'], ENT_QUOTES);
		$testoCronologia= $row['CrText'];
		$dataCronologia= $row['CrDate'];
		if ($dataCronologia == "0000-00-00"){
			$dataCronologia= "";
		}
		
		$autoriCronologia= $row['CrAutori'];
		if ((!empty($autoriCronologia)) || ($autoriCronologia != null)){
			$autoriCronologia= explode(',', $autoriCronologia);
		}
		
		$idAutoriCronologia= $row['idCrAutori'];
		if ((!empty($idAutoriCronologia)) || ($idAutoriCronologia != null)){
			$idAutoriCronologia= explode(',', $idAutoriCronologia);
		}
		
		/* recupero dati highlights*/
		$idEvidenza= $row['IdHl'];
		$titoloEvidenza= htmlspecialchars($row['HiTitle'], ENT_QUOTES);
		$testoEvidenza= $row['HiText'];
		$posizione= $row['Position'];
		$linkIcona= $row['Icon'];
		$linkTo= $row['LinkTo'];
		
		/* recupero dati events*/
		$idEventi= $row['IdEv'];
		$titoloEventi= htmlspecialchars($row['EvTitle'], ENT_QUOTES);
		$sottotitoloEventi= htmlspecialchars($row['EvSubtitle'], ENT_QUOTES);
		$testoEventi= $row['EvText'];
		$tipoEventi= $row['EvType'];
		$dataEventi= $row['EvDate'];
		if ($dataEventi == "0000-00-00"){
			$dataEventi= "";
		}
		
	
		
		$autoriEventi= $row['EvAutori'];
		if ((!empty($autoriEventi)) || ($autoriEventi != null)){
			$autoriEventi= explode(',', $autoriEventi);
		}
		
		$idAutoriEventi= $row['idEvAutori'];
		if ((!empty($idAutoriEventi)) || ($idAutoriEventi != null)){
			$idAutoriEventi= explode(',', $idAutoriEventi);
		}
		
		
		/* recupero dati biblios*/
		$idBiblio= $row['IdBi'];
		$titoloBibliografia= htmlspecialchars($row['BiTitle'], ENT_QUOTES);
		$dataBibliografia= $row['BiDate'];
		if ($dataBibliografia == "0000-00-00"){
			$dataBibliografia= "";
		}
		$categoriaBibliografia= $row['Category']; 
		$ambitoBibliografia= htmlspecialchars($row['PubReference'], ENT_QUOTES);
		$VolNumBibliografia= $row['VolNum'];
		if ($VolNumBibliografia == "0"){
			$VolNumBibliografia= "";
		}
		$pagineBibliografia= $row['Pages']; 
		if ($pagineBibliografia == "0"){
			$pagineBibliografia= "";
		}
		$isbn= $row['ISBN'];
		
		$autoriBibliografia= $row['BiAutori'];
		if ((!empty($autoriBibliografia)) || ($autoriBibliografia != null)){
			$autoriBibliografia= explode(',', $autoriBibliografia);
		}
		$idAutoriBibliografia= $row['idBiAutori'];
		if ((!empty($idAutoriBibliografia)) || ($idAutoriBibliografia != null)){
			$idAutoriBibliografia= explode(',', $idAutoriBibliografia);
		}
		
		/*aggiungo le colonne (group By pdf, anchortext e linkest) agli array*/
		
		$pdf[]= $row['pdf'];
		$testoPdf[]= $row['AnchorText'];
		$linkEsterni[]= $row['extLink'];
	} 
} else {
	$id= ""; $dataAccadimento= ""; $statoAccadimento= ""; $titoloAccadimento= ""; $sottotitoloAccadimento= ""; $autoriAccadimento= ""; $idAutoriAccadimento= ""; $ancoraAccadimento= ""; $idPgInHappenings= ""; $idCrInHappenings= ""; $idHlInHappenings= ""; $idEvInHappenings= ""; $idBiInHappenings= "";
	$idCronologia= ""; $titoloCronologia= ""; $sottotitoloCronologia= ""; $testoCronologia= ""; $dataCronologia= ""; $autoriCronologia= ""; $idAutoriCronologia= "";
	$idEventi= ""; $titoloEventi= ""; $sottotitoloEventi= ""; $testoEventi= ""; $tipoEventi= ""; $dataEventi= ""; $autoriEventi= ""; $idAutoriEventi= "";
	$idPaginaDedicata= ""; $nuovaPagina= ""; $nomeCartella=""; $titoloPaginaDedicata= ""; $sottotitoloPaginaDedicata= ""; $testoPaginaDedicata= ""; $linkImgGrande= ""; $linkImmaginePiccola= ""; $riferimentoPgEsistente= ""; $autoriPaginaDedicata= ""; $idAutoriPaginaDedicata= "";
	$idBiblio= ""; $titoloBibliografia= ""; $dataBibliografia= ""; $categoriaBibliografia= ""; $ambitoBibliografia= ""; $VolNumBibliografia= ""; $pagineBibliografia= ""; $isbn= ""; $pdf= ""; $testoPdf= ""; $linkEsterni= ""; $autoriBibliografia= ""; $idAutoriBibliografia= "";
	$idEvidenza= ""; $titoloEvidenza= ""; $testoEvidenza= ""; $posizione= ""; $linkIcona= ""; $linkTo= "";
}



?>


<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="../../HMR_Style.css">
	

	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 
	
	
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script type='text/javascript' src='../../Assets/JS/HMR_CreaHTML.js'></script>
	<script type='text/javascript' src='../JSwebsite/searchAndSharing.js'></script>
	<script type="text/javascript" src="../JSadmin/addPDFs.js"></script>
	<script type="text/javascript" src="../JSadmin/autori.js"></script>
	<script type="text/javascript" src="../JSadmin/preview.js"></script>
	<script type="text/javascript" src="../JSadmin/updateForms.js"></script>
	<script type="text/javascript" src="../JSadmin/showHideHappenings.js" ></script>
	<script type="text/javascript" src="../JSadmin/editTitleSubtitle.js" ></script>
	<script type="text/javascript" src="../Libs/tinymce/js/tinymce/tinymce.js" ></script > 
	
	<script type="text/javascript" src="../JSadmin/charactersCount.js"></script>
	<script type="text/javascript" >
	tinymce.init({
	forced_root_block : "", /*per togliere il <p> come primo nodo (cosi non va nel db)*/
    force_br_newlines : true,
    force_p_newlines : false,
		
	selector: 'textarea',
	height: 100,
	theme: 'modern',
	plugins: [
	'wordcount',
    'link charmap',
    'code'
    ],
	toolbar1: 'undo redo | bold italic |  link image',
	
	image_advtab: true,
	templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
	],
	content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
	]
	});
	</script >
	
	<meta charset="utf-8">
	
	<script type="text/javascript" src="../JSadmin/validation.js"></script>
	<script type="text/javascript" src="../JSadmin/validator.js"></script>
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
		
			<div class="HMR_Form">
				<!--Stampo <form> con dati da inviare a seconda dei parametri passati-->
				<?PHP
				if(($statoAccadimento == 'Pubblicato') || ($statoAccadimento == 'In redazione') || ($statoAccadimento == 'In revisione')){
					echo '<form id="formAccadimento" name="formAccadimento" action="../DBinterface/separatoPubblicato.php" method="POST" enctype="multipart/form-data">';
					echo '<h1>Modifica avvenimento ID ' . $id . '</h1>';
					echo '<input type="hidden" name="idModifica" value="'.$id.'">';
				} else {
					echo '<form id="formAccadimento" name="formAccadimento" action="../DBinterface/separatonewappening.php" method="POST" enctype="multipart/form-data">';
					echo '<h1>Nuovo Avvenimento</h1>';	
					
				}
				echo '<input type="hidden" name="statoAccadimento" value="'.$statoAccadimento.'">';
				?>
				
						
					<div id="MHR_Checkbox">
						<?PHP 
							if(($idPgInHappenings == 0) || ($idPgInHappenings == "") ){
								echo '<input type="checkbox" name="selezionato[]" value="dedicata" id="dedicataSelezionata" /> Con Pagina dedicata';
							} else echo '<input type="checkbox" name="selezionato[]" value="dedicata" id="dedicataSelezionata" checked/> Con Pagina dedicata';
							
							if(($idHlInHappenings == 0) || ($idHlInHappenings == "")){
								echo '<input type="checkbox" name="selezionato[]" value="evidenza" id="evidenzaSelezionata" /> In Evidenza';
							} else echo '<input type="checkbox" name="selezionato[]" value="evidenza" id="evidenzaSelezionata" checked/> In Evidenza';
							
							if(($idCrInHappenings == 0) || ($idCrInHappenings == "")){
								echo '<input type="checkbox" name="selezionato[]" value="cronologia"  id="cronologiaSelezionata" /> In Cronologia';
							} else echo '<input type="checkbox" name="selezionato[]" value="cronologia"  id="cronologiaSelezionata" checked/> In Cronologia';
							
							if(($idEvInHappenings == 0) || ($idEvInHappenings == "")){
								echo '<input type="checkbox" name="selezionato[]" value="eventi" id="eventiSelezionata" /> In Eventi';
							} else echo '<input type="checkbox" name="selezionato[]" value="eventi" id="eventiSelezionata" checked/> In Eventi';
							
							if(($idBiInHappenings == 0)|| ($idBiInHappenings == "")){
								echo '<input type="checkbox" name="selezionato[]" value="riferimenti" id="riferimentiSelezionata" /> In documentazione';
							} else echo '<input type="checkbox" name="selezionato[]" value="riferimenti" id="riferimentiSelezionata" checked/> In documentazione';
						
						?>
					</div> 
					
					<div id="HMR_Accadimento">
						<table>
							<tr>
								<td> <h3>Titolo:</h3> </td>
								<td> <input type="text" size="80" id="titoloAccadimento" name="titoloAccadimento" value="<?php echo $titoloAccadimento?>" onchange="aggiornaTitolo()" /> <div><p id="contaTitoloAccadimento"></p></div> </td>
								<td> <input type="button" value="Edit" onclick="openTitleSubtitle('titoloAccadimento')"> </td>
							</tr>
							<tr>
								<td> <h3>Sottotitolo:</h3> </td>
								<td> <input type="text" size="80" id="sottotitoloAccadimento" name="sottotitoloAccadimento" value="<?php echo $sottotitoloAccadimento?>" onchange="aggiornaSottotitolo()" /> <div><p id="contaSottotitoloAccadimento"></p> </td>
								<td> <input type="button" value="Edit" onclick="openTitleSubtitle('sottotitoloAccadimento')"> </td>
							</tr>
							<tr>
								<td> <h3>Data:</h3> </td>
								<td> <input type="text" size="80" id="dataAccadimento" name="dataAccadimento" value ="<?php echo $dataAccadimento?>" placeholder="yyyy-mm-dd" onchange="aggiornaData()" /> </td>
							</tr>
							<tr>
								<td> <h3>Autori:</h3> </td>
								<td> 
									<input type="button" value="Aggiungi" onclick="aggiungiAutoreAccadimento();">
									<input type= "button" value="Togli" onclick="rimuoviAutoriAccadimento();">
									<?PHP
									include('../APIdb/HMR_EpicacDB.php');
									$query = "SELECT * FROM people ORDER BY Surname ASC";
									$result = mysqli_query($db,$query);
									echo '<select id="selectAutoriAccadimento">';
									echo '<option selected="true" disabled="disabled" value="-1">scegli</option>';
									while ($row = mysqli_fetch_array($result)) {
										echo '<option id="'.$row['IdPp'].'" value="'.$row['IdPp'].'" >'.$row['Brief'].'</option>';
			
									}
									mysqli_close($db);
									echo '</select>';
									?>
								</td> 
							</tr>
							<tr>
								<td></td>
								<td> 
									<div id="autoriAccadimentoSelezionati"> 
										<p>     
											<?PHP
												if((!empty($autoriAccadimento)) || ($autoriAccadimento != null)){
													for($i=0; $i < count($autoriAccadimento); $i++){
														echo '<span id="' . $idAutoriAccadimento[$i] . '" >' . $autoriAccadimento[$i] . ' <input type="checkbox" value="' . $idAutoriAccadimento[$i] . '" name="rimuoviAutoreAccadimento"> <input type="hidden" name="inputIdAutoriAccadimento[]" value="' . $idAutoriAccadimento[$i] . '" > </span>';
													}
												}
											?>
										</p> 
									</div> 
								</td>
							</tr>
							<tr>
								<td> <h3>Ancora:</h3> </td>
								<td> <input type="text" size="80" id="Ancora" name="ancora" value ="<?PHP echo $ancoraAccadimento ?>" onchange="aggiornaAncora()" />  </td>
							</tr>
						</table>
					</div>
					
					<div id="HMR_PgDedicata" <?PHP if(($idPgInHappenings == 0) || ($idPgInHappenings == "")){ echo 'style="display:none"';} else echo 'style="display:block"'; ?> >
						<h2>Pagina Dedicata</h2> 
						<div id="linkAccadimentoPgDedicata" class="posizioneLinkAccadimenti"></div>
						
						<?PHP 
							if($nuovaPagina == "si"){
								echo '<input type="radio" name="PaginaDaCreare" id="PaginaDaCreareSi" value= "si" checked/>  Pagina Da creare';
							} else echo '<input type="radio" name="PaginaDaCreare" id="PaginaDaCreareSi" value= "si" />  Pagina Da creare';
							
							if($nuovaPagina == "no"){
								echo '<input type="radio" name="PaginaDaCreare" id="PaginaDaCreareNo" value= "no" checked/>  Pagina esistente';
							} else echo '<input type="radio" name="PaginaDaCreare" id="PaginaDaCreareNo" value= "no" />  Pagina esistente';
						?>
						
						<table id="HMR_CampiPgNonGenerata" <?PHP if($nuovaPagina == "no") { echo 'style="display:block"';} else echo 'style="display:none"'; ?>>
							<tr>
								<td> <h3>Link di riferimento:</h3> </td>
								<td> <input type="text" size="80" id="linkriferimento" name="linkriferimento" value="<?PHP echo $riferimentoPgEsistente ?>" /> </td>
							</tr>
						</table>
						
						<table id="HMR_CampiPgGenerata" <?PHP if(($nuovaPagina == "no") || ($nuovaPagina== "")) { echo 'style="display:none"';} else echo 'style="display:block"'; ?> >
							<tr>
								<td> <h3>Titolo:</h3> </td>
								<td> <input type="text" size="60" id="titoloPgDedicata" name="titoloPgDedicata" value="<?PHP echo $titoloPaginaDedicata ?>" /> <div><p id="contaTitoloPgDedicata"></p></div> </td>
								<td> <input type="button" value="Edit" onclick="openTitleSubtitle('titoloPgDedicata')"> </td>
							</tr>
							<tr>
								<td> <h3>Sottotitolo:</h3> </td>
								<td> <input type="text" size="80" id="sottotitoloPgDedicata" name="sottotitoloPgDedicata" value="<?PHP echo $sottotitoloPaginaDedicata ?>" /> <div><p id="contaSottotitoloPgDedicata"></p></div> </td>
								<td> <input type="button" value="Edit" onclick="openTitleSubtitle('sottotitoloPgDedicata')"> </td>
							</tr>
							<tr>
								<td> <h3>Testo:</h3> </td>
								<td> <textarea id="testoPgDedicata" name="testoPgDedicata" value="" cols="50" rows="3"><?PHP echo $testoPaginaDedicata ?></textarea> <div><p id="contaTestoPgDedicata">Parole consigliate: </p></div> </td>
							</tr>
							<tr>
								<td> <h3>Nome cartella:</h3> </td>
								<td> <input type="text" size="80" name="nomeCartellaPagina" id="nomeCartellaPagina" value="<?PHP echo $nomeCartella ?>" /> </td>
							</tr>
							<tr>
								<td> <h3>Autori:</h3> </td>
								<td> 
									<input type="button" value="Aggiungi" onclick="aggiungiAutorePgDedicata();">
									<input type= "button" value="Togli" onclick="rimuoviAutoriPgDedicata();">
									<?PHP
									include('../APIdb/HMR_EpicacDB.php');
									$query = "SELECT * FROM people ORDER BY Surname ASC";
									$result = mysqli_query($db,$query);
									echo '<select id="selectAutoriPgDedicata">';
									echo '<option selected="true" disabled="disabled" value="-1">scegli</option>';
									while ($row = mysqli_fetch_array($result)) {
										echo '<option id="'.$row['IdPp'].'" value="'.$row['IdPp'].'" >'.$row['Brief'].'</option>';
			
									}
									mysqli_close($db);
									echo '</select>';
									?>
								</td>
							</tr>
							<tr>
								<td></td>
								<td> 
									<div id="autoriPgDedicataSelezionati"> 
										<p>
											<?PHP
												if((!empty($autoriPaginaDedicata)) || ($autoriPaginaDedicata != null)){
													for($i=0; $i < count($autoriPaginaDedicata); $i++){
														echo '<span id="' . $idAutoriPaginaDedicata[$i] . '" >' . $autoriPaginaDedicata[$i] . ' <input type="checkbox" value="' . $idAutoriPaginaDedicata[$i] . '" name="rimuoviAutorePgDedicata"> <input type="hidden" name="inputIdAutoriPgDedicata[]" value="' . $idAutoriPaginaDedicata[$i] . '" > </span>';
													}
												}
											?>
										</p> 
									</div> 
								</td>
							</tr>
							<tr>
								<td> <h3>Immagine:</h3> </td>
								<td> 
									<input type="file" name="immagine" id="immagine" onchange="readURL(this);" /> 
									<input type="hidden" name="linkImg" id="linkImg" value="<?PHP echo $linkImmaginePiccola ?>" />
									<img id="imgPreview" src="#" style="display:none" />
								</td>
							</tr>
							<tr>
								<td> <h3>Immagine grande:</h3> </td>
								<td> 
									<input type="file" name="immagine2" id="immagine2" /> 
									<input type="hidden" name="linkImg2" id="linkImg2" value="<?PHP echo $linkImgGrande ?>" />
								</td>
							</tr>
							<tr> <td> <input type="button" id="previewPgDedicata" value="preview"> </td> </tr>
						</table>
					</div>
						
					<div id="HMR_inEvidenza" <?PHP if(($idHlInHappenings == 0) || ($idHlInHappenings == "")){ echo 'style="display:none"';} else echo 'style="display:block"'; ?> >
						<h2>In evidenza</h2> 
					
						<table>
						<tr>
							<td> <h3>Posizione:</h3> </td>
							<td> 
							<?PHP
								if($posizione == 1){
								 echo '<input type="radio" name="posizioneBox" value="1" checked/> 1';
								} else echo '<input type="radio" name="posizioneBox" value="1"/> 1';
								
								if($posizione == 2){
								 echo '<input type="radio" name="posizioneBox" value="2" checked/> 2';
								} else echo '<input type="radio" name="posizioneBox" value="2"/> 2';
								
								if($posizione == 3){
								 echo '<input type="radio" name="posizioneBox" value="3" checked/> 3';
								} else echo '<input type="radio" name="posizioneBox" value="3"/> 3';
								
								if($posizione == 4){
								 echo '<input type="radio" name="posizioneBox" value="4" checked/> 4 ';
								} else echo '<input type="radio" name="posizioneBox" value="4" /> 4 ';
								
								if($posizione == 5){
								 echo '<input type="radio" name="posizioneBox" value="5" checked/> 5';
								} else echo '<input type="radio" name="posizioneBox" value="5" /> 5';
								
								if($posizione == 6){
								 echo '<input type="radio" name="posizioneBox" value="6" checked/> 6';
								} else echo '<input type="radio" name="posizioneBox" value="6"/> 6';
								
								if($posizione == 7){
								 echo '<input type="radio" name="posizioneBox" value="7" checked/> 7';
								} else echo '<input type="radio" name="posizioneBox" value="7" /> 7';
								
								if($posizione == 8){
								 echo '<input type="radio" name="posizioneBox" value="8" checked/> 8';
								} else echo '<input type="radio" name="posizioneBox" value="8" /> 8';
								
								if($posizione == 9){
								 echo '<input type="radio" name="posizioneBox" value="9" checked/> 9';
								} else echo '<input type="radio" name="posizioneBox" value="9" /> 9';
							?>
							</td>
						</tr>
						<tr>
							<td> <h3>Titolo:</h3> </td>
							<td> <input type="text" size="80" id="titoloInEvidenza" name="titoloInEvidenza" value="<?PHP echo $titoloEvidenza; ?>" /> <div><p id="contaTitoloEvidenza"></p></div> </td>
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('titoloInEvidenza')"> </td>
						</tr>
						<tr>
							<td> <h3>Testo:</h3> </td>
							<td> <textarea id="testoInEvidenza" name="testoInEvidenza" value="" cols="50" rows="3"><?PHP echo $testoEvidenza; ?></textarea> <div><p id="contaTestoEvidenza">Parole consigliate: </p></div> </td>
						</tr>
						<tr>
							<td> <h3>Icona:</h3></td>
							<td> 
								<input type="file" name="icona" id="icona" onchange="readURLlogo(this);"/> 
								<input type="hidden" id="linkIcona" name="linkIcona" value="<?PHP echo $linkIcona ?>" />
								<img id="logoPreview" src="#" style="display:none" />
							</td>
						</tr>
						<tr>
							<td> <h3>Link a:</h3> </td>
							<td> 
							<?PHP
							if($linkTo == 'Cronologia/#' . $ancoraAccadimento){
								echo '<input type="radio" name="linkInEvidenza" value="crono" checked/> cronologia';
							} else echo '<input type="radio" name="linkInEvidenza" value="crono" /> cronologia';
							
							if($linkTo == 'Eventi/#' . $ancoraAccadimento){
								echo '<input type="radio" name="linkInEvidenza" value="eventi" checked/> Eventi';
							} else echo '<input type="radio" name="linkInEvidenza" value="eventi" /> Eventi';
							
							if($linkTo == 'Documentazione/#' . $ancoraAccadimento){
								echo '<input type="radio" name="linkInEvidenza" value="riferimenti" checked/> Riferimenti';
							} else echo '<input type="radio" name="linkInEvidenza" value="riferimenti" /> Riferimenti';
							
							if(($linkTo == $nomeCartella .'/') || ($riferimentoPgEsistente != "")){
								echo '<input type="radio" name="linkInEvidenza" value="dedicata" checked/> Pagina dedicata';
							} else echo '<input type="radio" name="linkInEvidenza" value="dedicata" /> Pagina dedicata';
							?>
							</td>
						</tr>
						</table>
						<input type="button" id="previewEvidenza" value="preview">
					</div>
						
					<div id="HMR_inCronologia" <?PHP if(($idCrInHappenings == 0) || ($idCrInHappenings == "")){ echo 'style="display:none"';} else echo 'style="display:block"'; ?>>
						<h2>In cronologia</h2>
						<div id="linkAccadimentoCronologia" class="posizioneLinkAccadimenti"><?PHP if($ancoraAccadimento != "" ) { echo 'http://www.progettohmr.it/Cronologia/?id='.$ancoraAccadimento ;}?></div>
						
						<table>
						<tr>
							<td> <h3>Titolo:</h3> </td>
							<td> <input type="text" size="80" name="titoloInCronologia" value="<?PHP echo $titoloCronologia ?>" id="titoloCrono" /> <div><p id="contaTitoloCrono"></p></div></td>
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('titoloCrono')"> </td>
						</tr>
						<tr>
							<td> <h3>Sottotitolo:</h3> </td>
							<td> <input type="text" size="80" name="sottotitoloInCronologia" id="sottotitoloCrono" value="<?PHP echo $sottotitoloCronologia ?>" /> <div> <p id="contaSottotitoloCrono"></p></div> </td>
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('sottotitoloCrono')"> </td>
						</tr>
						<tr>
							<td> <h3>Testo:</h3></td>
							<td> <textarea name="testoInCronologia" id= "testoInCronologia" value="" cols="50" rows="3"><?PHP echo $testoCronologia ?></textarea> <div><p id="contaTestoCrono">Parole consigliate</p></div> </td>
						</tr>
						<tr>
							<td> <h3>Data:</h3></td>
							<td> <input type="text" size="80" id="dataCronologia" name="dataInCronologia" placeholder="yyyy-mm-dd" value="<?PHP echo $dataCronologia ?>" /> </td>
						</tr>
						<tr>
							<td> <h3>Autori:</h3></td>
							<td> 
								<input type="button" value="Aggiungi" onclick="aggiungiAutoreCronologia();">
								<input type= "button" value="Togli" onclick="rimuoviAutoriCronologia();">
								<?PHP
									include('../APIdb/HMR_EpicacDB.php');
									$query = "SELECT * FROM people ORDER BY Surname ASC";
									$result = mysqli_query($db,$query);
									echo '<select id="selectAutoriCronologia">';
									echo '<option selected="true" disabled="disabled" value="-1">scegli</option>';
									while ($row = mysqli_fetch_array($result)) {
										echo '<option id="'.$row['IdPp'].'" value="'.$row['IdPp'].'" >'.$row['Brief'].'</option>';
			
									}
									mysqli_close($db);
									echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td> 
								<div id="autoriCronologiaSelezionati"> 
									<p>
									<?PHP
										if((!empty($autoriCronologia)) || ($autoriCronologia != null)){
											for($i=0; $i < count($autoriCronologia); $i++){
												echo '<span id="' . $idAutoriCronologia[$i] . '" >' . $autoriCronologia[$i] . ' <input type="checkbox" value="' . $idAutoriCronologia[$i] . '" name="rimuoviAutoreCronologia"> <input type="hidden" name="inputIdAutoriCronologia[]" value="' . $idAutoriCronologia[$i] . '" > </span>';
											}
										}
									?>
									</p> 
								</div> 
							</td>
						</tr>
						</table>
						<input type="button" id="previewCronologia" value="preview">
					</div>
						
					<div id="HMR_inEventi" <?PHP if(($idEvInHappenings == 0) || ($idEvInHappenings == "")){ echo 'style="display:none"';} else echo 'style="display:block"'; ?> > 
						<h2>In eventi</h2>
						<div id="linkAccadimentoEventi" class="posizioneLinkAccadimenti"><?PHP if($ancoraAccadimento != "" ) { echo 'http://www.progettohmr.it/Eventi/?id='.$ancoraAccadimento ;}?></div>
					
						<table>
						<tr>
							<td> <h3>Tipo:</h3> </td>
							<td> 
								<?PHP
								if($tipoEventi == 'seminario'){
									echo '<input type="radio" name="tipoEventi" value="seminario" checked/> Seminario';
								} else echo '<input type="radio" name="tipoEventi" value="seminario" /> Seminario';
								
								if($tipoEventi == 'mostra'){
									echo '<input type="radio" name="tipoEventi" value="mostra" checked/> Mostra';
								} else echo '<input type="radio" name="tipoEventi" value="mostra" /> Mostra';
								
								if($tipoEventi == 'allestimenti'){
									echo '<input type="radio" name="tipoEventi" value="allestimenti" checked/> Allestimenti';
								} else echo '<input type="radio" name="tipoEventi" value="allestimenti" /> Allestimenti';
								
								if($tipoEventi == 'evento'){
									echo '<input type="radio" name="tipoEventi" value="evento" checked/> Evento';
								} else echo '<input type="radio" name="tipoEventi" value="evento" /> Evento';
								?>
							</td> 
						</tr>
						<tr>
							<td> <h3>Titolo:</h3> </td>
							<td> <input type="text" size="80" name="titoloInEventi" value="<?PHP echo $titoloEventi ?>" id="titoloEventi" />  <div><p id="contaTitoloEventi"></p></div> </td> 
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('titoloEventi')"> </td>
						</tr>
						<tr>
							<td> <h3>Sottotitolo:</h3> </td>
							<td> <input type="text" size="80" id="sottotitoloEventi" name="sottotitoloInEventi" value="<?PHP echo $sottotitoloEventi ?>" /> <div><p id="contaSottotitoloEventi"></p></div> </td>
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('sottotitoloEventi')"> </td>
						</tr>
						<tr>
							<td> <h3>Testo:</h3></td>
							<td> <textarea name="testoInEventi" id="testoEventi" value="" cols="50" rows="3"><?PHP echo $testoEventi ?></textarea> <div><p id="contaTestoEventi">Parole consigliate: </p></div> </td>
						</tr>
						<tr>
							<td> <h3>Data:</h3></td>
							<td> <input type="text" size="80" id="dataEventi" name="dataInEventi" placeholder="yyyy-mm-dd" value="<?PHP echo $dataEventi ?>" /> </td>
						</tr>
						<tr>
							<td> <h3>Autori:</h3></td>
							<td> 
								<input type="button" value="Aggiungi" onclick="aggiungiAutoreEvento();">
								<input type= "button" value="Togli" onclick="rimuoviAutoriEvento();">
								<?PHP
									include('../APIdb/HMR_EpicacDB.php');
									$query = "SELECT * FROM people ORDER BY Surname ASC";
									$result = mysqli_query($db,$query);
									echo '<select id="selectAutoriEventi">';
									echo '<option selected="true" disabled="disabled" value="-1">scegli</option>';
									while ($row = mysqli_fetch_array($result)) {
										echo '<option id="'.$row['IdPp'].'" value="'.$row['IdPp'].'" >'.$row['Brief'].'</option>';
			
									}
									mysqli_close($db);
									echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td> 
								<div id="autoriEventiSelezionati"> 
									<p>
									<?PHP
										if((!empty($autoriEventi)) || ($autoriEventi != null)){
											for($i=0; $i < count($autoriEventi); $i++){
												echo '<span id="' . $idAutoriEventi[$i] . '" >' . $autoriEventi[$i] . ' <input type="checkbox" value="' . $idAutoriEventi[$i] . '" name="rimuoviAutoreEvento"> <input type="hidden" name="inputIdAutoriEventi[]" value="' . $idAutoriEventi[$i] . '" > </span>';
											}
										}
									?>
									</p> 
								</div> 
							</td>
						</tr>
						</table>
						<input type="button" id="previewEventi" value="preview">
					</div>
						
					<div id="HMR_inRiferimenti" <?PHP if(($idBiInHappenings == 0) || ($idBiInHappenings == "")){ echo 'style="display:none"';} else echo 'style="display:block"'; ?>>
						<h2>In documentazione</h2>
						<div id="linkAccadimentoRiferimenti" class="posizioneLinkAccadimenti"><?PHP if($ancoraAccadimento != "" ) { echo 'http://www.progettohmr.it/Documentazione/?id='.$ancoraAccadimento ;}?></div>
							
						<table>
						<tr>
							<td> <h3>Titolo:</h3> </td>
							<td> <input type="text" size="80" name="titoloInRiferimenti" value="<?PHP echo $titoloBibliografia ?>" id="titoloRiferimenti" /> <div><p id="contaTitoloRiferimenti"></p></div></td>
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('titoloRiferimenti')"> </td>
						</tr>
						<tr>
							<td> <h3>Ambito:</h3> </td>
							<td> <input type="text" size="80" id="ambitoRiferimenti" name="ambitoRiferimenti" value="<?PHP echo $ambitoBibliografia ?>" /> <div><p id="contaAmbitoRiferimenti"></p></div></td>
							<td> <input type="button" value="Edit" onclick="openTitleSubtitle('ambitoRiferimenti')"> </td>
						</tr>
						<tr>
							<td> <h3>Data:</h3></td>
							<td> <input type="text" size="80" id="dataRiferimenti" name="dataInRiferimenti" placeholder="yyyy-mm-dd" value="<?PHP echo $dataBibliografia ?>" /> </td>
						</tr>
						<tr>
							<td> <h3>ISBN:</h3></td>
							<td> <input type="text" size="80" name="isbn" value="<?PHP echo $isbn ?>" /> </td>
						</tr>
						<tr>
							<td> <h3>Numero Volume:</h3></td>
							<td> <input type="text" size="80" name="numeroVolume" value="<?PHP echo $VolNumBibliografia ?>" /> </td>
						</tr>
						<tr>
							<td> <h3>Numero Pagine:</h3></td>
							<td> <input type="text" size="80" name="numeroPagine" value="<?PHP echo $pagineBibliografia ?>" /> </td>
						</tr>
						<tr>
							<td> <h3>Autori:</h3></td>
							<td> 
								<input type="button" value="Aggiungi" onclick="aggiungiAutoreRiferimenti();">
								<input type= "button" value="Togli" onclick="rimuoviAutoriRiferimenti();">
								<?PHP
									include('../APIdb/HMR_EpicacDB.php');
									$query = "SELECT * FROM people ORDER BY Surname ASC";
									$result = mysqli_query($db,$query);
									echo '<select id="selectAutoriRiferimenti">';
									echo '<option selected="true" disabled="disabled" value="-1">scegli</option>';
									while ($row = mysqli_fetch_array($result)) {
										echo '<option id="'.$row['IdPp'].'" value="'.$row['IdPp'].'" >'.$row['Brief'].'</option>';
			
									}
									mysqli_close($db);
									echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td> 
								<div id="autoriRiferimentiSelezionati"> 
									<p>
									<?PHP
										if((!empty($autoriBibliografia)) || ($autoriBibliografia != null)){
											for($i=0; $i < count($autoriBibliografia); $i++){
												echo '<span id="' . $idAutoriBibliografia[$i] . '" >' . $autoriBibliografia[$i] . ' <input type="checkbox" value="' . $idAutoriBibliografia[$i] . '" name="rimuoviAutoreRiferimento"> <input type="hidden" name="inputIdAutoriRiferimenti[]" value="' . $idAutoriBibliografia[$i] . '" > </span>';
											}
										}
									?>
									</p> 
								</div> 
							</td>
						</tr>
						</table>
							
						<p>
							Tipo:
							<select id="tipoRiferimento" name="tipoRiferimento">
								<?PHP 
									if($categoriaBibliografia == "pubblicazioni"){
										echo '<option value="pubblicazioni" selected/>Pubblicazioni</option>';
									} else echo '<option value="pubblicazioni">Pubblicazioni</option>';
									if($categoriaBibliografia == "interventiSeminariPresentazioni"){
										echo '<option value="interventiSeminariPresentazioni" selected>Interventi, seminari e presentazioni</option>';
									} else echo '<option value="interventiSeminariPresentazioni">Interventi, seminari e presentazioni</option>';
									if($categoriaBibliografia == "articoliVari"){
										echo '<option value="articoliVari" selected>Articoli vari</option>';
									} else echo '<option value="articoliVari">Articoli vari</option>';
									if($categoriaBibliografia == "documentiMaterialiProgetto"){
										echo '<option value="documentiMaterialiProgetto" selected>Documenti e altro materiale di progetto</option>';
									} else echo '<option value="documentiMaterialiProgetto">Documenti e altro materiale di progetto</option>';
								?>
							</select>
						</p>
						
					
						
						<div id="OggettoInserisciPdf">
							<div id="bottoniPdfs">
								<input type="button" value="Aggiungi" onclick="campoSingolo();">
								<input type= "button" value="Elimina" onclick="RimuoviPdfs();">
							</div>
							<table id="myTable">  
							<tr>
								<th><h3>Nome</h3></th>
								<th><h3>Ancora su titolo</h3></th> 
								<th><h3>Ancora su testo PDF</h3></th>
								<th><h3>Link esterno</h3></th>
								<th></th>
							</tr>
							<?PHP
								if((!empty($pdf)) || (!empty($testoPdf)) || (!empty($linkEsterni))){
									for($i=0; $i < count($testoPdf); $i++){
										if(($pdf[$i] != "") && ($testoPdf[$i] == "") ){
											echo '<tr class="datiPdfInseriti" id="rigaPdf_'. ($i + 1) .'"> <td class="cellaPdf"> <span style="display:none" class="hiddenIframePDF"><input type="hidden" name="linkPdf[]" value="../Documenti/'.$pdf[$i].'" /> <input type="hidden" id="nomePdf" name="nomePdf[]" value="'.$pdf[$i].'" /> <input type="file" name="pdf[]"> </span> <p>'. $pdf[$i] .'</p></td> <td class="cellaLinkSuTitolo"><span class="hiddenIframeLinkSuTitolo" style="display:none"><input type="radio" id="titoloLinkato" name="titoloLinkato" value="'. ($i + 1) .'" style="display:none" checked/></span> <p>Selezionato</p></td>  <td class="cellaLinkSuTesto"><span style="display:none" class="hiddenIframeLinkSuTesto"><input type="hidden" id="linkSuTesto" name="linkSuTesto[]" value="'. $testoPdf[$i] .'" /></span> <p>'. $testoPdf[$i] .'</p></td> <td class="cellaLinkEsterno"><span style="display:none" class="hiddenIframeLinkEsterno"><input type="hidden" id="linkEsterno" name="linkEsterno[]" value="'. $linkEsterni[$i] .'" /></span> <p>'. $linkEsterni[$i]  .'</p></td> <td><p><input type="checkbox" name="rimuoviPdf" value="rigaPdf_'. ($i + 1) .'"></p></td></tr>';
										}
										if(($pdf[$i] != "") && ($testoPdf[$i] != "") ){
											echo '<tr class="datiPdfInseriti" id="rigaPdf_'. ($i + 1) .'"> <td class="cellaPdf"> <span style="display:none" class="hiddenIframePDF"><input type="hidden" name="linkPdf[]" value="../Documenti/'.$pdf[$i].'" /> <input type="hidden" id="nomePdf" name="nomePdf[]" value="'.$pdf[$i].'" /> <input type="file" name="pdf[]"></span> <p>'. $pdf[$i] .'</p></td> <td class="cellaLinkSuTitolo"><span class="hiddenIframeLinkSuTitolo" style="display:none"><input type="radio" id="titoloLinkato" name="titoloLinkato" value="'. ($i + 1) .'" style="display:none"/></span> </td> <td class="cellaLinkSuTesto"><span style="display:none" class="hiddenIframeLinkSuTesto"><input type="hidden" id="linkSuTesto" name="linkSuTesto[]" value="'. $testoPdf[$i] .'" /></span> <p>'. $testoPdf[$i] .'</p></td> <td class="cellaLinkEsterno"><span style="display:none" class="hiddenIframeLinkEsterno"><input type="hidden" id="linkEsterno" name="linkEsterno[]" value="'. $linkEsterni[$i] .'" /></span> <p>'. $linkEsterni[$i]  .'</p></td> <td><p><input type="checkbox" name="rimuoviPdf" value="rigaPdf_'. ($i + 1) .'"></p></td></tr>';
											
											//echo '<tr> <td> '. $pdf[$i] .'</td> <td></td>  <td>'. $testoPdf[$i] .'</td> <td>'. $linkEsterni[$i]  .'</td> <td></td></tr>';
										}
										if(($linkEsterni[$i] != "") && ($testoPdf[$i] != "") ){
											echo '<tr class="datiPdfInseriti" id="rigaPdf_'. ($i + 1) .'"> <td class="cellaPdf"> <span style="display:none" class="hiddenIframePDF"><input type="hidden" name="linkPdf[]" value="" /> <input type="hidden" id="nomePdf" name="nomePdf[]" value="'.$pdf[$i].'" /> <input type="file" name="pdf[]"></span> <p>'. $pdf[$i] .'</p></td> <td class="cellaLinkSuTitolo"> <span style="display:none" class="hiddenIframeLinkSuTitolo"><input type="radio" id="titoloLinkato" name="titoloLinkato" value="'. ($i + 1) .'" style="display:none"/></span> </td> <td class="cellaLinkSuTesto"> <span style="display:none" class="hiddenIframeLinkSuTesto"><input type="hidden" id="linkSuTesto" name="linkSuTesto[]" value="'. $testoPdf[$i] .'" /></span> <p>'. $testoPdf[$i] .'</p></td> <td class="cellaLinkEsterno"> <span style="display:none" class="hiddenIframeLinkEsterno"><input type="hidden" id="linkEsterno" name="linkEsterno[]" value="'. $linkEsterni[$i] .'" /></span> <p>'. $linkEsterni[$i]  .'</p></td> <td><p><input type="checkbox" name="rimuoviPdf" value="rigaPdf_'. ($i + 1) .'"></p></td></tr> ';
											
											//echo '<tr> <td> '. $pdf[$i] .'</td> <td></td>  <td>'. $testoPdf[$i] .'</td> <td>'. $linkEsterni[$i]  .'</td> <td></td></tr>';
										}
										if(($linkEsterni[$i] != "") && ($testoPdf[$i] == "") ){
											echo '<tr class="datiPdfInseriti" id="rigaPdf_'. ($i + 1) .'"> <td class="cellaPdf"> <span style="display:none" class="hiddenIframePDF"><input type="hidden" name="linkPdf[]" value="" /> <input type="hidden" id="nomePdf" name="nomePdf[]" value="'.$pdf[$i].'" /> <input type="file" name="pdf[]"> </span> <p>'. $pdf[$i] .'</p></td> <td class="cellaLinkSuTitolo"> <span style="display:none" class="hiddenIframeLinkSuTitolo"><input type="radio" id="titoloLinkato" name="titoloLinkato" value="'. ($i + 1) .'" style="display:none" checked/></span> <p>Selezionato</p></td> <td class="cellaLinkSuTesto"> <span style="display:none" class="hiddenIframeLinkSuTesto"><input type="hidden" id="linkSuTesto" name="linkSuTesto[]" value="'. $testoPdf[$i] .'" /></span> <p>'. $testoPdf[$i] .'</p></td> <td class="cellaLinkEsterno"> <span style="display:none" class="hiddenIframeLinkEsterno"><input type="hidden" id="linkEsterno" name="linkEsterno[]" value="'. $linkEsterni[$i] .'" /></span> <p>'. $linkEsterni[$i]  .'</p></td> <td><p><input type="checkbox" name="rimuoviPdf" value="rigaPdf_'. ($i + 1) .'"></p></td></tr> ';
											
											//echo '<tr> <td> '. $pdf[$i] .'</td> <td><p>Selezionato</p></td>  <td>'. $testoPdf[$i] .'</td> <td>'. $linkEsterni[$i]  .'</td> <td></td></tr>';
										}
									}
								}
								?>
							
							</table>
							<div id="campiAggiuntiPdf"> <!-- l'id di questo campo è importante. viene selezionato con jquery e da qui dentro, copia il contenuto dei form inseriti e li mette nella tabella -->
							</div>
							<div id="inputPdfEliminati">
							</div>
						</div>
						<input type="button" id="previewRiferimenti" value="preview">
					</div>
					
					<div id="InvioAccadimento">
						<input type="submit" id="salva" name="salva" value="Salva">
						<input type="submit" id="pubblica" name="pubblica" value="Pubblica">
					</div>
						
				</form>
			</div>
		</div>
	</div>
	
	
	
	
	
	<div class="HMR_Footer">
	</div>


</body>


</html>