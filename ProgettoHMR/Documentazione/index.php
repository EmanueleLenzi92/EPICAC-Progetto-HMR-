<!DOCTYPE html>
<html>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111997111-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111997111-1');
</script>
	<title>Riferimenti HMR</title>
	<meta name="description" content="Tutta la documentazione prodotta a oggi da HMR, raccolta e organizzata in: pubblicazioni, articoli su riviste scientifiche e atti di conferenze, libri;interventi e presentazioni, incluso il materiale presentato in riferimenti al Museo curati da HMR;articoli vari, su riviste o siti web di argomento generale;documenti di progetto, rapporti tecnici, materiale distribuito in occasione di riferimenti, documentazione interna, etc.">
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type='text/javascript' src='../EPICAC/JSwebsite/searchAndSharing.js'></script>
	<script type='text/javascript' src='../Assets/JS/HMR_CreaHTML.js'></script>
	<script type='text/javascript' src='../EPICAC/JSwebsite/listaRiferimentiNumerata.js'></script>
	<link rel="stylesheet" type="text/css" href="../HMR_Style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<script type="text/javascript" src="../Asset/JS/HMR_ActiveLink.js"></script>
	<link rel="icon" type="image/png" href="../Assets/Images/HMR_2017g_GC-WebFavIcon16x16.png" />
	<meta charset="utf-8">

	<style>.highlightedClickedLink{background-color:rgba(255,0,255,0.3);}</style>
</head>

