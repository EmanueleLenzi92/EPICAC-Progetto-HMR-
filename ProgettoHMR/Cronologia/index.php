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
	
	<title>Cronologia HMR</title>
	
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<meta name="description" content="HMR nasce ufficialmente nel 2006. Qui è raccolto, anno per anno, tutto quanto è successo di importante nella storia del progetto.">
	
	<script type='text/javascript' src='../EPICAC/JSwebsite/searchAndSharing.js'></script>
	
	<script type='text/javascript' src='../Assets/JS/HMR_CreaHTML.js'></script>
	
	<link rel="stylesheet" type="text/css" href="../HMR_Style.css">
	
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	
	<script type="text/javascript" src="../Asset/JS/HMR_ActiveLink.js"></script>
	
	<link rel="icon" type="image/png" href="../Assets/Images/HMR_2017g_GC-WebFavIcon16x16.png" />
	
	<script type="text/javascript" src="../EPICAC/JSwebsite/Cronologia/ajaxCrono.js"></script>
	
	<script type="text/javascript" src="../EPICAC/JSwebsite/Cronologia/nextPreviousYearsBar.js"></script>
	
	<script type="text/javascript" src="../EPICAC/JSwebsite/Cronologia/showYear.js"></script>
	
	<script type="text/javascript" src="../EPICAC/JSwebsite/Cronologia/goToYear.js"></script>
	
	<meta charset="utf-8">

</head>

<body>
	<div class="HMR_Banner">
		<script> creaHeader(1, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png') </script>
	</div>
	
	<div id="HMR_Menu" class="HMR_Menu" >
		<script> creaMenu(1, 1) </script>
	</div>
	
	<div class="HMR_Content">
		
		 
		<div class= "HMR_Text"><!--div per il testo statico da spostare con margin a sinistra-->
		 
			<?php
				
				// include HMR_Cronologia in HTML
				
				$content = file_get_contents('../Assets/HTML/HMR_Cronologia.html');
				echo $content;
				
				// include all cronology PHP script
				
				ob_start(); // begin collecting output
				include '../EPICAC/PHP/Cronologia/crono.php';
				$result = ob_get_clean(); // retrieve output from myfile.php, stop buffering
				echo $result;
			
			?>
			
			
			
		</div>
	
	</div>
	
	<div class="HMR_Footer">
	<?PHP
	$queryultimaMod = 'SELECT Cronos FROM lastmod';
	$resultUltimaMod = mysqli_query($db, $queryultimaMod);
	while($row = mysqli_fetch_array($resultUltimaMod)){
		$ultimaMod=  $row['Cronos'];
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