<body>
	<div class="HMR_Banner">
		<script> creaHeader(1, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png', 1) </script>
	</div>
	
	<div id="HMR_Menu" class="HMR_Menu" >
		<script> creaMenu(1, 7, 1) </script>
	</div>
	
	<div class="HMR_Content">
		
		
		<div class= "HMR_Text"><!--div per il testo statico da spostare con margin a sinistra-->
			
			<?php
				$content = file_get_contents('../Assets/HTML/HMR_Documentazione.html');
				echo $content;
				
				
				// function for scrolling page at clicked link
				$highlightedClickedLink= "";
				if(isset($_GET['id'])){
					
					echo "<script>
					$(document).ready(function(){ 
						
						//add class highlightedClickedLink to clicked link
						$('#".$_GET['id']."').addClass('highlightedClickedLink')
						
						//scroll to post
						
						$('html, body').animate({
							scrollTop: $('#".$_GET['id']."').offset().top
						}, );
						
						// hide class for clicked link
						$( '#".$_GET['id']."' ).switchClass( 'highlightedClickedLink', '', 2500 );
						
					});
					</script>";
				}
			?>
			
			
		
		
			<div id="HMR_Pubblicazioni"> 
				<h2 id="Pubblicazioni">Pubblicazioni</h2> </br>
					<ol id="list1" class="HMR_custom-counter"> <!--lista numerata reverse da js-->
					<?PHP
					include ('../EPICAC/APIdb/HMR_EpicacDB.php');
					$query = "SELECT biblios.Category, biblios.HTMLSrc, biblios.Visible, happenings.Anchor, happenings.Date FROM biblios INNER JOIN happenings ON biblios.IdBi = happenings.IdHa WHERE biblios.Visible= 'si' && biblios.Category= 'pubblicazioni' ORDER BY happenings.Date desc";
					$result = mysqli_query($db, $query);
					if(!$result){
					echo 'NO';}
					while($row = mysqli_fetch_array($result)){
						echo '<li id= "'.$row['Anchor'].'">';
						echo '<p>';
						echo $row['HTMLSrc'];
						echo '</p>';
						echo '</li>';
					}
					?>
					</ol>
			</div>
		 
		
			<div id="HMR_Interventi">
				<h2 id="Interventi">Interventi, seminari e presentazioni</h2> </br>
					<ol id="list2" class="HMR_custom-counter">
					<?PHP
					include ('../EPICAC/APIdb/HMR_EpicacDB.php');
					$query= "SELECT biblios.Category, biblios.HTMLSrc, biblios.Visible, happenings.Anchor, happenings.Date FROM biblios INNER JOIN happenings ON biblios.IdBi = happenings.IdHa WHERE biblios.Visible= 'si' && biblios.Category= 'interventiSeminariPresentazioni' ORDER BY happenings.Date desc";
					$result = mysqli_query($db, $query);
					while($row = mysqli_fetch_array($result)){
						echo '<li id= "'.$row['Anchor'].'">';
						echo '<p>';
						echo $row['HTMLSrc'];
						echo '</p>';
						echo '</li>';
					}
					?>
					</ol>
			</div>
		 
		
			<div id="HMR_Articoli">
				<h2 id="ArtVari">Articoli vari</h2> </br>
					<ol id="list3" class="HMR_custom-counter">
					<?PHP
					include ('../EPICAC/APIdb/HMR_EpicacDB.php');
					$query= "SELECT biblios.Category, biblios.HTMLSrc, biblios.Visible, happenings.Anchor, happenings.Date FROM biblios INNER JOIN happenings ON biblios.IdBi = happenings.IdHa WHERE biblios.Visible= 'si' && biblios.Category= 'articoliVari' ORDER BY happenings.Date desc";
					$result = mysqli_query($db, $query);
					while($row = mysqli_fetch_array($result)){
						echo '<li id= "'.$row['Anchor'].'">';
						echo '<p>';
						echo $row['HTMLSrc'];
						echo '</p>';
						echo '</li>';
					}
					?>
					</ol>
			</div>
		 
		
			<div id="HMR_Documenti">
				<h2 id="DocProgetto">Documenti e altro materiale di progetto</h2> </br>
					<ol id="list4" class="HMR_custom-counter">
					<?PHP
					include ('../EPICAC/APIdb/HMR_EpicacDB.php');
					$query= "SELECT biblios.Category, biblios.HTMLSrc, biblios.Visible, happenings.Anchor, happenings.Date FROM biblios INNER JOIN happenings ON biblios.IdBi = happenings.IdHa WHERE biblios.Visible= 'si' && biblios.Category= 'documentiMaterialiProgetto' ORDER BY happenings.Date desc";
					$result = mysqli_query($db, $query);
					while($row = mysqli_fetch_array($result)){
						echo '<li id= "'.$row['Anchor'].'">';
						echo '<p>';
						echo $row['HTMLSrc'];
						echo '</p>';
						echo '</li>';
					}
					?>
					</ol>
			</div>
			
		</div>
		
		
		
	</div>

	<div class="HMR_Footer">
		<?PHP
	$queryultimaMod = 'SELECT Biblios FROM lastmod';
	$resultUltimaMod = mysqli_query($db, $queryultimaMod);
	while($row = mysqli_fetch_array($resultUltimaMod)){
		$ultimaMod=  $row['Biblios'];
	}
	
	echo '<div class="HMR_FooterTop">
		<img id="HMR_imgFooter" src="../Assets/Images/CC_By-Nc-Nd-Eu-80x28.png" alt="">
		<div id="HMR_scrittaFooterUp">Copyright © 2009 - 2018 G.A.Cignoni</div>
		<div id="HMR_scrittaFooterBottom">Pagina creata: 03/21/2009; ultima modifica: '.$ultimaMod.'</div>
	</div>
	<div class="HMR_FooterBottom">
		<div id="HMR_SocialFooter"><a href="https://www.facebook.com/progettoHMR/" target="_blank">Segui HMR su Facebook</a></div>
		<a href="https://www.facebook.com/progettoHMR/" target="_blank"><img id="HMR_SocialFooterFb" src="../Assets/Images/HMR_2017g_GC-FacebookIcon24x24.png"></a>
		
		<span id="lineaSocial"></span>
		
		<div id="HMR_contatti"><a href="mailto:info@progettohmr.it">Contatti</a> <br/> <a href="../Persone/">Persone</a></div>
		<div id="HMR_login"><a href="../Administration/Assets/PHP/autentication.php"><img src="../Assets/Images/HMR_2017g_GC-LoginIcon24x24.png" alt="Login"></a></div>
	</div>';
	?>
	</div>
</body>


</html>